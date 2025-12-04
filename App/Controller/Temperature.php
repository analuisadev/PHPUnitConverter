<?php

namespace App\Controller;

class Temperature {
    
    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseUnit = match(strtoupper($fromUnit)) {
            'C' => $unit, 
            'F' => ($unit - 32) * 5/9,
            'K' => $unit - 273.15,
            default => throw new \InvalidArgumentException("Unidade de Origem inválida : ". $fromUnit)
        }; 

        return match(strtoupper($toUnit)) {
            'C' => $baseUnit, 
            'F' => ($baseUnit * 9/5) + 32,
            'K' => $baseUnit + 273.15,
            default => throw new \InvalidArgumentException("Unidade de Destino inválida : " . $toUnit)
        };
    }
}