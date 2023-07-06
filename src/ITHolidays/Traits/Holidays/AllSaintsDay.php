<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait AllSaintsDay
{
    /**
     * Setting All Saints' Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setAllSaintsDay(int $year)
    {
        return Carbon::create($year, 11, 1, 0, 0, 0);
    }

    /**
     * Return object of All Saints' Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getAllSaintsDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("All Saints' Day", $year)[0];
    }
}
