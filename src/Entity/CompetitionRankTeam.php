<?php

namespace App\Entity;

use App\Repository\CompetitionRankTeamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRankTeamRepository::class)
 */
class CompetitionRankTeam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="competitionRankTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;

    /**
     * @ORM\Column(type="integer")
     */
    private $rank;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="competitionRankTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

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

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

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
