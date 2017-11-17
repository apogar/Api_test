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
        $day = date("j");
        $month = date("n");
        $year = date("Y");
        $sem = date("N");
        $nb = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $arr = array_fill(1, $nb, 0);

        for($i=1;$i<=$nb;$i++){
            $tmp=jddayofweek(cal_to_jd(CAL_GREGORIAN,$month,$i,$year),0);
            if($tmp == 0){
                $tmp = 7;
            }
            $arr[$i] = [
            'i' => $i,
            'j' => $tmp
            ];
        }



        $calendar = array(
            'day'   => $day,
            'month' => $month,
            'year'  => $year,
            'sem'   => $sem,
            'nb'    => $nb,
            'arr'   => $arr
            );

        return new JsonResponse($calendar);
    }

    /**
     * @Route("/dateplus/{date}", name="dateplus")
     * @Method({"GET"})
     */
    public function getDateplusAction(Request $request,$date)
    {
        list($month,$year) = split('-',$date);

        $month  = intval($month);
        $year   = intval($year);
        $day = -1;

        if($month == 12){
            $month = 1;
            $year += 1;
        }else{
            $month += 1;
        }

        if($month == date('n')){
            $day = date('j');
        }

        $nb = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $arr = array_fill(1, $nb, 0);

        for($i=1;$i<=$nb;$i++){
            $tmp=jddayofweek(cal_to_jd(CAL_GREGORIAN,$month,$i,$year),0);
            if($tmp == 0){
                $tmp = 7;
            }
            $arr[$i] = [
            'i' => $i,
            'j' => $tmp
            ];
        }



        return new JsonResponse([
            'month' => $month,
            'year'  => $year,
            'day'   => $day,
            'nb'    => $nb,
            'arr'   => $arr
            ]);
    } 

    /**
     * @Route("/datemoins/{date}", name="datemoins")
     * @Method({"GET"})
     */
    public function getDatemoinsAction(Request $request,$date)
    {
        list($month,$year) = split('-',$date);

        $month  = intval($month);
        $year   = intval($year);
        $day    = -1;

        if($month == 1){
            $month = 12;
            $year -= 1;
        }else{
            $month -= 1;
        }

        if($month == date('n')){
            $day = date('j');
        }

        $nb = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $arr = array_fill(1, $nb, 0);

        for($i=1;$i<=$nb;$i++){
            $tmp=jddayofweek(cal_to_jd(CAL_GREGORIAN,$month,$i,$year),0);
            if($tmp == 0){
                $tmp = 7;
            }
            $arr[$i] = [
            'i' => $i,
            'j' => $tmp
            ];
        }



        return new JsonResponse([
            'month' => $month,
            'year'  => $year,
            'day'  => $day,
            'nb'    => $nb,
            'arr'   => $arr
            ]);
    } 


    /**
     * @Route("/rdv/{day}", name="rdv")
     * @Method({"GET"})
     */
    public function getRdvAction(Request $request,$day)
    {
        $rdv = 0;
        $rdv = $day*2;
        return new JsonResponse($rdv);
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
