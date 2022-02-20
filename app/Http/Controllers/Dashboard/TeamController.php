<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends GeneralController
{
    protected $viewPath = 'team';
    protected $path = 'team';
    private $route = 'teams';
    private $image_path = 'teams';
    protected $paginate = 30;

    public function __construct(Team $model)
    {
        parent::__construct($model);
    }

    public function index(TeamDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(TeamRequest $request)
    {
        $data = $request->all();
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, null, 300);
            }
        }
        $trip = $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {

        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(TeamRequest $request, $id)
    {
        $data = $request->all();
        $item = $this->model->find($id);
        unset($data['_token']);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, $item->image, 300);
            }
        } else {
            unset($data['image']);
        }
        $this->model::where('id',$id)->update($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');

    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
