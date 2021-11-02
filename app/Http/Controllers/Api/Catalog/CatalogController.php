<?php

namespace App\Http\Controllers\Api\Catalog;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function get(Request $request)
    {
        $catalogs = Catalog::with('subcatalogs:id,title,catalog_id', 'subcatalogs.items:id,title,subcatalog_id')->where('id', $request->id)->select('id', 'title')->get();

        if(count($catalogs) > 0)
        {
            return response()->json(['success' => true, 'catalogs' => $catalogs]);
        }

        return response()->json(['success' => false, 'data' => []]);
    }
}
