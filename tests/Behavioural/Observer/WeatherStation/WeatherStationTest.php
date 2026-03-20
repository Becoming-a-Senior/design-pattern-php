<?php

declare(strict_types=1);

namespace Tests\Behavioural\Observer\WeatherStation;

use DesignPattern\Behavioural\Observer\WeatherStation\Observers\AppSubscriber;
use DesignPattern\Behavioural\Observer\WeatherStation\WeatherStation;
use DesignPattern\Behavioural\Observer\WeatherStation\Observers\WeatherObserver;
use DesignPattern\Behavioural\Observer\WeatherStation\Observers\WebSubscriber;
use DesignPattern\Behavioural\Observer\WeatherStation\Observers\AlertSubscriber;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WeatherStation::class)]
class WeatherStationTest extends TestCase
{
    private WeatherStation $station;

    protected function setUp(): void
    {
        $this->station = new WeatherStation();
    }

    /**
     * @return WeatherObserver&object{callCount: int, lastStation: ?WeatherStation}
     */
    private function makeSpyObserver(): WeatherObserver
    {
        return new class extends WeatherObserver {
            public int $callCount = 0;
            public ?WeatherStation $lastStation = null;
            protected function onWeatherChanged(WeatherStation $station): void
            {
                $this->callCount++;
                $this->lastStation = $station;
            }
        };
    }

    public function testUpdatePassesTheCorrectStation(): void
    {
        $observer = $this->makeSpyObserver();

        $this->station->attach($observer);
        $this->station->recordMeasurement(20.0, 50.0, 1010.0);

        self::assertSame($this->station, $observer->lastStation);
    }

    public function testMultipleObserversAreAllNotified(): void
    {
        $first  = $this->makeSpyObserver();
        $second = $this->makeSpyObserver();
        $third  = $this->makeSpyObserver();

        $this->station->attach($first);
        $this->station->attach($second);
        $this->station->attach($third);

        $this->station->recordMeasurement(22.0, 65.0, 1015.0);

        self::assertSame(1, $first->callCount);
        self::assertSame(1, $second->callCount);
        self::assertSame(1, $third->callCount);
    }

    public function testNotifyOncePerRecordMeasurement(): void
    {
        $observer = $this->makeSpyObserver();

        $this->station->attach($observer);

        $this->station->recordMeasurement(20.0, 50.0, 1010.0);
        $this->station->recordMeasurement(21.0, 55.0, 1011.0);
        $this->station->recordMeasurement(22.0, 60.0, 1012.0);

        self::assertSame(3, $observer->callCount);
    }

    public function testMultipleRecordMeasurement(): void
    {
        $observer = self::createMock(WeatherObserver::class);
        $observer->expects(self::exactly(3))->method('update');

        $this->station->attach($observer);

        $this->station->recordMeasurement(20.0, 50.0, 1010.0);
        $this->station->recordMeasurement(21.0, 55.0, 1011.0);
        $this->station->recordMeasurement(22.0, 60.0, 1012.0);
    }

    public function testAppAndWebObservers(): void
    {
        $this->station->attach(new AppSubscriber());
        $this->station->attach(new WebSubscriber());

        $this->station->recordMeasurement(22.5, 60.0, 1013.0);

        $this->expectOutputString(
            "[App] 22.5 C  60.0 %  1013.0 \n" .
            "[Web] Temperature: 22.5 C\n" .
            "[Web] Humidity: 60.0 %\n"  .
            "[Web] Pressure: 1013.0 \n"
        );
    }

    public function testDetachedOneObserver(): void
    {
        $appObserver = new AppSubscriber();

        $this->station->attach($appObserver);
        $this->station->attach(new WebSubscriber());
        $this->station->detach($appObserver);

        $this->station->recordMeasurement(22.5, 60.0, 1013.0);

        $this->expectOutputString(
            "[Web] Temperature: 22.5 C\n" .
            "[Web] Humidity: 60.0 %\n"  .
            "[Web] Pressure: 1013.0 \n"
        );
    }

    public function testAlertObserverOnHighTemperature(): void
    {
        $this->station->attach(new AlertSubscriber(threshold: 35.0, minPressure: 980.0));
        $this->station->recordMeasurement(36.0, 50.0, 1010.0);

        $this->expectOutputString("[Alert] High temperature: 36.0 C (threshold: 35.0 C)\n");
    }

    public function testAlertObserverNoOutput(): void
    {
        $this->station->attach(new AlertSubscriber(threshold: 35.0, minPressure: 980.0));
        $this->station->recordMeasurement(20.0, 50.0, 1010.0);

        $this->expectOutputString('');
    }
}
