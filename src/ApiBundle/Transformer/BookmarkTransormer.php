<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 19/11/2018
 * Time: 17:17
 */

namespace ApiBundle\Transformer;


use ApiBundle\Entity\Bookmark;
use ApiBundle\Entity\Tag;
use ApiBundle\Entity\Video;
use Embed\Adapters\Webpage;

class BookmarkTransormer
{
    /**
     * @param $dto
     * @return Bookmark
     */
    public function transformWebpageToBookmark(Webpage $dto): Bookmark {
        $bookmark = new Bookmark();

        $duration = $dto->getProviders()['oembed']->getBag()->get('duration');

        $bookmark
            ->setAuthorName($dto->authorName)
            ->setThumbnailUrl($dto->image)
            ->setTitle($dto->title)
            ->setUrl($dto->url)
            ->setHeight($dto->height)
            ->setWidth($dto->width);

        if($duration) {
            $video = new Video();
            $video->setDuration($duration);
            $bookmark->setVideo($video);
        }

        foreach($dto->getTags() as $label) {
            $tag = new Tag();
            $tag
                ->setLabel($label);
            $bookmark->addTag($tag);
        }

        return $bookmark;
    }
}