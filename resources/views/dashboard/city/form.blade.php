<div class="card-body row">
    <div class="form-group  col-12">
        <label>اسم المدينة<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="اسم المدينة"  value="{{ old('name', $data->name ?? '') }}" class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255" />
    </div>
</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

