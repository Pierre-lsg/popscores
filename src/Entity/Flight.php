<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $internalCompetitionId;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="flight")
     */
    private $teams;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="flights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="flights")
     */
    private $referees;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->referees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInternalCompetitionId(): ?int
    {
        return $this->internalCompetitionId;
    }

    public function setInternalCompetitionId(int $internalCompetitionId): self
    {
        $this->internalCompetitionId = $internalCompetitionId;

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
            $team->setFlight($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getFlight() === $this) {
                $team->setFlight(null);
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

    /**
     * @return Collection|User[]
     */
    public function getReferees(): Collection
    {
        return $this->referees;
    }

    public function addReferee(User $referee): self
    {
        if (!$this->referees->contains($referee)) {
            $this->referees[] = $referee;
        }

        return $this;
    }

    public function removeReferee(User $referee): self
    {
        if ($this->referees->contains($referee)) {
            $this->referees->removeElement($referee);
        }

        return $this;
    }
}
