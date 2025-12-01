<?php

namespace App\Controller;

use App\Interface\ConverterInterface;

class Consume implements ConverterInterface {
    private const FACTOR_L_100KM_TO_MPG_US = 235.21458;
    private const FACTOR_L_100KM_TO_MPG_UK = 282.48105;

    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseValue = match(strtolower($fromUnit)) {
            'l/100km' => $unit,
            'km/l' => (100.0 / $unit),
            'mpg (us)' => self::FACTOR_L_100KM_TO_MPG_US / $unit,
            'mpg (uk)' => self::FACTOR_L_100KM_TO_MPG_UK / $unit,
            default => throw new \InvalidArgumentException("Unidade de Origem (Consumo) inválida: $fromUnit")
        };

        return match(strtolower($toUnit)) {
            'l/100km' => $baseValue,
            'km/l' => (100.0 / $baseValue),
            'mpg (us)' => self::FACTOR_L_100KM_TO_MPG_US / $baseValue,
            'mpg (uk)' => self::FACTOR_L_100KM_TO_MPG_UK / $baseValue,
            default => throw new \InvalidArgumentException("Unidade de Destino (Consumo) inválida: " . $toUnit)
        };
    }
}