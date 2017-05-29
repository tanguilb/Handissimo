<?php

namespace HandissimoBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HandissimoBundle\Entity\Organizations;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadDataCommand extends ContainerAwareCommand
{

    protected $em;
    protected $container;

    public function __construct(EntityManager $em, ContainerInterface $container)
    {
        parent::__construct();
        $this->em = $em;
        $this->container = $container;
    }
    protected function configure()
    {
        $this
            // the name of the command (the part after "app/console")
            ->setName('handissimo:load-data')

            // the short description shown while running "php app/console list"
            ->setDescription('Loading new data into the database.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to load new data into the database.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Data Creator',
            '============',
            '',
        ]);
        $output->writeln('Hello');
        $output->write('You are about to ');
        $output->write('load data in database.');
        $name = $input->getArgument('name');

        $string = file_get_contents($this->container->get('kernel')->getRootDir()."/../".$name);
        $contents = json_decode($string, true);
        $progress = new ProgressBar($output, count($contents));
        $progress->start();

        foreach ($contents as $content){
            $organizationsEntity = new Organizations();
            $organizationsEntity->setName("ULIS " . $content['name']);
            $organizationsEntity->setAddress($content['address']);
            //$organizationsEntity->setAddressComplement($content['addressComplement']);
            $organizationsEntity->setPostal($content['postal']);
            $organizationsEntity->setCity($content['city']);
            $organizationsEntity->setPhoneNumber($content['phoneNumber']);
            //$organizationsEntity->setMail($content['email']);
            $organizationsEntity->setWebsite($content['website']);
            $organizationsEntity->setAgemini(6);
            $organizationsEntity->setAgemaxi(12);
            $organizationsEntity->setWorkingDescription($content['workingDescription']);
            $organizationsEntity->setInterventionZone($content['interventionZone']);
            $organizationsEntity->addNeed($this->em->getReference('HandissimoBundle:Needs', 26));
            $organizationsEntity->setOrgaStructure($this->em->getReference('HandissimoBundle:StructuresList', 114));
            //$organizationsEntity->setFreeplace($test['freeplace']);
            //$organizationsEntity->setDirectorName($test['directorName']);
            $this->em->persist($organizationsEntity);
            $progress->advance();
        }
        $this->em->flush();
        $progress->finish();
        $output->writeln('Data loaded');
    }
}