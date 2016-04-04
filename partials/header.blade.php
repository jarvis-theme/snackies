<div id="header-container">
    <div id="header-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-7 col-sm-7 logo-container">
                    <strong class="logo">
                        <a href="{{URL::to('home')}}">
                            {{HTML::image(logo_image_url(),'Logo '.Theme::place('title'))}}
                        </a>
                    </strong>
                </div>
                <div class="col-xs-5 col-sm-5 cart-container">
                    <div class="header-cart" id="top-search">
                        <div class="search-cont">
                            <form action="{{URL::to('search')}}" method="post">
                                <input id="search" type="text" name="search" class="query" placeholder="Cari Produk">
                                <button class="btn-search"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div id="shoppingcartplace">
                        {{shopping_cart()}}
                    </div>
                    <div class="header-cart">
                        <div class="top-links center-sm">
                            <ul class="link-menu cl-effect-21">
                                @if ( !is_login() )
                                    <li>{{HTML::link('member', 'Login')}}</li>
                                    <li>{{HTML::link('member/create', 'Register')}}</li>
                                    <li>{{HTML::link('produk', 'Produk')}}</li>
                                    <li>{{HTML::link('blog', 'Blog')}}</li>
                                @else
                                    <li class="dropdown hidden-xs"><a class="dropdown-toggle" data-toggle="dropdown">Akun<i class="icon-arrow-down9"></i></a>
                                        <ul class="dropdown-menu">
                                            <li> {{HTML::link('member', 'My Account')}}</li>
                                            <li> {{HTML::link('logout', 'Logout')}}</li>
                                        </ul>
                                    </li>
                                    <li>{{HTML::link('produk', 'Produk')}}</li>
                                    <li>{{HTML::link('blog', 'Blog')}}</li>
                                    <li>{{HTML::link('checkout', 'Keranjang Belanja')}}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <br>
    <div id="menu-container">
        <div class="container">
            <div class="inner">
                <ul class="main-menu menu visible-lg">
                    <li class="active annonce"><a href="{{URL::to('/')}}"><i class="icon-home2"></i></a></li>
                    @foreach(category_menu() as $key=>$menu)
                    <li class="annonce">
                        @if($menu->parent=='0')
                        <a href="{{category_url($menu)}}">{{$menu->nama}}</a>
                            @if(count($menu->anak) > 0)
                            <ul class="sub_menu">
                                @foreach($menu->anak as $key1=>$submenu)
                                    @if($submenu->parent==$menu->id)
                                    <li><a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                        @foreach($submenu->anak as $key3=>$bug2)
                                        @if($bug2->parent==$submenu->id)
                                        <ul>
                                            <li><a href="{{category_url($bug2)}}">{{$bug2->nama}}</a>
                                        </ul>
                                        @endif
                                        @endforeach
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        @endif
                    </li>
                    @endforeach
                </ul>
                
                <div class="mobile-menu hidden-lg">
                    <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger"><i class="icon-menu2"></i></button>
                        <ul class="dl-menu">
                            <li class="active">
                                <a href={{URL::to("/")}}><i class="icon-home"></i></a>
                            </li>
                            @foreach(category_menu() as $key => $menu)
                            <li>
                                @if($menu->parent == '0')
                                    <a href="{{category_url($menu)}}">{{$menu->nama}}</a>
                                    @if(count($menu->anak) > 0)
                                    <ul class="dl-submenu">
                                        @foreach($menu->anak as $key1 => $submenu)
                                            @if($submenu->parent == $menu->id)
                                            <li>
                                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                                @if(count($submenu->anak) > 0)
                                                <ul class="dl-submenu">
                                                    @foreach($submenu->anak as $key3=>$submenu2)
                                                        @if($submenu2->parent==$submenu->id)
                                                        <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @endif
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
