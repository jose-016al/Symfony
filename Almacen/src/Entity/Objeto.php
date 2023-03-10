<?php

namespace App\Entity;

use App\Repository\ObjetoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetoRepository::class)]
class Objeto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    #[ORM\Column(length: 255)]
    private ?string $ubicacion = null;

    #[ORM\OneToMany(mappedBy: 'objeto', targetEntity: Entrada::class)]
    private Collection $entradas;

    #[ORM\OneToMany(mappedBy: 'objeto', targetEntity: Salida::class)]
    private Collection $salidas;

    #[ORM\Column]
    private ?int $total = null;

    public function __construct()
    {
        $this->entradas = new ArrayCollection();
        $this->salidas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * @return Collection<int, Entrada>
     */
    public function getEntradas(): Collection
    {
        return $this->entradas;
    }

    public function addEntrada(Entrada $entrada): self
    {
        if (!$this->entradas->contains($entrada)) {
            $this->entradas->add($entrada);
            $entrada->setObjeto($this);
        }

        return $this;
    }

    public function removeEntrada(Entrada $entrada): self
    {
        if ($this->entradas->removeElement($entrada)) {
            // set the owning side to null (unless already changed)
            if ($entrada->getObjeto() === $this) {
                $entrada->setObjeto(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this -> id;
    }

    /**
     * @return Collection<int, Salida>
     */
    public function getSalidas(): Collection
    {
        return $this->salidas;
    }

    public function addSalida(Salida $salida): self
    {
        if (!$this->salidas->contains($salida)) {
            $this->salidas->add($salida);
            $salida->setObjeto($this);
        }

        return $this;
    }

    public function removeSalida(Salida $salida): self
    {
        if ($this->salidas->removeElement($salida)) {
            // set the owning side to null (unless already changed)
            if ($salida->getObjeto() === $this) {
                $salida->setObjeto(null);
            }
        }

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

}
