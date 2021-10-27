<?php

namespace App\Entity;

use App\Repository\ProductVariationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductVariationsRepository::class)
 */
class ProductVariations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="product_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_id;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $product_attribute_value_ids = [];

    /**
     * @ORM\Column(type="bigint")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?Products
    {
        return $this->product_id;
    }

    public function setProductId(?Products $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getProductAttributeValueIds(): ?array
    {
        return $this->product_attribute_value_ids;
    }

    public function setProductAttributeValueIds(?array $product_attribute_value_ids): self
    {
        $this->product_attribute_value_ids = $product_attribute_value_ids;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
