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

        // For part 1
        $housesMap = new HousesMap();
        $santa = new Santa(0, 0, $housesMap);

        // For part 2
        $sharedHousesMap = new HousesMap();
        $secondSanta = new Santa(0, 0, $sharedHousesMap);
        $robotSanta = new Santa(0, 0, $sharedHousesMap);

        foreach ($charsArray as $key => $char) {
            $santa->moveFromChar($char);
            $key % 2 === 0 ? $secondSanta->moveFromChar($char) : $robotSanta->moveFromChar($char);
        }

        $housesCount = $housesMap->housesCount();
        $sharedHousesCount = $sharedHousesMap->housesCount();

        $output->writeln("[Part 1] Santa visited $housesCount distinct houses.");
        $output->writeln("[Part 2] Santa and Robot Santa visited $sharedHousesCount distinct houses.");

        return Command::SUCCESS;
    }
}
