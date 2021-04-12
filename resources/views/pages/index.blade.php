@extends('main')


@section('mainframe')

@include('header')

<div class ="main-top white"><a class="links" name="main"></a>
    <div class="main-top-content">
        <h1>“Учись у профессионалов -<br>- становись профессионалом”</h1>
        <span>Наша главная цель — сделать Вас лучшими в своём деле<br></span>                  
        <div class="main-top-call" id='createRequest'>
            {!! Form::open(['url' => 'addRequest']) !!}
                {!! Form::text('name','',['size' => '20','maxlength'=>'30','placeholder'=>'*Имя','class'=>'forms']) !!}
                {!! Form::text('phone', '',['size' => '20','maxlength'=>'13','placeholder'=>'*Телефон','class'=>'forms']) !!} 
                <div class='forms'>
                {!! Form::submit('Заявка',['class'=>'btn btn-polz']) !!}
                </div>
            {!! Form::close() !!}  
            @include('errors.list')
        </div>
        <div class="main-top-promo">
            Назвав промокод <span>"Beauty master"</span> при записи - вы получите скидку 5%!
        </div>
    </div>
    <div class="main-head2">
        <img src="{{asset('images/head2.png')}}">
    </div>
</div>
               
        <!-- top(1)-area end -->
        <!-- study(4)-area start -->
<div class="main-study pink2" id='study'><a class="links" name="study"></a>
    <div class="study-menu slider" >
        <div class="study-slide zoom" data-original="data1">
            <div class="study-photo">                
                <img src="{{asset('images/main/BrowMaster.jpg')}}">
             </div>  
            <div class="study-full">
                <div class="study-main-photo">                
                    <img src="{{asset('images/main/BrowMaster.jpg')}}">
                </div>  
                <div class="study-button2">
                       ПОДРОБНЕЕ
                </div>
                <div class="study-name">BrowMaster</div>          
                <div class="study-text">
                    BrowMaster - это базовый курс мастера бровиста для новичков.                       
                </div>                
                <div class="program-plus">
                    <div class="program-plus-header">
                        
                    </div>
                    <div class="program-plus-content">
                    - Самостоятельная отработка на 4х моделях.<br>
                    - Обучение проходит в минигруппах<br>
                    - В конце обучения выдаётся сертификат<br>
                    - Для практических занятий студия предоставляет учащимся материалы и моделей. <br>
                    </div>
                </div>
                <div class="study-time">
                    2 дня с 9:00 до 16:00
                </div>
                <div class="study-price">
                    Цена: 4500р.
                </div>
                <div class="program-curs">
                        <b>Программа курса:</b>
                    <ul class="program-content">
                        <li>Рост бровей и жизненный цикл</li>
                        <li>Основные элементы брови</li>
                        <li>Строение брови по точкам</li>
                        <li>Типы лица и формы бровей</li>
                        <li>Рабочее место и материалы мастера-бровиста</li>
                        <li>Дезинфекция и стерилизация</li>
                        <li>Способы коррекции бровей</li>
                        <li>Тридинг</li>
                        <li>Основы колористики</li>
                        <li>Работа с хной и краской</li>
                        <br> В теоретической части рассматриваются: 
                        различные способы моделирования и нюансы работы с проблемными бровями, дается обзор актуальных инструментов и 
                        средств, колористика🌈. <br>Особое внимание уделяется работе с нитью (триддинг). Обязательная отработка на моделях 
                        делает процесс обучения наиболее эффективным. <br>Материалы и инструменты для отработки предоставляются в полном 
                        объеме. 
                    </ul>                    
                </div>
                
                <div class="study-button">
                    
                </div>
            </div>
        </div>
        <div class="study-slide zoom">
            <div class="study-photo">
            <img src="{{asset('images/main/LamiBotox.jpg')}}">
            </div>
            <div class="study-full">
                <div class="study-main-photo">                
                    <img src="{{asset('images/main/LamiBotox.jpg')}}">
                </div>  
                <div class="study-button2">
                       ПОДРОБНЕЕ
                </div>
                <div class="study-name">Курс для новичков "LamiBotox"</div>
                <div class="study-text">
                    Курс обучения «Ламинирование ресниц + Botox Lashes" поможет вам овладеть базовыми теоретическими знаниями и получить практические навыки работы с клиентами.
                </div>                
                <div class="program-plus">
                    <div class="program-plus-header">
                        Вы получите:
                    </div>
                    <div class="program-plus-content">
                    - В конце обучения вы получите сертификат.
                    <br>
                    - Для практических занятий студия предоставляет учащимся материалы для ламинирования и модель.

                    </div>
                </div>
                <div class="study-time">
                    1 день с 9:00 до 16:00
                </div>
                <div class="study-price">
                    Цена: 4000р.
                </div>
                <div class="program-curs">
                    <b>Программа курса:</b>
                    <ul class="program-content">
                        <li>Общая информация о процедуре</li>
                        <li>Инструменты и материалы</li>
                        <li>Условия хранения и сроки годности</li>
                        <li>Этапы выполнения процедуры</li>
                        <li>Инструкция для клиента</li>
                        <li>Техника безопасности</li>
                        <li>Противопоказания</li>
                        <li>Практическая часть</li>
                        <li>Демонстрация выполнения процедуры на модели преподавателем</li>
                        <li>Самостоятельная отработка на модели</li>
                    </ul>
                </div>
                <div class="study-button">
                    
                </div>
            </div>
        </div>
        <div class="study-slide zoom study-slide3">
            <div class="study-photo">
            <img src="{{asset('images/main/LashStart.jpg')}}">
            </div>
            <div class="study-full">
                <div class="study-main-photo">                
                    <img src="{{asset('images/main/LashStart.jpg')}}">
                </div>  
                <div class="study-button2">
                       ПОДРОБНЕЕ
                </div>
                <div class="study-name">LashStart</div>
                <div class="study-text">
                    В курс входит классика, 2д, 3д.<br>
    Практическая самостоятельная отработка на 2х моделях +1 демонстративная модель. Обучение проходит в мини группах - 2-4 человека.

                </div>                
                <div class="program-plus">
                    <div class="program-plus-header">
                    </div>
                    <div class="program-plus-content">
                    - В конце обучения вы получите сертификат.
                    <br>
                    - На время проведения курса студия предоставляет моделей и весь необходимый материал.
                    <br>
                    - После окончания курса вы сможете приобрести у нас весь необходимый материал для работы, а также сможете всегда оставаться на связи с преподавателем. 
                    <br>
                    - Вы получите пошаговый план для привлечения выших первых клиентов, и обработанные фото первых работ для портфолио.
                    <br>
                    - Также в курс входит одно занятие по формированию пучка, оно проходит за 3-4 дня до курса, чтобы дома была возможность потренироваться делать пучки. По времени занимает 1,5 часа.
                    </div>
                </div>
                <div class="study-time">
                    3 дня с 9:00 до 18:00                    
                </div>
                <div class="study-price">
                    Цена: 7000р.
                </div>
                <div class="program-curs">
                        <b>Программа курса:</b>
                    <ul class="program-content">
                        <li>Профессия LASHMAKER</li>
                        <li>Обзор материалов для наращивания</li>
                        <li>Клей, тонкости работы с клеем</li>
                        <li>Дезинфекция и стерилизация. Соблюдение правил антисептики в работе</li>
                        <li>Строение и фазы роста натуральных ресниц</li>
                        <li>Технологические характеристики классического наращивания, объёмного наращивания 2D, 3D</li>
                        <li>Пошаговая технология наращивания ресниц</li>
                        <li>Основы моделирования</li>
                        <li>Эффекты наращивания</li>
                        <li>Анатомические особенности влияющие на носку ресниц. Противопоказания к наращиванию</li>
                        <li>Коррекция или перенаращивание. Плюсы и минусы</li>
                        <li>Декорирование ресниц</li>
                        <li>Как оборудовать рабочее место</li>
                        <li>Общение с клиентом, как себя зарекомендовать. Рекомендации по привлечению клиентов</li>
                        <li>Обработка фотографий. Портфолио мастера</li>
                        <li>Программное обеспечение лэш-мастера</li>
                        <li>Раскрутка и ведение профиля в социальных.сетях</li>
                    </ul>
                </div>
                <div class="study-button">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="study-menu-full" attr="data1">
        <div class="study-photo">
            <img src="{{asset('images/main/LashStart_thumb.jpg')}}">
        </div>
        <div class="study-text">
            2222222
        </div>      
    </div>
</div>  
        <!-- study(4)-area end -->
        <!-- about(2)-area start -->
<div class="main-about white"><a class="links" name="about"></a>
    <h1 class="center">О нас</h1>
    <div class="about-main">            
        <div class="about-text">
            Преподаватели школы - практикующие и лучшие мастера города, победители и призеры чемпионатов! Участники множества конференций, мастер-классов.
            <br><br>    
            Мы заинтересованы в том, чтобы вы стали хорошим мастером. Наших выпускников приглашают работать в салоны красоты не только в республике, они также с легкостью устраиваются в салоны в России и на Украине. А кто-то со временем открывает свою студию.
            <br><br>
            Программы обучения разработаны с учетом последних тенденций в области индустрии красоты, позволяют быстро освоить профессию и стать востребованным специалистом.
            <br><br>
            <b>Мы не стоим на месте - мы развиваемся. Давай с нами!</b>
            <br><br>
        </div>
        <div class="about-photo">
            <img src="{{asset('images/main/about_min.jpg')}}">
        </div>
    </div>
    <div class="about-teachers">
        <div class="slider teachers">
            <div class="about-teachers-form">                    
                <div class="about-teachers-photo">
                    <img src="{{asset('images/alina2_min.jpg')}}">
                </div>
                <div class="about-teachers-text">
                    <b>Алина Шабанова</b><br>Руководитель студии красоты.
                    Lash&Brow эксперт. Практикующий мастер по наращиванию ресниц и моделированию бровей с 2015 года.
                    Обучила более 100 учеников, успешно работающих в бьюти индустрии.
                    Участник и призёр чемпионатов по наращиванию ресниц.
                </div>
            </div>
            <div class="about-teachers-form">
                <div class="about-teachers-photo">
                    <img src="{{asset('images/ruslana_min.jpg')}}">
                </div>
                <div class="about-teachers-text">
                    <b>Руслана Григорова</b><br>
                    Мастер по наращиванию и ламинированию ресниц.
                    Топ-мастер студии, в lash-индустрии с 2015 года.
                    Сделала красивыми более 3000 глаз.
                </div> 
            </div>               
        </div>     
    </div>
</div>    
        <!-- about(2)-area end -->
        <!-- plus(3)-area start -->
        <div class="main-plus white"><a class="links" name="plus"></a>
            <h1 class="center">Почему мы?</h1>
            <div class="main-plus-div">                
                <div class="plus-main">
                    <div class="plus-form">                    
                        <div class="plus-photo">
                            <img src="{{asset('images/ok.png')}}">
                        </div>
                        <div class="plus-text">
                            Поддержка преподавателем после курса. Мы всегда остаёмся на связи и готовы ответить на вопросы, которые могут возникнуть у Вас в будущем. 
                        </div>
                    </div>
                    <div class="plus-form">                    
                        <div class="plus-photo">
                            <img src="{{asset('images/ok.png')}}">
                        </div>
                        <div class="plus-text">
                            Ручная техника формирования пучка
                        </div>
                    </div>
                    <div class="plus-form">                    
                        <div class="plus-photo">
                            <img src="{{asset('images/ok.png')}}">
                        </div>
                        <div class="plus-text">
                            После курса вы получите обработанные фото ваших работ для портфолио
                        </div>
                    </div>
                    <div class="plus-form">                    
                        <div class="plus-photo">
                            <img src="{{asset('images/ok.png')}}">
                        </div>
                        <div class="plus-text">
                            В группе обучения не более 3-4 человек
У тренера будет достаточно времени, чтобы пристально наблюдать за каждым
                        </div>
                    </div>
                    <div class="plus-form">                    
                        <div class="plus-photo">
                            <img src="{{asset('images/ok.png')}}">
                        </div>
                        <div class="plus-text">                           
В конце курса вы гарантировано получите сертификат
                        </div>
                    </div>
                    <div class="plus-form">                    
                        <div class="plus-photo">
                            <img src="{{asset('images/ok.png')}}">
                        </div>
                        <div class="plus-text">
                            Вы узнаете где искать своих первых клиентов и как их удержать.
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!-- plus(3)-area end -->
<div class="main-schedule pink2"><a class="links" name="plus"></a>
    <a class="links" name="schedule"></a><h1 class="center">Расписание</h1>
    <div class="study-schedule">            
        <table>
            <tr class="head-table">
                <td>Дата проведения</td>
                <td class="center-head-table">Название курса</td>
                <td>Места</td>
            </tr>            
            <tr>
                <td>
                    <table>
                        @foreach ($schedules as $schedule)
                        <tr><td>{{$schedule->time->day}}.{{$schedule->time->month}}</td></tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table>
                        @foreach ($schedules as $schedule)
                        <tr><td>{{$schedule->name}}</td></tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table>
                        @foreach ($schedules as $schedule)
                        <tr><td>{{$schedule->places}}</td></tr>
                        @endforeach
                    </table>
                </td>
            </tr>            
        </table>
    </div>
</div>  

        <!-- galery(5)-area start -->
        <div class="main-galery white"><a class="links" name="galery"></a>
            <h1 class="center">Галерея</h1>
            <div class="slider galery">
                @foreach ($images as $image)
                <div class="galery-slide">
                     <img  src=/{{$image->image_mini}}>
                </div>
                @endforeach
            </div>        
        </div>    
        
        <!-- galery(5)-area end -->
        <!-- galery(5)-area start -->
        
        <div class="main-video pink2"><a class="links" name="video"></a>
            @if (0)
            <h1 class="center">Видео</h1>
            <div class="slider demo white">
                <div> Slide  1 </div>
                <div> Slide  2 </div>
                <div> Slide  6 </div>
                <div> Slide  7 </div>
            </div>
            <div class="galery-carousel">            
                <div class="galery-photo">
                    фото 1
                </div>
                <div class="galery-photo">
                    фото 2
                </div>
            </div> 
            @endif
        </div>    
        
        <!-- galery(5)-area end -->
        <!-- galery(5)-area start -->
        <div class="main-student white"><a class="links" name="works"></a>
            <h1 class="center">Работы наших учениц</h1>
            
            <div class="slider student-slider white">
                @include('parts.girls')
            </div>    
        </div>    
        
        <!-- galery(5)-area end -->
        <!-- galery(5)-area start -->
        <div class="main-video pink"><a class="links" name="faq"></a>
            @if (0)
            <h1 class="center">Вопрос-ответ</h1>    
            @endif
        </div>    
        
        <!-- galery(5)-area end -->

        <!-- galery(5)-area start -->
        <div class="main-comment white"><a class="links" name="comment"></a>
            <h1 class="center">Отзывы</h1>
           <div class="slider comment">
                @if (isset($replys['0']->id_dop))
                    <?php $i = $replys['0']->id_dop ?>
                    <div class="comment-photo">
                    @foreach ($replys as $reply)
                        @if ($i != $reply->id_dop)
                        </div><div class="comment-photo">
                        @endif
                            <img  src=/{{$reply->image_mini}}>
                        <?php $i = $reply->id_dop ?>
                    @endforeach
                    </div>
                @endif
            </div>
        </div>           
@stop


@push('scripts')
<script type="text/javascript">

(function($) { 
var open = [0,0,0];
$.fn.zoom = function(newoptions){
         
        
        var options = {		
			width:314,
                        position:0,
                        height:630
	};
        options = $.extend( true, options, newoptions );
        
	function stop_zoom() {  
            
	}
        
        function init(item){ 
           
            if (open[item.parent().parent().data('slick-index')])
            {
                
                var par=item.parent().parent().parent();
                par.children().each(function() {
                    item.finish();
                    item.children('.study-photo').children('img').finish();
                    item.children().children('.program-plus').finish();
                    item.children().children('.program-curs').finish();
                    $('.study-menu').finish();
                  });
                var num=par.children().length;
                for (var i=0;i < num;i++)
                {
                    if (item.is(par.children(':nth-child('+(i+1)+')').children().children()))
                    {
                        
                        continue;
                    }
                    par.children(':nth-child('+(i+1)+')').hide();
                }
                item.parent().parent().css({'width' : '1000px'});
                item.children().children('.study-button2').hide();
                item.children().children('.study-main-photo').css({'float' : 'left'});
                item.animate({width:"100%",'margin' : '10px'},500,function()
                {                    
                    item.children().children('.program-plus').show(500);
                    item.children().children('.program-curs').show(500);
                });
                item.css({'height' : 'auto'});
                item.children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'30px 30px'},500);
                $('.study-menu').animate({'margin-top' : '0'});
                item.children().children('.study-text').css({'font-size' : '20pt','font-weight' : 'bold','height' : 'auto','margin-bottom' : '20px'});
                if(options.position)
                {
                }
            }
            else
            {
                var par=item.parent().parent().parent();
                par.children().children().each(function() {
                    item.finish();
                    item.children('.study-photo').children('img').finish();
                    item.children().children('.program-plus').finish();
                    item.children().children('.program-curs').finish();
                    $('.study-menu').finish();
                  });
                if(options.position)
                {
                    item.parent().parent().animate({width:options.width,'margin' : '-25px -200px'},500);
                }
                else{
                    item.parent().parent().animate({width:options.width},0);
                }
                item.css({'height' : options.height});
                item.children().children('.program-plus').hide();
                item.children().children('.program-curs').hide();
                item.children().children('.study-button2').show();
                item.children().children('.study-main-photo').css({'float' : 'none'});
                item.children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'0px 0px'});  
                item.children().children('.study-text').css({'font-size' : '16pt','font-weight' : 'normal','height' : '150px','margin-bottom' : '0px'});
                $('.study-menu').animate({'margin-top' : '50'},500);

                var num=par.children().length;

                for (var i=0;i < num;i++)
                {
                    if (item.is(par.children(':nth-child('+(i+1)+')').children().children()))
                    {
                        continue;
                    }
                    par.children(':nth-child('+(i+1)+')').slideToggle(500);
                }
            }
        }
        
        
        function start_zoom() {
            if (open[$(this).parent().parent().data('slick-index')] === 0)
            {
                var par=$(this).parent().parent().parent();
                par.children().children().each(function() {
                    $(this).finish();
                    $(this).children('.study-photo').children('img').finish();
                    $(this).children().children('.program-plus').finish();
                    $(this).children().children('.program-curs').finish();
                    $('.study-menu').finish();
                  });
                var num=par.children().length;
                for (var i=0;i < num;i++)
                {
                    if ($(this).is(par.children(':nth-child('+(i+1)+')').children().children()))
                    {
                        
                        continue;
                    }
                    par.children(':nth-child('+(i+1)+')').hide();
                }
                $(this).parent().parent().css({'width' : '1000px'});
                $(this).children().children('.study-button2').hide();
                $(this).children().children('.study-main-photo').css({'float' : 'left'});
                $(this).animate({width:"100%",'margin' : '10px'},500,function()
                {                    
                    $(this).children().children('.program-plus').show(500);
                    $(this).children().children('.program-curs').show(500);
                });
                $(this).css({'height' : 'auto'});
                $(this).children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'30px 30px'},500);
                $('.study-menu').animate({'margin-top' : '0'});
                $(this).children().children('.study-text').css({'font-size' : '20pt','font-weight' : 'bold','height' : 'auto','margin-bottom' : '20px'});
                if(options.position)
                {
                }
                open[$(this).parent().parent().data('slick-index')]=1
            }
            else
            {
                var par=$(this).parent().parent().parent();
                par.children().children().each(function() {
                    $(this).finish();
                    $(this).children('.study-photo').children('img').finish();
                    $(this).children().children('.program-plus').finish();
                    $(this).children().children('.program-curs').finish();
                    $('.study-menu').finish();
                  });
                if(options.position)
                {
                    $(this).parent().parent().animate({width:options.width,'margin' : '-25px -200px'},500);
                }
                else{
                    $(this).parent().parent().animate({width:options.width},0);
                }
                $(this).css({'height' : options.height});
                $(this).children().children('.program-plus').hide();
                $(this).children().children('.program-curs').hide();
                $(this).children().children('.study-button2').show();
                $(this).children().children('.study-main-photo').css({'float' : 'none'});
                $(this).children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'0px 0px'});  
                $(this).children().children('.study-text').css({'font-size' : '16pt','font-weight' : 'normal','height' : '150px','margin-bottom' : '0px'});
                $('.study-menu').animate({'margin-top' : '50'},500);

                var num=par.children().length;

                for (var i=0;i < num;i++)
                {
                    if ($(this).is(par.children(':nth-child('+(i+1)+')').children().children()))
                    {
                        continue;
                    }
                    par.children(':nth-child('+(i+1)+')').slideToggle(500);
                }
                open[$(this).parent().parent().data('slick-index')]=0
            }
	}    
        
		
	$(this).each(function(){
		var dataOriginal = $(this).data("original");
		$(this).data('zoom', dataOriginal);
                if(open[$(this).parent().parent().data('slick-index')]===1)
                {
                    init($(this));        
                }                        
	})
	.on('click', stop_zoom)
	.on('click', start_zoom);
        
	return this;
};
/*$(function(){ $('.zoom').zoom(); });
$(function(){ $('.zoom2').zoom({
          width:400,
          position: true,
          height:500          
          }); 
});*/
$.fn.zoom2 = function(newoptions){
         
        var options = {		
			width:314,
                        position:0,
                        height:630
	};
        options = $.extend( true, options, newoptions );
        
	function stop_zoom() {  
            
	}


        function init(item){            
            if (open[item.parent().parent().data('slick-index')])
            {                
                item.children().children('.program-plus').hide();
                item.children().children('.program-curs').hide();
                item.css({'height' : options.height});
                
                item.children().children('.study-button2').show();
                item.children().children('.study-main-photo').css({'float' : 'none'});
                item.children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'0px 0px'});  
                item.children().children('.study-text').css({'font-size' : '16pt','font-weight' : 'normal','height' : '150px','margin-bottom' : '0px'});
                open[item.parent().parent().data('slick-index')]=0
            }
        }
        
        
        
	function start_zoom() {
            if (open[$(this).parent().parent().data('slick-index')] === 0)
            {
                var par=$(this).parent().parent().parent();
                par.parent().css({'height' : 'auto'});
                par.children().each(function() {
                    $(this).finish();
                    $(this).children().children().children('.study-photo').children('img').finish();
                    $(this).children().children().children().children('.program-plus').finish();
                    $(this).children().children().children().children('.program-curs').finish();
                    $('.study-menu').finish();
                  });
                var num=par.children().length;
                $(this).children('.study-full').css({'padding' : '5px'});
                $(this).children().children('.study-button2').hide();
                $(this).animate({width:"100%",'margin' : '0px'},500,function()
                {                    
                    $(this).children().children('.program-plus').show(500);
                    $(this).children().children('.program-curs').show(500);
                });
                $(this).css({'height' : 'auto'});
                $(this).children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'30px 30px'},500);
                $('.study-menu').animate({'margin-top' : '0'});
                $(this).children().children('.study-text').css({'font-size' : '20pt','font-weight' : 'bold','height' : 'auto','margin-bottom' : '20px'});
                for (var i=0;i < num;i++)
                {
                    if ($(this).is(par.children(':nth-child('+(i+1)+')').children().children()))
                    {                        
                        continue;
                    }
                    if(open[par.children(':nth-child('+(i+1)+')').data('slick-index')]===1)
                    {
                        var par2 = par.children(':nth-child('+(i+1)+')').children().children();
                        par2.css({'height' : options.height});
                        par2.children().children('.program-plus').hide();
                        par2.children().children('.program-curs').hide();
                        par2.children().children('.study-button2').show();
                        par2.children().children('.study-main-photo').css({'float' : 'none'});
                        par2.children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'0px 0px'});  
                        par2.children().children('.study-text').css({'font-size' : '16pt','font-weight' : 'normal','height' : '150px','margin-bottom' : '0px'});
                        open[par.children(':nth-child('+(i+1)+')').data('slick-index')]=0;
                    }                    
                }
                open[$(this).parent().parent().data('slick-index')]=1
            }
            else
            {
                var par=$(this).parent().parent().parent();
                console.log(par);
                par.children().each(function() {
                    $(this).finish();
                    $(this).children().children().children('.study-photo').children('img').finish();
                    $(this).children().children().children().children('.program-plus').finish();
                    $(this).children().children().children().children('.program-curs').finish();
                    $('.study-menu').finish();
                  });
                $(this).children().children('.program-plus').hide();
                $(this).children().children('.program-curs').hide();
                $(this).css({'height' : options.height});
                
                $(this).children().children('.study-button2').show();
                $(this).children().children('.study-main-photo').css({'float' : 'none'});
                $(this).children().children('.study-main-photo').children('img').animate({'max-width':"300px",'padding':'0px 0px'});  
                $(this).children().children('.study-text').css({'font-size' : '16pt','font-weight' : 'normal','height' : '150px','margin-bottom' : '0px'});
                $('.study-menu').animate({'margin-top' : '50'},500);

                var num=par.children().length;

                
                open[$(this).parent().parent().data('slick-index')]=0
            }
	}    
        
		
	$(this).each(function(){
		var dataOriginal = $(this).data("original");
		    
		$(this).data('zoom', dataOriginal);
                if(open[$(this).parent().parent().data('slick-index')]===1)
                {
                    init($(this));        
                }    
	})
	.on('click', stop_zoom)
	.on('click', start_zoom);
	
	return this;
};

})(jQuery);


    
function change()
{
    var i = $('.main-student .slick-current .student-work img[attr="active"]').index()+1;
    var l = $('.main-student .slick-current .student-work img').length;   
    if (l>1)
    {
        $('.main-student .slick-current .student-work img:nth-child('+i+')').fadeOut(1500);
        $('.main-student .slick-current .student-work img:nth-child('+i+')').attr('attr', '');
        if (i<l)
        {
           $('.main-student .slick-current .student-work img:nth-child('+(i+1)+')').fadeIn(1500).css({"display":"block"});
           $('.main-student .slick-current .student-work img:nth-child('+(i+1)+')').attr('attr', 'active');
        }
        else
        {
           $('.main-student .slick-current .student-work img:nth-child('+1+')').fadeIn(1500).css("display", "block");
           $('.main-student .slick-current .student-work img:nth-child('+1+')').attr('attr', 'active');
        }
    }    
}

window.setInterval(change,4000);

function openpr(el)
{
    $(el).parent().children('.program-content').show();
    $(el).attr('onClick', 'closepr(this);');
}
function closepr(el)
{
    $(el).parent().children('.program-content').hide();
    $(el).attr('onClick', 'openpr(this);');
}

</script>
@endpush