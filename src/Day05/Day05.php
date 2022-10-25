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

        $count1 = $count2 = 0;
        $checker1 = new StringChecker(Rules::RULESET01);
        $checker2 = new StringChecker(Rules::RULESET02);

        foreach ($strings as $string) {
            if ($checker1->isNice($string)) {
                $count1++;
            }

            if ($checker2->isNice($string)) {
                $count2++;
            }
        }

        $output->writeln("[Part 1] $count1 nice strings with rule set 1.");
        $output->writeln("[Part 2] $count2 nice strings with rule set 2.");

        return Command::SUCCESS;
    }
}
