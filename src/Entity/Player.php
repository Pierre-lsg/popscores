<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is4Championship;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="players")
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=Result::class, mappedBy="player")
     */
    private $results;

    /**
     * @ORM\OneToMany(targetEntity=CompetitionRankPlayer::class, mappedBy="player")
     */
    private $competitionRankPlayers;

    /**
     * @ORM\OneToMany(targetEntity=ChampionshipRankPlayer::class, mappedBy="player")
     */
    private $championshipRankPlayers;

    public function __construct()
    {
        $this->results = new ArrayCollection();
        $this->competitionRankPlayers = new ArrayCollection();
        $this->championshipRankPlayers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

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

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return Collection|Result[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setPlayer($this);
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getPlayer() === $this) {
                $result->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CompetitionRankPlayer[]
     */
    public function getCompetitionRankPlayers(): Collection
    {
        return $this->competitionRankPlayers;
    }

    public function addCompetitionRankPlayer(CompetitionRankPlayer $competitionRankPlayer): self
    {
        if (!$this->competitionRankPlayers->contains($competitionRankPlayer)) {
            $this->competitionRankPlayers[] = $competitionRankPlayer;
            $competitionRankPlayer->setPlayer($this);
        }

        return $this;
    }

    public function removeCompetitionRankPlayer(CompetitionRankPlayer $competitionRankPlayer): self
    {
        if ($this->competitionRankPlayers->contains($competitionRankPlayer)) {
            $this->competitionRankPlayers->removeElement($competitionRankPlayer);
            // set the owning side to null (unless already changed)
            if ($competitionRankPlayer->getPlayer() === $this) {
                $competitionRankPlayer->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampionshipRankPlayer[]
     */
    public function getChampionshipRankPlayers(): Collection
    {
        return $this->championshipRankPlayers;
    }

    public function addChampionshipRankPlayer(ChampionshipRankPlayer $championshipRankPlayer): self
    {
        if (!$this->championshipRankPlayers->contains($championshipRankPlayer)) {
            $this->championshipRankPlayers[] = $championshipRankPlayer;
            $championshipRankPlayer->setPlayer($this);
        }

        return $this;
    }

    public function removeChampionshipRankPlayer(ChampionshipRankPlayer $championshipRankPlayer): self
    {
        if ($this->championshipRankPlayers->contains($championshipRankPlayer)) {
            $this->championshipRankPlayers->removeElement($championshipRankPlayer);
            // set the owning side to null (unless already changed)
            if ($championshipRankPlayer->getPlayer() === $this) {
                $championshipRankPlayer->setPlayer(null);
            }
        }

        return $this;
    }
}
