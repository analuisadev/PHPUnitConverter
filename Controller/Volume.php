<?php

namespace Controller;

use Interface\ConverterInterface;

class Volume implements ConverterInterface {
    private const ML_TO_L = 0.001;
    private const M3_TO_L = 1000.0;
    private const GAL_US_TO_L = 3.78541;
    private const FI_OZ_TO_L = 0.0295735;
    private const CUP_TO_L = 0.236588;

    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseValue = match(strtolower($fromUnit)) {
            'l'  => $unit,
            'ml' => $unit * self::ML_TO_L,
            'm³' => $unit * self::M3_TO_L,
            'gal (us)' => $unit * self::GAL_US_TO_L,
            'fi oz' => $unit * self::FI_OZ_TO_L,
            'cup' => $unit * self::CUP_TO_L,
            default => throw new \InvalidArgumentException("Unidade de Origem (Volume) inválida: " . $fromUnit)
        };
        
        return match(strtolower($toUnit)) {
            'l'  => $baseValue,
            'ml' => $baseValue / self::ML_TO_L,
            'm³' => $baseValue / self::M3_TO_L,
            'gal (us)' => $baseValue / self::GAL_US_TO_L,
            'fi oz' => $baseValue / self::FI_OZ_TO_L,
            'cup' => $baseValue / self::CUP_TO_L,
            default => throw new \InvalidArgumentException("Unidade de Destino (Volume) inválida: " . $toUnit)
        };
    }
}