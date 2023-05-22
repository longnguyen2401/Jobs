<?php

namespace App\Traits;

use Carbon\Carbon;

trait MonthTrait
{  
    /**
    * Update file
    *
    * @param array $data
    * @return array
    */
    public function handleTime(array $data): array
    {
        if (isset($data['start'])) {
            $data['start'] = Carbon::create($data['start'])->startOfMonth();
        }

        if (isset($data['end'])) {
            $data['end'] = Carbon::create($data['end'])->lastOfMonth();
        }

        if (isset($data['time'])) {
            $data['time'] = Carbon::create($data['time'])->lastOfMonth();
        }
        
        return $data;
    }

}