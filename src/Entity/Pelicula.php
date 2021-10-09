<?php

namespace App\Entity;

use App\Repository\PeliculaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PeliculaRepository::class)
 */
class Pelicula
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity=Genero::class, inversedBy="peliculas")
     */
    private $generos;

    /**
     * @ORM\ManyToMany(targetEntity=Director::class, inversedBy="peliculas")
     */
    private $directores;

    /**
     * @ORM\ManyToMany(targetEntity=Actor::class, inversedBy="peliculas")
     */
    private $actores;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ano;

    /**
     * @ORM\OneToMany(targetEntity=PeliculasUsuarios::class, mappedBy="pelicula")
     */
    private $peliculasUsuarios;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ultimaSincro;

    /**
     * @ORM\Column(type="boolean",  nullable=true)
     */
    private $adultos;

    /**
     * @ORM\Column(type="integer",  nullable=true)
     */
    private $tmdbId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idiomaOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tituloOriginal;

    /**
     * @ORM\Column(type="datetime",  nullable=true)
     */
    private $fechaEstreno;

    public function __construct()
    {
        $this->generos = new ArrayCollection();
        $this->directores = new ArrayCollection();
        $this->actores = new ArrayCollection();
        $this->peliculasUsuarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
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

    /**
     * @return Collection|Genero[]
     */
    public function getGeneros(): Collection
    {
        return $this->generos;
    }

    public function addGenero(Genero $genero): self
    {
        if (!$this->generos->contains($genero)) {
            $this->generos[] = $genero;
        }

        return $this;
    }

    public function removeGenero(Genero $genero): self
    {
        $this->generos->removeElement($genero);

        return $this;
    }

    /**
     * @return Collection|Director[]
     */
    public function getDirectores(): Collection
    {
        return $this->directores;
    }

    public function addDirectores(Director $directore): self
    {
        if (!$this->directores->contains($directore)) {
            $this->directores[] = $directore;
        }

        return $this;
    }

    public function removeDirectores(Director $directore): self
    {
        $this->directores->removeElement($directore);

        return $this;
    }

    /**
     * @return Collection|Actor[]
     */
    public function getActores(): Collection
    {
        return $this->actores;
    }

    public function addActores(Actor $actore): self
    {
        if (!$this->actores->contains($actore)) {
            $this->actores[] = $actore;
        }

        return $this;
    }

    public function removeActores(Actor $actore): self
    {
        $this->actores->removeElement($actore);

        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * @return Collection|PeliculasUsuarios[]
     */
    public function getPeliculasUsuarios(): Collection
    {
        return $this->peliculasUsuarios;
    }

    public function addPeliculasUsuario(PeliculasUsuarios $peliculasUsuario): self
    {
        if (!$this->peliculasUsuarios->contains($peliculasUsuario)) {
            $this->peliculasUsuarios[] = $peliculasUsuario;
            $peliculasUsuario->setPelicula($this);
        }

        return $this;
    }

    public function removePeliculasUsuario(PeliculasUsuarios $peliculasUsuario): self
    {
        if ($this->peliculasUsuarios->removeElement($peliculasUsuario)) {
            // set the owning side to null (unless already changed)
            if ($peliculasUsuario->getPelicula() === $this) {
                $peliculasUsuario->setPelicula(null);
            }
        }

        return $this;
    }

    public function getUltimaSincro(): ?\DateTimeInterface
    {
        return $this->ultimaSincro;
    }

    public function setUltimaSincro(?\DateTimeInterface $ultimaSincro): self
    {
        $this->ultimaSincro = $ultimaSincro;

        return $this;
    }

    public function getAdultos(): ?bool
    {
        return $this->adultos;
    }

    public function setAdultos(bool $adultos): self
    {
        $this->adultos = $adultos;

        return $this;
    }

    public function getTmdbId(): ?int
    {
        return $this->tmdbId;
    }

    public function setTmdbId(int $tmdbId): self
    {
        $this->tmdbId = $tmdbId;

        return $this;
    }

    public function getIdiomaOriginal(): ?string
    {
        return $this->idiomaOriginal;
    }

    public function setIdiomaOriginal(string $idiomaOriginal): self
    {
        $this->idiomaOriginal = $idiomaOriginal;

        return $this;
    }

    public function getTituloOriginal(): ?string
    {
        return $this->tituloOriginal;
    }

    public function setTituloOriginal(string $tituloOriginal): self
    {
        $this->tituloOriginal = $tituloOriginal;

        return $this;
    }

    public function getFechaEstreno(): ?\DateTimeInterface
    {
        return $this->fechaEstreno;
    }

    public function setFechaEstreno(\DateTimeInterface $fechaEstreno): self
    {
        $this->fechaEstreno = $fechaEstreno;

        return $this;
    }
}
