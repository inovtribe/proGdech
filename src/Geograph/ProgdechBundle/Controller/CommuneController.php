<?php

namespace Geograph\ProgdechBundle\Controller;

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
	 * @Route("/admin/communes", name="admin_communes")
	 * @Template("GeographProgdechBundle:Backend:communes.html.twig");
	 */
	public function communesAction()
	{
		$carte = $this->get('geometrie_carte')
			->setMap();
                $topolayer = $this->getDoctrine()
                        ->getRepository('GeographProgdechBundle:FondCarte')
                        ->findOneById(1);
                $aeriallayer = $this->getDoctrine()
                        ->getRepository('GeographProgdechBundle:FondCarte')
                        ->findOneById(4);

		$communes = $this->getDoctrine()
			->getRepository('GeographProgdechBundle:Commune')
			->findAll();
		return array(
				'carte' => $carte,
                                'topolayer' => $topolayer,
                                'aeriallayer' => $aeriallayer,
				'communes' => $communes
			    );
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
		$marker = $this->get('geometrie_marker')
			->setMarker("pointcollecte");
                $marker = $this->get('geometrie_marker')
			->setMarkerInactif($marker);

		$pointsCollecte = $commune->getPointsCollecte();
		$this->getDoctrine()
			->getRepository('GeographProgdechBundle:PointCollecte')
			->assignMarkerToPointsCollecte($pointsCollecte, $marker);

		//$carte = $app['geometrie.carte']->displayMap(); // Définir ici le code de la carte à afficher    
		//$marker = $app['geometrie.marker']->setInactifMarker();
		//$commune = $app['dao.commune']->findByInsee($id);
		//$pointscollecte = $app['dao.pointcollecte']->findAllByCommune($commune->getId(), $marker);
		return array(
				'commune' => $commune,
				'carte' => $carte,
                                'topolayer' => $topolayer,
                                'aeriallayer' => $aeriallayer,
                                'marker' => $marker,
				'pointscollecte' => $pointsCollecte
			    );
	}
}
