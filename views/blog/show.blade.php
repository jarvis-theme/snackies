<div id="site-wrapper">
    <br>
    <div class="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="{{URL::to('blog')}}">Blog</a></li>
                        <li class="active">{{$detailblog->judul}}</li>
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
                                <li>
                                    <a href="{{blog_url($recent)}}">{{ short_description($recent->judul,25) }}</a>
                                    <br />
                                    <small class="blog-time">diposting {{waktuTgl($recent->created_at)}}</small>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                            <div class="cat-image"><h1 class="section-title">{{$detailblog->judul}}</h1></div>
                            <small class="dateblog"><i class="icon-calendar5"></i> {{waktuTgl($detailblog->created_at)}} <span>&nbsp;&nbsp; <i class="icon-tag"></i>&nbsp;<a href="{{URL::to('blog/category/'.$detailblog->kategori->nama)}}">{{$detailblog->kategori->nama}}</a></span></small>
                            <div class="share-blog">
                                {{sosialShare(blog_url($detailblog))}}
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
                            <div class="description">{{ $detailblog->isi }}</div>
                            @if(prev_blog($detailblog))
                            <ul class="direction-nav pagination-direction float-left">
                                <li><a href="{{blog_url(prev_blog())}}">&larr; Sebelumnya</a></li>
                            </ul>
                            @endif
                            @if(next_blog($detailblog))
                            <ul class="direction-nav pagination-direction float-right">
                                <li><a href="{{blog_url(next_blog())}}">Selanjutnya &rarr;</a></li>
                            </ul>
                            @endif
                            <br><hr><br>
                            {{$fbscript}}
                            {{fbcommentbox(slugBlog($detailblog), '670px', '5', 'light')}}
                        </div>

                        <div class="clearfix "></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>