<?php

namespace AdventOfCode2015\Day02;

class Present
{
    private array $presentSides;

    public function __construct(
        private readonly int $l,
        private readonly int $w,
        private readonly int $h
    ) {
        $this->setSides(); // Smallest side is on position 0.
    }

    /**
     * The array of sides is ordered. Smallest side is on position 0.
     */
    private function setSides(): void
    {
        $this->presentSides = [
            new PresentSide($this->l, $this->w),
            new PresentSide($this->w, $this->h),
            new PresentSide($this->h, $this->l),
        ];

        usort(
            $this->presentSides,
            static function (PresentSide $ps1, PresentSide $ps2) {
                return $ps1->area() <=> $ps2->area();
            });
    }

    /**
     * The paper needed to wrap a present is equal to the surface area of box
     * plus an extra equal to the area of the smallest side.
     */
    public function paperNeeded(): int
    {
        // smallest size multiplied by 3 to account for the extra needed.
        return
            3 * $this->presentSides[0]->area() +
            2 * $this->presentSides[1]->area() +
            2 * $this->presentSides[2]->area();
    }

    /**
     * The ribbon required to wrap a present is perimeter of the smallest side
     * plus the ribbon needed for the bow. The feet of ribbon for the bow is
     * equal to the volume of the present.
     */
    public function ribbonNeeded(): int
    {
        return $this->presentSides[0]->perimeter() + $this->volume();
    }

    private function volume(): int
    {
        return $this->l * $this->w * $this->h;
    }
}
