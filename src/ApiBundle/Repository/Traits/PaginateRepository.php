<?php
/**
 * Created by PhpStorm.
 * User: SDUCLY
 * Date: 18/11/2018
 * Time: 21:59
 */

namespace ApiBundle\Repository\Traits;


use Doctrine\ORM\QueryBuilder;

/**
 * Class PaginateRepository
 * @package ApiBundle\Repository\Traits
 */
trait PaginateRepository
{
    /**
     * @return int
     */
    public function count(): int {
        return $this
            ->createQueryBuilder('entity')
            ->select('COUNT(entity.id)')
            ->getQuery()
            ->getScalarResult();
    }

}