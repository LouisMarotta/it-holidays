<?php

namespace ITHolidays\Traits;

use ITHolidays\Carbon;

use ITHolidays\Traits\Holidays\ChristmasDay;
use ITHolidays\Traits\Holidays\ChristmasEve;
use ITHolidays\Traits\Holidays\Easter;
use ITHolidays\Traits\Holidays\LaborDay;
use ITHolidays\Traits\Holidays\NewYearsDay;
use ITHolidays\Traits\Holidays\PalmSunday;
use ITHolidays\Traits\Holidays\Epiphany;

trait Holiday
{
    use ChristmasDay;
    use ChristmasEve;
    use Easter;
    use LaborDay;
    use NewYearsDay;
    use PalmSunday;
    use Epiphany;

    /**
     * Get holiday data
     *
     * @param int|null $year The year to get the holidays in
     */
    private function holidays(int $year = null ) {
        $this->setTime(0,0,0);
        $holidays = array(
            array(
                'name' => "Christmas Day",
                'search_names' => ["CHRISTMAS DAY", "CHRISTMAS"],
                'date' => function() use ($year) {
                    return $this->setChristmasDay($year);
                },
                'bank_holiday' => true,
                'federal_holiday' => true,
                'start_year' => 336,
                'end_year' => null,
                'bank_holiday_start_year' => 1870,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => 1870,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "Christmas Eve",
                'search_names' => ["CHRISTMAS EVE"],
                'date' => function() use ($year) {
                    return $this->setChristmasEve($year);
                },
                'bank_holiday' => false,
                'federal_holiday' => false,
                'start_year' => 336,
                'end_year' => null,
                'bank_holiday_start_year' => null,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => null,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "Easter",
                'search_names' => ["EASTER"],
                'date' => function() use ($year) {
                    return $this->setEaster($year);
                },
                'bank_holiday' => false,
                'federal_holiday' => false,
                'start_year' => 300,
                'end_year' => null,
                'bank_holiday_start_year' => null,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => null,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "Labor Day",
                'search_names' => ["LABOR DAY"],
                'date' => function() use ($year) {
                    return $this->setLaborDay($year);
                },
                'bank_holiday' => true,
                'federal_holiday' => true,
                'start_year' => 1882,
                'end_year' => null,
                'bank_holiday_start_year' => 1894,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => 1894,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "New Year's Day",
                'search_names' => ["NEW YEAR'S DAY", "NEW YEARS DAY", "NEW YEARS"],
                'date' => function() use ($year) {
                    return $this->setNewYearsDay($year);
                },
                'bank_holiday' => true,
                'federal_holiday' => true,
                'start_year' => -2000,
                'end_year' => null,
                'bank_holiday_start_year' => 1885,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => 1885,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "New Year's Eve",
                'search_names' => ["NEW YEAR'S EVE", "NEW YEARS EVE"],
                'date' => function() use ($year) {
                    return $this->setNewYearsEve($year);
                },
                'bank_holiday' => false,
                'federal_holiday' => false,
                'start_year' => -2000,
                'end_year' => null,
                'bank_holiday_start_year' => null,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => null,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "Palm Sunday",
                'search_names' => ["PALM SUNDAY"],
                'date' => function() use ($year) {
                    return $this->setPalmSunday($year);
                },
                'bank_holiday' => false,
                'federal_holiday' => false,
                'start_year' => 500,
                'end_year' => null,
                'bank_holiday_start_year' => null,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => null,
                'federal_holiday_end_year' => null,
            ),
            array(
                'name' => "Epiphany",
                'search_names' => ["EPIPHANY"],
                'date' => function() use ($year) {
                    return $this->setEpiphany($year);
                },
                'bank_holiday' => true,
                'federal_holiday' => true,
                'start_year' => 1990,
                'end_year' => null,
                'bank_holiday_start_year' => null,
                'bank_holiday_end_year' => null,
                'federal_holiday_start_year' => null,
                'federal_holiday_end_year' => null,
            )
        );

        foreach ($holidays as $key => $holiday) {

            if(!in_array($holiday['name'], $this->holidayArray) && !array_intersect($holiday['search_names'], $this->holidayArray)) {
                unset($holidays[$key]);
            }

            if($this->bankHolidayArray != ['default']) {
                if(in_array($holiday['name'], $this->bankHolidayArray) || array_intersect($holiday['search_names'], $this->bankHolidayArray)) {
                    $holidays[$key]['bank_holiday'] = true;
                } else {
                    $holidays[$key]['bank_holiday'] = false;
                }
            }
        }

        $userHolidays = $this->userAddedHolidays;

        foreach ($userHolidays as $userHoliday) {

            if(is_callable($userHoliday['date'])) {
                $date = $userHoliday['date'];
            } else {
                $date = function() use ($year, $userHoliday) {
                    $day = $userHoliday['date']->day;
                    $month = $userHoliday['date']->month;
                    return Carbon::create($year, $month, $day, 0, 0, 0);
                };
            }

            $bankHoliday = $userHoliday['bank_holiday'] ?? false;
            $federalHoliday = $userHoliday['federal_holiday'] ?? false;

            $holidays[] =
                array(
                    'name' => $userHoliday['name'],
                    'search_names' => [\strtoupper($userHoliday['name']), \strtoupper(\str_replace("'", '', $userHoliday['name']))],
                    'date' => $date,
                    'bank_holiday' => $bankHoliday,
                    'federal_holiday' => $federalHoliday,
                    'start_year' => null,
                    'end_year' => null,
                    'bank_holiday_start_year' => null,
                    'bank_holiday_end_year' => null,
                    'federal_holiday_start_year' => null,
                    'federal_holiday_end_year' => null,
                );
        }

        return array_values($holidays);
    }
}
