<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Examination;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExaminationController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    private $examinationRepository;

    /**
     * TimetableController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->examinationRepository = $this->em->getRepository(Examination::class);
    }

    public function getList()
    {
        $examinations = $this->examinationRepository->findAll();

        return new JsonResponse($examinations);
    }
}