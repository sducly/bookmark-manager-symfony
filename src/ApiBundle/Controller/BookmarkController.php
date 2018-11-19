<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Bookmark;
use ApiBundle\Entity\Picture;
use ApiBundle\Form\BookmarkType;
use ApiBundle\Form\PictureType;
use ApiBundle\Model\TableResponse;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bookmarks")
 */
class BookmarkController extends Controller
{

    const OFFSET = 5;

    public function __construct(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }

    /**
     * @Rest\Get("/")
     * @Rest\View
     */
    public function list(Request $request)
    {
        $page = $request->get('page');
        $bookmarkRepository = $this->manager->getRepository(Bookmark::class);
        $bookmarks = $bookmarkRepository->findPerPage($page, self::OFFSET);
        $nbBookmarks = $bookmarkRepository->count([]);

        $response = new TableResponse();

        return $response
            ->setElems($bookmarks)
            ->setNbElems($nbBookmarks)
            ->computeNbPages($nbBookmarks, self::OFFSET)
            ->setCurrentPage($page);
    }

    /**
     * @Rest\Get(
     *     path = "/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Bookmark $bookmark)
    {
        return $bookmark;
    }

    /**
     * @Rest\Post("")
     * @Rest\View
     */
    public function postAction(Request $request)
    {
        $bookmark = new Bookmark();
        $form = $this->createForm(BookmarkType::class, $bookmark);
        $form->submit($request->request->all());

        if($form->isValid()) {
            $this->manager->persist($bookmark);
            $this->manager->flush();
            return $bookmark;
        }

    }

    /**
     * @Rest\Put(
     *     path = "/{id}",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function putAction(Bookmark $bookmark, Request $request)
    {

        $form = $this->createForm(BookmarkType::class, $bookmark);
        $form->submit($request->request->all());

        if($form->isValid()) {
            $this->manager->flush();
            return $bookmark;
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
        $bookmark = $this->getDoctrine()->getRepository(Bookmark::class)->find($id);

        if(!$bookmark) {
            return new JsonResponse(['message' => 'Bookmark not found'], Response::HTTP_NOT_FOUND);
        }

        $this->manager->remove($bookmark);
        $this->manager->flush();
        return $bookmark;
    }

}
