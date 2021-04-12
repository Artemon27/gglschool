@extends('main')

@push('styles')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush

@section('mainframe')
@include('parts.head2')

<div class='admin-panel'>
<div id="adminSchedule">
  <div class='SchedulePersons'  attr="people">
        <table>
            <tr class='table-header'>
                <td class='Person-num'>#</td>
                <td class='Person-surname'>Имя</td>
                <td class='Person-phone'>Телефон</td>
            </tr>
            <?php $i=0?>
         @foreach ($peoples as $people)
            @if ($i%2==0)
            <tr id="person{{$people->id}}" class='first-raw'>  
            @else
            <tr id="person{{$people->id}}" class='second-raw'>
            @endif     
            <?php $i++?>
                <td id="person{{$people->id}}" attr="name">{{$i}}</td>
                <td id="person{{$people->id}}" attr="name">{{$people->name}}</td>
                <td id="person{{$people->id}}" attr="phone">{{$people->phone}}</td> 
                <td><div class='but-del'>{!! Form::submit('Удалить',['class'=>'btn btn-polz btn-del-msg','onclick'=>'pdel(this)','id'=>'del','nomer'=>$people->id]) !!}</div>
                </td>
            </tr>
         @endforeach
        </table>
    </div>  
 </div>   
    
</div>
<ul class="alert alert-danger hidden"><li></li></ul>
@include('errors.list')
@stop

@push('scripts')
<script type="text/javascript">


function pdel(el){
    var id = $(el).attr('nomer');
    var j='people'+$(el).attr('nomer');       
    swal({
        title: "Вы действительно хотите удалить "+$('#'+j+"[attr='name']").text()+"?",
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
                        url:'/admin/delRequest'
                        , cache: false
                        , data: {'id': id,'_token': $('meta[name="csrf-token"]').attr('content')}
                        , type:'POST'
                        , success: function() {
                            $(el).parent().parent().parent().detach();
                        },
                        error : function(error){
                            console.log(error);
                        }
                    });
        } else  {
                    ;
                }
    });          
};

</script>
@endpush