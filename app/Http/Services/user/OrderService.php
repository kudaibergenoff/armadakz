<?php


namespace App\Http\Services\user;


class OrderService
{
    public function filters($ordersQuery)
    {
        if(isset($_GET['search']))
        {
            $query = !empty(trim($_GET['search'])) ? trim($_GET['search']) : null;
            $ordersQuery = $ordersQuery->where('title','LIKE','%'.$query.'%');
        }

        if(isset($_GET['status']))
        {
            if($_GET['status'] == 'up')
            {
                $ordersQuery = $ordersQuery->orderBy('status_id','asc');
            }
            elseif($_GET['status'] == 'down')
            {
                $ordersQuery = $ordersQuery->orderBy('status_id','desc');
            }
        }
        elseif(isset($_GET['date']))
        {
            if($_GET['date'] == 'up')
            {
                $ordersQuery = $ordersQuery->orderBy('created_at','asc');
            }
            elseif($_GET['date'] == 'down')
            {
                $ordersQuery = $ordersQuery->orderBy('created_at','desc');
            }
        }
        elseif(isset($_GET['price']))
        {
            if($_GET['price'] == 'up')
            {
                $ordersQuery = $ordersQuery->orderBy('price','asc');
            }
            elseif($_GET['price'] == 'down')
            {
                $ordersQuery = $ordersQuery->orderBy('price','desc');
            }
        }
        else
        {
            $ordersQuery = $ordersQuery->orderBy('created_at','desc');
        }
//dd($ordersQuery->pluck('price'));
        return $ordersQuery;
    }
}
