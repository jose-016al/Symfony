<?php

namespace App\Entity;

use App\Repository\SalidaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalidaRepository::class)]
class Salida
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'salidas')]
    private ?Objeto $objeto = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    public function __construct() 
    {
        $this->fecha = new \DateTime;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getObjeto(): ?Objeto
    {
        return $this->objeto;
    }

    public function setObjeto(?Objeto $objeto): self
    {
        $this->objeto = $objeto;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }

}
