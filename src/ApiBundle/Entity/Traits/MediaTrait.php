<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 14/11/2018
 * Time: 22:04
 */

namespace ApiBundle\Entity\Traits;


trait MediaTrait
{
    /**
     * @var int $width
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @var int $height
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @var int $thumbnailUrl
     * @ORM\Column(type="string")
     */
    private $thumbnailUrl;

    /**
     * @return int
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return MediaTrait
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return MediaTrait
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param int $thumbnailUrl
     * @return MediaTrait
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }


}