@foreach ($girls as $girl)
<div class = "student-container">            
    <div class="student"> 
        <div class="student-header">
            <div class="student-name">
                {{$girl->name}}
            </div>
            <div class="student-inst">
                @if ($girl->vk)                                    
                <a href='{{$girl->vk}}' target="_blank">Vk</a>
                @endif
                @if ($girl->instagram)
                <a href='http://instagram.com/{{$girl->instagram}}' target="_blank">Inst</a>
                @endif
            </div>
        </div>
        <div class="student-main">
            <div class="student-work">
                @foreach ($girl->images as $image)
                <img src="/{{$image->image_mini}}">
                @endforeach
            </div>
            <div class="student-description">
                <div class="student-curs">
                    Закончила курс {{$girl->curs}}
                </div>
                <div class="student-text">
                    {{$girl->description}}
                </div>
            </div>
        </div>
    </div>
    <div class="student-photo"><img src="/{{$girl->avatar->image}}"></div>
</div>    
@endforeach
