<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/{route}")
     */
    public function indexAction($route = null)
    {
        return $this->render('@Front/Default/index.html.twig');
    }
}
