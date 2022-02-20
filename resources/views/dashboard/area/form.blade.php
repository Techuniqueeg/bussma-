<div class="card-body row">
    <div class="form-group  col-12">
        <label>المساحه<span
                class="text-danger">*</span></label>
        <input name="area" placeholder="ادخل المساحه" value="{{ old('area', $data->area ?? '') }}"
               class="form-control  {{ $errors->has('area') ? 'border-danger' : '' }}" type="number"
               maxlength="255"/>
    </div>
</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

