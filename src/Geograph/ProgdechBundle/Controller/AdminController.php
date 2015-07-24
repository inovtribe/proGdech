<?php

namespace Geograph\ProgdechBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{

    /**
     * Admin home page controller.
     *
     * @Route("/admin", name="admin")
     * @Template("GeographProgdechBundle:Backend:admin.html.twig");
     */
    public function indexAction() {
	$carte = $this->get('geometrie_carte')
                ->setMap();
        $topolayer = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:FondCarte')
                ->findOneById(1);
        $aeriallayer = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:FondCarte')
                ->findOneById(4);

        $repository = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:Commune');
        $communes = $repository->findAll();

        $this->get('geograph_progdech')
                ->setCommunes($communes);
        
        return array(
            'carte' => $carte,
            'topolayer' => $topolayer,
            'aeriallayer' => $aeriallayer,
            'communes' => $communes
        );
    }
}
