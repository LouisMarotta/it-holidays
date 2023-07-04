<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait Epiphany
{
    /**
     * Setting Epiphany
     *
     * @param int $year The year to get the holiday in
     */
    private function setEpiphany(int $year)
    {
        return Carbon::create($year, 1, 6, 0, 0, 0);
    }

    /**
     * Return object of Epiphany for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEpiphany(int $year = null)
    {
        return $this->getHolidaysByYear("Epiphany", $year)[0];
    }
}
