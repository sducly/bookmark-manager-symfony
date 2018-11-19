<?php

namespace ApiBundle\Service;
use ApiBundle\Entity\Bookmark;
use ApiBundle\Entity\Tag;
use ApiBundle\Entity\Video;
use ApiBundle\Transformer\BookmarkTransormer;
use Embed\Adapters\Webpage;
use Embed\Embed;

/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 16/11/2018
 * Time: 08:57
 */
class MediaService {

    private $transformer;

    public function __construct(BookmarkTransormer $transormer)
    {
        $this->transformer = $transormer;
    }

    /**
     * @param string $label
     * @return Tag|null
     */
    public function getBookmarkFromUrl(string $url): Bookmark {
        /** @var Webpage $webpage */
        $webpage = Embed::create($url);
        return $this->transformer->transformWebpageToBookmark($webpage);
    }




}