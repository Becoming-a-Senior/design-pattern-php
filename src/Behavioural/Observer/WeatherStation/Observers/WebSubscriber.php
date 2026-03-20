<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Observer\WeatherStation\Observers;

use DesignPattern\Behavioural\Observer\WeatherStation\WeatherStation;

class WebSubscriber extends WeatherObserver
{
    protected function onWeatherChanged(WeatherStation $station): void
    {
        printf("[Web] Temperature: %.1f C\n", $station->getTemperature());
        printf("[Web] Humidity: %.1f %%\n", $station->getHumidity());
        printf("[Web] Pressure: %.1f \n", $station->getPressure());
    }
}
