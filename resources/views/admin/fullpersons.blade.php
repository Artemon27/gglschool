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
                <td class='Person-surname'>Фамилия</td>
                <td class='Person-name'>Имя</td>
                <td class='Person-patronymic'>Отчество</td>
                <td class='Person-phone'>Телефон</td>
                <td class='Person-email'>Почта</td>
                <td class='Person-notice'>Примечание</td>
                <td class='Person-schedule'>Курс</td>
            </tr>
            <?php $i=0?>
         @foreach ($persons as $person)
            @if ($i%2==0)
            <tr id="person{{$person->id}}" class='first-raw'>  
            @else
            <tr id="person{{$person->id}}" class='second-raw'>
            @endif     
            <?php $i++?>
                <td id="person{{$person->id}}" attr="num" class='Person-num'>{{$i}}</td>
                <td id="person{{$person->id}}" attr="surname">{{$person->surname}}</td>
                <td id="person{{$person->id}}" attr="name">{{$person->name}}</td>
                <td id="person{{$person->id}}" attr="patronymic">{{$person->patronymic}}</td>
                <td id="person{{$person->id}}" attr="phone">{{$person->phone}}</td> 
                <td id="person{{$person->id}}" attr="email">{{$person->email}}</td> 
                <td id="person{{$person->id}}" attr="notice">{{$person->notice}}</td>
                @if ($person->schedule['name'])
                <td id="person{{$person->id}}" attr="schedule">{{$person->schedule['name']}}</td> 
                @else
                <td id="person{{$person->id}}" attr="schedule"></td> 
                @endif

                <td id='pedit{{$person->id}}' attr="surname" class='editpole'>{!! Form::text('surname',$person->surname,['size' => '15','maxlength'=>'30']) !!}</td>
                <td id='pedit{{$person->id}}' attr="name" class='editpole'>{!! Form::text('name',$person->name,['size' => '15','maxlength'=>'30']) !!}</td>
                <td id='pedit{{$person->id}}' attr="patronymic" class='editpole'>{!! Form::text('patronymic',$person->patronymic,['size' => '15','maxlength'=>'30']) !!}</td>
                <td id='pedit{{$person->id}}' attr="phone" class='editpole'>{!! Form::text('phone', $person->phone, ['size' => '15','maxlength'=>'30']) !!}</td>  
                <td id='pedit{{$person->id}}' attr="email" class='editpole'>{!! Form::email('email', $person->email, ['size' => '15','maxlength'=>'30']) !!}</td>
                <td id='pedit{{$person->id}}' attr="notice" class='editpole'>{!! Form::textarea('notice', $person->notice, ['rows' => 1, 'cols' => 20]) !!}</td>
                <td id='pedit{{$person->id}}' attr="schedule" class='editpole'>
                    {!! Form::select('id_schedule', $proglist, $person->schedule['id'])!!}
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
            error : function(error){
                console.log(error);
            }
        })
    return false;
};

</script>
@endpush