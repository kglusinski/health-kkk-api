<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Profile;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository
     */
    private $profileRepository;

    /**
     * ProfileController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->profileRepository = $this->em->getRepository(Profile::class);
    }

    public function getUserProfiles(): JsonResponse
    {
        $auth = $this->getUser();
        $profiles = $this->profileRepository->findBy(['user' => $auth->getUser()->getId()]);

        return new JsonResponse(['profiles' => $profiles]);
    }

    public function getProfile(int $profileId)
    {
        $profile = $this->profileRepository->findOneBy(['id' => $profileId]);

        return new JsonResponse(['profile' =>  $profile ]);
    }

    public function createProfile(Request $request)
    {
        $profileRaw = json_decode($request->getContent(), true);
        $auth = $this->getUser();

        $profile = new Profile();
        $profile->setName($profileRaw['name']);
        $profile->setSex($profileRaw['sex']);
        $profile->setCity($profileRaw['city']);
        $profile->setCountry($profileRaw['country']);
        $profile->setAge($profileRaw['age']);
        $profile->setUser($auth->getUser()->getId());

        $this->em->persist($profile);
        $this->em->flush();

        return new JsonResponse(['success' => true]);
    }

    public function pathProfile(int $profileId, Request $request)
    {
        $profile = $this->profileRepository->findOneBy(['id' => $profileId]);

        $profileRaw = json_decode($request->getContent(), true);

        foreach ($profileRaw as $key => $value) {
            if ($key === 'user') continue;
            $profile->set($key, $value);
        }

        $this->em->persist($profile);
        $this->em->flush();

        return new JsonResponse(['success' => true]);
    }
}