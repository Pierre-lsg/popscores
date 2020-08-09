<?php

namespace App\Entity;

use App\Repository\HoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HoleRepository::class)
 */
class Hole
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
     * @ORM\Column(type="integer")
     */
    private $par;

    /**
     * @ORM\ManyToOne(targetEntity=Rule::class, inversedBy="holes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rule;

    /**
     * @ORM\ManyToOne(targetEntity=Position::class)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $referees;

    /**
     * @ORM\ManyToMany(targetEntity=Competition::class, mappedBy="holes")
     */
    private $competitions;

    public function __construct()
    {
        $this->competitions = new ArrayCollection();
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

    public function getPar(): ?int
    {
        return $this->par;
    }

    public function setPar(int $par): self
    {
        $this->par = $par;

        return $this;
    }

    public function getRule(): ?Rule
    {
        return $this->rule;
    }

    public function setRule(?Rule $rule): self
    {
        $this->rule = $rule;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getReferees(): ?User
    {
        return $this->referees;
    }

    public function setReferees(?User $referees): self
    {
        $this->referees = $referees;

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
            $competition->addHole($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->contains($competition)) {
            $this->competitions->removeElement($competition);
            $competition->removeHole($this);
        }

        return $this;
    }
}
