<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VictoriousElephantRepository")
 */
class VictoriousElephant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $trumpSize;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrumpSize(): ?int
    {
        return $this->trumpSize;
    }

    public function setTrumpSize(int $trumpSize): self
    {
        $this->trumpSize = $trumpSize;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }
}
