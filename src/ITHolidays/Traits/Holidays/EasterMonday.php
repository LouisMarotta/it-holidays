<?php

namespace ITHolidays\Traits\Holidays;

use ITHolidays\Carbon;

trait EasterMonday
{
    /**
     * Setting Easter Monday
     *
     * @param int $year The year to get the holiday in
     */
    private function setEasterMonday(int $year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);

        return $date->addDays($days + 1);
    }

    /**
     * Return object of Easter Monday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEasterMondayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Easter Monday", $year)[0];
    }
}
