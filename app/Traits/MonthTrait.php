<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\Request;

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
        if ($data['start']) {
            $data['start'] = Carbon::create($data['start'])->startOfMonth();
        }

        if ($data['end']) {
            $data['end'] = Carbon::create($data['end'])->lastOfMonth();
        }
        
        return $data;
    }

}