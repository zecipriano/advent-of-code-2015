<?php

namespace AdventOfCode2015\Day05;

use AdventOfCode2015\Utils\FileReader;
use AdventOfCode2015\Utils\UnreadableFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day05 extends Command
{
    protected function configure(): void
    {
        $this->setName('day05')
            ->setDescription('Day 5: Doesn\'t He Have Intern-Elves For This?')
            ->addArgument('input', InputArgument::REQUIRED, 'The file with the input.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $strings = (new FileReader($input->getArgument('input')))->getArrayOfLines();
        } catch (UnreadableFile) {
            $output->writeln("<error>Can't read the file.</error>");
            return Command::FAILURE;
        }

        $checker = new StringChecker();
        $count = 0;

        foreach ($strings as $string) {
            if($checker->isNice($string)) {
                $count++;
            }
        }

        $output->writeln("$count nice strings.");

        return Command::SUCCESS;
    }
}
