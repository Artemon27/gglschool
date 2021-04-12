

<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>

    
    <script src="{{asset('js/slick.js')}}"></script>
    
    <script>
        
        $(document).ready(function(){           
            
	  $('.demo').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 1,
          slidesToShow: 3        
          });
          
          if (window.devicePixelRatio<2){
                       
          $('.study-menu').on('init', function(event, slick, currentSlide, nextSlide){
          if (slick.activeBreakpoint===2000)
          $(function(){ $('.zoom').zoom(); });
          else
          $(function(){ $('.zoom').zoom2(); });
          });
          
          $('.study-menu').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 1,
          adaptiveHeight: true,
          variableWidth:0,
          responsive: [
	    {
	      breakpoint: 2000,
	      settings: {
	        slidesToShow: 3,
                centerMode: true,
	      }
	    },
	    {
	      breakpoint: 500,
	      settings: {
	        slidesToShow: 1,
                variableWidth:false,
                
	      }
	    }
                ]
          });
            $('.study-menu').on('breakpoint', function(event, slick, currentSlide){
                console.log(event);
                console.log(currentSlide);
            if (currentSlide===2000)
            {
                
                $(function(){ $('.zoom').zoom(); });
                
            }            
            else
            {
                
                $(function(){ $('.zoom').zoom2(); });
                
            }            
            });
            
      }
      else{
          $('.study-menu').on('init', function(event, slick, currentSlide, nextSlide){
            if (slick.activeBreakpoint===4000)
            {
                $(function(){ $('.zoom').zoom(); });                
            }            
            else
            $(function(){ $('.zoom').zoom2(); });
            });
          
          $('.study-menu').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 1,
          adaptiveHeight: true,
          responsive: [
	    {
	      breakpoint: 4000,
	      settings: {
	        slidesToShow: 3,
	      }
	    },
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 1,
                variableWidth:false,
	      }
	    }
                ]
          });
            
            $('.study-menu').on('breakpoint', function(event, slick, currentSlide, nextSlide){
            if (currentSlide === 4000)
            $(function(){ $('.zoom').zoom(); });
            else
            $(function(){ $('.zoom').zoom2(); });
            });
          
      }
         
          
          $('.teachers').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 1,
          slidesToShow: 1
          });
          
          $('.comment').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 1,
          slidesToShow: 1
          });
          
          $('.galery').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 2,
          slidesToShow: 1        
          });
          
          $('.student-slider').slick({
          accessibility: true,
          arrows: true,
          prevArrow: '<button type="button" data-role="none" class="slick-prev"></button>',
          rows: 1,
          slidesToShow: 1       
          });
	});
        </script>
        
        
    
   <script type="text/javascript">


    var pred = 0;
    var head;
    var max;
    var max2;
    
    
        
    if(window.scrollY>max){
            head = 0;}
        else
            head=1;

    function f()
    {
        if(pred==window.scrollY) return 0;
        pred = window.scrollY;        
        if ((($( window ).width()<500)&&(window.devicePixelRatio<2))||((window.devicePixelRatio>=2)&&($( window ).width()<1200)))
        {
            max = 110;
            max2 = 130;
        }
        else
        {
            max = 120;
            max2 = 140;
        }               
        if(head==1){
            if(window.scrollY>max2)
            {
               $(".header-area").css({'margin-top':-max2,'opacity':'0.8'}); 
               head=0;
            }
            else
            {
                $(".header-area").css({'margin-top':-window.scrollY}); 
            }
        }
        else if (window.scrollY<max2)
        {
            head=1;
            $(".header-area").css({'margin-top':-window.scrollY,'opacity':'1'});
        }
    }

    window.setInterval(f,1);

</script>
    <!-- main js -->
    <script src="{{asset('js/scripts.js')}}"></script>
    
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(68158468, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/68158468" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->