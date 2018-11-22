<?php

namespace AppBundle\Controller;


use AppBundle\dovizAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoinController extends Controller
{
    /**
     * @Route("/coin/compare")
     */
    public function compareAction()
    {
      $first = new dovizAdapter("http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3");
      $second = new dovizAdapter("http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0",true);

      $usd = $first->compareUsd($second->getUsd())?$first->getUsd():$second->getUsd();
      $eur = $first->compareEuro($second->getEuro())?$first->getEuro():$second->getEuro();
      $gbp = $first->compareGbp($second->getGbp())?$first->getGbp():$second->getGbp();



        return $this->render('coin/compare.html.twig', array(
            'usd' => $usd,
            'eur' => $eur,
            'gbp' => $gbp,
        ));
    }

}
