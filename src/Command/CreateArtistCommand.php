<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Repository\ArtiestRepository;
use App\Service\ArtiestService;

#[AsCommand(
    name: 'app:artist:create',
    description: 'Maak een artiest',
)]
class CreateArtistCommand extends Command
{
    private $artiestService;

    public function __construct(ArtiestService $artiestService) {
        $this->artiestService = $artiestService;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            // ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            // ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
            ->addArgument('naam', InputArgument::REQUIRED, 'Naam')
            ->addArgument('genre', InputArgument::REQUIRED, 'Genre?')
            ->addArgument('omschrijving', InputArgument::REQUIRED, 'Omschrijving')
            ->addArgument('afbeelding_url', InputArgument::REQUIRED, 'Afbeelding_url')
            ->addArgument('website', InputArgument::REQUIRED, 'Website')
            
        ;
    }

    // php bin/console app:artist:create Sponge Bob DeepRock bla bla.com
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        $io = new SymfonyStyle($input, $output);
        $io->note(print('Arguments: [naam] [genre] [omschrijving] [afbeelding_url] [website]'));

        $naam = $input->getArgument('naam');
        $genre = $input->getArgument('genre');
        $omschrijving = $input->getArgument('omschrijving');
        $afbeelding_url = $input->getArgument('afbeelding_url');
        $website = $input->getArgument('website');

        $artiest = [
            "naam"=>$naam,
            "genre"=>$genre,
            "omschrijving"=>$omschrijving,
            "afbeelding_url"=>$afbeelding_url,
            "website"=>$website
        ];

        $this->artiestService->saveArtiest($artiest);

        // if ($arg1) {
        //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // }

        // if ($input->getOption('option1')) {
        //     // ...
        // }

        $io->success('You now have ' . $naam . ' registered as a new artist!');

        return Command::SUCCESS;
    }
}