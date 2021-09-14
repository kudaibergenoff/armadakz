<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Application;
use Illuminate\Http\Request;
//use function Couchbase\defaultDecoder;

class ApplicationControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $applicationsQuery = Application::latest();
        $applicationsQuery = (isset($_GET['type']) and $_GET['type'] == 'rent')
            ? $applicationsQuery->where('type','rent')
            : $applicationsQuery->where('type','advertising');
        $applications = $applicationsQuery->get();
        return view('admin.applications.index',compact('applications'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        dd('show');
    }

    public function edit($id)
    {
        dd('edit');
    }

    public function update(Request $request, $id)
    {
        $data = Application::find($id);
        $data->edit($request->all());
        $data->save();

        return back()->with('success','Информация изменена');
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
            $data = Application::find($item);

            $data->delete();
        }

        if(count($id) > 1) {
            return redirect()->route('admin.applications.index')->with('success','Заявки удалены');
        } else {
            return redirect()->route('admin.applications.index')->with('success','Заявка удалена');
        }
    }
}
