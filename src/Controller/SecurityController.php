<?php
declare(strict_types=1);

namespace App\Controller;


class SecurityController
{
    public function getToken()
    {
        throw new \RuntimeException('getToken() should never be called directly.');
    }
}