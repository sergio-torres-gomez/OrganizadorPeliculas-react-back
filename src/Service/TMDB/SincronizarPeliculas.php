<?php

namespace App\Service\TMDB;

use App\Service\TMDB\TMDB;
use App\Repository\PeliculaRepository;
use App\Entity\User;
use App\Entity\Pelicula;
use Doctrine\ORM\EntityManagerInterface;

class SincronizarPeliculas
{

    private $tmdb;
    private $peliculaRepository;
    private $em;

    public function __construct(PeliculaRepository $peliculaRepository, TMDB $tmdb, EntityManagerInterface $em)
    {
        $this->tmdb = $tmdb;
        $this->peliculaRepository = $peliculaRepository;
        $this->em = $em;
    }

    public function sincronizarPorUsuario(User $usuario): bool
    {	
    	$peliculas = $this->peliculaRepository->findByUsuario($usuario->getId());

        foreach ($peliculas as $pelicula) {
            echo "EMPEZAMOS CON PELICULA ".$pelicula->getNombre()."<br/>";
            $this->sincronizarPelicula($pelicula);
            echo "<br>";
        }

        return true;
    }

    public function sincronizarPelicula(Pelicula $pelicula, ?int $tmdb_id = 0): array
    {
        if(is_null($tmdb_id))
            $tmdb_id = $pelicula->getTmdbId();
        // Si ya tiene ID
        if($tmdb_id != 0){
            $datos_pelicula = $this->getDatosPeliculaPorId($pelicula->getTmdbId());

            $pelicula = $this->actualizarPelicula($pelicula, $datos_pelicula);

            $this->em->persist($pelicula);
            $this->em->flush();

            return ["OK" => "Película actualizada"];
        }else{
            $respuesta = $this->tmdb->conectar("search/movie?query=".urlencode($pelicula->getNombre()));
                
            // Si solo devuelve 1 pelicula
            if(count($respuesta["results"]) == 1){
                $datos_pelicula = $respuesta["results"][0];

                $pelicula = $this->actualizarPelicula($pelicula, $datos_pelicula);

                $this->em->persist($pelicula);
                $this->em->flush();

                return ["OK" => "Película actualizada"];
            }
            
            return ["peliculas" => $respuesta];
        }
    }

    private function getDatosPeliculaPorId(int $tmdb_id): array
    {
        $respuesta = $this->tmdb->conectar("movie/".$tmdb_id);

        return $respuesta;
    }

    private function actualizarPelicula(Pelicula $pelicula, array $datos_pelicula): Pelicula
    {
        $pelicula->setNombre($datos_pelicula["title"]);
        $pelicula->setTituloOriginal($datos_pelicula["original_title"]);
        $pelicula->setIdiomaOriginal($datos_pelicula["original_language"]);
        $pelicula->setFechaEstreno(new \DateTime($datos_pelicula["release_date"]));
        $pelicula->setAdultos($datos_pelicula["adult"]);
        $pelicula->setTmdbId($datos_pelicula["id"]);
        $pelicula->setUltimaSincro(new \DateTime());

        return $pelicula;
    }

}