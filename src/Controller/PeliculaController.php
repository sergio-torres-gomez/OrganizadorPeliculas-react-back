<?php

namespace App\Controller;

use App\Entity\Pelicula;
use App\Form\PeliculaType;
use App\Repository\PeliculaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\TMDB\SincronizarPeliculas;

class PeliculaController extends AbstractController
{
	private $peliculaRepository;
	private $sincronizarPeliculas;

	function __construct(PeliculaRepository $peliculaRepository, SincronizarPeliculas $sincronizarPeliculas){
		$this->peliculaRepository = $peliculaRepository;
		$this->sincronizarPeliculas = $sincronizarPeliculas;
	}
	/**
    * @Route("/admin/sincronizar-pelicula/{pelicula_id}", name="sincro_admin", methods={"POST"}, condition="request.isXmlHttpRequest()")
    */
	public function sincronizarPelicula(int $pelicula_id)
	{
		$pelicula = $this->peliculaRepository->findById($pelicula_id);

		if($pelicula && $pelicula[0] && $pelicula[0]->getId()){
			$pelicula = $pelicula[0];
			$resultado = $this->sincronizarPeliculas->sincronizarPelicula($pelicula);
		}else{
			$resultado = ["Error" => "No se ha encontrado la película"];
		}

		echo json_encode($resultado);
		die;
	}
}
