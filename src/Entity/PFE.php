<?php

namespace App\Entity;

use App\Repository\PFERepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PFERepository::class)]
class PFE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 80)]
    private $title;

    #[ORM\Column(type: 'string', length: 100)]
    private $StudentFullName;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'pfe')]
    #[ORM\JoinColumn(nullable: false)]
    private $Entreprise;

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

    public function getStudentFullName(): ?string
    {
        return $this->StudentFullName;
    }

    public function setStudentFullName(string $StudentFullName): self
    {
        $this->StudentFullName = $StudentFullName;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->Entreprise;
    }

    public function setEntreprise(?Entreprise $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }
}
