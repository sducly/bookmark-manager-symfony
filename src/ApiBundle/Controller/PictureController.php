<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Picture;
use ApiBundle\Form\PictureType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class PictureController extends Controller
{
    public function __construct(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }

    /**
     * @Rest\Get(
     *     path = "/pictures/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Picture $picture)
    {
        return $picture;
    }

    /**
     * @Rest\Post("/pictures")
     * @Rest\View
     */
    public function postAction(Request $request)
    {
        $picture = new Picture();
        $form = $this->createForm(PictureType::class, $picture);
        $form->submit($request->request->all());
        $this->manager->persist($picture);
        $this->manager->flush();
        return $picture;
    }

    /**
     * @Rest\Put(
     *     path = "/pictures/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function putAction(Picture $picture, Request $request)
    {
        $form = $this->createForm(PictureType::class, $picture);
        $form->submit($request->request->all());
        $this->manager->flush();
        return $picture;
    }
}
