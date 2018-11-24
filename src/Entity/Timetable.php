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
class Timetable
{
    /**
     * @var int
     * @ORM\Column(name="id")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="duration", type="string", length=255)
     */
    private $duration;

    /**
     * @var \DateTime
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $endDate;

    /**
     * @var bool
     * @ORM\Column(name="done", type="boolean")
     */
    private $done;

    /**
     * @var \DateTime
     * @ORM\Column(name="done_at", type="datetime", nullable=true)
     */
    private $doneAt;

    /**
     * @var bool
     * @ORM\Column(name="disabled", type="boolean")
     */
    private $disabled;

    /**
     * @var array
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
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate(\DateTime $endDate): void
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
     * @return \DateTime
     */
    public function getDoneAt(): \DateTime
    {
        return $this->doneAt;
    }

    /**
     * @param \DateTime $doneAt
     */
    public function setDoneAt(\DateTime $doneAt): void
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
     * @return array
     */
    public function getExamination(): array
    {
        return [
            'id' => 1,
            'name' => 'Echo serca',
            'defaultFrequency' => 'daily',
            'description' => 'Lorem ipsum dolor sit amet',
        ];
    }

    /**
     * @param array $examination
     */
    public function setExamination(array $examination): void
    {
        $this->examination = $examination;
    }
}