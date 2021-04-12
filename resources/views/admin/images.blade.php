@extends('main')

@push('styles')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush

@section('mainframe')
@include('parts.head2')


<div class='admin-panel'>
    @include('admin.headimages')
    {!! Form::open(['url' => 'admin/addImage','files'=>'true']) !!}
        <table id='adminCreateSchedule'>
            <tr class='table-header'>
                <td>Изображения студии</td>
                <td>{!! Form::file('image[]',['multiple'=>'true']) !!}</td>
                <td>{!! Form::submit('Добавить',['class'=>'btn btn-polz']) !!}</td>
            </tr>
        </table>
    {!! Form::close() !!}   
    <div class='admin-galery'>
        @foreach ($images as $image)
        <div class='admin-galery-img'>
            <img  src=/{{$image->image_mini}}>
            <div  nomer={{$image->id}} onclick='del(this)' id='delimg'>X</div>
        </div>
        @endforeach
    </div>
</div>
<ul class="alert alert-danger hidden"><li></li></ul>
@include('errors.list')
@stop

@push('scripts')
<script type="text/javascript">
    
function del(el){
var id = $(el).attr('nomer');     
              
  swal({
  title: "Вы действительно хотите удалить это изображение?",
  icon: "warning",
  confirmButtonColor: "#DD6B55",
  buttons: {
    cancel: "Отмена",
    confirm: "Да!!",
  },
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
                url:'/admin/delImage'
                , cache: false
                , data: {'id': id,'_token': $('meta[name="csrf-token"]').attr('content')}
                , type:'POST'
                , success: function() {
                    $(el).parent().detach();
                    
                },
                error : function(){
                }
            });
  } else {
    ;
  }
});  
        
};
</script>

@endpush