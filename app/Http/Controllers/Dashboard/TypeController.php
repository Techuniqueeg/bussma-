<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TypeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends GeneralController
{
    protected $viewPath = 'type';
    protected $path = 'type';
    private $route = 'types';
    private $image_path = 'locations';
    protected $paginate = 30;

    public function __construct(Type $model)
    {
        parent::__construct($model);
    }

    public function index(TypeDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(TypeRequest $request)
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

    public function update(TypeRequest $request, $id)
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
