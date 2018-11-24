<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    private $userRepository;

    /**
     * TimetableController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->userRepository = $this->em->getRepository(User::class);
    }

    public function getUserDetails()
    {
        $auth = $this->getUser();
        $user = $this->userRepository->findOneBy(['id' => $auth->getUser()->getId()]);

        return new JsonResponse($user);
    }
}