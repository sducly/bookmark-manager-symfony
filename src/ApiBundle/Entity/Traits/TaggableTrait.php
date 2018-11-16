<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 14/11/2018
 * Time: 22:04
 */

namespace ApiBundle\Entity\Traits;


use ApiBundle\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;

trait TaggableTrait
{
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @var ArrayCollection $tags
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Tag", cascade={"all"}, orphanRemoval=true)
     */
    private $tags;

    /**
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function addTag(Tag $tag) {
        $this->tags->add($tag);
    }

    public function removeTag(Tag $tag) {
        $this->tags->removeElement($tag);
    }

}