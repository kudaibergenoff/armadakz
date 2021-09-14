<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Color;
use App\Models\Country;
use App\Models\Item;
use App\Models\Product;
use App\Models\Store;
use App\Models\Subcatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Mtownsend\XmlToArray\XmlToArray;

class ProductControllerAdmin extends Controller
{
    protected $service;
    protected $productService;

    public function __construct(Service $service, ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getForIndex_products();
        $stores = $this->productService->getForIndex_allStores();
//        $catalogs = $this->productService->getForIndex_allCatalogs();
//        $subcatalogs = $this->productService->getForIndex_allSubcatalogs();
        $items = $this->productService->getForIndex_allItems();

        $countries = $this->productService->getForIndex_allCountries();

        return view('admin.products.index',compact('products','stores','items','countries'));
    }

    public function create()
    {
        $stores = $this->productService->getForCredit_stores();
        $this->productService->ifNotStore($stores);

        $items = $this->productService->getForCredit_items();
        $subcatalogs = $this->productService->getForCredit_subcatalogs($items);
        $catalogs = $this->productService->getForCredit_catalogs($subcatalogs);
        $countries = $this->productService->getForCredit_countries();
        $colors = $this->productService->getForCredit_colors();
        $presences = $this->productService->getForCredit_presences();
        $deliveries = $this->productService->getForCredit_deliveries();
        $pays = $this->productService->getForCredit_pays();

        return view('admin.products.credit',compact('stores','catalogs','subcatalogs','items','countries','colors','presences', 'deliveries','pays'));
    }

    public function store(Request $request)
    {
        $data = Product::add($request->all());
        $data->user_id = Auth::id();
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->isJson($request,'colors');
        $data->isJson($request,'delivery_ids');
        $data->isJson($request,'pay_ids');
        $data->isBoolean($request,'is_hot');
        $data->isBoolean($request,'is_slug');
        $data->isBoolean($request,'is_discount');
        $data->save();

        return redirect()->route('admin.products.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $this->service->ifNotAdmin($data);

        $stores = $this->productService->getForCredit_stores();
        $this->productService->ifNotStore($stores);

        $items = $this->productService->getForCredit_items();
        $subcatalogs = $this->productService->getForCredit_subcatalogs($items);
        $catalogs = $this->productService->getForCredit_catalogs($subcatalogs);
        $countries = $this->productService->getForCredit_countries();
        $colors = $this->productService->getForCredit_colors();
        $presences = $this->productService->getForCredit_presences();
        $deliveries = $this->productService->getForCredit_deliveries();
        $pays = $this->productService->getForCredit_pays();

        return view('admin.products.credit',compact('data','stores','catalogs','subcatalogs','items','countries','colors','presences', 'deliveries','pays'));
    }

    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);
        $this->service->ifNotAdmin($data);
        $data->edit($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->isJson($request,'colors');
        $data->isJson($request,'delivery_ids');
        $data->isJson($request,'pay_ids');
        $data->isBoolean($request,'is_hot');
        $data->isBoolean($request,'is_slug');
        $data->isBoolean($request,'is_discount');
        $data->save();

        return redirect()->route('admin.products.index')->with('success','Информация сохранена');
    }

    public function destroy($id)
    {
        $id = explode(',', $id);

        if(!is_array($id))
        {
            $id[] = $id;
        }

        foreach ($id as $item)
        {
            $data = Product::find($item);
            $this->service->ifNotAdmin($data);

            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Товары удалены');
        } else {
            return back()->with('success','Товар удалён');
        }
    }


    private function XmlGetData()
    {
        $storeIds = Store::where('user_id',Auth::id())
            ->pluck('id');
        $productsQuery = Product::whereIn('store_id',$storeIds);

        $products = $productsQuery->select('id','manufacture','country_id','width','height','depth','colors','is_delivery','delivery_type','seo_title','meta_description','meta_tags','isActive','title','status','user_id','item_id','articul','store_id','images','price','price_2','stock','created_at','updated_at','description')
            ->with('store')
            ->get();

        return $products;
    }

    public function exportxmldata()
    {

        $data=$this->XmlGetData();
        // dd($data);
        $dom = new \DOMDocument();

        $dom->encoding = 'utf-8';

        $dom->xmlVersion = '1.0';

        $dom->formatOutput = true;
        $root = $dom->createElement('products');

        foreach ($data as $item)
        {
            $product_node = $dom->createElement('product');

            $child_node_id = $dom->createElement('id', $item->id);
            $product_node->appendChild($child_node_id);

            //     $product_node->appendChild($attr_product_id);
            $child_node_title = $dom->createElement('Title', $item->title);
            $product_node->appendChild($child_node_title);
            $child_node_isActive = $dom->createElement('IsActive', $item->isActive);
            $product_node->appendChild($child_node_isActive);
            //status
            $child_node_status = $dom->createElement('productstatus', $item->status);
            $product_node->appendChild($child_node_status);

            //end
            //user_id
            $child_node_userId = $dom->createElement('userId', $item->user_id);
            $product_node->appendChild($child_node_userId);

            //end
            //item id
            $child_node_itemId = $dom->createElement('itemId', $item->item_id);
            $product_node->appendChild($child_node_itemId);

            //end
            //articul
            $child_node_sku = $dom->createElement('sku', $item->articul);
            $product_node->appendChild($child_node_sku);

            //end
            //store_id
            $child_node_storeId = $dom->createElement('storeId', $item->store_id);
            $product_node->appendChild($child_node_storeId);

            //end
            //images
            $images=array();
            $images=$item->images;
            //dd($images);
            if (is_array($images))
            {
                //dd('images');
                foreach ($images as $image) {
                    if (!is_array($image)) {

                        // dd($image);
                        $child_node_image = $dom->createElement('image', $image);
                        $product_node->appendChild($child_node_image);
                    }
                    else
                    {
                        //  dd($image);
                        foreach ($image as $img)
                        {
                            $child_node_image = $dom->createElement('image', $img);
                            $product_node->appendChild($child_node_image);
                        }
                    }

                }
            }

            //end
            //price
            $child_node_price = $dom->createElement('price', $item->price);
            $product_node->appendChild($child_node_price);

            //end

            //price2
            $child_node_price2 = $dom->createElement('price2', $item->price_2);
            $product_node->appendChild($child_node_price2);

            //end
            //stock
            $child_node_stock = $dom->createElement('stock', $item->stock);
            $product_node->appendChild($child_node_stock);

            //end
            //createdAt
            $child_node_createdAt = $dom->createElement('createdAt', $item->created_at);
            $product_node->appendChild($child_node_createdAt);

            //end

            //updatedAt
            $child_node_updateddAt = $dom->createElement('updateddAt', $item->updated_at);
            $product_node->appendChild($child_node_updateddAt);

            //end
            //description
            $child_node_description = $dom->createElement('description', htmlentities($item->description, ENT_XML1));
            $product_node->appendChild($child_node_description);

            //end
            //country_id
            $child_node_countryId = $dom->createElement('countryId', $item->country_id);
            $product_node->appendChild($child_node_countryId);

            //end
            //manufacture
            $child_node_manufacture = $dom->createElement('manufacturer', $item->manufacture);
            $product_node->appendChild($child_node_manufacture);

            //end
            //width
            $child_node_width = $dom->createElement('width', $item->width);
            $product_node->appendChild($child_node_width);

            //end
            //height
            $child_node_height = $dom->createElement('height', $item->height);
            $product_node->appendChild($child_node_height);

            //end
            //depth
            $child_node_depth = $dom->createElement('depth', $item->depth);
            $product_node->appendChild($child_node_depth);

            //end
            //colors
            if (is_array($item->colors))
            {
                foreach ($item->colors as $color)
                {
                    //echo $image;
                    if (!is_array($color)) {

                        // dd($image);
                        $child_node_color = $dom->createElement('color', $color);
                        $product_node->appendChild($child_node_color);
                    }
                    else
                    {
                        // dd($color);
                        foreach ($color as $col)
                        {
                            $child_node_color = $dom->createElement('color', $col);
                            $product_node->appendChild($child_node_color);
                        }
                    }

                }
            }
            //end
            //is delivery
            $child_node_isDelivery = $dom->createElement('isDelivery', $item->is_delivery);
            $product_node->appendChild($child_node_isDelivery);

            //end
            //delivery_type
            if (is_array($item->delivery_type))
            {
                foreach ($item->delivery_type as $delivery)
                {
                    //echo $image;
                    if (!is_array($delivery)) {

                        // dd($image);
                        $child_node_deliveryType = $dom->createElement('deliveryType', $delivery);
                        $product_node->appendChild($child_node_deliveryType);
                    }
                    else
                    {
                        //dd($delivery);
                        foreach ($delivery as $del)
                        {
                            $child_node_deliveryType = $dom->createElement('deliveryType', $del);
                            $product_node->appendChild($child_node_deliveryType);
                        }
                    }

                }
            }
            //end
            //seo_title
            $child_node_seoTitle = $dom->createElement('seoTitle', $item->seo_title);
            $product_node->appendChild($child_node_seoTitle);

            //end
            //meta_description
            $child_node_metaDescription = $dom->createElement('metaDescription', $item->meta_description);
            $product_node->appendChild($child_node_metaDescription);

            //end
            //meta_tags
            $child_node_metaTags = $dom->createElement('metaTags', $item->meta_tags);
            $product_node->appendChild($child_node_metaTags);

            //end
            // print_r($item->title);
            $root->appendChild($product_node);
        }

        $dom->appendChild($root);
        $id = Auth::id();
        //dd($id);
        $dom->save('exports/'.$id.'prods.xml');


        return Response::download('exports/'.$id.'prods.xml', 'products.xml');

//        dd(123);
        // dd($dom);

        //  $result = ArrayToXml::convert($data, 'product');

        //  dd($result);
//         Storage::put(auth()->id().'File/products.xml', $dom);

//          return Response::xml($data);

    }

    public  function importxmldata()
    {
        return view('admin.products.xmlUpload');
    }

    public  function importxmldatapost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xml|max:4096',
        ]);

        $fileName = time().'.'.$request->file->extension();
        $id = Auth::id();

        $request->file->move(public_path('imports/xml/'.$id.'/'), $fileName);
        $path=public_path('imports/xml/'.$id.'/'.$fileName);
        $this->Importxml($path);
        return redirect('/admin/products');
    }

    private function Importxml($path)
    {
        $storeIds = Store::where('user_id',Auth::id())
            ->get('id')->toArray();
        $ids=array();

        foreach ($storeIds as $id)
        {
            $ids[]=$id['id'];
        }
        // dd($ids);
        $xml=file_get_contents($path);
        $data = XmlToArray::convert($xml);
        $images=array();
        $product=new Product();
        for ($i=0; $i<count($data['product']); $i++) {
            // $product = Product::updateOrInsert(array('id' => $data['product'][$i]['id'],'title'=>$data['product'][$i]['Title']));

            $product->title = $data['product'][$i]['Title'];
            if($data['product'][$i]['IsActive']!='0' && $data['product'][$i]['IsActive']!='1')
            {
                // dd($data['product'][$i]['IsActive']);
                die('Не верно указано значение IsActive у продукта с идентификатором'.$data['product'][$i]['id']);
            }

            $product->isActive = $data['product'][$i]['IsActive'];
            if($data['product'][$i]['status']='0' && $data['product'][$i]['status']!='1')
            {
                // dd($data['product'][$i]['IsActive']);
                die('Не верно указано значение status у продукта с идентификатором'.$data['product'][$i]['id']);

            }

            $product->status = $data['product'][$i]['status'];
            //  dd($data['product'][$i]['productstatus']);
            if ($data['product'][$i]['userId'] == '0') {
                $userId = Auth::id();
            } else {
                $userId = $data['product'][$i]['userId'];

            }

            if ($data['product'][$i]['itemId'] != null) {
                $itemId = $data['product'][$i]['itemId'];
            } else {
                die("Не верно указан ItemID у продукта с идентификатором".$data['product'][$i]['id']);
            }

            if($data['product'][$i]['sku']==null)
            {
                die('Не верно указано значение sku у продукта с идентификатором'.$data['product'][$i]['id']);

            }
            $sku = $data['product'][$i]['sku'];
            //dd($sku);


            // dd($ids);

            if (!in_array($data['product'][$i]['storeId'],$ids)){

                // dd($storeIds);
                //   dd($stores);
                die('Не верно указано значение StoreId у продукта с идентификатором' . $data['product'][$i]['id']);


            }


            //  dd($data['product'][$i]['storeId']);

            $store_id = $data['product'][$i]['storeId'];
            //  $product->images  = $data['product'][$i]['image'];
            // $img=json_encode($data['product'][$i]['image']);
            //dd($img);
            //$product->images = $img;


            if (isset($data['product'][$i]['image'])) {
//		$counter=count($data['product'][$i]['image']);
                //dd($counter);
                if(is_array($data['product'][$i]['image']))
                {
                    $images= $data['product'][$i]['image'];
                }
                else
                {
                    $images[]= $data['product'][$i]['image'];

                }


            }

            $price = $data['product'][$i]['price'];
            if ($data['product'][$i]['price2'] != null) {
                $price2 = $data['product'][$i]['price2'];
            }
            else
            {
                $price2=0;
            }
            if ($data['product'][$i]['stock'] != null) {
                if (preg_match('/^[0-9]+$/', $data['product'][$i]['stock'])) {
                    //dd($stock);
                    $stock = $data['product'][$i]['stock'];

                }
                else
                {
                    die('Не верно указано значение stock у продукта с идентификатором'.$data['product'][$i]['id']);
                }

            }
            else
            {
                $stock=0;
            }
            //dd($data['product'][$i]['description']);
            if ($data['product'][$i]['description']!=null) {
                $description = $data['product'][$i]['description'];
                // dd($description);

            }
            else
            {
                $description='';
            }
            if ($data['product'][$i]['countryId'] != null) {

                if (preg_match('/^[0-9]+$/', $data['product'][$i]['countryId'])) {

                    $country = $data['product'][$i]['countryId'];
                    //dd($country);
                }
                else
                {
                    die('Не верно указано значение country_id у продукта с идентификатором'.$data['product'][$i]['id']);

                }
            }

            else
            {
                $country=0;
            }
            if ($data['product'][$i]['manufacturer'] != null) {


                $manufacturer = $data['product'][$i]['manufacturer'];

            }

            if ($data['product'][$i]['width'] != null) {
                if (preg_match('/^[0-9]+$/', $data['product'][$i]['width'])) {
                    $width = $data['product'][$i]['width'];
                }
                else
                {
                    die('Не верно указано значение productWidth у продукта с идентификатором'.$data['product'][$i]['id']);
                }
            }
            if ($data['product'][$i]['height'] != null) {
                if (preg_match('/^[0-9]+$/', $data['product'][$i]['height'])) {
                    $height=$data['product'][$i]['height'];
                }
                else
                {
                    die('Не верно указано значение productHeight у продукта с идентификатором'.$data['product'][$i]['id']);
                }
            }

            if ($data['product'][$i]['depth'] != null) {
                if (preg_match('/^[0-9]+$/', $data['product'][$i]['depth'])) {

                    $depth=$data['product'][$i]['depth'];
                }
                else
                {
                    die('Не верно указано значение productDepth у продукта с идентификатором'.$data['product'][$i]['id']);
                }
            }

            if (isset($data['product'][$i]['color'])) {

                $colors[] = $data['product'][$i]['color'];
            }
            else
            {
                $colors=null;
            }
            if ($data['product'][$i]['isDelivery']!=null) {
                if($data['product'][$i]['isDelivery']!='0' && $data['product'][$i]['isDelivery']!='1')
                {
                    // dd($data['product'][$i]['isDelivery']);
                    die('Не верно указано значение isDelivery у продукта с идентификатором'.$data['product'][$i]['id']);
                }

                $isDelivery = $data['product'][$i]['isDelivery'];
            }
            if (isset($data['product'][$i]['deliveryType'])) {

                $deliveryType[] = $data['product'][$i]['deliveryType'];
            }
            else
            {
                $deliveryType[]='none';
            }
            if ($data['product'][$i]['seoTitle']!=null) {

                $seoTitle = $data['product'][$i]['seoTitle'];
            }
            if ($data['product'][$i]['metaDescription']!=null) {

                $metaDescription = $data['product'][$i]['metaDescription'];

            }
            if ($data['product'][$i]['metaTags']!=null) {

                $metaTags = $data['product'][$i]['metaTags'];

            }

            // $product = Product::updateOrInsert(array('id' => $data['product'][$i]['id']));
            //dd($data['product'][$i]);
            //dd($data['product'][$i]['Title']);
            $product = Product::firstOrNew(array('id' => $data['product'][$i]['id']));
            //dd($images);

            $product->title=$data['product'][$i]['Title'];
            $product->isActive=$data['product'][$i]['IsActive'];
            $product->status=$data['product'][$i]['productstatus'];
            $product->user_id=$userId;
            $product->item_id=$itemId;
            $product->store_id=$store_id;
            $product->images=$images;
            $product->price=$price;
            $product->price_2=$price2;
            $product->stock=$stock;
            $product->description=$description;
            $product->country_id=$country;
            $product->manufacture=$manufacturer;
            $product->width=$width;
            $product->height=$height;
            $product->depth=$depth;
            $product->is_delivery=$isDelivery;
            $product->delivery_type=$deliveryType;
            $product->seo_title=$seoTitle;
            $product->meta_description=$metaDescription;
            $product->meta_tags=$metaTags;
            $product->articul=$sku;
            $product->colors=$colors;
            $product->save();
            //добавить
            unset($images);
            unset($colors);
            unset($deliveryType);
        }

    }
}
