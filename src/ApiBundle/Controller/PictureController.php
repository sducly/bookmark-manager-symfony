<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Picture;
use ApiBundle\Form\PictureType;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pictures")
 */
class PictureController extends Controller
{
    public function __construct(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }

    /**
     * @Rest\Get(
     *     path = "/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Picture $picture)
    {
        return $picture;
    }

    /**
     * @Rest\Post("")
     * @Rest\View
     */
    public function postAction(Request $request)
    {
        $picture = new Picture();
        $form = $this->createForm(PictureType::class, $picture);
        $form->submit($request->request->all());

        if($form->isValid()) {
            $this->manager->persist($picture);
            $this->manager->flush();
            return $picture;
        }

    }

    /**
     * @Rest\Put(
     *     path = "/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function putAction(Picture $picture, Request $request)
    {
        $form = $this->createForm(PictureType::class, $picture);
        $form->submit($request->request->all());

        if($form->isValid()) {
            $this->manager->flush();
            return $picture;
        }
    }

    /**
     * @Rest\Delete(
     *     path = "/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function deleteAction(int $id)
    {
        $picture = $this->getDoctrine()->getRepository(Picture::class)->find($id);

        if(!$picture) {
                return new JsonResponse(['message' => 'Picture not found'], Response::HTTP_NOT_FOUND);
        }

        $this->manager->remove($picture);
        $this->manager->flush();
    }
}
