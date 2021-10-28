<?php

namespace App\Entity;

use App\Repository\ProductAttributeValuesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductAttributeValuesRepository::class)
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
     * @ORM\ManyToOne(targetEntity=ProductAttributes::class, inversedBy="product_attribute",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_attribute;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductAttributeId(): ?ProductAttributes
    {
        return $this->product_attribute;
    }

    public function setProductAttributeId(?ProductAttributes $product_attribute): self
    {
        $this->product_attribute = $product_attribute;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
