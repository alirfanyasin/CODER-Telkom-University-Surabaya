<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\RadarChart as OriginalRadarChart;
use marineusde\LarapexCharts\Options\XAxisOption;


class PresenceChart
{
    public function build(): OriginalRadarChart
    {
        return (new OriginalRadarChart)
            ->addData('Stats', [70, 93, 78, 97, 50, 90])
            ->setXAxisOption(new XAxisOption(['Pass', 'Dribble', 'Shot', 'Stamina', 'Long shots', 'Tactical']))
            // ->setXAxis(['Pass', 'Dribble', 'Shot', 'Stamina', 'Long shots', 'Tactical'])
            ->setMarkers(['#303F9F'], 7, 10);
    }
}
