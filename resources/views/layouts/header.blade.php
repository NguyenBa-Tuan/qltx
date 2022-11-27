<header class="site-header">
    <div class="container">
        <div class="header-top d-flex justify-content-between align-items-center">
            <div class="left d-flex align-items-center">
                <a href="#" class="logo">
                    <img src="{{asset('/images/logo.png')}}" alt="" srcset="">
                </a>
                <form action="#" class="search">
                    <input type="text" placeholder="Tim kiem" class="p-1">
                    <button type="submit" class="btn btn-primary ms-2">Tìm kiếm</button>
                </form>
                <nav class="site-menu">
                    <ul>
                        <li class=""><a href="#">Trang chu</a></li>
                        <li class="ms-2"><a href="#">Thue xe</a></li>
                        <li class="ms-2"><a href="#">Lich su thue xe</a></li>
                    </ul>
                </nav>
            </div>
            <div class="right d-flex align-items-center">
                <a href="{{route('login')}}" class="login">Dang nhap</a>
                <a href="{{route('register')}}" class="register ms-4">Dang ky</a>
            </div>
        </div>
    </div>
    @include('layouts.banner')
</header>