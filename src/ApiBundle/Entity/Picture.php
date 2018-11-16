<?php

namespace ApiBundle\Entity;

use ApiBundle\Entity\Traits\BookmarkableTrait;
use ApiBundle\Entity\Traits\EntityTrait;
use ApiBundle\Entity\Traits\MediaTrait;
use ApiBundle\Entity\Traits\TaggableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\PictureRepository")
 */
class Picture
{
    use EntityTrait, BookmarkableTrait, MediaTrait, TaggableTrait;
}
