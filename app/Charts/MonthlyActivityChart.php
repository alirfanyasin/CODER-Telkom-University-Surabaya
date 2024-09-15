<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\BarChart as OriginalBarChart;
use marineusde\LarapexCharts\Options\XAxisOption;

class MonthlyActivityChart
{
    public function build(): OriginalBarChart
    {
        return (new OriginalBarChart)
            ->addData('Modul', [40, 93, 35, 42, 18, 82, 34, 67, 89, 37, 12, 34, 69])
            ->addData('Tugas', [70, 29, 77, 28, 55, 29, 28, 55, 45, 77, 28, 55, 45])
            ->addData('Kuis', [70, 89, 37, 12, 34, 69, 73, 88, 29, 77, 28, 55, 45])
            ->addData('Presensi', [70, 29, 77, 28, 45, 55, 45, 43, 65, 45, 34, 23, 23])
            ->setColors(['#002FED', '#680000', '#FFFFFF', '#565656'])
            ->setFontColor('#FFFFFF')
            ->setHeight(400)
            ->setXAxisOption(new XAxisOption(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des']));
    }
}
