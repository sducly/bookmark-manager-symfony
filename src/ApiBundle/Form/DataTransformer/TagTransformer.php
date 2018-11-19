<?php

namespace ApiBundle\Form\DataTransformer;

use ApiBundle\Entity\Tag;
use ApiBundle\Service\TagService;
use AppBundle\Entity\Issue;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;

class TagTransformer implements DataTransformerInterface
{
    /**
     * @var TagService $service
     */
    private $service;

    public function __construct(TagService $service)
    {
        $this->service = $service;
    }

    /**
     * transform the tags collection to a string
     *
     * @param ArrayCollection $tagsAsCollection
     * @return string
     */
    public function transform($tagsAsCollection): string
    {
        return implode(', ', $tagsAsCollection->toArray());
    }


    /**
     * @param String $tagsAsString
     * @return ArrayCollection
     */
    public function reverseTransform($postTags): ArrayCollection
    {
        $tags = new ArrayCollection();

        foreach($postTags as $tag) {

            $label = $tag['label'];
            $tag = $this->service->findTagByLabel($label);

            if(!$tag) {
                $tag = $this->service->createTagByLabel($label);
            }

            $tags->add($tag);

        }

        return $tags;
    }
}