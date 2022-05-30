<?php

namespace App\DTO;

class Item implements \JsonSerializable
{
    private string $nameFull;
    private int $quantityAmount;

    /**
     * @return string
     */
    public function getNameFull(): string
    {
        return $this->nameFull;
    }

    /**
     * @param string $nameFull
     */
    public function setNameFull(string $nameFull): void
    {
        $this->nameFull = $nameFull;
    }

    /**
     * @return int
     */
    public function getQuantityAmount(): int
    {
        return $this->quantityAmount;
    }

    /**
     * @param int $quantityAmount
     */
    public function setQuantityAmount(int $quantityAmount): void
    {
        $this->quantityAmount = $quantityAmount;
    }


    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}