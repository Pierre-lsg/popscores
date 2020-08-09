<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="teams")
     */
    private $club;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is4Championship;

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="team")
     */
    private $players;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="teams")
     */
    private $competition;

    /**
     * @ORM\ManyToOne(targetEntity=Flight::class, inversedBy="teams")
     */
    private $flight;

    /**
     * @ORM\OneToMany(targetEntity=CompetitionRankTeam::class, mappedBy="team")
     */
    private $competitionRankTeams;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->competitionRankTeams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getIs4Championship(): ?bool
    {
        return $this->is4Championship;
    }

    public function setIs4Championship(bool $is4Championship): self
    {
        $this->is4Championship = $is4Championship;

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->contains($player)) {
            $this->players->removeElement($player);
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
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

    public function getFlight(): ?Flight
    {
        return $this->flight;
    }

    public function setFlight(?Flight $flight): self
    {
        $this->flight = $flight;

        return $this;
    }

    /**
     * @return Collection|CompetitionRankTeam[]
     */
    public function getCompetitionRankTeams(): Collection
    {
        return $this->competitionRankTeams;
    }

    public function addCompetitionRankTeam(CompetitionRankTeam $competitionRankTeam): self
    {
        if (!$this->competitionRankTeams->contains($competitionRankTeam)) {
            $this->competitionRankTeams[] = $competitionRankTeam;
            $competitionRankTeam->setTeam($this);
        }

        return $this;
    }

    public function removeCompetitionRankTeam(CompetitionRankTeam $competitionRankTeam): self
    {
        if ($this->competitionRankTeams->contains($competitionRankTeam)) {
            $this->competitionRankTeams->removeElement($competitionRankTeam);
            // set the owning side to null (unless already changed)
            if ($competitionRankTeam->getTeam() === $this) {
                $competitionRankTeam->setTeam(null);
            }
        }

        return $this;
    }
}
