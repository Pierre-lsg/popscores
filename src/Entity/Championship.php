<?php

namespace App\Entity;

use App\Entity\Season;
use App\Entity\Competition;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TeamRankingCalculus;
use App\Entity\ChampionshipRankClub;
use App\Entity\PlayerRankingCalculus;
use App\Entity\ChampionshipRankPlayer;
use App\Repository\ChampionshipRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ChampionshipRepository::class)
 * @Vich\Uploadable
 */
class Championship
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
     * @ORM\ManyToOne(targetEntity=Season::class, inversedBy="championships")
     * @ORM\JoinColumn(nullable=false)
     */
    private $season;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @Vich\UploadableField(mapping="championshipLogos", fileNameProperty="logo")
     * 
     * @var File|null
     */
    private $logoFile;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberCompetitionMax4Calculus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isInternal;

    /**
     * @ORM\OneToMany(targetEntity=Competition::class, mappedBy="championship")
     */
    private $competitions;

    /**
     * @ORM\OneToMany(targetEntity=ChampionshipRankPlayer::class, mappedBy="championship")
     */
    private $championshipRankPlayers;

    /**
     * @ORM\OneToMany(targetEntity=ChampionshipRankClub::class, mappedBy="championship")
     */
    private $championshipRankClubs;

    /**
     * @ORM\OneToMany(targetEntity=PlayerRankingCalculus::class, mappedBy="championship")
     */
    private $playerRankingCalculuses;

    /**
     * @ORM\OneToMany(targetEntity=TeamRankingCalculus::class, mappedBy="championship")
     */
    private $teamRankingCalculuses;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->competitions = new ArrayCollection();
        $this->championshipRankPlayers = new ArrayCollection();
        $this->championshipRankClubs = new ArrayCollection();
        $this->playerRankingCalculuses = new ArrayCollection();
        $this->teamRankingCalculuses = new ArrayCollection();
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

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo = null): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogoFile(): ?File
    {
        return $this->logoFile;
    }

    public function setLogoFile(?File $logoFile = null): void
    {
        $this->logoFile = $logoFile;

        if ($logoFile) {
            $this->updatedAt = new \DateTime();
        }
    }

    public function getNumberCompetitionMax4Calculus(): ?int
    {
        return $this->numberCompetitionMax4Calculus;
    }

    public function setNumberCompetitionMax4Calculus(int $numberCompetitionMax4Calculus): self
    {
        $this->numberCompetitionMax4Calculus = $numberCompetitionMax4Calculus;

        return $this;
    }

    public function getIsInternal(): ?bool
    {
        return $this->isInternal;
    }

    public function setIsInternal(bool $isInternal): self
    {
        $this->isInternal = $isInternal;

        return $this;
    }

    /**
     * @return Collection|Competition[]
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions[] = $competition;
            $competition->setChampionship($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->contains($competition)) {
            $this->competitions->removeElement($competition);
            // set the owning side to null (unless already changed)
            if ($competition->getChampionship() === $this) {
                $competition->setChampionship(null);
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
            $championshipRankPlayer->setChampionship($this);
        }

        return $this;
    }

    public function removeChampionshipRankPlayer(ChampionshipRankPlayer $championshipRankPlayer): self
    {
        if ($this->championshipRankPlayers->contains($championshipRankPlayer)) {
            $this->championshipRankPlayers->removeElement($championshipRankPlayer);
            // set the owning side to null (unless already changed)
            if ($championshipRankPlayer->getChampionship() === $this) {
                $championshipRankPlayer->setChampionship(null);
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
            $championshipRankClub->setChampionship($this);
        }

        return $this;
    }

    public function removeChampionshipRankClub(ChampionshipRankClub $championshipRankClub): self
    {
        if ($this->championshipRankClubs->contains($championshipRankClub)) {
            $this->championshipRankClubs->removeElement($championshipRankClub);
            // set the owning side to null (unless already changed)
            if ($championshipRankClub->getChampionship() === $this) {
                $championshipRankClub->setChampionship(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PlayerRankingCalculus[]
     */
    public function getPlayerRankingCalculuses(): Collection
    {
        return $this->playerRankingCalculuses;
    }

    public function addPlayerRankingCalculus(PlayerRankingCalculus $playerRankingCalculus): self
    {
        if (!$this->playerRankingCalculuses->contains($playerRankingCalculus)) {
            $this->playerRankingCalculuses[] = $playerRankingCalculus;
            $playerRankingCalculus->setChampionship($this);
        }

        return $this;
    }

    public function removePlayerRankingCalculus(PlayerRankingCalculus $playerRankingCalculus): self
    {
        if ($this->playerRankingCalculuses->contains($playerRankingCalculus)) {
            $this->playerRankingCalculuses->removeElement($playerRankingCalculus);
            // set the owning side to null (unless already changed)
            if ($playerRankingCalculus->getChampionship() === $this) {
                $playerRankingCalculus->setChampionship(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TeamRankingCalculus[]
     */
    public function getTeamRankingCalculuses(): Collection
    {
        return $this->teamRankingCalculuses;
    }

    public function addTeamRankingCalculus(TeamRankingCalculus $teamRankingCalculus): self
    {
        if (!$this->teamRankingCalculuses->contains($teamRankingCalculus)) {
            $this->teamRankingCalculuses[] = $teamRankingCalculus;
            $teamRankingCalculus->setChampionship($this);
        }

        return $this;
    }

    public function removeTeamRankingCalculus(TeamRankingCalculus $teamRankingCalculus): self
    {
        if ($this->teamRankingCalculuses->contains($teamRankingCalculus)) {
            $this->teamRankingCalculuses->removeElement($teamRankingCalculus);
            // set the owning side to null (unless already changed)
            if ($teamRankingCalculus->getChampionship() === $this) {
                $teamRankingCalculus->setChampionship(null);
            }
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
