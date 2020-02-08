<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemsRepository")
 */
class Items
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $cost;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tax_perc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tax_amt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tracking_number;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $canceled;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $shipped_status_sku;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $order_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(?string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function gettax_perc(): ?int
    {
        return $this->tax_perc;
    }

    public function setTaxPerc(?int $tax_perc): self
    {
        $this->tax_perc = $tax_perc;

        return $this;
    }

    public function gettax_amt(): ?int
    {
        return $this->tax_amt;
    }

    public function setTaxAmt(?int $tax_amt): self
    {
        $this->tax_amt = $tax_amt;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function gettracking_number(): ?string
    {
        return $this->tracking_number;
    }

    public function setTrackingNumber(?string $tracking_number): self
    {
        $this->tracking_number = $tracking_number;

        return $this;
    }

    public function getCanceled(): ?string
    {
        return $this->canceled;
    }

    public function setCanceled(?string $canceled): self
    {
        $this->canceled = $canceled;

        return $this;
    }

    public function getshipped_status_sku(): ?string
    {
        return $this->shipped_status_sku;
    }

    public function setShippedStatusSku(string $shipped_status_sku): self
    {
        $this->shipped_status_sku = $shipped_status_sku;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;

        return $this;
    }
}
