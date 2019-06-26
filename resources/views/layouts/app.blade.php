<html>
<head>
    <title>应用名称 - @yield('title')</title>
</head>
<body>
@section('sidebar')

@show
<div class="container">
    @yield('content')
</div>
</body>
</html>