<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Observer\WeatherStation\Observers;

use DesignPattern\Behavioural\Observer\WeatherStation\WeatherStation;

class AppSubscriber extends WeatherObserver
{
    protected function onWeatherChanged(WeatherStation $station): void
    {
        printf(
            "[App] %.1f C  %.1f %%  %.1f \n",
            $station->getTemperature(),
            $station->getHumidity(),
            $station->getPressure(),
        );
    }
}
