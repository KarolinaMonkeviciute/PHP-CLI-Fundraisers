<?php

namespace App\Entities;

class Charity
{
    private ?int $id = null;
    private string $name;
    private string $email;

    public function __construct(string $name, string $email, ?int $id = null){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function setName(string $name): void{
        $this->name = $name;
    } 

    public function setEmail(string $email): void{
        $this->email = $email;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }
}