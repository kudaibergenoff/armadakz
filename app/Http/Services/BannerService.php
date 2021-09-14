<?php


namespace App\Http\Services;


use App\Models\Banner;
use Illuminate\Support\Str;

class BannerService
{
    public function dateStart($data,$period)
    {
        $dateStart = $period != null
            ? Str::before($period, ' - ')
            : $data->getOriginal('start_at');
        return $dateStart;
    }

    public function dateEnd($data,$period)
    {
        $dateEnd = $period != null
            ? Str::after($period, ' - ')
            : $data->getOriginal('end_at');
        return $dateEnd;
    }

    public static function views($type,$take = null)
    {
        $bannersQuery = Banner::isActive()
            ->where('start_at','<',now())
            ->where('end_at','>',now())
            ->where('type_id',$type);
        $bannersQuery = $take != null
            ? $bannersQuery->take($take)
            : $bannersQuery;
        $banners = $bannersQuery->get();

        foreach ($banners as $banner)
        {
            $banner->views = $banner->getOriginal('views') + 1;
            $banner->save();
        }

        return $banners;
    }
}
