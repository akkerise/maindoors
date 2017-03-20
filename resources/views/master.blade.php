<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Maindoors.com.vn</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 1. CSS ở đây -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dien.css') }}" rel="stylesheet">
    <link href="{{ asset('css/truongnguyen_style.css') }}" rel="stylesheet">

</head>
<body>
<!-- 2. HTML ở đây -->
<div id="wrapper">
    <!-- .header -->
@include('maindoors.blocks.header')
<!-- END header -->

@yield('content')

<!-- .register -->
@yield('register')
<!-- END POPUP REGISTER-->

    <!-- .login -->
@yield('login')
<!-- END POPUP LOGIN-->


    <!-- END class Content -->
@yield('content')

<!-- .footer -->
    @include('maindoors.blocks.footer')
</div>
<!--popup tin tuc-->

@yield('page_script')

<!-- 3. JS ở đây -->
<script type="text/javascript" src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/front-end.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</body>
</html>