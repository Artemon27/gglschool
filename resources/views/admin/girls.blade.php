@extends('main')

@push('styles')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush

@section('mainframe')
@include('parts.head2')


<div class='admin-panel'>
    @include('admin.headimages')
    {!! Form::open(['url' => 'admin/addGirls','files'=>'true']) !!}
        <table id='girls'>
            <tr>
                <td class=''>Наши ученицы</td>
            </tr>
            <tr>
                <td class=''>Имя</td>
                <td>{!! Form::text('name','',['size' => '25','maxlength'=>'30']) !!}</td>
            </tr>    
            <tr>
                <td class=''>Курсы</td>
                <td>{!! Form::text('curses','',['size' => '35','maxlength'=>'100']) !!}</td>
            </tr>
            <tr>
                <td class=''>id Вконтакте</td>
                <td>{!! Form::text('vk','',['size' => '25','maxlength'=>'30']) !!}</td>
            </tr>
            <tr>
                <td class=''>id Instagram</td>
                <td>{!! Form::text('inst','',['size' => '25','maxlength'=>'30']) !!}</td>
            </tr>
            <tr>
                <td class=''>Описание</td>
                <td>{!! Form::textarea('description', '', ['rows' => 4, 'cols' => 25]) !!}</td>
            </tr>
            <tr>
                <td class=''>Аватарка</td>
                <td>{!! Form::file('avatar',['multiple'=>'false']) !!}</td>
            </tr>
            <tr>
                <td class=''>Изображения работ</td>
                <td>{!! Form::file('image[]',['multiple'=>'true']) !!}</td>
            </tr>
            <tr>
                <td class=''>{!! Form::submit('Добавить',['class'=>'btn btn-polz']) !!}</td>
            </tr>     
        </table>
    {!! Form::close() !!}   
    
    <div class='admin-girls'>
        <div class="main-student white">            
            @include('parts.girls')
        </div>
    </div>
    <div class='admin-red-girls'>
        @foreach ($girls as $girl)
        {!! Form::open(['url' => 'admin/editGirls','files'=>'true']) !!}
        {!! Form::hidden('id', $girl->id) !!}
        <table id='red-girls'>
            <tr>
                <td class=''>Имя</td>
                <td>{!! Form::text('name',$girl->name,['size' => '25','maxlength'=>'30']) !!}</td>
            </tr>    
            <tr>
                <td class=''>Курсы</td>
                <td>{!! Form::text('curses',$girl->curs,['size' => '35','maxlength'=>'100']) !!}</td>
            </tr>
            <tr>
                <td class=''>id Вконтакте</td>
                <td>{!! Form::text('vk',$girl->vk,['size' => '25','maxlength'=>'30']) !!}</td>
            </tr>
            <tr>
                <td class=''>id Instagram</td>
                <td>{!! Form::text('inst',$girl->instagram,['size' => '25','maxlength'=>'30']) !!}</td>
            </tr>
            <tr>
                <td class=''>Описание</td>
                <td>{!! Form::textarea('description', $girl->description, ['rows' => 4, 'cols' => 25]) !!}</td>
            </tr>
            <tr>
                <td class=''>Аватарка</td>
                
                <td>
                    <div class="admin-img-krest"><img src='/{{$girl->avatar->image}}'>
                    {!! Form::checkbox('cavatar','1','',['checked','class'=>'hidden']) !!}
                    <div id='delimg' onclick="delimg(this)">X</div>
                    <div class='delmask' onclick="backimg(this)"></div>                    
                    </div>
                    {!! Form::file('avatar',['multiple'=>'false']) !!}
                
                </td>
                
            </tr>
            <tr>
                <td class=''>Изображения работ</td>
                <td>
                <?php $i=0?>
                @foreach ($girl->images as $image)
                <div class="admin-img-krest"><img src="/{{$image->image_mini}}">
                    {!! Form::checkbox('cimage['.$i++.']','1','',['checked','class'=>'hidden']) !!}
                    <div id='delimg' onclick="delimg(this)">X</div>
                    <div class='delmask' onclick="backimg(this)"></div>
                 </div>
                
                @endforeach                      
                {!! Form::file('image[]',['multiple'=>'true']) !!}</td>
            </tr>
            <tr>
                <td class=''>{!! Form::submit('Сохранить',['class'=>'btn btn-polz']) !!}</td>    
                <td><div nomer='{{$girl->id}}' onclick="del(this)">Удалить</div></td>
            </tr>     
        </table>   
        {!! Form::close() !!}   
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
  title: "Вы действительно хотите удалить эту ученицу?",
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
                url:'/admin/delGirls'
                , cache: false
                , data: {'id': id,'_token': $('meta[name="csrf-token"]').attr('content')}
                , type:'POST'
                , success: function() {
                    location.reload();
                    
                },
                error : function(){
                }
            });
  } else {
    ;
  }
});  
        
};



function delimg(el){
var id = $(el).parent().children('input').removeAttr("checked");        
$(el).parent().children('.delmask').height($(el).parent().children('img').height());
}
function backimg(el){
var id = $(el).parent().children('input').attr("checked",'checked');        
$(el).parent().children('.delmask').height(0);
}
</script>

@endpush