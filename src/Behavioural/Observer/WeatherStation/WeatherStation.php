<?php

declare(strict_types=1);

namespace DesignPattern\Behavioural\Observer\WeatherStation;

use SplSubject;
use SplObjectStorage;
use SplObserver;

class WeatherStation implements SplSubject
{
    /** @var SplObjectStorage<SplObserver, null> */
    private SplObjectStorage $observers;
    public function __construct(
        private float $temperature = 0.0,
        private float $humidity = 0.0,
        private float $pressure = 0.0
    ) {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        //SplObjectStorage::detach() is deprecated since 8.5
        $this->observers->offsetSet($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->offsetUnset($observer);
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     * @return void
     */
    public function recordMeasurement(
        float $temperature,
        float $humidity,
        float $pressure
    ): void {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->notify();
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }
    /**
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }
    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }
}
