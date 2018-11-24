<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Profile;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfileController
{
    public function get(int $userId): JsonResponse
    {
        $profile = new Profile();
        $profile->setId(1);
        $profile->setAge(25);
        $profile->setSex('m');
        $profile->setCountry('PL');
        $profile->setCity('Kraków');

        return new JsonResponse(['profiles' => [ $profile ]]);
    }
}