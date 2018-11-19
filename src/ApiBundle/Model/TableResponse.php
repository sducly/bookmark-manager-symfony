<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 18/11/2018
 * Time: 21:53
 */

namespace ApiBundle\Model;


class TableResponse
{
    /**
     * @var array $elems
     */
    private $elems;

    /**
     * @var int $nbElems
     */
    private $nbElems;

    /**
     * @var int $nbPages
     */
    private $nbPages;

    /**
     * @var int $currentPage
     */
    private $currentPage;

    /**
     * @return array
     */
    public function getElems(): ?array
    {
        return $this->elems;
    }

    /**
     * @param array $elems
     * @return TableResponse
     */
    public function setElems(array $elems): ?TableResponse
    {
        $this->elems = $elems;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbElems(): ?int
    {
        return $this->nbElems;
    }

    /**
     * @param int $nbElems
     * @return TableResponse
     */
    public function setNbElems(int $nbElems): ?TableResponse
    {
        $this->nbElems = $nbElems;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbPages(): ?int
    {
        return $this->nbPages;
    }

    /**
     * @param int $nbPages
     * @return TableResponse
     */
    public function setNbPages($nbPages): ?TableResponse
    {
        $this->nbPages = $nbPages;
        return $this;
    }

    /**
     * @param int $nbPages
     * @return TableResponse
     */
    public function computeNbPages(int $nbElems, int $offset): ?TableResponse
    {
        $this->nbPages = ceil($nbElems / $offset);
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): ?int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage(int $currentPage): ?TableResponse
    {
        $this->currentPage = $currentPage;
        return $this;
    }




}