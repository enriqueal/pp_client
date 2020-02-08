<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $orderId;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $shipping_status;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $shipping_payment_status;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $payment_status;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $shipping_price;
    
      
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrder_id(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getshipping_status(): ?string
    {
        return $this->shipping_status;
    }

    public function setShippingStatus(string $shipping_status): self
    {
        $this->shipping_status = $shipping_status;

        return $this;
    }

    public function getshipping_payment_status(): ?string
    {
        return $this->shipping_payment_status;
    }

    public function setShippingPaymentStatus(?string $shipping_payment_status): self
    {
        $this->shipping_payment_status = $shipping_payment_status;

        return $this;
    }

    public function getpayment_status(): ?string
    {
        return $this->payment_status;
    }

    public function setPaymentStatus(?string $payment_status): self
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    public function getshipping_price(): ?string
    {
        return $this->shipping_price;
    }

    public function setShippingPrice(?string $shipping_price): self
    {
        $this->shipping_price = $shipping_price;

        return $this;
    }    
}
