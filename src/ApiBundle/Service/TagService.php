<?php

namespace ApiBundle\Service;
use ApiBundle\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 16/11/2018
 * Time: 08:57
 */
class TagService
{
    private $entityManager;

    /**
     * TagService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $label
     * @return Tag|null
     */
    public function findTagByLabel(string $label): ?Tag {
        return $this->entityManager->getRepository(Tag::class)->findOneByLabel($label);
    }

    /**
     * @param string $label
     * @return Tag
     */
    public function createTagByLabel(string $label): Tag {
        $tag = new Tag();
        $tag->setLabel($label);
        return $tag;
    }
}