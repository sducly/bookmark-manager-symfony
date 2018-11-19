<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 14/11/2018
 * Time: 22:04
 */

namespace ApiBundle\Entity;

use ApiBundle\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bookmark
 *
 * @ORM\Table(name="bookmark")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\BookmarkRepository")
 */
class Bookmark
{

    use EntityTrait;

    /**
     * @var string $url
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $url;

    /**
     * @var string $title
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var string $authorName
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $authorName;

    /**
     * @var datetime $addedDate
     * @ORM\Column(type="datetime")
     */
    private $addedDate;

    /**
     * @var string $thumbnailUrl
     * @ORM\Column(type="string")
     */
    private $thumbnailUrl;

    /**
     * Bookmark constructor.
     */
    public function __construct()
    {
        $this->addedDate = new \DateTime('NOW');
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Bookmark
     */
    public function setUrl(string $url): Bookmark
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Bookmark
     */
    public function setTitle(string $title): Bookmark
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    /**
     * @param string $authorName
     * @return Bookmark
     */
    public function setAuthorName(?string $authorName): ?Bookmark
    {
        $this->authorName = $authorName;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getAddedDate(): ?\DateTime
    {
        return $this->addedDate;
    }

    /**
     * @param datetime $addedDate
     * @return Bookmark
     */
    public function setAddedDate(?\DateTime $addedDate): ?Bookmark
    {
        $this->addedDate = $addedDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string $thumbnailUrl
     * @return Bookmark
     */
    public function setThumbnailUrl($thumbnailUrl): ?Bookmark
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }


}