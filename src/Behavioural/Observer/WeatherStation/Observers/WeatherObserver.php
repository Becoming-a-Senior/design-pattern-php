<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Observer\WeatherStation\Observers;

use DesignPattern\Behavioural\Observer\WeatherStation\WeatherStation;
use SplSubject;
use SplObserver;

/**
 * Base observer using the Template Method pattern.
 *
 * Handles the SplObserver::update() logic and delegates the
 * actual reaction to onWeatherChanged().
 */
abstract class WeatherObserver implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        if ($subject instanceof WeatherStation) {
            $this->onWeatherChanged($subject);
        }
    }

    abstract protected function onWeatherChanged(WeatherStation $station): void;
}
