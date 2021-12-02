<?php

namespace App\Entity;

use App\Repository\SauvetageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SauvetageRepository::class)
 */
class Sauvetage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DateSauvetage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSauvetage(): ?\DateTimeInterface
    {
        return $this->DateSauvetage;
    }

    public function setDateSauvetage(\DateTimeInterface $DateSauvetage): self
    {
        $this->DateSauvetage = $DateSauvetage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    } 
}
