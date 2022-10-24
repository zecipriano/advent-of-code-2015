<?php

namespace AdventOfCode2015\Day04;

use AdventOfCode2015\Utils\FileReader;
use AdventOfCode2015\Utils\UnreadableFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day04 extends Command
{
    protected function configure(): void
    {
        $this->setName('day04')
            ->setDescription('Day 4: The Ideal Stocking Stuffer')
            ->addArgument('input', InputArgument::REQUIRED, 'The file with the input.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $inputString = (new FileReader($input->getArgument('input')))->getString();
        } catch (UnreadableFile) {
            $output->writeln("<error>Can't read the file.</error>");
            return Command::FAILURE;
        }

        $fiveZeros = false;
        $sixZeros = false;

        for ($n = 1; $n <= PHP_INT_MAX; $n++) {
            $hash = md5($inputString . $n);

            if (! $fiveZeros && str_starts_with($hash, '00000')) {
                $output->writeln("[Part 1] The first hash that starts with five zeros appears at number $n.");
                $fiveZeros = true;
            }

            if ($fiveZeros && ! $sixZeros && str_starts_with($hash, '000000')) {
                $output->writeln("[Part 2] The first hash that starts with six zeros appears at number $n.");
                $sixZeros = true;
            }

            if ($fiveZeros && $sixZeros) {
                break;
            }
        }

        return Command::SUCCESS;
    }
}
