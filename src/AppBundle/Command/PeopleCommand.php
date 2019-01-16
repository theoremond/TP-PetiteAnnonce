<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class PeopleCommand extends Command
{

    protected static $defaultName = 'app:people';

    public function __construct(bool $requirePassword = false)
    {
        $this->requirePassword = $requirePassword;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Charger "personnes" depuis YML')
            ->setHelp('Cette commande permet de charger et d\'afficher les personnes depusi le fichier YML')
        ;
    } 

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $configDir = array('././var');
        $fileLocator = new FileLocator($configDir);
        $ymlPersonnesFiles = $fileLocator->locate('persons.yml', null, false);
        $personnes = Yaml::parse(file_get_contents($ymlPersonnesFiles[0], false, null));
        
        $output->writeln([
            Yaml::dump($personnes)
        ]);
        
    }
}
