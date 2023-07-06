<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait StStephenDay
{
    /**
     * Setting Saint Stephen's Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setStStephenDay(int $year)
    {
        return Carbon::create($year, 12, 26, 0, 0, 0);
    }

    /**
     * Return object of Saint Stephen's Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getStStephenDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Saint Stephen's Day", $year)[0];
    }
}
