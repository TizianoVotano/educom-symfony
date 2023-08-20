<?php

namespace App\Entity;

use App\Repository\VacancyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VacancyRepository::class)]
class Vacancy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'vacancies')]
    private ?company $company_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startdate = null;

    #[ORM\Column(length: 50)]
    private ?string $function = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 6)]
    private ?string $difficulty = null;

    #[ORM\Column(length: 100)]
    private ?string $location = null;

    #[ORM\OneToMany(mappedBy: 'vacancy', targetEntity: Application::class)]
    private Collection $applications;

    #[ORM\ManyToMany(targetEntity: Application::class, mappedBy: 'vacancy')]
    private Collection $profile;

    public function __construct()
    {
        $this->applications = new ArrayCollection();
        $this->profile = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyId(): ?company
    {
        return $this->company_id;
    }

    public function setCompanyId(?company $company_id): static
    {
        $this->company_id = $company_id;

        return $this;
    }

    public function getStartdate(): ?\DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartdate(\DateTimeInterface $startdate): static
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function setFunction(string $function): static
    {
        $this->function = $function;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Application $application): static
    {
        if (!$this->applications->contains($application)) {
            $this->applications->add($application);
            $application->setVacancy($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): static
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getVacancy() === $this) {
                $application->setVacancy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getProfile(): Collection
    {
        return $this->profile;
    }

    public function addProfile(Application $profile): static
    {
        if (!$this->profile->contains($profile)) {
            $this->profile->add($profile);
            $profile->addVacancy($this);
        }

        return $this;
    }

    public function removeProfile(Application $profile): static
    {
        if ($this->profile->removeElement($profile)) {
            $profile->removeVacancy($this);
        }

        return $this;
    }
}
