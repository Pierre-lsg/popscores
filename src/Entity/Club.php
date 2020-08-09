<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="club")
     */
    private $teams;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="club")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=ChampionshipRankClub::class, mappedBy="club")
     */
    private $championshipRankClubs;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->championshipRankClubs = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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
            $team->setClub($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getClub() === $this) {
                $team->setClub(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setClub($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getClub() === $this) {
                $user->setClub(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampionshipRankClub[]
     */
    public function getChampionshipRankClubs(): Collection
    {
        return $this->championshipRankClubs;
    }

    public function addChampionshipRankClub(ChampionshipRankClub $championshipRankClub): self
    {
        if (!$this->championshipRankClubs->contains($championshipRankClub)) {
            $this->championshipRankClubs[] = $championshipRankClub;
            $championshipRankClub->setClub($this);
        }

        return $this;
    }

    public function removeChampionshipRankClub(ChampionshipRankClub $championshipRankClub): self
    {
        if ($this->championshipRankClubs->contains($championshipRankClub)) {
            $this->championshipRankClubs->removeElement($championshipRankClub);
            // set the owning side to null (unless already changed)
            if ($championshipRankClub->getClub() === $this) {
                $championshipRankClub->setClub(null);
            }
        }

        return $this;
    }
}
