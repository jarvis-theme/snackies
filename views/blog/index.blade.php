<div id="site-wrapper">
    <div class="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="active">Blog</li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main-content category-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-lg-3 sidebar">
                    @if(count(list_blog_category()) > 0)
                    <div class="section category-list module-list-items">
                        <h4 class="section-title">Kategori</h4>
                        <div class="section-inner">
                            <ul class="unstyled pretty-list cl-effect-1">
                                @foreach(list_blog_category() as $key=>$value)
                                <li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if(count(recentBlog()) > 0)
                    <div class="section category-list module-list-items">
                        <h4 class="section-title">Artikel Terbaru</h4>
                        <div class="section-inner">
                            <ul class="unstyled pretty-list cl-effect-1">
                                @foreach(recentBlog() as $recent)
                                <li><a href="{{blog_url($recent)}}">{{short_description($recent->judul, 25)}}</a><br /><small class="blog-time">diposting {{waktuTgl($recent->updated_at)}}</small></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                            <div class="cat-image"><h1>Artikel Kami</h1></div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>

                        @foreach(list_blog(null, @$blog_category) as $key=>$value)
                        <a href="{{blog_url($value)}}">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
                                <div class="description">
                                    <div class="cat-image"><h2 class="blogtitle">{{$value->judul}}</h2></div>
                                    <small><i class="icon-calendar5"></i> {{waktuTgl($value->created_at)}}</small>
                                    <img src="{{ imgString($value->isi) }}" class="blog" />
                                    <div>
                                        {{ blogIndex($value->isi,250) }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach 
                        <div class="clearfix "></div>
                        {{ list_blog(null, @$blog_category)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>