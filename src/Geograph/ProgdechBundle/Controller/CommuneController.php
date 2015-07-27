<?php

namespace Geograph\ProgdechBundle\Controller;

use Geograph\ProgdechBundle\Geometrie\Marker;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/*
   use Silex\Application;
   use Symfony\Component\HttpFoundation\Request;
   use proGdech\Domain\PointCollecte;
   use proGdech\Domain\User;
   use proGdech\Form\Type\PointCollecteType;
   use proGdech\Form\Type\BacType;
   use proGdech\Form\Type\UserType;
 */

class CommuneController extends Controller
{
	/**
	 * Commune home page controller.
	 *
	 * @Route("/admin/commune/{commune_insee}", requirements={"commune_insee" = "\d+"}, name="admin_commune")
	 * @Template("GeographProgdechBundle:Backend:commune.html.twig");
	 */
	public function communeAction($commune_insee)
	{
		$carte = $this->get('geometrie_carte')
			->setMap();
                $topolayer = $this->getDoctrine()
                        ->getRepository('GeographProgdechBundle:FondCarte')
                        ->findOneById(1);
                $aeriallayer = $this->getDoctrine()
                        ->getRepository('GeographProgdechBundle:FondCarte')
                        ->findOneById(4);

		$commune = $this->getDoctrine()
			->getRepository('GeographProgdechBundle:Commune')
			->findOneByInsee($commune_insee);

                // Récupère les valeurs à affecter à la commmune courante
                $this->get('geograph_progdech')
                    ->setCommune($commune);
                
		$markerDao = $this->get('geometrie_marker');
		$marker = $markerDao->createMarker(Marker::TYPE_POINT_COLLECTE, false);

		$pointsCollecte = $commune->getPointsCollecte();
		$markerDao->assignMarkerToPointsCollecte($pointsCollecte);
                
		return array(
                    'commune' => $commune,
                    'carte' => $carte,
                    'topolayer' => $topolayer,
                    'aeriallayer' => $aeriallayer
                );
	}
        
        /**
	 * Commune panel page controller.
	 *
	 * @Template("GeographProgdechBundle:Backend:panel_commune.html.twig");
	 */
        public function panelAction($id)
	{
            $commune = $this->getDoctrine()
                    ->getRepository('GeographProgdechBundle:Commune')
                    ->find($id)
            ;
            
            return array(
                'commune' => $commune
            );
        }
}
