<?php

namespace HandissimoBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class LoadDataCommand extends ContainerAwareCommand
{
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
        $data = $this->getContainer()->get('handissimo.load_data');
        $progress = new ProgressBar($output);
        $progress->start();
        $data->loadAction($input->getArgument('name'));
        $progress->finish();
        $output->writeln('Data loaded');
    }
}