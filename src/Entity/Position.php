<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PositionRepository::class)
 */
class Position
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gps_start;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gps_stop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture_start;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture_end;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGpsStart(): ?string
    {
        return $this->gps_start;
    }

    public function setGpsStart(string $gps_start): self
    {
        $this->gps_start = $gps_start;

        return $this;
    }

    public function getGpsStop(): ?string
    {
        return $this->gps_stop;
    }

    public function setGpsStop(string $gps_stop): self
    {
        $this->gps_stop = $gps_stop;

        return $this;
    }

    public function getPictureStart(): ?string
    {
        return $this->picture_start;
    }

    public function setPictureStart(?string $picture_start): self
    {
        $this->picture_start = $picture_start;

        return $this;
    }

    public function getPictureEnd(): ?string
    {
        return $this->picture_end;
    }

    public function setPictureEnd(?string $picture_end): self
    {
        $this->picture_end = $picture_end;

        return $this;
    }
}
