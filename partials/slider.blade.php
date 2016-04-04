<div id="top-slider" class="flexslider-container container">
    <div class="flexslider">
        <ul class="slides">
            @foreach(slideshow() as $val)
            <li>
                <center>
                    @if(!empty($val->url))
                    <a href="{{filter_link_url($val->url)}}" target="_blank">
                    @else
                    <a href="#">
                    @endif
                        {{HTML::image(slide_image_url($val->gambar), $val->title)}}
                    </a>
                </center>
            </li>
            @endforeach
        </ul>
    </div>
</div>