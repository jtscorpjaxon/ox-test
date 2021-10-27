<?php

namespace App\Entity;

use App\Repository\ProductAttributeValueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductAttributeValueRepository::class)
 */
class ProductAttributeValues
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ProductAttribute::class, inversedBy="product_attribute_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_attribute_id;

    /**
     * @ORM\Column(type="json")
     */
    private $name = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductAttributeId(): ?ProductAttributes
    {
        return $this->product_attribute_id;
    }

    public function setProductAttributeId(?ProductAttributes $product_attribute_id): self
    {
        $this->product_attribute_id = $product_attribute_id;

        return $this;
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

}
