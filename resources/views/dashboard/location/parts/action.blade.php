<a href="{{route('locations.edit',$id)}}" class="btn btn-icon btn-light-primary btn-circle mr-2">
    <i class="flaticon-edit"></i>
</a>
<a href="{{route('locations.delete',$id)}}" onclick=" return confirm('هل متاكد من الحذف ؟ ')" class="btn btn-icon btn-light-danger btn-circle mr-2">
    <i class="flaticon2-rubbish-bin-delete-button"></i>
</a>
