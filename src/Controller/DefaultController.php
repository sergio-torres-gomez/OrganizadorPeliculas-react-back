<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\TMDB\SincronizarPeliculas;

class DefaultController extends AbstractController
{
	private $peliculas;
	function __construct(SincronizarPeliculas $peliculas){
		$this->peliculas = $peliculas;
	}
    
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/prueba', name: 'prueba')]
    public function prueba(): Response
    {	
    	if($this->isGranted('ROLE_USER'))
			$this->peliculas->sincronizarPorUsuario($this->getUser());
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
