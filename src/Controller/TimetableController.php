<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Timetable;
use Symfony\Component\HttpFoundation\JsonResponse;

class TimetableController
{
    public function get()
    {
        $timetables = [
            Timetable::fromArray([
                'id' => 1,
                'duration' => 'annual',
                'startDate' => new \DateTime(),
                'endDate' => new \DateTime('+2 years'),
                'done' => false,
                'disabled' => false,
                'examination' => [
                    'id' => 1,
                    'name' => 'Echo serca',
                    'defaultFrequency' => 'daily',
                    'description' => 'Lorem ipsum dolor sit amet',
                ],
            ]),
            Timetable::fromArray([
                'id' => 2,
                'duration' => 'daily',
                'startDate' => new \DateTime(),
                'endDate' => new \DateTime('+2 years'),
                'done' => false,
                'disabled' => false,
                'examination' => [
                    'id' => 1,
                    'name' => 'Echo serca',
                    'defaultFrequency' => 'daily',
                    'description' => 'Lorem ipsum dolor sit amet',
                ],
            ]),
            Timetable::fromArray([
                'id' => 3,
                'duration' => 'monthly',
                'startDate' => new \DateTime(),
                'endDate' => new \DateTime('+2 years'),
                'done' => true,
                'disabled' => false,
                'examination' => [
                    'id' => 1,
                    'name' => 'Echo serca',
                    'defaultFrequency' => 'daily',
                    'description' => 'Lorem ipsum dolor sit amet',
                ],
            ]),
            Timetable::fromArray([
                'id' => 4,
                'duration' => 'monthly',
                'startDate' => new \DateTime(),
                'endDate' => new \DateTime('+2 years'),
                'done' => true,
                'disabled' => true,
                'examination' => [
                    'id' => 1,
                    'name' => 'Echo serca',
                    'defaultFrequency' => 'daily',
                    'description' => 'Lorem ipsum dolor sit amet',
                ],
            ]),
        ];
        return new JsonResponse(['timetables' => $timetables ]);
    }
}