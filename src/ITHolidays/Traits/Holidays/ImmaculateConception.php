<?php

namespace ITHolidays\Traits\Holidays;

trait ImmaculateConception
{
    /**
     * Setting Immaculate Conception
     *
     * @param int $year The year to get the holiday in
     */
    private function setImmaculateConception(int $year)
    {
        return Carbon::create($year, 12, 8, 0, 0, 0);
    }

    /**
     * Return object of Immaculate Conception for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getImmaculateConceptionHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Immaculate Conception", $year)[0];
    }
}
