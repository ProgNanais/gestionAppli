<?php

namespace App\Entity;

use App\Repository\ApplicationListRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationListRepository::class)]
class ApplicationList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $appName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $appDateCreated = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $appDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $appState = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $appVersion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppName(): ?string
    {
        return $this->appName;
    }

    public function setAppName(string $appName): self
    {
        $this->appName = $appName;

        return $this;
    }

    public function getAppDateCreated(): ?\DateTimeInterface
    {
        return $this->appDateCreated;
    }

    public function setAppDateCreated(\DateTimeInterface $appDateCreated): self
    {
        $this->appDateCreated = $appDateCreated;

        return $this;
    }

    public function getAppDescription(): ?string
    {
        return $this->appDescription;
    }

    public function setAppDescription(?string $appDescription): self
    {
        $this->appDescription = $appDescription;

        return $this;
    }

    public function getAppState(): ?string
    {
        return $this->appState;
    }

    public function setAppState(string $appState): self
    {
        $this->appState = $appState;

        return $this;
    }

    public function getAppVersion(): ?string
    {
        return $this->appVersion;
    }

    public function setAppVersion(?string $appVersion): self
    {
        $this->appVersion = $appVersion;

        return $this;
    }
}
