<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 30/06/17
 * Time: 09:10
 */

namespace HandissimoBundle\Command;


use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HandissimoBundle\Entity\Organizations;

class UpdateDatabaseCommand extends ContainerAwareCommand
{

    protected $em;

    public function __construct(EntityManager $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('handissimo:update')
            ->setDescription('Update database')
            ->setHelp('Updated the database to update the statistical field and forces the versionning of all organizations');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Updator!',
            '============',
            '',
        ]);
        $output->writeln('Hello');

        $allOrganizations = $this->em->getRepository('HandissimoBundle:Organizations')->findAll();
        $progress = new ProgressBar($output, count($allOrganizations));
        $progress->start();

        foreach ($allOrganizations as $organization) {
            $organization->setChecked(0);
            $this->em->persist($organization);
            $progress->advance();
        }

        $this->em->flush();
        $progress->finish();
        $output->writeln('Database updated');
    }
}