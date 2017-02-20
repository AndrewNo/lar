<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Doc</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/theme.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='/vendors/tinymce/tinymce.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tiny',
            language: 'ru',
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages"
            ],

            // ===========================================
            // PUT PLUGIN'S BUTTON on the toolbar
            // ===========================================

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

            // ===========================================
            // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
            // ===========================================

            relative_urls: false
        });
    </script>
    <style>
        .sub:hover .dropdown-menu{
            display: block;
        }
    </style>
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">


            <div id="navbar" class="navbar-collapse collapse" style="position: relative">
                <ul class="nav navbar-nav">
                    <li class=" @if(URL::current() == url('/admin')) active @endif "><a class="navbar-brand"
                    href="/admin">Админ Панель</a></li>
                    @if(Auth::check())
                    <li class=" @if(URL::current() == url('/admin/shop')) active @endif sub"><a
                                href="/admin/shop">Магазин</a>
                    <ul class="dropdown-menu">
                        <li class=" @if(URL::current() == url('/admin/categories')) active @endif "><a
                                    href="/admin/categories">Категории</a></li>
                    </ul>
                    </li>
                    <li class=" @if(URL::current() == url('/admin/gallery')) active @endif "><a
                                href="/admin/gallery">Галлерея</a></li>
                    <li class=" @if(URL::current() == url('/admin/blog')) active @endif "><a
                                href="/admin/blog">Блог</a></li>

                    <li class=" @if(URL::current() == url('/admin/orders')) active @endif "><a
                                href="/admin/orders">Заказы</a></li>
                    <li class=" @if(URL::current() == url('/admin/contacts')) active @endif "><a
                                href="/admin/contacts">Сообщения</a></li>
                    <li class=" @if(URL::current() == url('/admin/settings')) active @endif "><a
                                href="/admin/settings">Настройки</a></li>
                </ul>
                <div style="position: absolute; right: 0; top: 7px;">
                    <form action="/admin/logout" method="post">
                        {{ csrf_field() }}
                        <input type="submit" value="Выйти" class="btn-sm btn-danger">
                    </form>
                </div>
            </div>
    @endif<!--/.nav-collapse -->
    </div>
</nav>

<div class="container theme-showcase" role="main">


    @yield('content')


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
