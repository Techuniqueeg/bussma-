<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\LocationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends GeneralController
{
    protected $viewPath = 'location';
    protected $path = 'location';
    private $route = 'locations';
    private $image_path = 'locations';
    protected $paginate = 30;

    public function __construct(Location $model)
    {
        parent::__construct($model);
    }

    public function index(LocationDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(LocationRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $trip = $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {

        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(LocationRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->model::where('id', $id)->update($data);;
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');

    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
