<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilePicture = null;

    // Récupère l'ID de l'utilisateur
    public function getId(): ?int
    {
        return $this->id;
    }

    // Récupère le nom d'utilisateur
    public function getUsername(): string
    {
        return $this->username;
    }

    // Définit le nom d'utilisateur
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    // Récupère l'email de l'utilisateur
    public function getEmail(): ?string
    {
        return $this->email;
    }

    // Définit l'email de l'utilisateur
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    // Récupère le mot de passe de l'utilisateur
    public function getPassword(): string
    {
        return $this->password;
    }

    // Définit le mot de passe de l'utilisateur
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    // Récupère la photo de profil de l'utilisateur
    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    // Définit la photo de profil de l'utilisateur
    public function setProfilePicture(?string $profilePicture): self
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    // Implémentation de la méthode getRoles() de l'interface UserInterface
    public function getRoles(): array
    {
        return ['ROLE_USER'];  // Utilise ici les rôles que tu veux pour ton utilisateur
    }

    // Implémentation de la méthode eraseCredentials() de l'interface UserInterface
    public function eraseCredentials(): void
    {
        // Efface les informations sensibles si nécessaire (par exemple, un mot de passe en clair)
    }

    // Implémentation de la méthode getUserIdentifier() de l'interface UserInterface
    public function getUserIdentifier(): string
    {
        return $this->email;  // Ou $this->username si tu veux utiliser le nom d'utilisateur
    }
}
