<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLTX</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        .form_auth {
            border: 1px solid #ccc;
            width: 500px;
            padding: 30px;
            margin: 50px auto;
        }
    </style>
</head>

<body>
    <div id="wrapper">
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
                                <li class=""><a href="#">Trang chu</a></li>
                                <li class="ms-2"><a href="#">Thue xe</a></li>
                                <li class="ms-2"><a href="#">Lich su thue xe</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="right d-flex align-items-center">
                        <a href="{{route('showLoginForm')}}" class="login">Dang nhap</a>
                        <a href="{{route('register')}}" class="register ms-4">Dang ky</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="site-main">
            @if(Session::has('errors'))
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div class="form_auth">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div>
                        <label>Conmfirm Password</label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div>
        </main>

        @include('layouts.footer')
    </div>
</body>

</html>