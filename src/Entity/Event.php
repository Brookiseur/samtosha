<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startEvent = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endEvent = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;
    
    #[ORM\Column(nullable: true)]
    private ?bool $afficher = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $price = null;

    #[ORM\Column(nullable: true)]
    private ?int $participantMin = null;

    #[ORM\Column(nullable: true)]
    private ?int $participantMax = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isActualite = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStartEvent(): ?\DateTimeInterface
    {
        return $this->startEvent;
    }

    public function setStartEvent(\DateTimeInterface $startEvent): self
    {
        $this->startEvent = $startEvent;

        return $this;
    }

    public function getEndEvent(): ?\DateTimeInterface
    {
        return $this->endEvent;
    }

    public function setEndEvent(\DateTimeInterface $endEvent): self
    {
        $this->endEvent = $endEvent;

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

    public function isAfficher(): ?bool
    {
        return $this->afficher;
    }

    public function setAfficher(bool $afficher): self
    {
        $this->afficher = $afficher;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getParticipantMin(): ?int
    {
        return $this->participantMin;
    }

    public function setParticipantMin(?int $participantMin): self
    {
        $this->participantMin = $participantMin;

        return $this;
    }

    public function getParticipantMax(): ?int
    {
        return $this->participantMax;
    }

    public function setParticipantMax(?int $participantMax): self
    {
        $this->participantMax = $participantMax;

        return $this;
    }

    public function isIsActualite(): ?bool
    {
        return $this->isActualite;
    }

    public function setIsActualite(bool $isActualite): self
    {
        $this->isActualite = $isActualite;

        return $this;
    }

}
