<?php

namespace App\Entity;

use App\Repository\OptredenRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptredenRepository::class)]
class Optreden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'optredens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poppodium $poppodium = null;

    #[ORM\ManyToOne(inversedBy: 'optredens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Artiest $artiest = null;

    #[ORM\ManyToOne(inversedBy: 'optredens')]
    private ?artiest $voorprogramma_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $omschrijving = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datum = null;

    #[ORM\Column(length: 10)]
    private ?string $prijs = null;

    #[ORM\Column(length: 255)]
    private ?string $ticket_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $afbeelding_url = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoppodium(): ?Poppodium
    {
        return $this->poppodium;
    }

    public function setPoppodium(?Poppodium $poppodium): static
    {
        $this->poppodium = $poppodium;

        return $this;
    }

    public function getArtiest(): ?Artiest
    {
        return $this->artiest;
    }

    public function setArtiest(?Artiest $artiest): static
    {
        $this->artiest = $artiest;

        return $this;
    }

    public function getVoorprogrammaId(): ?artiest
    {
        return $this->voorprogramma_id;
    }

    public function setVoorprogrammaId(?artiest $voorprogramma_id): static
    {
        $this->voorprogramma_id = $voorprogramma_id;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(?string $omschrijving): static
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): static
    {
        $this->datum = $datum;

        return $this;
    }

    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    public function setPrijs(string $prijs): static
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getTicketUrl(): ?string
    {
        return $this->ticket_url;
    }

    public function setTicketUrl(string $ticket_url): static
    {
        $this->ticket_url = $ticket_url;

        return $this;
    }

    public function getAfbeeldingUrl(): ?string
    {
        return $this->afbeelding_url;
    }

    public function setAfbeeldingUrl(?string $afbeelding_url): static
    {
        $this->afbeelding_url = $afbeelding_url;

        return $this;
    }
}
