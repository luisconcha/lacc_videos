<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/videos.css') }}">

</head>
<body class="skin-blue">
@include('admin.template.partials.headers')

<div class="wrapper row-offcanvas row-offcanvas-left">

    <aside class="left-side sidebar-offcanvas">

        @include('admin.template.partials.sidebar')

    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        @if(View::hasSection('breadcrumbs'))
            @yield('breadcrumbs')
        @else
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
        @endif


    <!-- Main content -->
        <section class="content">
            @yield('content')
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->

<script src="{{ asset('js/videos.js') }}"></script>

</body>
</html>