<?php

namespace App\Entity;

use App\Repository\ProductAttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductAttributeRepository::class)
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
     * @ORM\OneToMany(targetEntity=ProductAttributeValue::class, mappedBy="product_attribute_id", orphanRemoval=true)
     */
    private $product_attribute_id;

    public function __construct()
    {
        $this->product_attribute_id = new ArrayCollection();
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
        return $this->product_attribute_id;
    }

    public function addProductAttributeId(ProductAttributeValues $productAttributeId): self
    {
        if (!$this->product_attribute_id->contains($productAttributeId)) {
            $this->product_attribute_id[] = $productAttributeId;
            $productAttributeId->setProductAttributeId($this);
        }

        return $this;
    }

    public function removeProductAttributeId(ProductAttributeValues $productAttributeId): self
    {
        if ($this->product_attribute_id->removeElement($productAttributeId)) {
            // set the owning side to null (unless already changed)
            if ($productAttributeId->getProductAttributeId() === $this) {
                $productAttributeId->setProductAttributeId(null);
            }
        }

        return $this;
    }
}
