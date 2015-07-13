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
/*

        $marker = $app['geometrie.marker']->setMarker();
        $marker = $app['geometrie.marker']->setMarkerInactif($marker);
        return $app['twig']->render('/backend/admin.html.twig', array(
            'marker' => $marker
            ));
*/
	return array();
    }
}
