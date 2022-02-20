<div class="card-body row">
    <div class="form-group  col-6">
        <label>اسم عضو فريق العمل<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="ادخل اسم عضو فريق العمل" value="{{ old('name', $data->name ?? '') }}"
               class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>اسم المسمي الوظيقي<span
                class="text-danger">*</span></label>
        <input name="job_title" placeholder="ادخل المسمي الوظيقي" value="{{ old('job_title', $data->job_title ?? '') }}"
               class="form-control  {{ $errors->has('job_title') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>رقم الهاتف<span
                class="text-danger">*</span></label>
        <input name="phone" placeholder="ادخل رقم الهاتف" value="{{ old('phone', $data->phone ?? '') }}"
               class="form-control  {{ $errors->has('phone') ? 'border-danger' : '' }}" type="number"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>رابط الفيسبوك</label>
        <input name="facebook" placeholder="ادخل رابط الفيسبوك" value="{{ old('facebook', $data->facebook ?? '') }}"
               class="form-control  {{ $errors->has('facebook') ? 'border-danger' : '' }}" type="url"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>رابط التويتر</label>
        <input name="twitter" placeholder="ادخل رابط التويتر" value="{{ old('twitter', $data->twitter ?? '') }}"
               class="form-control  {{ $errors->has('twitter') ? 'border-danger' : '' }}" type="url"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>رابط لينكيد ان</label>
        <input name="linked_in" placeholder="ادخل رابط لينكيد ان" value="{{ old('linked_in', $data->linked_in ?? '') }}"
               class="form-control  {{ $errors->has('linked_in') ? 'border-danger' : '' }}" type="url"
               maxlength="255"/>
    </div>
    <div class="form-group col-md-6">
        <label>صورة عضو فريق العمل</label>
        <div class="col-lg-8">

            <div class="image-input image-input-outline" id="kt_image_1">
                <div class="image-input-wrapper {{ $errors->has('image') ? 'border-danger' : '' }}"
                     style="background-image: url({{old('image', $data->image ?? 'default-user.jpg' )}})"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-warning btn-shadow"
                       data-action="change" data-toggle="tooltip" title=""
                       data-original-title="اختر صوره">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" value="{{old('image', $data->image ?? '')}}" name="image"
                           accept=".png, .jpg, .jpeg"/>
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-warning btn-shadow"
                      data-action="cancel" data-toggle="tooltip" title="Cancel avatar">

                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
            </div>
        </div>
    </div>

</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

