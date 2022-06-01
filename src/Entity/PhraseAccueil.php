<?php

namespace App\Entity;

use App\Repository\PhraseAccueilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhraseAccueilRepository::class)]
class PhraseAccueil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 500)]
    private $Content;

    #[ORM\Column(type: 'string', length: 255)]
    private $Auteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(string $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }
}
