<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 255)]
    private $link;

    #[ORM\ManyToMany(targetEntity: ImageCategory::class, mappedBy: 'relation')]
    private $imageCategories;

    #[ORM\Column(type: 'string', length: 255)]
    private $size;

    #[ORM\Column(type: 'string', length: 500)]
    private $description;


    #[ORM\Column(type: 'string', length: 255)]
    private $Title;

    public function __construct()
    {
        $this->imageCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int, ImageCategory>
     */
    public function getImageCategories(): Collection
    {
        return $this->imageCategories;
    }

    public function addImageCategory(ImageCategory $imageCategory): self
    {
        if (!$this->imageCategories->contains($imageCategory)) {
            $this->imageCategories[] = $imageCategory;
            $imageCategory->addRelation($this);
        }

        return $this;
    }

    public function removeImageCategory(ImageCategory $imageCategory): self
    {
        if ($this->imageCategories->removeElement($imageCategory)) {
            $imageCategory->removeRelation($this);
        }

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }


}
