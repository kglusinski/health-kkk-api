<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Timetable
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="timetables")
 */
class Timetable implements \JsonSerializable
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Profile
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    private $profile;
    /**
     * @var string
     * @ORM\Column(name="duration", type="string", length=255)
     */
    private $duration;

    /**
     * @var \DateTime
     * @ORM\Column(name="start_date", type="string")
     */
    private $startDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="end_date", type="string")
     */
    private $endDate;

    /**
     * @var bool
     * @ORM\Column(name="done", type="boolean")
     */
    private $done;

    /**
     * @var \DateTime
     * @ORM\Column(name="done_at", type="string", nullable=true)
     */
    private $doneAt;

    /**
     * @var bool
     * @ORM\Column(name="disabled", type="boolean")
     */
    private $disabled;

    /**
     * @var Examination
     * @ORM\ManyToOne(targetEntity="App\Entity\Examination")
     * @ORM\JoinColumn(name="examination_id", referencedColumnName="id")
     */
    private $examination;

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
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * @param Profile $profile
     */
    public function setProfile(Profile $profile): void
    {
        $this->profile = $profile;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }

    /**
     * @param bool $done
     */
    public function setDone(bool $done): void
    {
        $this->done = $done;
    }

    /**
     * @return null|\DateTime
     */
    public function getDoneAt()
    {
        return $this->doneAt;
    }

    /**
     * @param null|\DateTime $doneAt
     */
    public function setDoneAt($doneAt): void
    {
        $this->doneAt = $doneAt;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     */
    public function setDisabled(bool $disabled): void
    {
        $this->disabled = $disabled;
    }

    /**
     * @return Examination
     */
    public function getExamination(): Examination
    {
        return $this->examination;
    }

    /**
     * @param Examination $examination
     */
    public function setExamination(Examination $examination): void
    {
        $this->examination = $examination;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}