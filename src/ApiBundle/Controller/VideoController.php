<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Video;
use ApiBundle\Form\VideoType;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/videos")
 */
class VideoController extends Controller
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
    public function showAction(Video $video)
    {
        return $video;
    }

    /**
     * @Rest\Post("")
     * @Rest\View
     */
    public function postAction(Request $request)
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->submit($request->request->all());

        if($form->isValid()) {
            $this->manager->persist($video);
            $this->manager->flush();
            return $video;
        }
    }

    /**
     * @Rest\Put(
     *     path = "/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function putAction(Video $video, Request $request)
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->submit($request->request->all());

        if($form->isValid()) {
            $this->manager->flush();
            return $video;
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
        $video = $this->getDoctrine()->getRepository(Video::class)->find($id);

        if(!$video) {
            return new JsonResponse(['message' => 'Video not found'], Response::HTTP_NOT_FOUND);
        }

        $this->manager->remove($video);
        $this->manager->flush();
    }
}
