<?php

namespace App\Controller;

use App\Interface\ConverterInterface;

class Time implements ConverterInterface { 
    
    private const DAY_TO_S = 86400.0;
    private const HOUR_TO_S = 3600.0;
    private const MIN_TO_S = 60.0;
    private const MS_TO_S = 0.001;

    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseUnit = match(strtolower($fromUnit)) {
            "s" => $unit,
            "dias" => $unit * self::DAY_TO_S,
            "h" => $unit * self::HOUR_TO_S,
            "min" => $unit * self::MIN_TO_S,
            "ms" => $unit * self::MS_TO_S,
            default => throw new \InvalidArgumentException("Unidade de Origem inválida: " . $fromUnit)
        };

        return match(strtolower($toUnit)) {
            "s" => $baseUnit,
            "dias" => $baseUnit / self::DAY_TO_S,
            "h" => $baseUnit / self::HOUR_TO_S,
            "min" => $baseUnit / self::MIN_TO_S,
            "ms" => $baseUnit / self::MS_TO_S,
            default => throw new \InvalidArgumentException("Unidade de Destino inválida: " . $toUnit)
        };
    }
}