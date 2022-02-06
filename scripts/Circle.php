<?php

class Circle implements iCalculateSquare
{
    const PI = 3.1416;

    private float $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        return self::PI * ($this->r ** 2);
    }
}
