<?php
namespace Factory;

use Interface\ConverterInterface;

use Controller\Volume;
use Controller\Consume;
use Controller\Weight;
use Controller\Time;
use Controller\Temperature;
use Controller\Distance;

class ConverterFactory {
    public static function create(string $unitType): ConverterInterface {
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