<?php

namespace App\DTO;

use JetBrains\PhpStorm\Internal\TentativeType;
use Symfony\Component\HttpFoundation\Request;

class LowestEnquiry implements \JsonSerializable
{
    private ?string $coupon;
    private ?string $countryCode;
    private Item $item;

    /**
     * @return string|null
     */
    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    /**
     * @param string|null $coupon
     */
    public function setCoupon(?string $coupon): void
    {
        $this->coupon = $coupon;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @param Item $item
     */
    public function setItem(Item $item): void
    {
        $this->item = $item;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}