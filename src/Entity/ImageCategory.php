<?php

namespace App\Entity;

use App\Repository\ImageCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ImageCategoryRepository::class)]
class ImageCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'imageCategories')]
    private $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function __toString()
    {
        return $this-> getName();
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

    /**
     * @return Collection<int, Image>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Image $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
        }

        return $this;
    }

    public function removeRelation(Image $relation): self
    {
        $this->relation->removeElement($relation);

        return $this;
    }
}
