<header class="site-header">
    <div class="container">
        <div class="header-top d-flex justify-content-between align-items-center">
            <div class="left d-flex align-items-center">
                <a href="/" class="logo">
                    <img src="{{asset('/images/logo.png')}}" alt="" srcset="">
                </a>
                <form action="{{route('search.vehicles', 'search')}}" method="GET">
                    <input type="text" placeholder="Tim kiem" class="p-1" name="search">
                    <button type="submit" class="btn btn-primary ms-2">Tìm kiếm</button>
                </form>
                <nav class="site-menu">
                    <ul>
                        <!-- <li class=""><a href="#">Trang chu</a></li> -->
                        @if(Auth::check())
                        @if(Auth::user()->role == 0)
                        <li class="ms-2"><a href="{{route('brand.index')}}">Dashboard</a></li>
                        @else(Auth::user()->role != 0)
                        <li class="ms-2"><a href="{{route('bookingHistory')}}">Lich su thue xe</a></li>
                        @endif
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="right d-flex align-items-center">
                @if(Auth::check())
                <a class="ms-4" href="javascript:void(0)" style="color:red">{{Auth::user()->name}}</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="register ms-4">Logout</button>
                </form>
                @else
                <a href="{{route('showLoginForm')}}" class="login">Dang nhap</a>
                <a href="{{route('register')}}" class="register ms-4">Dang ky</a>
                @endif
            </div>
        </div>
    </div>
</header>