<?php

namespace App\Repository;

use App\Entity\QuestionBank;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestionBank|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionBank|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionBank[]    findAll()
 * @method QuestionBank[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionBankRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionBank::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(QuestionBank $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(QuestionBank $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
