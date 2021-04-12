<header class="header-area">
    <div class="header-top-block">
        <div class="header-block adress">
            <div class="main-top-adress">
                <a href ="https://yandex.ru/maps/-/CCQ~RWxi9B" target="_blank"><img src="{{asset('images/map.png')}}">
                    <span>г.Макеевка,<br> квартал Химик, 55</span></a>
            </div>  
        </div> 
        <div class="header-block logo">
            <a href="/">
                <img src="{{asset('images/logo.png')}}">
            </a>
        </div>    
        <div class="header-block main-top-contact">
            <div class="main-top-phone">
                <a href="tel:+380713808815">
                    <i class="fa fa-phone"> +38 (071) 3808815</i></a>                
            </div>
            <div class="main-top-vk">
                <a href="https://vk.com/resnici_makeevka" target="_blank"><i class="fa fa-vk"> <span>resnici_makeevka</span></i></a>
            </div>
            <div class="main-top-in">
                <a href="https://www.instagram.com/lashes_brows_studio/" target="_blank"><i class="fa fa-instagram"> <span>lashes_brows_studio</span></i></a>
            </div>
        </div> 
    </div>
    <div class="header-block header-top" id="header-scroll">
        <ul class="header-menu">
            <a href="#main"><li>Главная</li></a>
            <a href="#about"><li>О нас</li></a>
            <a href="#plus"><li>Преимущества</li></a>
            <a href="#schedule"><li>Расписание</li></a>
            <a href="#galery"><li>Галерея</li></a>
            @if (0)
            <a href="#video"><li>Видео</li></a>
            @endif
            <a href="#works"><li>Ученицы</li></a>
            @if (0)
            <a href="#faq"><li>Вопросы</li></a>
            @endif
            <a href="#comment"><li>Отзывы</li></a>
        </ul>
    </div>
            <!-- responsive-menu area start -->
    
</header>

@push('scripts')

@endpush