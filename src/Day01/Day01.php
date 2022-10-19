<?php

namespace AdventOfCode2015\Day01;

use AdventOfCode2015\Utils\FileReader;
use AdventOfCode2015\Utils\UnreadableFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day01 extends Command
{
    protected function configure(): void
    {
        $this->setName('day01')
            ->setDescription('Day 1: Not Quite Lisp')
            ->addArgument('input', InputArgument::REQUIRED, 'The file with the input.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $charsArray =  (new FileReader($input->getArgument('input')))->getArrayOfChars();
        } catch (UnreadableFile) {
            $output->writeln("<error>Can't read the file.</error>");
            return Command::FAILURE;
        }

        $floor = 0;
        $basement = null;

        foreach ($charsArray as $key => $char) {
            $floor += match ($char) {
                '(' => 1,
                ')' => -1,
            };

            if (!$basement && $floor < 0) {
                $basement = $key;
            }
        }

        $output->writeln("[Part 1] The elevator stopped on floor $floor.");
        $output->writeln("[Part 2] The elevator first visited the basement after " . ++$basement . " moves.");

        return Command::SUCCESS;
    }
}
