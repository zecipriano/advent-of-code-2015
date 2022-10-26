<?php

namespace AdventOfCode2015\Day06;

use AdventOfCode2015\Utils\FileReader;
use AdventOfCode2015\Utils\UnreadableFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day06 extends Command
{
    protected function configure(): void
    {
        $this->setName('day06')
            ->setDescription('Day 6: Probably a Fire Hazard')
            ->addArgument('input', InputArgument::REQUIRED, 'The file with the input.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $instructions = (new FileReader($input->getArgument('input')))->getArrayOfLines();
        } catch (UnreadableFile) {
            $output->writeln("<error>Can't read the file.</error>");
            return Command::FAILURE;
        }

        $lightsGrid = new LightsGrid();
        $brightnessLightsGrid = new BrightnessLightsGrid();

        foreach ($instructions as $inst) {
            $inst = Instruction::fromString($inst);

            $lightsGrid->instruction($inst);
            $brightnessLightsGrid->instruction($inst);
        }

        $output->writeln("[Part 1] " . $lightsGrid->total() . ' lights are lit.');
        $output->writeln("[Part 2] The total brightness is " . $brightnessLightsGrid->total() . '.');

        return Command::SUCCESS;
    }
}
