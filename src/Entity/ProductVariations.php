<?php

namespace App\Entity;

use App\Repository\ProductVariationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $product_attribute_value_ids;
    public function __construct()
    {

        $this->product_attribute_value_ids = new ArrayCollection();
    }
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
        return $this->product;
    }

    public function setProductId(?Products $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getProductAttributeValueIds()
    {
        $ids=[];
        foreach ($this->product_attribute_value_ids as $id)
            $ids[] = $id;
        return $ids;
    }

    public function setProductAttributeValueIds( $product_attribute_value_ids): self
    {
        dd($product_attribute_value_ids);
        foreach ($product_attribute_value_ids as $id)
                $this->product_attribute_value_ids[] = $id->getID();

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
