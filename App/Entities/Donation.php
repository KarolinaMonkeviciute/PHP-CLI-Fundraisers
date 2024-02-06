<?php

namespace App\Entities;

class Donation
{
    private ?int $id = null;
    private string $donorName;
    private int $amount;
    private int $charityId;
    private string $dateTime;

    public function __construct(?int $id, string $donorName, int $amount, int $charityId, string $dateTime){
        $this->id = $id;
        $this->donorName = $donorName;
        $this->amount = $amount;
        $this->charityId = $charityId;
        $this->dateTime = $dateTime;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getDonorName(): string{
        return $this->donorName;
    }

    public function getAmount(): int{
       return $this->amount;
    }

    public function getCharityId(): int{
        return $this->charityId;
    }

    public function getDateTime(): string{
       return $this->dateTime;
    }

    public function setId($id): void{
        $this->id = $id;
    }

    public function setDonorName($donorName): void{
        $this->donorName = $donorName;
    }

    public function setAmount($amount): void{
       $this->amount = $amount;
    }

    public function setCharityId($charityId): void{
        $this->charityId = $charityId;
    }

    public function setDateTime($dateTime): void{
        $this->dateTime = $dateTime;
    }


    
}