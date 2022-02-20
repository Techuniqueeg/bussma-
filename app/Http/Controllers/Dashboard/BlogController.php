<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends GeneralController
{
    protected $viewPath = 'blog';
    protected $path = 'blog';
    private $route = 'blogs';
    private $image_path = 'blogs';
    protected $paginate = 30;

    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(BlogRequest $request)
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

    public function update(BlogRequest $request, $id)
    {
        $data = $request->all();

        unset($data['_token']);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, null, 300);
            }
        } else {
            unset($data['image']);
        }
        $this->model::where('id',$id)->update($data);


        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');

    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }



}
