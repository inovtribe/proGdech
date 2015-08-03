<?php

namespace Geograph\ProgdechBundle\Controller;

use Geograph\ProgdechBundle\Geometrie\Marker;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Geograph\ProgdechBundle\Entity\PointCollecte;
use Geograph\ProgdechBundle\Form\PointCollecteType;

class PointCollecteController extends Controller
{

    /**
     * PointCollecte home page controller.
     *
     * @Route("/admin/pointcollecte/{pointcollecte_id}", requirements={"pointcollecte_id" = "\d+"}, name="pointcollecte")
     * @Template("GeographProgdechBundle:Backend:pointcollecte.html.twig");
     */
    
    public function pointcollecteAction($pointcollecte_id) {
	$carte = $this->get('geometrie_carte')
                ->setMap();
        $topolayer = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:FondCarte')
                ->findOneById(1);
        $aeriallayer = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:FondCarte')
                ->findOneById(4);
        
        $pointCollecte = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:PointCollecte')
                ->findOneById($pointcollecte_id);
        
        
        
        $commune = $pointCollecte->getCommune();
        $pointsCollecte = $commune->getPointsCollecte();
        
        $repository = $this->getDoctrine()->getRepository('GeographProgdechBundle:Typeflux');
        $types = $repository->getTypeFluxDistinctPointcollecte($pointcollecte_id);
        $pointCollecte->setTypesBacs($types);        
        
        
        $this->get('geograph_progdech')
                ->setPointCollecte($pointCollecte);
        
        $markerDao = $this->get('geometrie_marker');
        
        $markerDao->assignMarkerToPointsCollecte($pointsCollecte);
        
        $pointCollecte->marker->setActif(true);
        return array(
            'carte' => $carte,
            'topolayer' => $topolayer,
            'aeriallayer' => $aeriallayer,
            'actif_pointcollecte' => $pointCollecte,
            'commune' =>$commune
        );
    }
    
    /**
     * PointCollecte add page controller.
     *
     * @Route("/admin/pointcollecte/add", name="pointcollecteadd")
     * @Template("GeographProgdechBundle:Backend:ajouter.html.twig");
     */
    public function ajouterAction(){
        $pointcollecte = new PointCollecte;
        
        $form = $this->createForm(new PointCollecteType, $pointcollecte);
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($pointcollecte);
                $em->flush();
                
                return $this->redirect($this->generateUrl(''));
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
}
