<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        echo "\n \033[0;31m Le choix saisie n'est pas valide \033[0m\n";
        return $request;
    }

    /**
     * @Route("/name", name="homepage")
     */
    public function nameAction(Request $request)
    { 
        $name =  array("test1","test2","test3");

        return new JsonResponse(array('name' => $name));

    }
}
