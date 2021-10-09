<?php

namespace App\Service\TMDB;

use Symfony\Contracts\HttpClient\HttpClientInterface;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class TMDB
{

    private $cliente;
    private $params;
    private $base_url;
    private $api_key;

    public function __construct(HttpClientInterface $cliente, ParameterBagInterface $params)
    {
        $this->cliente = $cliente;
        $this->params = $params;
    }

    public function conectar(String $ruta, ?String $idioma = "es-ES"): array|String
    {	
        $this->base_url = $this->params->get('app.tmdb_url');
        $this->api_key = $this->params->get('app.tmdb_api_key');
        $url = $this->crearRuta($this->base_url, $ruta, $this->api_key, $idioma);

        try{
            $respuesta = $this->cliente->request(
                'GET',
                $url
            );

            if($respuesta->getStatusCode() != 200){
            	$this->errorCodigo($respuesta->getStatusCode(), $url);
            }

            if(strpos($respuesta->getHeaders()['content-type'][0], 'application/json') !== false){
            	$contenido = $respuesta->toArray();
            }else{
            	$contenido = $respuesta->getContent();
            }
        }catch(Exception $e){
            throw new Exception($e, 1);

        }
        
        return $contenido;
    }

    private function crearRuta(String $base_url, String $ruta, String $api_key, String $idioma): String
    {
        // Base con ruta
        if(substr($base_url, -1) == "/" && substr($ruta, 0, 1) == "/")
            $base_url = substr($base_url, 0, -1);
        elseif(substr($base_url, -1) != "/" && substr($ruta, 0, 1) != "/")
            $base_url = $base_url . "/";

        $url = $base_url . $ruta;

        // Parametros y api_key
        if(strpos($url, "?") !== false){
            $url = $url . "&api_key=".$api_key;
        }else{
            $url = $url . "?api_key=".$api_key;
        }

        // Idioma
        $url = $url . "&language=".$idioma;

        return $url;
    }

    private function errorCodigo($codigo, $url)
    {
    	switch ($codigo) {
    		case '404':
    				$error = "No se ha encontrado la página ".$url;
    			break;
    		case '401': case '403':
	    			$error = "No ha sido autorizado para entrar en la página ".$url;
    			break;
    		case '408':
    				$error = "Se ha agotado el tiempo de espera para la página ".$url;
    			break;
    		case '500': case '502': case '503':
    				$error = "Error de servidor en la página ".$url;
    			break;
    		default:
    				$error = "No se ha podido encontrar el error ".$codigo. " en la página ".$url;
    			break;
    	}

    	$this->lanzarError($error);
    }

    private function lanzarError(String $error)
    {
    	throw new \Exception($error);
    }
}