<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait Ferragosto
{
    /**
     * Setting Ferragosto
     *
     * @param int $year The year to get the holiday in
     */
    private function setFerragosto(int $year)
    {
        return Carbon::create($year, 8, 15, 0, 0, 0);
    }

    /**
     * Return object of Ferragosto for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFerragostoHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Ferragosto", $year)[0];
    }
}
