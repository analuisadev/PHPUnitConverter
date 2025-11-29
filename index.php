<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPUnitConverter</title>
</head>

<body>
    <header>
        <h1>Conversor Universal</h1>
        <p>Converta unidades de medida de forma rápida e precisa.</p>
    </header>
    <main>
        <div class="temperature">
            <div class="header">
                <div class="img"></div>
                <p>Temperatura</p>
            </div>

            <form>
                <div class="from">
                    <label for="temperatureInfo">De</label>
                    <input type="number" name="temperatureInfo" id="temperatureInfo" placeholdrer="0" />
                    <select>
                        <option>°C</option>
                        <option>°F</option>
                        <option>K</option>
                    </select>
                    <button type="submit">Converter</button>
                </div>
                <div class="to">
                    <label for="temperatureInfo">Para</label>
                    <input type="number" name="temperatureInfo" id="temperatureInfo" placeholdrer="0" />
                    <select>
                        <option>°C</option>
                        <option>°F</option>
                        <option>K</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="distance">
            <div class="header">
                <div class="img"></div>
                <p>Distância</p>
            </div>

            <form>
                <div class="from">
                    <label for="distanceInfo">De</label>
                    <input type="number" name="distanceInfo" id="distanceInfo" placeholdrer="0" />
                    <select>
                        <option>km</option>
                        <option>m</option>
                        <option>cm</option>
                        <option>mm</option>
                        <option>mi</option>
                        <option>ft</option>
                        <option>in</option>
                    </select>
                    <button type="submit">Converter</button>
                </div>
                <div class="to">
                    <label for="distanceInfo">Para</label>
                    <input type="number" name="distanceInfo" id="distanceInfo" placeholdrer="0" />
                    <select>
                        <option>km</option>
                        <option>m</option>
                        <option>cm</option>
                        <option>mm</option>
                        <option>mi</option>
                        <option>ft</option>
                        <option>in</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="weight">
            <div class="header">
                <div class="img"></div>
                <p>Massa (Peso)</p>
            </div>

            <form>
                <div class="from">
                    <label for="weightInfo">De</label>
                    <input type="number" name="weightInfo" id="weightInfo" placeholdrer="0" />
                    <select>
                        <option>kg</option>
                        <option>g</option>
                        <option>mg</option>
                        <option>lb</option>
                        <option>oz</option>
                        <option>ton</option>
                    </select>
                    <button type="submit">Converter</button>
                </div>
                <div class="to">
                    <label for="weightInfo">Para</label>
                    <input type="number" name="weightInfo" id="weightInfo" placeholdrer="0" />
                    <select>
                        <option>kg</option>
                        <option>g</option>
                        <option>mg</option>
                        <option>lb</option>
                        <option>oz</option>
                        <option>ton</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="time">
            <div class="header">
                <div class="img"></div>
                <p>Tempo</p>
            </div>

            <form>
                <div class="from">
                    <label for="timeInfo">De</label>
                    <input type="number" name="timeInfo" id="timeInfo" placeholdrer="0" />
                    <select>
                        <option>dias</option>
                        <option>h</option>
                        <option>min</option>
                        <option>s</option>
                        <option>ms</option>
                    </select>
                    <button type="submit">Converter</button>
                </div>
                <div class="to">
                    <label for="timeInfo">Para</label>
                    <input type="number" name="timeInfo" id="timeInfo" placeholdrer="0" />
                    <select>
                        <option>dias</option>
                        <option>h</option>
                        <option>min</option>
                        <option>s</option>
                        <option>ms</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="volume">
            <div class="header">
                <div class="img"></div>
                <p>Volume</p>
            </div>

            <form>
                <div class="from">
                    <label for="volumeInfo">De</label>
                    <input type="number" name="volumeInfo" id="volumeInfo" placeholdrer="0" />
                    <select>
                        <option>L</option>
                        <option>mL</option>
                        <option>m³</option>
                        <option>gal (US)</option>
                        <option>fi oz</option>
                        <option>cup</option>
                    </select>
                    <button type="submit">Converter</button>
                </div>
                <div class="to">
                    <label for="volumeInfo">Para</label>
                    <input type="number" name="volumeInfo" id="volumeInfo" placeholdrer="0" />
                    <select>
                        <option>L</option>
                        <option>mL</option>
                        <option>m³</option>
                        <option>gal (US)</option>
                        <option>fi oz</option>
                        <option>cup</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="consumption">
            <div class="header">
                <div class="img"></div>
                <p>Consumo</p>
            </div>

            <form>
                <div class="from">
                    <label for="consumptionInfo">De</label>
                    <input type="number" name="consumptionInfo" id="consumptionInfo" placeholdrer="0" />
                    <select>
                        <option>km/L</option>
                        <option>L/100km</option>
                        <option>mpg (US)</option>
                        <option>mpg (UK)</option>
                    </select>
                    <button type="submit">Converter</button>
                </div>
                <div class="to">
                    <label for="consumptionInfo">Para</label>
                    <input type="number" name="consumptionInfo" id="consumptionInfo" placeholdrer="0" />
                    <select>
                        <option>km/L</option>
                        <option>L/100km</option>
                        <option>mpg (US)</option>
                        <option>mpg (UK)</option>
                    </select>
                </div>
            </form>
        </div>
    </main>
</body>

</html>