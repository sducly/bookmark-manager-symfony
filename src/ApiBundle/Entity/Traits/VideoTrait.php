<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 14/11/2018
 * Time: 22:04
 */

namespace ApiBundle\Entity\Traits;


use ApiBundle\Entity\Video;

trait VideoTrait
{

    /**
     * @var Video $video
     * @ORM\OneToOne(targetEntity="ApiBundle\Entity\Video", cascade={"all"})
     */
    private $video;

    /**
     * @return Video
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video $video
     * @return VideoableTrait
     */
    public function setVideo($video)
    {
        $this->video = $video;
        return $this;
    }

}