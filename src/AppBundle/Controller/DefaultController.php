<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test", name="test")
     * @Method({"GET"})
     */
    public function getPlacesAction(Request $request)
    {
        return new JsonResponse(['status' => 200]);
    }

    /**
     * @Route("/name", name="name")
     * @Method({"GET"})
     */
    public function getNamesAction(Request $request)
    {
        $name = new \stdClass();
        $name->name = 'blabla';
        $name->mail = '@test';

        $test = array(
            //'names' => array(
                'name' => array(
                    'test',
                    'test1',
                    'test2',
                    'test3',
                    ),
                'test' => array(
                    'test0',
                    'test10',
                    'test20',
                    'test30',
                    ),
              //  )
            );

        return new JsonResponse($test);
    }

    /**
     * @Route("/calendar", name="calendar")
     * @Method({"GET"})
     */
    public function getCalendarAction(Request $request)
    {
        $jour = date("j");
        $mois = date("n");
        $year = date("Y");
        $sem = date("N");

        $calendar = array(
            'day'   => $jour,
            'month' => $mois,
            'year'  => $year,
            'sem'   => $sem
            );

        return new JsonResponse($calendar);
    }

    /**
     * @Route("/test", name="testpost")
     * @Method({"POST"})
     *
     */
    public function postPlacesAction(Request $request)
    {
        return new JsonResponse(['status' => 201]);
    }

}
