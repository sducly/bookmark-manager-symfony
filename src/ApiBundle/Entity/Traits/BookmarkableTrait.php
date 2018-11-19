<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 14/11/2018
 * Time: 22:04
 */

namespace ApiBundle\Entity\Traits;


use ApiBundle\Entity\Bookmark;

trait BookmarkableTrait
{

    /**
     * @var Bookmark $bookmark
     * @ORM\OneToOne(targetEntity="ApiBundle\Entity\Bookmark", cascade={"all"})
     * @ORM\JoinColumn(name="bookmark_id", referencedColumnName="id", onDelete="cascade")
     */
    private $bookmark;

    /**
     * @return Bookmark
     */
    public function getBookmark(): ?Bookmark
    {
        return $this->bookmark;
    }

    /**
     * @param Bookmark $bookmark
     * @return BookmarkableTrait
     */
    public function setBookmark($bookmark)
    {
        $this->bookmark = $bookmark;
        return $this;
    }



}