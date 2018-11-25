<?php
declare(strict_types=1);

namespace App\Service;


use App\Entity\Examination;
use App\Entity\Profile;
use App\Entity\Timetable;
use Doctrine\ORM\EntityManagerInterface;

class ExaminationScheduler
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $examinationsRepository;

    /**
     * ExaminationScheduler constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->examinationsRepository = $em->getRepository(Examination::class);
    }

    public function scheduleDefault(Profile $profile)
    {
        $checkups[] = $this->scheduleGlucoseCheckup($profile);
        $checkups[] = $this->mammographyCheckup($profile);
        $checkups[] = $this->bloodPressureCheckup($profile);
        $checkups[] = $this->echocardiogramCheckup($profile);
        $checkups[] = $this->dentalCheckup($profile);
        $checkups[] = $this->bloodSmearCheckup($profile);
        $checkups[] = $this->ecgCheckup($profile);

        foreach ($checkups as $checkup) {
            if ($checkup) {
                $this->em->persist($checkup);
            }
        }

        $this->em->flush();
    }

    private function scheduleGlucoseCheckup(Profile $profile): Timetable
    {
        $examination = $this->examinationsRepository->findOneBy(['id' => 6]);

        $timetable = new Timetable();
        $timetable->setStartDate((new \DateTime())->format('Y-m-d'));
        $timetable->setExamination($examination);

        $duration = $examination->getDefaultFrequency();

        if ($profile->getDiabets()) {
            $duration = 'daily';
        } else {
            switch ($profile->getJobType()) {
                case 'sitting':
                    $duration = 'monthly'; break;
                case 'standing':
                    $duration = '3 months'; break;
                case 'light physical':
                    $duration = '6 months'; break;
                case 'heavy physical':
                    $duration = 'annual'; break;
            }

            if ($profile->getJobType() === 'sitting' || $profile->getJobType() === 'standing') {
                switch ($profile->getSportActivity()) {
                    case 1:
                        $duration = 'monthly'; break;
                    case 2:
                        $duration = '6 months'; break;
                    case 3:
                    case 4:
                        $duration = 'annual'; break;
                }
            }
        }

        $timetable->setDuration($duration);
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }

    private function mammographyCheckup(Profile $profile): ?Timetable
    {
        if ($profile->getSex() === 'm') {
            return null;
        }

        if ($profile->getAge() < 50) {
            return null;
        }

        $timetable = new Timetable();
        $mammography = $this->examinationsRepository->findOneBy(['id' => 7]);

        $timetable->setStartDate((new \DateTime('now'))->format('Y-m-d'));
        $timetable->setExamination($mammography);

        $timetable->setDuration('annual');
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }

    private function bloodPressureCheckup(Profile $profile): Timetable
    {
        $checkup = $this->examinationsRepository->findOneBy(['id' => 2]);
        $duration = $checkup->getDefaultFrequency();

        if ($profile->getDiabets()) {
            $duration = 'weekly';
        }

        if ($profile->getAge() > 50) {
            $duration = 'daily';
        }

        $timetable = new Timetable();

        $timetable->setStartDate((new \DateTime('now'))->format('Y-m-d'));
        $timetable->setExamination($checkup);

        $timetable->setDuration($duration);
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }

    private function echocardiogramCheckup(Profile $profile): Timetable
    {
        $checkup = $this->examinationsRepository->findOneBy(['id' => 1]);
        $duration = $checkup->getDefaultFrequency();

        $timetable = new Timetable();

        $timetable->setStartDate((new \DateTime('now'))->format('Y-m-d'));
        $timetable->setExamination($checkup);

        $timetable->setDuration($duration);
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }

    private function bloodSmearCheckup(Profile $profile): Timetable
    {
        $checkup = $this->examinationsRepository->findOneBy(['id' => 3]);
        $duration = $checkup->getDefaultFrequency();

        $timetable = new Timetable();

        $timetable->setStartDate((new \DateTime('now'))->format('Y-m-d'));
        $timetable->setExamination($checkup);

        $timetable->setDuration($duration);
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }

    private function dentalCheckup(Profile $profile): Timetable
    {
        $checkup = $this->examinationsRepository->findOneBy(['id' => 4]);
        $duration = $checkup->getDefaultFrequency();

        $timetable = new Timetable();

        $timetable->setStartDate((new \DateTime('now'))->format('Y-m-d'));
        $timetable->setExamination($checkup);

        $timetable->setDuration($duration);
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }

    private function ecgCheckup(Profile $profile): Timetable
    {
        $checkup = $this->examinationsRepository->findOneBy(['id' => 5]);
        $duration = $checkup->getDefaultFrequency();

        $timetable = new Timetable();

        $timetable->setStartDate((new \DateTime('now'))->format('Y-m-d'));
        $timetable->setExamination($checkup);

        $timetable->setDuration($duration);
        $timetable->setEndDate((new \DateTime('+1 year'))->format('Y-m-d'));
        $timetable->setProfile($profile);

        return $timetable;
    }
}