<?php

namespace App\Entity;

use App\Repository\CompetitionRankPlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRankPlayerRepository::class)
 */
class CompetitionRankPlayer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="competitionRankPlayers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;

    /**
     * @ORM\Column(type="integer")
     */
    private $rank;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="competitionRankPlayers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalHit;

    /**
     * @ORM\Column(type="integer")
     */
    private $deltaHit;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getTotalHit(): ?int
    {
        return $this->totalHit;
    }

    public function setTotalHit(int $totalHit): self
    {
        $this->totalHit = $totalHit;

        return $this;
    }

    public function getDeltaHit(): ?int
    {
        return $this->deltaHit;
    }

    public function setDeltaHit(int $deltaHit): self
    {
        $this->deltaHit = $deltaHit;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }
}
