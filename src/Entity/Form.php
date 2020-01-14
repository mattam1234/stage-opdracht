<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormRepository")
 */
class Form
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(length=255)
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "^[a-zA-Z]+$",
     *     message="Naam is niet geldig"
     * )
     *
     * @Assert\NotBlank
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "geen geldig email."
     * )
     */
    private $Email;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 7,
     *      max = 12,
     *      minMessage="telefoonnummer klopt niet",
     *      maxMessage="telefoonnummer klopt niet"
     * )
     */
    private $Telefoonnummer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTelefoonnummer(): ?int
    {
        return $this->Telefoonnummer;
    }

    public function setTelefoonnummer(int $Telefoonnummer): self
    {
        $this->Telefoonnummer = $Telefoonnummer;

        return $this;
    }
}
