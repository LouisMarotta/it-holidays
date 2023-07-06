<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait Easter
{
    /**
     * Setting Easter
     *
     * @param int $year The year to get the holiday in
     */
    private function setEaster(int $year)
    {
        $days = $this->calculateEasterDate($year);
        
        $date = Carbon::create($year, $days["month"], $days["day"], 0, 0, 0);
        // $days = easter_days($year);

        return $date;
    }

    function calculateEasterDate($year)
    {
        $a = $year % 19;
        $b = (int) ($year / 100);
        $c = $year % 100;
        $d = (int) ($b / 4);
        $e = $b % 4;
        $f = (int) (($b + 8) / 25);
        $g = (int) (($b - $f + 1) / 3);
        $h = (19 * $a + $b - $d - $g + 15) % 30;
        $i = (int) ($c / 4);
        $k = $c % 4;
        $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
        $m = (int) (($a + 11 * $h + 22 * $l) / 451);
        $month = (int) (($h + $l - 7 * $m + 114) / 31);
        $day = ($h + $l - 7 * $m + 114) % 31 + 1;
        
        return ["year" => $year, "month" => $month, "day" => $day];
    }

    /**
     * Return object of Easter for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEasterHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Easter", $year)[0];
    }
}
