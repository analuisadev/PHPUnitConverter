<?php

namespace Controller;

use Interface\ConverterInterface;

class Distance implements ConverterInterface {
    
    private const KM_TO_M = 1000.0;
    private const MI_TO_M = 1609.344;
    private const FT_TO_M = 0.3048;
    private const IN_TO_M = 0.0254;

    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseValue = match(strtolower($fromUnit)) {
            'km' => $unit * self::KM_TO_M,
            'm' => $unit,
            'cm' => $unit / 100.0,
            'mi' => $unit * self::MI_TO_M,
            'ft' => $unit * self::FT_TO_M,
            'in' => $unit * self::IN_TO_M,
            default => throw new \InvalidArgumentException("Unidade de Origem inválida: " . $fromUnit)
        };
        
        return match(strtolower($toUnit)) {
            "m" => $baseValue,
            "km" => $baseValue  / self::KM_TO_M,
            "mi" => $baseValue / self::MI_TO_M,
            "ft" => $baseValue / self::FT_TO_M,
            "cm" => $baseValue * 100.0,
            'in' => $baseValue / self::IN_TO_M,
            default => throw new \InvalidArgumentException("Unidade de Destino inválida: " . $toUnit)

        };
    }
}