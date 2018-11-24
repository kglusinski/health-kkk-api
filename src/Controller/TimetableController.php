<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Timetable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class TimetableController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    private $timetableRepository;

    /**
     * TimetableController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->timetableRepository = $this->em->getRepository(Timetable::class);
    }


    public function getProfileTimetable(int $profileId)
    {
        $timetables = $this->timetableRepository->findBy(['profile' => $profileId]);

        return new JsonResponse(['timetables' => $timetables ]);
    }
}