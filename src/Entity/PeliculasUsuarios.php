<?php

namespace App\Entity;

use App\Repository\PeliculasUsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PeliculasUsuariosRepository::class)
 */
class PeliculasUsuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pelicula::class, inversedBy="peliculasUsuarios")
     */
    private $pelicula;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="peliculasUsuarios")
     */
    private $usuario;

    /**
     * @ORM\Column(type="integer")
     */
    private $orden;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPelicula(): ?Pelicula
    {
        return $this->pelicula;
    }

    public function setPelicula(?Pelicula $pelicula): self
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }
}
