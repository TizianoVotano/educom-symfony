<?php

namespace App\Repository;

use App\Entity\Artiest;
use App\Entity\Optreden;
use App\Entity\Poppodium;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Optreden>
 *
 * @method Optreden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optreden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optreden[]    findAll()
 * @method Optreden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptredenRepository extends ServiceEntityRepository
{
    private $artiestRepository;
    private $poppodiumRepository;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optreden::class);
        //$this->artiestRepository = $this->_em->getRepository(Artiest::class);
        //$this->poppodiumRepository = $this->_em->getRepository(Poppodium::class);
    }

    public function getAllOptredens() {
        return ($this->findAll());
    }

    public function saveOptreden($params) {

        if (isset($params['id']) && $params['id' != ""]) {
            $optreden = $this->find($params['id']);
        } else {
            $optreden = new Optreden();
        }
        
        $optreden->setPoppodium($this->fetchPoppodium($params["poppodium_id"]));
        $optreden->setArtiest($this->fetchArtiest($params["hoofdprogramma_id"]));

        if(isset($params["voorprogramma_id"])) {
            $optreden->setVoorprogrammaId($this->fetchArtiest($params["voorprogramma_id"]));
        }
        $optreden->setOmschrijving($params["omschrijving"]);
        $optreden->setDatum(new \DateTime($params["datum"]));
        $optreden->setPrijs($params["prijs"]);
        $optreden->setTicketUrl($params["ticket_url"]);
        $optreden->setAfbeeldingUrl($params["afbeelding_url"]);

        $this->_em->persist($optreden);
        $this->_em->flush();

        return($optreden);   
    }
    
    // private function fetchArtiest($id) {
    //     $artiest = $this->artiestRepository->fetchArtiest($id);
    //     return($artiest);
    // }

    // private function fetchPoppodium($id) {
    //     $podium = $this->poppodiumRepository->fetchPoppodium($id);
    //     return($podium);
    // }

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
