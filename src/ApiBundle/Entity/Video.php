<?php

namespace ApiBundle\Entity;

use ApiBundle\Entity\Traits\BookmarkableTrait;
use ApiBundle\Entity\Traits\EntityTrait;
use ApiBundle\Entity\Traits\MediaTrait;
use ApiBundle\Entity\Traits\TaggableTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\VideoRepository")
 */
class Video
{
    use EntityTrait;

    /**
     * @var int
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    private $duration = null;


    /**
     * Set duration.
     * @param int $duration
     * @return Video
     */
    public function setDuration(int $duration = null): Video
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Get duration.
     *
     * @return int
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }
}
