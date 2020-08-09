<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Championship::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $championship;

    /**
     * @ORM\Column(type="integer")
     */
    private $internalChampionshipId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $playedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $map;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ruleFile;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ruleText;

    /**
     * @ORM\Column(type="integer")
     */
    private $playerByTeam;

    /**
     * @ORM\Column(type="integer")
     */
    private $TeamByFlight;

    /**
     * @ORM\ManyToMany(targetEntity=Hole::class, inversedBy="competitions")
     */
    private $holes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forChampionship;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="competitions")
     */
    private $organizers;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="competition")
     */
    private $teams;

    /**
     * @ORM\OneToMany(targetEntity=Flight::class, mappedBy="competition")
     */
    private $flights;

    /**
     * @ORM\OneToMany(targetEntity=Result::class, mappedBy="competition")
     */
    private $results;

    /**
     * @ORM\OneToMany(targetEntity=CompetitionRankPlayer::class, mappedBy="competition")
     */
    private $competitionRankPlayers;

    /**
     * @ORM\OneToMany(targetEntity=CompetitionRankTeam::class, mappedBy="competition")
     */
    private $competitionRankTeams;

    public function __construct()
    {
        $this->holes = new ArrayCollection();
        $this->organizers = new ArrayCollection();
        $this->teams = new ArrayCollection();
        $this->flights = new ArrayCollection();
        $this->results = new ArrayCollection();
        $this->competitionRankPlayers = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getChampionship(): ?Championship
    {
        return $this->championship;
    }

    public function setChampionship(?Championship $championship): self
    {
        $this->championship = $championship;

        return $this;
    }

    public function getInternalChampionshipId(): ?int
    {
        return $this->internalChampionshipId;
    }

    public function setInternalChampionshipId(int $internalChampionshipId): self
    {
        $this->internalChampionshipId = $internalChampionshipId;

        return $this;
    }

    public function getPlayedAt(): ?\DateTimeInterface
    {
        return $this->playedAt;
    }

    public function setPlayedAt(\DateTimeInterface $playedAt): self
    {
        $this->playedAt = $playedAt;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(?string $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getRuleFile(): ?string
    {
        return $this->ruleFile;
    }

    public function setRuleFile(?string $ruleFile): self
    {
        $this->ruleFile = $ruleFile;

        return $this;
    }

    public function getRuleText(): ?string
    {
        return $this->ruleText;
    }

    public function setRuleText(?string $ruleText): self
    {
        $this->ruleText = $ruleText;

        return $this;
    }

    public function getPlayerByTeam(): ?int
    {
        return $this->playerByTeam;
    }

    public function setPlayerByTeam(int $playerByTeam): self
    {
        $this->playerByTeam = $playerByTeam;

        return $this;
    }

    public function getTeamByFlight(): ?int
    {
        return $this->TeamByFlight;
    }

    public function setTeamByFlight(int $TeamByFlight): self
    {
        $this->TeamByFlight = $TeamByFlight;

        return $this;
    }

    /**
     * @return Collection|Hole[]
     */
    public function getHoles(): Collection
    {
        return $this->holes;
    }

    public function addHole(Hole $hole): self
    {
        if (!$this->holes->contains($hole)) {
            $this->holes[] = $hole;
        }

        return $this;
    }

    public function removeHole(Hole $hole): self
    {
        if ($this->holes->contains($hole)) {
            $this->holes->removeElement($hole);
        }

        return $this;
    }

    public function getForChampionship(): ?bool
    {
        return $this->forChampionship;
    }

    public function setForChampionship(bool $forChampionship): self
    {
        $this->forChampionship = $forChampionship;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getOrganizers(): Collection
    {
        return $this->organizers;
    }

    public function addOrganizer(User $organizer): self
    {
        if (!$this->organizers->contains($organizer)) {
            $this->organizers[] = $organizer;
        }

        return $this;
    }

    public function removeOrganizer(User $organizer): self
    {
        if ($this->organizers->contains($organizer)) {
            $this->organizers->removeElement($organizer);
        }

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->setCompetition($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getCompetition() === $this) {
                $team->setCompetition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Flight[]
     */
    public function getFlights(): Collection
    {
        return $this->flights;
    }

    public function addFlight(Flight $flight): self
    {
        if (!$this->flights->contains($flight)) {
            $this->flights[] = $flight;
            $flight->setCompetition($this);
        }

        return $this;
    }

    public function removeFlight(Flight $flight): self
    {
        if ($this->flights->contains($flight)) {
            $this->flights->removeElement($flight);
            // set the owning side to null (unless already changed)
            if ($flight->getCompetition() === $this) {
                $flight->setCompetition(null);
            }
        }

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
            $result->setCompetition($this);
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getCompetition() === $this) {
                $result->setCompetition(null);
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
            $competitionRankPlayer->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetitionRankPlayer(CompetitionRankPlayer $competitionRankPlayer): self
    {
        if ($this->competitionRankPlayers->contains($competitionRankPlayer)) {
            $this->competitionRankPlayers->removeElement($competitionRankPlayer);
            // set the owning side to null (unless already changed)
            if ($competitionRankPlayer->getCompetition() === $this) {
                $competitionRankPlayer->setCompetition(null);
            }
        }

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
            $competitionRankTeam->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetitionRankTeam(CompetitionRankTeam $competitionRankTeam): self
    {
        if ($this->competitionRankTeams->contains($competitionRankTeam)) {
            $this->competitionRankTeams->removeElement($competitionRankTeam);
            // set the owning side to null (unless already changed)
            if ($competitionRankTeam->getCompetition() === $this) {
                $competitionRankTeam->setCompetition(null);
            }
        }

        return $this;
    }
}
