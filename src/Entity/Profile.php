<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Timetable
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="profile")
 */
class Profile implements \JsonSerializable
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="age", type="integer", length=3)
     */
    private $age;

    /**
     * @var string
     * @ORM\Column(name="sex", type="string", length=1)
     */
    private $sex;

    /**
     * @var string
     * @ORM\Column(name="country", type="string", length=2)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var null|bool
     * @ORM\Column(name="allergy", type="boolean", nullable=true)
     */
    private $allergy;

    /**
     * @var null|string
     * @ORM\Column(name="diet", type="string", nullable=true)
     */
    private $diet;

    /**
     * @var null|int
     * @ORM\Column(name="sport_activity", type="integer", nullable=true)
     */
    private $sportActivity;

    /**
     * @var null|int
     * @ORM\Column(name="job_type", type="integer", nullable=true)
     */
    private $jobType;

    /**
     * @var null|bool
     * @ORM\Column(name="disability", type="boolean", nullable=true)
     */
    private $disability;

    /**
     * @var null|bool
     * @ORM\Column(name="cancer_in_family", type="boolean", nullable=true)
     */
    private $cancerInFamily;

    /**
     * @var null|bool
     * @ORM\Column(name="diabets", type="boolean", nullable=true)
     */
    private $diabets;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return bool|null
     */
    public function getAllergy(): ?bool
    {
        return $this->allergy;
    }

    /**
     * @param bool|null $allergy
     */
    public function setAllergy(?bool $allergy): void
    {
        $this->allergy = $allergy;
    }

    /**
     * @return string|null
     */
    public function getDiet(): ?string
    {
        return $this->diet;
    }

    /**
     * @param string|null $diet
     */
    public function setDiet(?string $diet): void
    {
        $this->diet = $diet;
    }

    /**
     * @return int|null
     */
    public function getSportActivity(): ?int
    {
        return $this->sportActivity;
    }

    /**
     * @param int|null $sportActivity
     */
    public function setSportActivity(?int $sportActivity): void
    {
        $this->sportActivity = $sportActivity;
    }

    /**
     * @return int|null
     */
    public function getJobType(): ?int
    {
        return $this->jobType;
    }

    /**
     * @param int|null $jobType
     */
    public function setJobType(?int $jobType): void
    {
        $this->jobType = $jobType;
    }

    /**
     * @return bool|null
     */
    public function getDisability(): ?bool
    {
        return $this->disability;
    }

    /**
     * @param bool|null $disability
     */
    public function setDisability(?bool $disability): void
    {
        $this->disability = $disability;
    }

    /**
     * @return bool|null
     */
    public function getCancerInFamily(): ?bool
    {
        return $this->cancerInFamily;
    }

    /**
     * @param bool|null $cancerInFamily
     */
    public function setCancerInFamily(?bool $cancerInFamily): void
    {
        $this->cancerInFamily = $cancerInFamily;
    }

    /**
     * @return bool|null
     */
    public function getDiabets(): ?bool
    {
        return $this->diabets;
    }

    /**
     * @param bool|null $diabets
     */
    public function setDiabets(?bool $diabets): void
    {
        $this->diabets = $diabets;
    }

    public function set(string $key, $value): void
    {
        $this->$key = $value;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}