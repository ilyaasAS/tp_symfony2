<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $isFinished = false; // Assurez-vous que ceci est bien défini

    #[ORM\ManyToOne(targetEntity: ListTaches::class, inversedBy: "taches")]
    private ?ListTaches $listTache = null;

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

    public function getIsFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function setIsFinished(bool $isFinished): self
    {
        $this->isFinished = $isFinished;
        return $this;
    }

    public function getListTache(): ?ListTaches
    {
        return $this->listTache;
    }

    public function setListTache(?ListTaches $listTache): self
    {
        $this->listTache = $listTache;
        return $this;
    }
}
