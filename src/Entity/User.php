<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Timetable
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements \JsonSerializable
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="phone", type="integer", length=9, nullable=true)
     */
    private $phone;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=65, unique=true)
     */
    private $email;

    /**
     * @var bool
     * @ORM\Column(name="push_notifications", type="boolean")
     */
    private $pushNotifications;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isPushNotifications(): bool
    {
        return $this->pushNotifications;
    }

    /**
     * @param bool $pushNotifications
     */
    public function setPushNotifications(bool $pushNotifications): void
    {
        $this->pushNotifications = $pushNotifications;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}