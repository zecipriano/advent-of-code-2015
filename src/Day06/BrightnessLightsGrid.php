<?php

namespace AdventOfCode2015\Day06;

class BrightnessLightsGrid extends LightsGrid
{
    protected function turnOn(int $x, int $y): void
    {
        if (! isset($this->grid[$x][$y])) {
            $this->grid[$x][$y] = 0;
        }

        $this->grid[$x][$y]++;
    }

    protected function turnOff(int $x, int $y): void
    {
        if (! isset($this->grid[$x][$y])) {
            $this->grid[$x][$y] = 0;
        }

        if ($this->grid[$x][$y] > 0) {
            $this->grid[$x][$y]--;
        }
    }

    protected function toggle(int $x, int $y): void
    {
        if (! isset($this->grid[$x][$y])) {
            $this->grid[$x][$y] = 0;
        }

        $this->grid[$x][$y] += 2;
    }
}
