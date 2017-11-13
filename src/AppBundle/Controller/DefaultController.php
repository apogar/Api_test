<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $test = 0;
        echo "\n \033[0;31m Le choix saisie n'est pas valide \033[0m\n";
        return $test;
    }

    /**
     * @Route("/name", name="homepage")
     */
    public function nameAction(Request $request)
    { 

        $name = array(
            "name" => "test1",
            "name" => "test2",
            "name" => "test3",
            );

        return new JsonResponse(array('name' => $name));

    }
}
