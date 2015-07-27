<?php

namespace Geograph\ProgdechBundle\Controller;

use Geograph\ProgdechBundle\Geometrie\Marker;

use Doctrine\Common\Collections;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CommuneController extends Controller
{
	/**
	 * Retourne la liste des communes en JSON.
	 *
	 * @Route("/admin/communes.json")
	 *
	 * @return JSON, array(
	 *   communes[name, insee]
	 * )
	 **/
	public function communesJsonAction()
	{
		// Détermine les bon markers pour les communes.
		$markerDao = $this->get('geometrie_marker');
		$pointsCollecte = new Collections\ArrayCollection($this->getDoctrine()
			->getRepository('GeographProgdechBundle:PointCollecte')
			->findAll());
		$markerDao->assignMarkerToPointsCollecte($pointsCollecte);


		$communes = array();
		foreach($this->getDoctrine()->getRepository('GeographProgdechBundle:Commune')->findAll() as $commune)
			$communes[] = $commune->getNestedData();

		return new Response(json_encode(array(
			'communes' => $communes	
		)));
	}

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
