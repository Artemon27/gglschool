<!doctype html>
<html class="no-js" lang="">

@include('head')
@include('scripts')
<body>    
    
    <div class="site">
        
          
        <!-- header-area start -->
        <!-- include('header')
        <!-- header-area end -->
        <!-- top(1)-area start -->
        
        @yield ('mainframe') 
        
        <!-- galery(5)-area end -->

        <!-- slider-area start -->
        <!-- blog-area end -->

        <!-- footer-area start -->
    @include('footer')      
        <!-- footer-area end -->
</div>

@stack('scripts')
</body>

</html>