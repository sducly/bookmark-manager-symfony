<?php

namespace ApiBundle\Entity;

use ApiBundle\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\TagRepository")
 */
class Tag
{
    use EntityTrait;

    /**
     * @var string $label
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * Set label.
     * @param string $label
     * @return Tag
     */
    public function setLabel(string $label): Tag
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Get label.
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function __toString()
    {
        return $this->getLabel();
    }

}
