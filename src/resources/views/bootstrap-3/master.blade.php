<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Good Log Viewer - @yield('title')</title>
    <meta name="description" content="Good Log Viewer">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,600' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            margin-top: 30px;
            margin-bottom: 60px;
        }

        .container {
            width: 95%;
        }

        #log-table {
            font-size: 12px;
        }
    </style>

</head>
<body>

@php($routePrefix = config('good-log-viewer.routes.prefix'))
<div class="conteiner">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route($routePrefix . '.index') }}">&#127808; Good Log Viewer</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route($routePrefix . '.index') }}">{{ trans('good-log-viewer::general.logs') }}</a>
                    </li>
                </ul>
                <div class="navbar-form navbar-right">
                    <a href="{{ url('/') }}" class="btn btn-default">
                        <span class="fa fa-arrow-circle-left"></span>&nbsp;
                        {{ trans('good-log-viewer::general.back-to-site') }}
                    </a>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>

<div class="container theme-showcase" role="main">

    <div class="page-header">
        <h1>@yield('title')</h1>
    </div>

    @yield('content')

</div> <!-- /container -->

<!-- footer -->
<footer class="footer navbar navbar-fixed-bottom navbar-inverse font-small ">
    <div class="navbar-form text-center text-muted">
        © <a href="https://github.com/golovchanskiy/LaravelGoodLogViewer" target="_blank">
            <strong>Good Logs View</strong>
        </a>
        by <a href="mailto:anton.golovchanskiy@gmail.com">Anton Golovchanskiy</a><br>
        Good Luck! &#127808;
    </div>
</footer>
<!-- /footer -->

<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('scripts')
<!-- /scripts -->
</body>
</html>