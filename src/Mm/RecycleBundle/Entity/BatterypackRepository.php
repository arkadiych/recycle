<?php

namespace Mm\RecycleBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BatterypackRepository
 *
 */
class BatterypackRepository extends EntityRepository
{

  /**
   * Returns batteries count grouped by type
   * @return array
   */
  public function findAllGroupedByType()
    {
      return $this->getEntityManager()
        ->createQueryBuilder('b')
        ->select(array(
            'b.type as type',
            'SUM(b.count) as total'
        ))
        ->from('MmRecycleBundle:Batterypack', 'b')
        ->groupBy('b.type')
        ->getQuery()
        ->getResult();
    }
}
