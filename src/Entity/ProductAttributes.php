<?php

namespace App\Entity;

use App\Repository\ProductAttributesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductAttributesRepository::class)
 */
class ProductAttributes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $name = [];

    /**
     * @ORM\OneToMany(targetEntity=ProductAttributeValues::class, mappedBy="product_attribute", orphanRemoval=true)
     */
    private $product_attributes;

    public function __construct()
    {
        $this->product_attributes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?array
    {
        return $this->name;
    }

    public function setName(array $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|ProductAttributeValues[]
     */
    public function getProductAttributeId(): Collection
    {
        return $this->product_attributes;
    }

    public function addProductAttributeId(ProductAttributeValues $productAttributeId): self
    {
        if (!$this->product_attributes->contains($productAttributeId)) {
            $this->product_attributes[] = $productAttributeId;
            $productAttributeId->setProductAttributeId($this);
        }

        return $this;
    }

    public function removeProductAttributesId(ProductAttributeValues $productAttributesId): self
    {
        if ($this->product_attributes->removeElement($productAttributesId)) {
            // set the owning side to null (unless already changed)
            if ($productAttributesId->getProductAttributeId() === $this) {
                $productAttributesId->setProductAttributeId(null);
            }
        }

        return $this;
    }
}
