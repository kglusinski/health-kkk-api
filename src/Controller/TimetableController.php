<?php
declare(strict_types=1);

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;

class TimetableController
{
    public function get()
    {
        return new JsonResponse([
            'timetables' => [
                [
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
                ],
                [
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
                ],
                [
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
                ],
                [
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
                ],
            ]
        ]);
    }
}