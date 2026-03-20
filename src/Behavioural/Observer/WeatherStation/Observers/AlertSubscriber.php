<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Observer\WeatherStation\Observers;

use DesignPattern\Behavioural\Observer\WeatherStation\WeatherStation;

class AlertSubscriber extends WeatherObserver
{
    public function __construct(
        private readonly float $threshold = 35.0,
        private readonly float $minPressure = 980.0,
    ) {
    }

    protected function onWeatherChanged(WeatherStation $station): void
    {
        if ($station->getTemperature() > $this->threshold) {
            printf(
                "[Alert] High temperature: %.1f C (threshold: %.1f C)\n",
                $station->getTemperature(),
                $this->threshold,
            );
        }

        if ($station->getPressure() < $this->minPressure) {
            printf(
                "[Alert] Low pressure: %.1f (threshold: %.1f)\n",
                $station->getPressure(),
                $this->minPressure,
            );
        }
    }
}
