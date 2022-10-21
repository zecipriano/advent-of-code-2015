<?php

namespace AdventOfCode2015\Day03;

use AdventOfCode2015\Utils\FileReader;
use AdventOfCode2015\Utils\UnreadableFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day03 extends Command
{
    protected function configure(): void
    {
        $this->setName('day03')
            ->setDescription('Day 3: Perfectly Spherical Houses in a Vacuum')
            ->addArgument('input', InputArgument::REQUIRED, 'The file with the input.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $charsArray = (new FileReader($input->getArgument('input')))->getArrayOfChars();
        } catch (UnreadableFile) {
            $output->writeln("<error>Can't read the file.</error>");
            return Command::FAILURE;
        }

        $houses[0][0] = 1;
        $santa = new Santa(0, 0);

        foreach ($charsArray as $char) {
            $santa->moveFromChar($char);
            $houses[$santa->x()][$santa->y()] = 1;
        }

        $housesCount = array_sum(array_map('count', $houses));

        $output->writeln("Santa visited $housesCount distinct houses.");

        return Command::SUCCESS;
    }
}
