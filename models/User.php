<?php

class User 
{
    public function __construct(private int $id, private string $email, private string $password, private string $first_name, private string $last_name)
    {
        
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }
    
    public function setEmail(int $email): void
    {
        $this->email = $email;
    }
    
    public function getPassword(): string
    {
        return $this->password;
    }
    
    public function setPassword(int $password): void
    {
        $this->password = $password;
    }
    
    public function getFirst_name(): string
    {
        return $this->first_name;
    }
    
    public function setFirst_name(int $first_name): void
    {
        $this->first_name = $first_name;
    }
    
    public function getLast_name(): string
    {
        return $this->last_name;
    }
    
    public function setLast_name(int $last_name): void
    {
        $this->last_name = $last_name;
    }
    
}