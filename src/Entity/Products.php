<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $name ;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sku;

    /**
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @ORM\Column(type="bigint")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $min_price;

    /**
     * @ORM\Column(type="float")
     */
    private $max_price;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=ProductVariations::class, mappedBy="product", cascade={"persist"})
     */
    private $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

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

    public function getMinPrice(): ?float
    {
        return $this->min_price;
    }

    public function setMinPrice(float $min_price): self
    {
        $this->min_price = $min_price;

        return $this;
    }

    public function getMaxPrice(): ?float
    {
        return $this->max_price;
    }

    public function setMaxPrice(float $max_price): self
    {
        $this->max_price = $max_price;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection|ProductVariations[]
     */
    public function getProductId(): Collection
    {
        return $this->product;
    }

    public function addProductId(ProductVariations $productId): self
    {
        if (!$this->product->contains($productId)) {
            $this->product[] = $productId;
            $productId->setProductId($this);
        }

        return $this;
    }

    public function removeProductId(ProductVariations $productId): self
    {
        if ($this->product->removeElement($productId)) {
            // set the owning side to null (unless already changed)
            if ($productId->getProductId() === $this) {
                $productId->setProductId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
