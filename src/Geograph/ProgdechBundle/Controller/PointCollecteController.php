<?php

namespace Geograph\ProgdechBundle\Controller;

use Geograph\ProgdechBundle\Entity\PointCollecte;
use Geograph\ProgdechBundle\Geometrie\Marker;

use Doctrine\Common\Collections;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PointCollecteController extends Controller
{
    /**
     * Retourne la liste des points de collecte en JSON.
     *
     * @Route("/admin/pointscollecte.json")
     *
     * @return JSON, array(
     *   pointsCollecte[id, nom, latitude, longitude, volontaire, commune_id]
     * )
     **/
    public function pointsCollecteJsonAction()
    {
        // Tous les points de collecte.
        $pointsCollecte = new Collections\ArrayCollection($this->getDoctrine()
            ->getRepository('GeographProgdechBundle:PointCollecte')
            ->findAll());

        // Détermine les bon markers des points de collecte.
        $markerDao = $this->get('geometrie_marker');
        $markerDao->assignMarkerToPointsCollecte($pointsCollecte);

        // Données à transmettre en JSON.
        $data = array();
        foreach($pointsCollecte as $pointCollecte)
            $data[] = $pointCollecte->getNestedData();

        return new Response(json_encode(array(
            'pointsCollecte' => $data
        )));
    }

    /**
     * Modifie un point de collecte.
     *
     * @Route("/admin/pointCollecteUpdate")
     **/
    public function pointCollecteUpdateAction(Request $request)
    {
        $data = json_decode($request->getContent(), false);

        $pointCollecte = $this->getDoctrine()
            ->getRepository('GeographProgdechBundle:PointCollecte')
            ->findOneById($data->id);
        if (! $pointCollecte)
            throw $this->createNotFoundException('Le point de collecte n\'existe pas.');

        $pointCollecte->setLatitude($data->latitude);
        $pointCollecte->setLongitude($data->longitude);
        $this->getDoctrine()->getManager()->flush();

        return new Response(json_encode(array(
            'success' => true
        )));
    }

    /**
     * Création d'un point de collecte.
     *
     * @Route("/admin/pointCollecteCreate")
     *
     * Paramètres du point de collecte à créer qui doivent etre transmis:
     * @param reference string reference
     * @param latitude float
     * @param longitude float
     * @param commune_id integer Identifiant de la commune liée.
     *
     * @return JSON:
     *   success: true
     *   id: identifiant du point de collecte créé.
     **/
    public function pointCollecteCreateAction(Request $request)
    {
        // Données transmises par la requete.
        $data = json_decode($request->getContent(), false);

        // Commune liée.
        $commune = $this->getDoctrine()
            ->getRepository('GeographProgdechBundle:Commune')
            ->findOneById($data->commune_id);
        if (! $commune)
            throw $this->createNotFoundException('La commune n\'existe pas.');

        // Utilisateur lié.
        $user = $this->getDoctrine()
            ->getRepository('GeographProgdechBundle:User')
            ->findOneById(1);
        if (! $user)
            throw $this->createNotFoundException('L\'utilisateur n\'existe pas.');


        // Création du point de collecte.
        $pointCollecte = new PointCollecte();
        $pointCollecte->setReference($data->reference);
        $pointCollecte->setLatitude($data->latitude);
        $pointCollecte->setLongitude($data->longitude);
        $pointCollecte->setNom($data->reference);
        $pointCollecte->setDate(new \DateTime());
        $pointCollecte->setUser($user);;
        $pointCollecte->setCommune($commune);;

        // Enregistre le point de collecte dans la base de données.
        $em = $this->getDoctrine()->getManager();
        $em->persist($pointCollecte);
        $em->flush();

        // Transmets la réponse.
        return new Response(json_encode(array(
            'success' => true,
            'pointsCollecte' => $pointCollecte->getNestedData()
        )));
    }

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
        
        $markerDao = $this->get('geometrie_marker');
        
        $commune = $pointCollecte->getCommune();
        $pointsCollecte = $commune->getPointsCollecte();

        $this->get('geograph_progdech')
                ->setPointCollecte($pointCollecte);
        
        $markerDao->createMarker(Marker::TYPE_POINT_COLLECTE, false);
        
        
        
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
}
