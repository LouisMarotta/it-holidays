<?php

namespace ITHolidays\Traits\Holidays;

trait RepublicDay
{
    /**
     * Setting Republic Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setRepublicDay(int $year)
    {
        return Carbon::create($year, 6, 2, 0, 0, 0);
    }

    /**
     * Return object of Republic Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getRepublicDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Republic Day", $year)[0];
    }
}
