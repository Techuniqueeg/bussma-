<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AreaDataTable;
use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Http\Request;

class AreaController extends GeneralController
{
    protected $viewPath = 'area';
    protected $path = 'area';
    private $route = 'areas';
    private $image_path = 'areas';
    protected $paginate = 30;

    public function __construct(Area $model)
    {
        parent::__construct($model);
    }

    public function index(AreaDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(AreaRequest $request)
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

    public function update(AreaRequest $request, $id)
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
