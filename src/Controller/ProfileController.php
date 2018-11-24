<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Profile;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileController
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
        $profiles = $this->profileRepository->findAll();

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

        $profile = new Profile();
        $profile->setSex($profileRaw['sex']);
        $profile->setCity($profileRaw['city']);
        $profile->setCountry($profileRaw['country']);
        $profile->setAge($profileRaw['age']);

        $this->em->persist($profile);
        $this->em->flush();

        return new JsonResponse(['success' => true]);
    }

    public function pathProfile(int $profileId, Request $request)
    {
        $profile = $this->profileRepository->findOneBy(['id' => $profileId]);

        $profileRaw = json_decode($request->getContent(), true);

        $profile->setSex($profileRaw['sex']);
        $profile->setCity($profileRaw['city']);
        $profile->setCountry($profileRaw['country']);
        $profile->setAge($profileRaw['age']);

        $this->em->persist($profile);
        $this->em->flush();

        return new JsonResponse(['success' => true]);
    }
}