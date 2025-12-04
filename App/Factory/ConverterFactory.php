<?php
namespace App\Factory;

use App\Controller\Volume;
use App\Controller\Consume;
use App\Controller\Weight;
use App\Controller\Time;
use App\Controller\Temperature;
use App\Controller\Distance;

class ConverterFactory {
    public static function create(string $unitType) {
        return match(strtolower($unitType)) {
            "temperature" => new Temperature(),
            "distance" => new Distance(),
            "weight" => new Weight(),
            "time" => new Time(),
            "volume" => new Volume(),
            "consume" => new Consume(),

            default => throw new \InvalidArgumentException("Tipo de conversão não suportada!")
        };
    }
}