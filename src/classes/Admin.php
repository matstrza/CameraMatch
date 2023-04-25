<?php 

class Admin {
    private ?int $id = null;
    private ?string $username = null;
    private ?string $password = null;

    public function __construct(?string $username ="", ?string $password="") {
        if (!empty($username)) {
        $this->username = Security::htmlSecurity($username);
        }
        if (!empty($password)) {
        $this->password = Security::htmlSecurity($password);
        }
    }

    public function getId(): ?int {return $this->id;}
    public function setId(int $id): void {$this->id = $id;}

    public function getUsername(): ?string {return $this->username;}
    public function setUsername(string $username): void {$this->username = $username;}

    public function getPassword(): ?string {return $this->password;}
    public function setPassword(string $password): void {$this->password = $password;}
}