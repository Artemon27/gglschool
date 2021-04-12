<div class=" header-area">
    <div class="header-top-block">
        <div class="header-block adress">
            <div class="main-top-adress">
                <a href ="https://yandex.ru/maps/-/CGwR6RKL" target="_blank"><img src="{{asset('images/map.png')}}">
                    <span>г.Макеевка,<br> улица Ленина 159</span></a>
            </div>  
        </div> 
        <div class="header-block logo">
            <a href="/">
                <img src="{{asset('images/logo.png')}}">
            </a>
        </div>    
        <div class="header-block main-top-contact">
            <div class="main-top-phone">
                <a href="tel:+380954038147">
                <i class="fa fa-phone"> +38(095)4038147</i></a>                
            </div>
            <div class="main-top-vk">
                <a href="https://vk.com/maklashes" target="_blank"><i class="fa fa-vk"> maklashes</i></a>
            </div>
            <div class="main-top-in">
                <a href="https://www.instagram.com/lashes_brows_studio/" target="_blank"><i class="fa fa-instagram"> lashes_brows_studio</i></a>
            </div>
        </div> 
    </div>
    <div class='onmain-go header-menu'><a href="/">Вернуться на главную</a>
    

    
    
    
    
    
@if (Auth::check()) 

<a href="/admin">Админка</a>
<a href="/admin/schedules">Все курсы</a>
<a href="/admin/persons">Все участники</a>
<a href="/admin/request">Оставленные номера</a>
<a href="/admin/images">Изображения</a>
<a class='pointer' href='/logout'>Выход</a>

@endif

</div>
    
</div>
