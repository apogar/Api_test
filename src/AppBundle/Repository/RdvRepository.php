<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RdvRepository extends EntityRepository
{
    public function getAll($year,$month)
    {
        
        $qb = $this->createQueryBuilder('g')
        	->where('g.date LIKE :dd')
        	->setParameter('dd',$year.'-'.$month.'%');

        return $qb->getQuery()->getResult();
    }
}
