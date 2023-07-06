<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait InternationalWorkersDay
{
    /**
     * Setting International Worker's Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setInternationalWorkersDay(int $year)
    {
        return Carbon::create($year, 5, 1, 0, 0, 0);
    }

    /**
     * Return object of International Worker's Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getInternationalWorkersDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("International Worker's Day", $year)[0];
    }
}
