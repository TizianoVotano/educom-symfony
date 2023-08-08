<?php

namespace App\Repository;

use App\Entity\Optreden;

use App\Entity\Artiest;
use App\Entity\Poppodium;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Optreden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optreden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optreden[]    findAll()
 * @method Optreden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptredenRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optreden::class);
    }

    public function getAllOptredens() {
        return($this->findAll());        
    }

    public function saveOptreden($params) {

        if(isset($params["id"]) && $params["id"] != "") {
            $optreden = $this->find($params["id"]);
        } else {
            $optreden = new Optreden();
        }
        
        $optreden->setPoppodium($params["poppodium"]);
        $optreden->setArtiest($params["hoofdprogramma"]);
        $optreden->setVoorprogrammaId($params["voorprogramma"]);
        $optreden->setOmschrijving($params["omschrijving"]);
        $optreden->setDatum($params["datum"]);
        $optreden->setPrijs($params["prijs"]);
        $optreden->setTicketUrl($params["ticket_url"]);
        $optreden->setAfbeeldingUrl($params["afbeelding_url"]);

        $this->_em->persist($optreden);
        $this->_em->flush();

        return($optreden);
        
    }

    // public function deleteOptreden($id) {
    //     $optreden = $this->find($id);
    //     if($optreden) {
    //         $this->_em->remove($optreden);
    //         $this->_em->flush();
    //         return(true);
    //     }
    
    //     return(false);
    // }

    // public function deleteOptredenAndArtiest($id) {
    //     $optreden = $this->find($id);
    //     $artiest = $this->fetchArtiest($optreden->getArtiest());

    //     if($optreden) {
    //         // First delete the Child-Table
    //         $this->_em->remove($optreden);
    //         $this->_em->flush();

    //         // Then the Parent-Table
    //         $this->artiestRepository->deleteArtiest($artiest->getId());

    //         return(true);
    //     }
        
    
    //     return(false);
    // }
}