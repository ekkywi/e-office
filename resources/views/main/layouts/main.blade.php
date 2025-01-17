<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title")</title>
    <!-- General CSS Files -->
    <link href="{{ asset("modules/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("modules/fontawesome/css/all.min.css") }}" rel="stylesheet">
    <!-- Template CSS -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("css/components.css") }}" rel="stylesheet">
    <link href="{{ asset("css/menu.css") }}" rel="stylesheet">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            @include("main.components.navbar")

            <!-- Main Content -->
            <div class="main-content">
                @yield("content")
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    &copy; 2025 E-Office - All Rights Reserved
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @yield("script")
</body>

</html>
