<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titile')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assets/libs/fancybox/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/libs/toastr-master/build/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>
<body>

<div class="container">
    @include('layouts.blocks.navbar')
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="{{ asset('/assets/libs/toastr-master/toastr.js') }}"></script>
<script src="{{ asset('/assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/assets/libs/sortable-master/Sortable.js') }}"></script>
<script src="{{ asset('/assets/libs/fileinput/js/fileinput.js') }}"></script>
<script src="{{ asset('/assets/libs/fileinput/js/locales/ru.js') }}"></script>
<script src="{{ asset('/assets/libs/montage/jquery.montage.min.js') }}"></script>
<script src="{{ asset('/assets/libs/fancybox/fancybox.umd.js') }}"></script>
<script src="{{ asset('/assets/js/media.js') }}"></script>
@if (session()->has('success'))
<script>
    toastr.success("{!! session('success') !!}")
</script>
@endif
@if (session()->has('errors'))
<script>
    toastr.error("{!! session('errors') !!}")
</script>
@endif
@if (session()->has('error'))
<script>
    toastr.error("{!! session('error') !!}")
</script>
@endif
@if (isset($errors) && !empty($errors->first('error')))
<script>
    toastr.error("{!! $errors->first('error') !!}")
</script>
@endif
</body>
</html>
