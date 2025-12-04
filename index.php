<?php
session_start();

require_once 'vendor/autoload.php';

use App\Factory\ConverterFactory;

$results = [
    "temperature" => '0',
    "distance" => '0',
    "weight" => '0',
    "time" => '0',
    "volume" => '0',
    "consume" => '0'
];

if (isset($_GET['type'], $_GET['value'], $_GET['from_unit'], $_GET['to_unit'])) {

    $unit = (float) $_GET['value'];
    $type = strtolower($_GET['type']);
    $fromUnit = $_GET['from_unit'];
    $toUnit = $_GET['to_unit'];

    try {
        $converter = ConverterFactory::create($type);
        
        $converterUnit = $converter->converter($unit, $fromUnit, $toUnit);

        $results[$type] = number_format($converterUnit, 2, '.', '');

    } catch (\InvalidArgumentException $error) {
        $results[$type] = "Erro: " . $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />
    <title>PHPUnitConverter</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        .icon {
            display: inline-block;
            margin-right: 8px;
            color: #10b981;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-4 md:p-8">
    <header class="text-center mb-6">
        <h1 class="text-4xl font-extrabold text-gray-900">PHPUnitConverter</h1>
        <p class="text-gray-500 mt-2">Converta unidades de medida de forma rápida e precisa.</p>
    </header>

    <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">

        <!-- Temperatura -->
        <div class="temperature bg-white p-6 rounded-xl shadow-md border border-emerald-200 w-100">
            <div class="header flex items-center mb-4 pb-2 border-b border-gray-100">
                <span class="icon text-2xl" aria-label="Ícone de termômetro"><i class="ph ph-thermometer-simple"></i></span>
                <p class="text-xl font-semibold text-emerald-600">Temperatura</p>
            </div>

            <form method="GET" action="index.php" class="w-100">
                <input type="hidden" name="type" value="temperature" />

                <div class="from space-y-4 mb-4 w-100">
                    <label for="temperatureInfo" class="block text-sm font-medium text-gray-700">De</label>
                    <div class="flex space-x-2 w-100">
                        <input type="number" name="value" id="temperatureInfo" placeholder="0" step="any" required
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition duration-150"/>

                        <select name="from_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="C">°C</option>
                            <option value="F">°F</option>
                            <option value="K">K</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="p-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition duration-200 shadow-md">
                        Converter
                    </button>
                </div>

                <div class="to space-y-4">
                    <label for="temperatureResult" class="block text-sm font-medium text-gray-700">Para</label>
                    <div class="flex space-x-2">
                        <select name="to_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="F">°F</option>
                            <option value="C">°C</option>
                            <option value="K">K</option>
                        </select>
                        <input type="text" name="temperatureResult" id="temperatureResult"
                            class="flex-1 p-3 border border-emerald-500 bg-emerald-50 rounded-lg font-bold text-gray-800"
                            value="<?php echo $results['temperature']; ?>" readonly />
                    </div>
                </div>
            </form>
        </div>

        <!-- Distância -->
        <div class="distance bg-white p-6 rounded-xl shadow-md border border-emerald-200">
            <div class="header flex items-center mb-4 pb-2 border-b border-gray-100">
                <span class="icon text-2xl" aria-label="Ícone de régua"><i class="ph ph-ruler"></i></span>
                <p class="text-xl font-semibold text-emerald-600">Distância</p>
            </div>

            <form method="GET" action="index.php">
                <input type="hidden" name="type" value="distance" />

                <div class="from space-y-4 mb-4">
                    <label for="distanceInfo" class="block text-sm font-medium text-gray-700">De</label>
                    <div class="flex space-x-2">
                        <input type="number" name="value" id="distanceInfo" placeholder="0" step="any" required
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"/>

                        <select name="from_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="km">km</option>
                            <option value="m">m</option>
                            <option value="cm">cm</option>
                            <option value="mm">mm</option>
                            <option value="mi">mi</option>
                            <option value="ft">ft</option>
                            <option value="in">in</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="p-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition duration-200 shadow-md">
                        Converter
                    </button>
                </div>

                <div class="to space-y-4">
                    <label for="distanceResult" class="block text-sm font-medium text-gray-700">Para</label>
                    <div class="flex space-x-2">
                        <select name="to_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="m">m</option>
                            <option value="km">km</option>
                            <option value="mi">mi</option>
                            <option value="ft">ft</option>
                        </select>
                        <input type="text" name="distanceResult" id="distanceResult"
                            class="flex-1 p-3 border border-emerald-500 bg-emerald-50 rounded-lg font-bold text-gray-800"
                            value="<?php echo $results['distance']; ?>" readonly />
                    </div>
                </div>
            </form>
        </div>

        <!-- Massa (Peso) -->
        <div class="weight bg-white p-6 rounded-xl shadow-md border border-emerald-200">
            <div class="header flex items-center mb-4 pb-2 border-b border-gray-100">
                <span class="icon text-2xl" aria-label="Ícone de balança"><i class="ph ph-scales"></i></span>
                <p class="text-xl font-semibold text-emerald-600">Massa (Peso)</p>
            </div>

            <form method="GET" action="index.php">
                <input type="hidden" name="type" value="weight" />

                <div class="from space-y-4 mb-4">
                    <label for="weightInfo" class="block text-sm font-medium text-gray-700">De</label>
                    <div class="flex space-x-2">
                        <input type="number" name="value" id="weightInfo" placeholder="0" step="any" required
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"/>

                        <select name="from_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="mg">mg</option>
                            <option value="lb">lb</option>
                            <option value="oz">oz</option>
                            <option value="ton">ton</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="p-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition duration-200 shadow-md">
                        Converter
                    </button>
                </div>

                <div class="to space-y-4">
                    <label for="weightResult" class="block text-sm font-medium text-gray-700">Para</label>
                    <div class="flex space-x-2">
                        <select name="to_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="g">g</option>
                            <option value="kg">kg</option>
                            <option value="lb">lb</option>
                            <option value="oz">oz</option>
                        </select>
                        <input type="text" name="weightResult" id="weightResult"
                            class="flex-1 p-3 border border-emerald-500 bg-emerald-50 rounded-lg font-bold text-gray-800"
                            value="<?php echo $results['weight']; ?>" readonly />
                    </div>
                </div>
            </form>
        </div>

        <!-- Tempo -->
        <div class="time bg-white p-6 rounded-xl shadow-md border border-emerald-200">
            <div class="header flex items-center mb-4 pb-2 border-b border-gray-100">
                <span class="icon text-2xl" aria-label="Ícone de relógio"><i class="ph ph-timer"></i></span>
                <p class="text-xl font-semibold text-emerald-600">Tempo</p>
            </div>

            <form method="GET" action="index.php">
                <input type="hidden" name="type" value="time" />

                <div class="from space-y-4 mb-4">
                    <label for="timeInfo" class="block text-sm font-medium text-gray-700">De</label>
                    <div class="flex space-x-2">
                        <input type="number" name="value" id="timeInfo" placeholder="0" step="any" required
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"/>

                        <select name="from_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="dias">dias</option>
                            <option value="h">h</option>
                            <option value="min">min</option>
                            <option value="s">s</option>
                            <option value="ms">ms</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="p-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition duration-200 shadow-md">
                        Converter
                    </button>
                </div>

                <div class="to space-y-4">
                    <label for="timeResult" class="block text-sm font-medium text-gray-700">Para</label>
                    <div class="flex space-x-2">
                        <select name="to_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="h">h</option>
                            <option value="min">min</option>
                            <option value="s">s</option>
                        </select>
                        <input type="text" name="timeResult" id="timeResult"
                            class="flex-1 p-3 border border-emerald-500 bg-emerald-50 rounded-lg font-bold text-gray-800"
                            value="<?php echo $results['time']; ?>" readonly />
                    </div>
                </div>
            </form>
        </div>

        <!-- Volume -->
        <div class="volume bg-white p-6 rounded-xl shadow-md border border-emerald-200">
            <div class="header flex items-center mb-4 pb-2 border-b border-gray-100">
                <span class="icon text-2xl" aria-label="Ícone de garrafa"><i class="ph ph-pint-glass"></i></span>
                <p class="text-xl font-semibold text-emerald-600">Volume</p>
            </div>

            <form method="GET" action="index.php">
                <input type="hidden" name="type" value="volume" />

                <div class="from space-y-4 mb-4">
                    <label for="volumeInfo" class="block text-sm font-medium text-gray-700">De</label>
                    <div class="flex space-x-2">
                        <input type="number" name="value" id="volumeInfo" placeholder="0" step="any" required
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"/>

                        <select name="from_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="L">L</option>
                            <option value="mL">mL</option>
                            <option value="m³">m³</option>
                            <option value="gal (US)">gal (US)</option>
                            <option value="fi oz">fi oz</option>
                            <option value="cup">cup</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="p-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition duration-200 shadow-md">
                        Converter
                    </button>
                </div>

                <div class="to space-y-4">
                    <label for="volumeResult" class="block text-sm font-medium text-gray-700">Para</label>
                    <div class="flex space-x-2">
                        <select name="to_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="mL">mL</option>
                            <option value="L">L</option>
                            <option value="gal (US)">gal (US)</option>
                        </select>
                        <input type="text" name="volumeResult" id="volumeResult"
                            class="flex-1 p-3 border border-emerald-500 bg-emerald-50 rounded-lg font-bold text-gray-800"
                            value="<?php echo $results['volume']; ?>" readonly />
                    </div>
                </div>
            </form>
        </div>

        <!-- Consumo -->
        <div class="consume bg-white p-6 rounded-xl shadow-md border border-emerald-200">
            <div class="header flex items-center mb-4 pb-2 border-b border-gray-100">
                <span class="icon text-2xl" aria-label="Ícone de bomba de combustível"><i class="ph ph-gas-pump"></i></span>
                <p class="text-xl font-semibold text-emerald-600">Consumo</p>
            </div>

            <form method="GET" action="index.php">
                <input type="hidden" name="type" value="consume" />

                <div class="from space-y-4 mb-4">
                    <label for="consumeInfo" class="block text-sm font-medium text-gray-700">De</label>
                    <div class="flex space-x-2">
                        <input type="number" name="value" id="consumeInfo" placeholder="0" step="any" required
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"/>

                        <select name="from_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="km/L">km/L</option>
                            <option value="L/100km">L/100km</option>
                            <option value="mpg (US)">mpg (US)</option>
                            <option value="mpg (UK)">mpg (UK)</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="p-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition duration-200 shadow-md">
                        Converter
                    </button>

                </div>

                <div class="to space-y-4">
                    <label for="consumeResult" class="block text-sm font-medium text-gray-700">Para</label>
                    <div class="flex space-x-2">
                        <select name="to_unit"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="L/100km">L/100km</option>
                            <option value="km/L">km/L</option>
                            <option value="mpg (US)">mpg (US)</option>
                        </select>
                        <input type="text" name="consumeResult" id="consumeResult"
                            class="flex-1 p-3 border border-emerald-500 bg-emerald-50 rounded-lg font-bold text-gray-800"
                            value="<?php echo $results['consume']; ?>" readonly />
                    </div>
                </div>
            </form>
        </div>

    </main>
</body>

</html>