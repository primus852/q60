<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="mainPage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/unser-team", name="teamPage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function team()
    {
        return $this->render('default/team.html.twig');
    }

    /**
     * @Route("/unsere-praxis", name="praxisPage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function praxis()
    {
        return $this->render('default/praxis.html.twig');
    }

    /**
     * @Route("/unsere-philosophie", name="philosophiePage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function philosophie()
    {
        return $this->render('default/philosophie.html.twig');
    }

    /**
     * @Route("/therapiespektrum", name="therapiePage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function therapie()
    {
        return $this->render('default/therapie.html.twig');
    }

    /**
     * @Route("/die-lage", name="lagePage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function lage()
    {
        return $this->render('default/lage.html.twig');
    }

    /**
     * @Route("/kontakt-zu-uns", name="kontaktPage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function kontakt()
    {
        return $this->render('default/kontakt.html.twig');
    }

    /**
     * @Route("/datenschutz", name="datenschutzPage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function datenschutz()
    {
        return $this->render('default/datenschutz.html.twig');
    }

    /**
     * @Route("/impressum", name="impressumPage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function impressum()
    {
        return $this->render('default/impressum.html.twig');
    }
}
