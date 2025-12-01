<?php

namespace App\Controller;

use App\Interface\ConverterInterface;

class Temperature implements ConverterInterface {
    
    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseValue = match(strtoupper($fromUnit)) {
            'C' => $unit, 
            'F' => ($unit - 32) * 5/9,
            'K' => $unit - 273.15,
            default => throw new \InvalidArgumentException("Unidade de Origem inválida : ". $fromUnit)
        }; 

        return match(strtoupper($toUnit)) {
            'C' => $baseValue, 
            'F' => ($baseValue * 9/5) + 32,
            'K' => $baseValue + 273.15,
            default => throw new \InvalidArgumentException("Unidade de Destino inválida : " . $toUnit)
        };
    }
}