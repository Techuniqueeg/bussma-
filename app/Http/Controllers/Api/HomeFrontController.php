<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Inbox;
use App\Models\Location;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeFrontController extends Controller
{
    public function blogs(Request $request)
    {
        $data = Blog::orderBy('id', 'DESC')->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function blogsDetails(Request $request, $id)
    {
        $data = Blog::find($id);
        if ($data) {
            $data = Blog::where('id', $id)->first();
            return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
        } else {
            return msg($request, '401', 'يجب اختيار المقال الصحيح');
        }
    }

    public function settings(Request $request)
    {
        $data = Setting::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function aboutUs(Request $request)
    {
        $data = AboutUs::where('id', '1')->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function services(Request $request)
    {
        $data = Service::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function locations(Request $request)
    {
        $data = Location::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function categories(Request $request)
    {
        $data = Category::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function team(Request $request)
    {
        $data = Team::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function sliders(Request $request)
    {
        $data = Slider::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function projects(Request $request)
    {
        $data = Project::with(['Images', 'Category', 'Location','Type'])->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function projectDetails(Request $request, $id)
    {
        $data = Project::find($id);
        if ($data) {
            $data = Project::where('id', $id)->with(['Images', 'Category', 'Location'])->first();
            return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
        } else {
            return msg($request, '401', 'يجب اختيار المشروع صحيح');
        }
    }

    public function inbox(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'phone' => 'required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $data['user_id'] = auth('api')->user()->id;
        Inbox::create($data);
        return msgdata($request, success(), 'تم الارسال بنجاح', $data);


    }
    public function filtration(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'area_from' => 'required|numeric',
            'area_to' => 'required|numeric',
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $project=  Project::with(['Images', 'Category', 'Location','Type'])->where([
            ['area_from', '>=', $request->area_from],
            ['area_to', '<=', $request->area_to],
            ['price_from', '>=', $request->price_from],
            ['price_to', '<=', $request->price_to],
            ['category_id', '=', $request->category_id],
            ['location_id', '=', $request->location_id],
            ['type_id', '=', $request->type_id],
        ])->get();
        if ($project){
            return msgdata($request, success(), 'تم العرض بنجاح', $project);
        }
        return msg($request, success(), 'لا يوجد مشروع بهاذا الوصف');

    }
}
