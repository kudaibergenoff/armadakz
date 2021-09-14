<?php

namespace App\Http\Services;

class StoreService
{
    public function adminFilter($storesQuery)
    {
        if(isset($_GET['store']) and is_numeric($_GET['store']))
        {
            $storesQuery = $storesQuery->where('store_id',$_GET['store']);
        }
        return $storesQuery;
    }

    public function workTimes($request)
    {

        foreach ($request['day_start'] as $day_start)
        {
            $dayStart[] = $day_start != null ? $day_start : null;
        }
        foreach ($request['day_end'] as $day_end)
        {
            $dayEnd[] = $day_end != null ? $day_end : null;
        }
        foreach ($request['time_start'] as $time_start)
        {
            $timeStart[] = $time_start != null ? $time_start : null;
        }
        foreach ($request['time_end'] as $time_end)
        {
            $timeEnd[] = $time_end != null ? $time_end : null;
        }
        $workTimes = null;
        for($i = 0;$i < 3 ;$i++)
        {
            if(isset($dayStart[$i]) and $dayStart[$i] != null and isset($dayEnd[$i]) and $dayEnd[$i] != null and isset($timeStart[$i]) and $timeStart[$i] != null and isset($timeEnd[$i]) and $timeEnd[$i] != null)
            {
                $workTimes[] = $dayStart[$i] . '-' . $dayEnd[$i] . ' ' . $timeStart[$i] . '-' . $timeEnd[$i];
            }
        }

        if($workTimes == null)
        {
            return back()->with('error','Не введено время работы')->send();
        }

        return $workTimes;
    }
}
