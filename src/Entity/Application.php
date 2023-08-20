<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?profile $profile = null;

    #[ORM\Column]
    private ?bool $selected = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfile(): ?profile
    {
        return $this->profile;
    }

    public function setProfile(profile $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function isSelected(): ?bool
    {
        return $this->selected;
    }

    public function setSelected(bool $selected): static
    {
        $this->selected = $selected;

        return $this;
    }
}
