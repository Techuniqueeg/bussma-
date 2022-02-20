<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TripDataTable;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\CityRequest;
use App\Http\Requests\TripRequest;
use App\Models\City;
use App\Models\Day;
use App\Models\DayPlan;
use App\Models\Trip;
use App\Models\TripImage;
use Illuminate\Http\Request;

class TripController extends GeneralController
{
    protected $viewPath = 'trip';
    protected $path = 'trip';
    private $route = 'trips';
    private $image_path = 'trips';
    protected $paginate = 30;

    public function __construct(Trip $model)
    {
        parent::__construct($model);
    }

    public function index(TripDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create', compact('cities'));
    }

    public function store(TripRequest $request)
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

        $data = $this->model::with('Images')->findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data', 'cities', 'trip_days'));
    }

    public function update(TripRequest $request, $id)
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
        $this->model::where('id',$id)->update($data);;


        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');

    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }



}
