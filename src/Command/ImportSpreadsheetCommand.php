<?php
// ik moet de Poppodium Service aanmaken -_-
namespace App\Command;

use App\Entity\Poppodium;
use App\Service\PoppodiumService;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-spreadsheet',
    description: 'Import excel spreadsheet',
)]
class ImportSpreadsheetCommand extends Command
{
    private $poppodiumService;

    public function __construct(PoppodiumService $poppodiumService) {
        $this->poppodiumService = $poppodiumService;

        parent::__construct();
    }
    protected function configure()
    {
        $this
            ->setHelp('This command allows you to import a spreadsheet')
            ->addArgument('file', InputArgument::REQUIRED, 'Spreadsheet')
        ;   
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->note('Despite all of its documentation it is quite difficult to find a good and simple solution 
        for reading rows, source for this solution: https://github.com/PHPOffice/PhpSpreadsheet/issues/97');
        $io->note("Place your Excel file (.xlsx) in the /public/ folder");

        $inputFileName = $input->getArgument('file');
        //$file = IOFactory::load('public/'. $inputFileName .'.xlsx');
        
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $path = 'public/' . $inputFileName . '.xlsx';
        $spreadsheet = $reader->load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        for ($i=1; $i < count($rows); $i++) {
            $poppodium = array_combine($rows[0], $rows[$i]);
            $this->poppodiumService->savePodium($poppodium);
        }

        $io->success('Your public/Poppodia.xlsx data should have been added to the database');

        return Command::SUCCESS;
    } 
}
