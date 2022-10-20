<?php

namespace AdventOfCode2015\Day02;

use AdventOfCode2015\Day01\Present;
use AdventOfCode2015\Utils\FileReader;
use AdventOfCode2015\Utils\UnreadableFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day02 extends Command
{
    protected function configure(): void
    {
        $this->setName('day02')
            ->setDescription('Day 2: I Was Told There Would Be No Math')
            ->addArgument('input', InputArgument::REQUIRED, 'The file with the input.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $dimensions = (new FileReader($input->getArgument('input')))->getArrayOfLines();
        } catch (UnreadableFile) {
            $output->writeln("<error>Can't read the file.</error>");
            return Command::FAILURE;
        }

        $presents = array_map(static function ($string) {
            $dimensionsArray = explode('x', $string);
            return new Present($dimensionsArray[0], $dimensionsArray[1], $dimensionsArray[2]);
        }, $dimensions);

        $totalPaperNeeded = 0;
        $totalRibbonNeeded = 0;

        foreach ($presents as $present) {
            $totalPaperNeeded += $present->paperNeeded();
            $totalRibbonNeeded += $present->ribbonNeeded();
        }

        $output->writeln("[Part 1] $totalPaperNeeded square feet of paper are needed.");
        $output->writeln("[Part 2] $totalRibbonNeeded feet of ribbon are needed.");

        return Command::SUCCESS;
    }
}
