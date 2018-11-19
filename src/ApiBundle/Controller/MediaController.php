<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Bookmark;
use ApiBundle\Entity\Picture;
use ApiBundle\Form\BookmarkType;
use ApiBundle\Form\PictureType;
use ApiBundle\Model\TableResponse;
use ApiBundle\Service\MediaService;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media")
 */
class MediaController extends Controller
{
    private $mediaService;

    public function __construct(MediaService $service)
    {
        $this->mediaService = $service;
    }

    /**
     * @Rest\Get("/")
     * @Rest\View
     */
    public function showAction(Request $request)
    {
        $url = $request->get('url');
        $bookmark = $this->mediaService->getBookmarkFromUrl($url);
        return $bookmark;
    }

}
