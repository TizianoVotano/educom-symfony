<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

class BaseController extends AbstractController
{
    private $logger;
    private $doctrine;

    protected function doctrine() {
        return $this->doctrine;
    }

    protected function log($msg, $type) {
        $type = strtolower($type);
        if ($type === "warning")
            $this->logger->warning("Warning Message");
        if ($type === "info")
            $this->logger->info($msg);
        if ($type === "error")
            $this->logger->error("Error Message");
    }
    
    public function __construct(LoggerInterface $logger, ManagerRegistry $doctrine) {
        $this->logger = $logger;
        $this->doctrine = $doctrine;
    }
}
