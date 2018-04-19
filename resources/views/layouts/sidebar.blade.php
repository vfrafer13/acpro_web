<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        @include('includes.navbar')
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            @yield('navheader')
        </nav>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    @include('includes.footer')
</footer>
</body>
@include('includes.scripts')
</html>