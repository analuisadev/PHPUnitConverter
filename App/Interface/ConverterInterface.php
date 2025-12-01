<?php

namespace App\Interface;

interface ConverterInterface {
    public function converter(float $unit, string $fromUnit, string $toUnit) :float; 
}