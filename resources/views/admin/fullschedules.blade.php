@extends('main')

@push('styles')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush

@section('mainframe')
@include('parts.head2')

<div class='admin-panel'>
    <table id='adminSchedule'>
        <tr class='table-header'>
            <td class='Schedule-name'>Название курса</td>
            <td colspan ='3' class='Schedule-date'>Дата</td>
            <td class='Schedule-persons'>Занято</td>
            <td class='Schedule-empty'>Свободно</td>
            <td class='Schedule-places'>Всего мест</td>
            <td class='Schedule-active'>Показывать</td>
        </tr>
        <?php $i=0?>
        @foreach ($schedules as $schedule)
        @if ($i%2==0)
        <tr id="schedule{{$schedule->id}}" class='first-raw'>
        @else
        <tr id="schedule{{$schedule->id}}" class='second-raw'>
        @endif
        <?php $i++?>
            <td id="schedule{{$schedule->id}}" attr="name">{{$schedule->name}}</td>
            <td id="schedule{{$schedule->id}}" attr="day">{{$schedule->time->day}}</td>
            <td id="schedule{{$schedule->id}}" attr="month">{{$schedule->rusmonth}}</td>
            <td id="schedule{{$schedule->id}}" attr="year">{{$schedule->time->year}}</td> 


            <td id='edit{{$schedule->id}}' class='editpole' attr="name">{!! Form::text('name2',$schedule->name,['size' => '20','maxlength'=>'500']) !!}</td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="day">
                {!! Form::select('day2', ['1' => '1', '2' => '2','3' => '3', '4' => '4','5' => '5', '6' => '6',
    '7' => '7', '8' => '8','9' => '9', '10' => '10','11' => '11', '12' => '12','13' => '13', '14' => '14',
    '15' => '15', '16' => '16','17' => '17', '18' => '18','19' => '19', '20' => '20','21' => '21',
    '22' => '22','23' => '23', '24' => '24','25' => '25', '26' => '26','27' => '27', '28' => '28',
    '29' => '29', '30' => '30','31' => '31'],$schedule->time->day)!!}
            </td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="month">
                {!! Form::select('month2', ['1' => 'Январь', '2' => 'Февраль','3' => 'Март', '4' => 'Апрель','5' => 'Май', '6' => 'Июнь',
    '7' => 'Июль', '8' => 'Август','9' => 'Сентябрь', '10' => 'Октябрь','11' => 'Ноябрь', '12' => 'Декабрь'],$schedule->time->month)!!}
            </td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="year">
                {!! Form::select('year2', array('2019' => '2019', '2020' => '2020'),$schedule->time->year)!!}
            </td>      

            <td id="schedule{{$schedule->id}}" attr="persons">{{$schedule->persons}}</td>        
            <td id="schedule{{$schedule->id}}" attr="empty">{{$schedule->places - $schedule->persons}}</td>
            <td id="schedule{{$schedule->id}}" attr="places">{{$schedule->places}}</td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="places">
                {!! Form::number('places2', $schedule->places,['min'=>'0'])!!}
            </td>
            @if ($schedule->active==0)
            <td id="schedule{{$schedule->id}}" attr="active">{!! Form::checkbox('sss','','',['disabled','id'=>'schedule'.$schedule->id,'attr'=>'active'])!!}
            <td id='edit{{$schedule->id}}' class='editpole' attr="active">           
                {!! Form::checkbox('active2', 1, 0)!!}
            </td>
            @else
            <td id="schedule{{$schedule->id}}" attr="active">{!! Form::checkbox('sss','','',['disabled','checked','id'=>'schedule'.$schedule->id,'attr'=>'active'])!!}   
            <td id='edit{{$schedule->id}}' class='editpole' attr="active">           
                {!! Form::checkbox('active2', 1, 1)!!}
            </td>
            @endif
            </td>
            <td id='schedule{{$schedule->id}}' class='' attr=""> <div class='but-red'>{!! Form::submit('Показать участников',['class'=>'btn btn-polz btn-red-msg','onclick'=>'show(this)','nomer'=>$schedule->id]) !!}</div>
            </td>   
            <td id='schedule{{$schedule->id}}' class='editpole' attr="edit"> <div class='but-red'>{!! Form::submit('Редактировать',['class'=>'btn btn-polz btn-red-msg','onclick'=>'redaktmsg(this)','id'=>'redakt','nomer'=>$schedule->id]) !!}</div>
            </td>   
            <td id='edit{{$schedule->id}}' class='editpole' attr="save"> <div class='but-save'>{!! Form::submit('Сохранить',['class'=>'btn btn-polz btn-red-msg','onclick'=>'save(this)','id'=>'save','nomer'=>$schedule->id]) !!}</div>
            </td>    
            <td><div class='but-del'>{!! Form::submit('Удалить',['class'=>'btn btn-polz btn-del-msg','onclick'=>'del(this)','id'=>'del','nomer'=>$schedule->id]) !!}</div>
            </td>
        </tr>
        <tr id="schedule{{$schedule->id}}" class='adminSchedulePersons'  attr="people">
            @if ($i%2==0)
            <td colspan='11' class='second-raw'>
            @else
            <td colspan='11' class='first-raw'>
            @endif
                <table>
                    <tr class='table-header'>
                        <td class='Person-surname'>Фамилия</td>
                        <td class='Person-name'>Имя</td>
                        <td class='Person-patronymic'>Отчество</td>
                        <td class='Person-phone'>Телефон</td>
                        <td class='Person-email'>Почта</td>
                        <td class='Person-notice'>Примечание</td>
                        <td class='Person-schedule'>Курс</td>
                    </tr>
                 @foreach ($schedule->person as $person)
                    <tr id="schedule{{$schedule->id}}">        
                        <td id="person{{$person->id}}" attr="surname">{{$person->surname}}</td>
                        <td id="person{{$person->id}}" attr="name">{{$person->name}}</td>
                        <td id="person{{$person->id}}" attr="patronymic">{{$person->patronymic}}</td>
                        <td id="person{{$person->id}}" attr="phone">{{$person->phone}}</td> 
                        <td id="person{{$person->id}}" attr="email">{{$person->email}}</td> 
                        <td id="person{{$person->id}}" attr="notice">{{$person->notice}}</td>
                        <td id="person{{$person->id}}" attr="schedule">{{$schedule->name}}</td> 
                    </tr>
                 @endforeach
                </table>
            </td>
        </tr>

        @endforeach
    </table>
    
    @if (count($oldschedules)>0)
    <table id='adminSchedule'>
        <tr class='table-header'>
            <td class='Schedule-name'>Название курса</td>
            <td colspan ='3' class='Schedule-date'>Дата</td>
            <td class='Schedule-persons'>Занято</td>
            <td class='Schedule-empty'>Свободно</td>
            <td class='Schedule-places'>Всего мест</td>
            <td class='Schedule-active'>Показывать</td>
        </tr>
        <?php $i=0?>
        @foreach ($oldschedules as $schedule)
        @if ($i%2==0)
        <tr id="schedule{{$schedule->id}}" class='first-raw'>
        @else
        <tr id="schedule{{$schedule->id}}" class='second-raw'>
        @endif
        <?php $i++?>
            <td id="schedule{{$schedule->id}}" attr="name">{{$schedule->name}}</td>
            <td id="schedule{{$schedule->id}}" attr="day">{{$schedule->time->day}}</td>
            <td id="schedule{{$schedule->id}}" attr="month">{{$schedule->rusmonth}}</td>
            <td id="schedule{{$schedule->id}}" attr="year">{{$schedule->time->year}}</td> 


            <td id='edit{{$schedule->id}}' class='editpole' attr="name">{!! Form::text('name2',$schedule->name,['size' => '20','maxlength'=>'500']) !!}</td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="day">
                {!! Form::select('day2', ['1' => '1', '2' => '2','3' => '3', '4' => '4','5' => '5', '6' => '6',
    '7' => '7', '8' => '8','9' => '9', '10' => '10','11' => '11', '12' => '12','13' => '13', '14' => '14',
    '15' => '15', '16' => '16','17' => '17', '18' => '18','19' => '19', '20' => '20','21' => '21',
    '22' => '22','23' => '23', '24' => '24','25' => '25', '26' => '26','27' => '27', '28' => '28',
    '29' => '29', '30' => '30','31' => '31'],$schedule->time->day)!!}
            </td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="month">
                {!! Form::select('month2', ['1' => 'Январь', '2' => 'Февраль','3' => 'Март', '4' => 'Апрель','5' => 'Май', '6' => 'Июнь',
    '7' => 'Июль', '8' => 'Август','9' => 'Сентябрь', '10' => 'Октябрь','11' => 'Ноябрь', '12' => 'Декабрь'],$schedule->time->month)!!}
            </td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="year">
                {!! Form::select('year2', array('2019' => '2019', '2020' => '2020'),$schedule->time->year)!!}
            </td>      

            <td id="schedule{{$schedule->id}}" attr="persons">{{$schedule->persons}}</td>        
            <td id="schedule{{$schedule->id}}" attr="empty">{{$schedule->places - $schedule->persons}}</td>
            <td id="schedule{{$schedule->id}}" attr="places">{{$schedule->places}}</td>
            <td id='edit{{$schedule->id}}' class='editpole' attr="places">
                {!! Form::number('places2', $schedule->places,['min'=>'0'])!!}
            </td>
            @if ($schedule->active==0)
            <td id="schedule{{$schedule->id}}" attr="active">{!! Form::checkbox('sss','','',['disabled','id'=>'schedule'.$schedule->id,'attr'=>'active'])!!}
            <td id='edit{{$schedule->id}}' class='editpole' attr="active">           
                {!! Form::checkbox('active2', 1, 0)!!}
            </td>
            @else
            <td id="schedule{{$schedule->id}}" attr="active">{!! Form::checkbox('sss','','',['disabled','checked','id'=>'schedule'.$schedule->id,'attr'=>'active'])!!}   
            <td id='edit{{$schedule->id}}' class='editpole' attr="active">           
                {!! Form::checkbox('active2', 1, 1)!!}
            </td>
            @endif
            </td>
            <td id='schedule{{$schedule->id}}' class='' attr=""> <div class='but-red'>{!! Form::submit('Показать участников',['class'=>'btn btn-polz btn-red-msg','onclick'=>'show(this)','nomer'=>$schedule->id]) !!}</div>
            </td>   
            <td id='schedule{{$schedule->id}}' class='editpole' attr="edit"> <div class='but-red'>{!! Form::submit('Редактировать',['class'=>'btn btn-polz btn-red-msg','onclick'=>'redaktmsg(this)','id'=>'redakt','nomer'=>$schedule->id]) !!}</div>
            </td>   
            <td id='edit{{$schedule->id}}' class='editpole' attr="save"> <div class='but-save'>{!! Form::submit('Сохранить',['class'=>'btn btn-polz btn-red-msg','onclick'=>'save(this)','id'=>'save','nomer'=>$schedule->id]) !!}</div>
            </td>    
            <td><div class='but-del'>{!! Form::submit('Удалить',['class'=>'btn btn-polz btn-del-msg','onclick'=>'del(this)','id'=>'del','nomer'=>$schedule->id]) !!}</div>
            </td>
        </tr>
        <tr id="schedule{{$schedule->id}}" class='adminSchedulePersons'  attr="people">
            @if ($i%2==0)
            <td colspan='11' class='second-raw'>
            @else
            <td colspan='11' class='first-raw'>
            @endif
                <table>
                    <tr class='table-header'>
                        <td class='Person-surname'>Фамилия</td>
                        <td class='Person-name'>Имя</td>
                        <td class='Person-patronymic'>Отчество</td>
                        <td class='Person-phone'>Телефон</td>
                        <td class='Person-email'>Почта</td>
                        <td class='Person-notice'>Примечание</td>
                        <td class='Person-schedule'>Курс</td>
                    </tr>
                 @foreach ($schedule->person as $person)
                    <tr id="schedule{{$schedule->id}}">        
                        <td id="person{{$person->id}}" attr="surname">{{$person->surname}}</td>
                        <td id="person{{$person->id}}" attr="name">{{$person->name}}</td>
                        <td id="person{{$person->id}}" attr="patronymic">{{$person->patronymic}}</td>
                        <td id="person{{$person->id}}" attr="phone">{{$person->phone}}</td> 
                        <td id="person{{$person->id}}" attr="email">{{$person->email}}</td> 
                        <td id="person{{$person->id}}" attr="notice">{{$person->notice}}</td>
                        <td id="person{{$person->id}}" attr="schedule">{{$schedule->name}}</td> 
                    </tr>
                 @endforeach
                </table>
            </td>
        </tr>

        @endforeach
    </table>
    @endif
</div>
<ul class="alert alert-danger hidden"><li></li></ul>
@include('errors.list')
@stop

@push('scripts')
<script type="text/javascript">


function del(el){
var id = $(el).attr('nomer');
var j='schedule'+$(el).attr('nomer');       
              
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
                url:'/admin/delSchedule'
                , cache: false
                , data: {'id': id,'_token': $('meta[name="csrf-token"]').attr('content')}
                , type:'POST'
                , success: function() {
                    $(el).parent().parent().parent().detach();
                    
                },
                error : function(){
                }
            });
  } else {
    ;
  }
});  
        
};

        
function redaktmsg(el)       
{        
    var i=$(el).attr('nomer');
    var j='schedule'+i;  
    
    $('#'+j+"[attr='name']").css({'display' : 'none'});
    $('#'+j+"[attr='day']").css({'display' : 'none'});
    $('#'+j+"[attr='month']").css({'display' : 'none'});
    $('#'+j+"[attr='year']").css({'display' : 'none'});
    $('#'+j+"[attr='places']").css({'display' : 'none'});
    $('#'+j+"[attr='active']").css({'display' : 'none'});
    $('#'+j+"[attr='edit']").css({'display' : 'none'});
   
    var k='edit'+i;  
    $('#'+k+"[attr='name']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='day']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='month']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='year']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='places']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='active']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='save']").css({'display' : 'table-cell'});
    
 
    
$("body").keyup(function(event) {
    if (event.keyCode == 27) {
    $('#'+k+"[attr='name']").css({'display' : 'none'});
    $('#'+k+"[attr='day']").css({'display' : 'none'});
    $('#'+k+"[attr='month']").css({'display' : 'none'});
    $('#'+k+"[attr='year']").css({'display' : 'none'});
    $('#'+k+"[attr='places']").css({'display' : 'none'});
    $('#'+k+"[attr='active']").css({'display' : 'none'});
    $('#'+k+"[attr='save']").css({'display' : 'none'});
    
    $('#'+j+"[attr='name']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='day']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='month']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='year']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='places']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='active']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='edit']").css({'display' : 'table-cell'});
}});
    
  };

function save(el)
{
    var i=$(el).attr('nomer');
    var j='schedule'+i;  
    var k='edit'+i;  
    
    var name = $('#'+k+"[attr='name']").children('input').val();
    var day=$('#'+k+"[attr='day']").children('select').val();
    var month=$('#'+k+"[attr='month']").children('select').val();
    var year=$('#'+k+"[attr='year']").children('select').val();
    var places=$('#'+k+"[attr='places']").children('input').val();
    if ($('#'+k+"[attr='active']").children('input').is(':checked'))
    {
        var active = 1;
    }
    else {
        var active = 0;
    }
    
    $.ajax({
            url:'/admin/editSchedule'
            , cache: false
            , data: {'name': name,'day': day,'month': month,'year': year,'places': places,'active': active,'id': i,'_token': $('meta[name="csrf-token"]').attr('content')}
            , type:'POST'
            , success: function(error) {   
                
                $('#'+j+"[attr='name']").text(name);
                $('#'+j+"[attr='day']").text(day);
                $('#'+j+"[attr='month']").text(error);
                $('#'+j+"[attr='year']").text(year);
                $('#'+j+"[attr='places']").text(places);
                $('#'+j+"[attr='empty']").text(places - $('#'+j+"[attr='persons']").text());
                $('#'+j+"[attr='active']").prop('checked', active);
                
                $('#'+k+"[attr='name']").css({'display' : 'none'});
                $('#'+k+"[attr='day']").css({'display' : 'none'});
                $('#'+k+"[attr='month']").css({'display' : 'none'});
                $('#'+k+"[attr='year']").css({'display' : 'none'});
                $('#'+k+"[attr='places']").css({'display' : 'none'});
                $('#'+k+"[attr='active']").css({'display' : 'none'});
                $('#'+k+"[attr='save']").css({'display' : 'none'});

                $('#'+j+"[attr='name']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='day']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='month']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='year']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='places']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='active']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='edit']").css({'display' : 'table-cell'});
                
            },
            error : function(){
            }
        })
    return false;
};


function show(el)       
{        
    var i=$(el).attr('nomer');
    var j='schedule'+i;  
    $('#'+j+"[attr='people']").css({'display' : 'contents'});
    $(el).attr('onClick', 'hide(this);');
    $(el).val('Скрыть участников');
};

 function hide(el)       
{        
    var i=$(el).attr('nomer');
    var j='schedule'+i;  
    $('#'+j+"[attr='people']").css({'display' : 'none'});
    $(el).attr('onClick', 'show(this);');
    $(el).val('Показать участников');
};

</script>
@endpush