<?php

namespace App\Controller;


class Weight {
    private const G_TO_KG = 0.001;
    private const MG_TO_KG = 0.000001;
    private const LB_TO_KG = 0.453592;
    private const OZ_TO_KG = 0.0283495;
    private const TON_TO_KG = 1000.0;

    public function converter(float $unit, string $fromUnit, string $toUnit): float {
        $baseUnit = match(strtolower($fromUnit)) {
            'kg' => $unit,
            'g'  => $unit * self::G_TO_KG,
            'mg' => $unit * self::MG_TO_KG,
            'lb' => $unit * self::LB_TO_KG,
            'oz' => $unit * self::OZ_TO_KG,
            'ton'=> $unit * self::TON_TO_KG,
            default => throw new \InvalidArgumentException("Unidade de Origem (Massa) inválida: " . $fromUnit)
        };
        
        return match(strtolower($toUnit)) {
            'kg' => $baseUnit,
            'g'  => $baseUnit / self::G_TO_KG,
            'mg' => $baseUnit / self::MG_TO_KG,
            'lb' => $baseUnit / self::LB_TO_KG,
            'oz' => $baseUnit / self::OZ_TO_KG,
            'ton'=> $baseUnit / self::TON_TO_KG,
            default => throw new \InvalidArgumentException("Unidade de Destino (Massa) inválida: " . $toUnit)
        };
    }
}