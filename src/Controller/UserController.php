<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Auth;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    private $userRepository;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * TimetableController constructor.
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $this->em = $em;
        $this->userRepository = $this->em->getRepository(User::class);
        $this->passwordEncoder = $encoder;
    }

    public function getUserDetails()
    {
        $auth = $this->getUser();
        $user = $this->userRepository->findOneBy(['id' => $auth->getUser()->getId()]);

        return new JsonResponse($user);
    }

    public function register(Request $request)
    {
        $credentials = json_decode($request->getContent(), true);

        $auth = new Auth();

        $auth->setUsername($credentials['username']);
        $auth->setPassword($this->passwordEncoder->encodePassword($auth, $credentials['password']));

        $user = new User();
        $user->setEmail($credentials['username']);
        $user->setPushNotifications(false);

        $auth->setUser($user);

        $this->em->persist($auth);
        $this->em->persist($user);

        $this->em->flush();

        return new JsonResponse(['success' => true]);
    }
}