@extends('main')

@push('styles')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush

@section('mainframe')
@include('parts.head2')

<div class='admin-panel'>
    
@if ($dostup==0)
@elseif ($dostup==2)
@include('auth.login')
@else


<div class="tabs">
    <input id="tab1" type="radio" name="tabs" @if (!session('status')) checked
           @endif>
            <label for="tab1" title="addschedule">Добавить курс</label>
            <input id="tab2" type="radio" name="tabs"@if (session('status')) checked
           @endif>                   
            <label for="tab2" title="addperson">Добавить участника</label>
                        
    <section id="addschedule">      

        {!! Form::open(['url' => 'admin/addSchedule']) !!}
    <table id='adminCreateSchedule'>
        <tr class='table-header'>
            <td>{!! Form::label('name', 'Название курса', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>День</td>
            <td>Месяц</td>
            <td>Год</td>
            <td>{!! Form::label('places', 'Места', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>{!! Form::label('active', 'Показывать', ['class' => 'control-label']) !!}</td>
        </tr>
        <tr>
            <td>{!! Form::text('name','',['size' => '40','maxlength'=>'500']) !!}</td>
            <td>
                {!! Form::select('day', ['1' => '1', '2' => '2','3' => '3', '4' => '4','5' => '5', '6' => '6',
    '7' => '7', '8' => '8','9' => '9', '10' => '10','11' => '11', '12' => '12','13' => '13', '14' => '14',
    '15' => '15', '16' => '16','17' => '17', '18' => '18','19' => '19', '20' => '20','21' => '21',
    '22' => '22','23' => '23', '24' => '24','25' => '25', '26' => '26','27' => '27', '28' => '28',
    '29' => '29', '30' => '30','31' => '31'],$now->day)!!}
            </td>
            <td>
                {!! Form::select('month', ['1' => 'Январь', '2' => 'Февраль','3' => 'Март', '4' => 'Апрель','5' => 'Май', '6' => 'Июнь',
    '7' => 'Июль', '8' => 'Август','9' => 'Сентябрь', '10' => 'Октябрь','11' => 'Ноябрь', '12' => 'Декабрь'],$now->month)!!}
            </td>
            <td>
                {!! Form::select('year', array('2019' => '2019', '2020' => '2020'))!!}
            </td>
            <td>
                {!! Form::number('places', '0',['min'=>'0'])!!}
            </td>
            <td>           
                {!! Form::checkbox('active', 1, 1)!!}
            </td>

            <td>{!! Form::submit('Добавить',['class'=>'btn btn-polz']) !!}</td>
        </tr>

    </table>
    {!! Form::close() !!}  

    </section>            


    <section id="addperson">      

    {!! Form::open(['url' => 'admin/addPerson']) !!}
    <table id='adminCreatePerson'>
        <tr class='table-header'>
            <td>{!! Form::label('surname', 'Фамилия', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>{!! Form::label('name', 'Имя', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>{!! Form::label('patronymic', 'Отчество', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>{!! Form::label('phone', 'Телефон', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>{!! Form::label('email', 'Почта', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>{!! Form::label('notice', 'Примечание', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            <td>
                {!! Form::label('id_schedule', 'Курс', ['class' => 'control-label','id'=>'admin-curs-name']) !!}</td>
            </td>
        </tr>
        <tr>
            <td>{!! Form::text('surname','',['size' => '20','maxlength'=>'30']) !!}</td>
            <td>{!! Form::text('name','',['size' => '20','maxlength'=>'30']) !!}</td>
            <td>{!! Form::text('patronymic','',['size' => '20','maxlength'=>'30']) !!}</td>
            <td>{!! Form::text('phone', '',['size' => '20','maxlength'=>'30']) !!}</td>  
            <td>{!! Form::email('email', '',['size' => '20','maxlength'=>'30']) !!}</td>
            <td>{!! Form::textarea('notice', '', ['class' => 'control-label','id'=>'admin-curs-name', 'rows' => 1, 'cols' => 20]) !!}</td>
            <td>
                {!! Form::select('id_schedule', $proglist)!!}
            </td>
            <td>{!! Form::submit('Добавить',['class'=>'btn btn-polz']) !!}</td>
        </tr>

    </table>
    {!! Form::close() !!}    

    </section>
</div> 

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
                   
                    
                    <td id='pedit{{$person->id}}' attr="surname" class='editpole'>{!! Form::text('surname',$person->surname,['size' => '15','maxlength'=>'30']) !!}</td>
                    <td id='pedit{{$person->id}}' attr="name" class='editpole'>{!! Form::text('name',$person->name,['size' => '15','maxlength'=>'30']) !!}</td>
                    <td id='pedit{{$person->id}}' attr="patronymic" class='editpole'>{!! Form::text('patronymic',$person->patronymic,['size' => '15','maxlength'=>'30']) !!}</td>
                    <td id='pedit{{$person->id}}' attr="phone" class='editpole'>{!! Form::text('phone', $person->phone, ['size' => '15','maxlength'=>'30']) !!}</td>  
                    <td id='pedit{{$person->id}}' attr="email" class='editpole'>{!! Form::email('email', $person->email, ['size' => '15','maxlength'=>'30']) !!}</td>
                    <td id='pedit{{$person->id}}' attr="notice" class='editpole'>{!! Form::textarea('notice', $person->notice, ['rows' => 1, 'cols' => 20]) !!}</td>
                    <td id='pedit{{$person->id}}' attr="schedule" class='editpole'>
                        {!! Form::select('id_schedule', $proglist, $schedule->id)!!}
                    </td>
                    
                    <td id='person{{$person->id}}' class='editpole' attr="edit"> <div class='but-red'>{!! Form::submit('Редактировать',['class'=>'btn btn-polz btn-red-msg','onclick'=>'predaktmsg(this)','id'=>'redakt','nomer'=>$person->id]) !!}</div>
                    </td>   
                    <td id='pedit{{$person->id}}' class='editpole' attr="save"> <div class='but-save'>{!! Form::submit('Сохранить',['class'=>'btn btn-polz btn-red-msg','onclick'=>'psave(this)','id'=>'save','nomer'=>$person->id]) !!}</div>
                    </td>    
                    <td><div class='but-del'>{!! Form::submit('Удалить',['class'=>'btn btn-polz btn-del-msg','onclick'=>'pdel(this)','id'=>'del','nomer'=>$person->id]) !!}</div>
                    </td>
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

@if (!Auth::check())  

@else
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




function pdel(el){
    var id = $(el).attr('nomer');
    var j='person'+$(el).attr('nomer');       

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
                        url:'/admin/delPerson'
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

        
function predaktmsg(el)       
{        
    var i=$(el).attr('nomer');
    var j='person'+i;  
    
    $('#'+j+"[attr='name']").css({'display' : 'none'});
    $('#'+j+"[attr='surname']").css({'display' : 'none'});
    $('#'+j+"[attr='patronymic']").css({'display' : 'none'});
    $('#'+j+"[attr='phone']").css({'display' : 'none'});
    $('#'+j+"[attr='email']").css({'display' : 'none'});
    $('#'+j+"[attr='notice']").css({'display' : 'none'});
    $('#'+j+"[attr='schedule']").css({'display' : 'none'});
    $('#'+j+"[attr='edit']").css({'display' : 'none'});
   
    var k='pedit'+i;  
    $('#'+k+"[attr='name']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='surname']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='patronymic']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='phone']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='email']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='notice']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='schedule']").css({'display' : 'table-cell'});
    $('#'+k+"[attr='save']").css({'display' : 'table-cell'});
    
 
    
$("body").keyup(function(event) {
    if (event.keyCode == 27) {
    $('#'+k+"[attr='name']").css({'display' : 'none'});
    $('#'+k+"[attr='surname']").css({'display' : 'none'});
    $('#'+k+"[attr='patronymic']").css({'display' : 'none'});
    $('#'+k+"[attr='phone']").css({'display' : 'none'});
    $('#'+k+"[attr='email']").css({'display' : 'none'});
    $('#'+k+"[attr='notice']").css({'display' : 'none'});
    $('#'+k+"[attr='schedule']").css({'display' : 'none'});
    $('#'+k+"[attr='save']").css({'display' : 'none'});
    
    $('#'+j+"[attr='name']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='surname']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='patronymic']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='phone']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='email']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='notice']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='schedule']").css({'display' : 'table-cell'});
    $('#'+j+"[attr='edit']").css({'display' : 'table-cell'});
}});
    
  };

function psave(el)
{
    var i=$(el).attr('nomer');
    var j='person'+i;  
    var k='pedit'+i;  
    
    var name = $('#'+k+"[attr='name']").children('input').val();
    var surname=$('#'+k+"[attr='surname']").children('input').val();
    var patronymic=$('#'+k+"[attr='patronymic']").children('input').val();
    var phone=$('#'+k+"[attr='phone']").children('input').val();
    var email=$('#'+k+"[attr='email']").children('input').val();
    var notice=$('#'+k+"[attr='notice']").children('textarea').val();
    var id_schedule=$('#'+k+"[attr='schedule']").children('select').val();
    var text_schedule=$('#'+k+"[attr='schedule']").children('select').children('option:selected').text();
    
    $.ajax({
            url:'/admin/editPerson'
            , cache: false
            , data: {'name': name,'surname': surname,'patronymic': patronymic,'phone': phone,'email': email,'notice': notice,'id_schedule': id_schedule,'id': i,'_token': $('meta[name="csrf-token"]').attr('content')}
            , type:'POST'
            , success: function(error) {   
                
                if (error){
                    $('.alert-danger').css({'display' : 'block'});
                    $('.alert-danger').children('li').text(error);
                }
                else
                {
                $('.alert-danger').css({'display' : 'none'});
                $('#'+j+"[attr='name']").text(name);
                $('#'+j+"[attr='surname']").text(surname);
                $('#'+j+"[attr='patronymic']").text(patronymic);
                $('#'+j+"[attr='phone']").text(phone);
                $('#'+j+"[attr='email']").text(email);
                $('#'+j+"[attr='notice']").text(notice);
                $('#'+j+"[attr='schedule']").text(text_schedule);
                
                $('#'+k+"[attr='name']").css({'display' : 'none'});
                $('#'+k+"[attr='surname']").css({'display' : 'none'});
                $('#'+k+"[attr='patronymic']").css({'display' : 'none'});
                $('#'+k+"[attr='phone']").css({'display' : 'none'});
                $('#'+k+"[attr='email']").css({'display' : 'none'});
                $('#'+k+"[attr='notice']").css({'display' : 'none'});
                $('#'+k+"[attr='schedule']").css({'display' : 'none'});
                $('#'+k+"[attr='save']").css({'display' : 'none'});

                $('#'+j+"[attr='name']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='surname']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='patronymic']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='phone']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='email']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='notice']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='schedule']").css({'display' : 'table-cell'});
                $('#'+j+"[attr='edit']").css({'display' : 'table-cell'});
                }

               
                
            },
            error : function(){
            }
        })
    return false;
};

</script>
@endpush
@endif