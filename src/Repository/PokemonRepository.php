<?php

namespace App\Repository;

use App\Entity\Pokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pokemon>
 *
 * @method Pokemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pokemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pokemon[]    findAll()
 * @method Pokemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function add(Pokemon $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Pokemon $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByNumber($id) {

        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'SELECT p FROM App\Entity\Pokemon p
             WHERE p.number = :pokemon'
        )->setParameter('pokemon', $id);

        return $query->getResult();
    }

    // public function findWithTypes($number) {

    //     $em = $this->getEntityManager();

    //     $query = $em->createQuery(
    //         "SELECT pokemon, type.name as nomType, number, pokemon.id, type.color as couleur, 
    //          pokemon.hp as PV, pokemon.attack as Attaque, pokemon.defense as Défense, 
    //          pokemon.spe_attack as AttaqueSP, pokemon.spe_defense as DéfenseSP, pokemon.speed as Vitesse, description, size, weight
    //          FROM
    //          `pokemon`
    //          JOIN pokemon_type ON pokemon_type.pokemon_number=pokemon.number 
    //         JOIN type ON pokemon_type.type_id=type.id
    //         WHERE number = :number"
    //     )->setParameter('number', $number);
        
    //     return $query->getResult();
    // }

//    /**
//     * @return Pokemon[] Returns an array of Pokemon objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pokemon
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
