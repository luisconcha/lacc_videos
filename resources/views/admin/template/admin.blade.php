<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Dashboard | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/videos.css') }}">

    @stack('styles')

    <script>
        window.Laravel = <?php echo json_encode( [
            'csrfToken' => csrf_token(),
            'userId'    => Auth::check() ? Auth::user()->id : null
        ] ); ?>

        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);
    </script>

</head>
<body class="skin-blue">
<span style="display: none" id="userRoleId">{{auth()->user()->role}}</span>
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
            <div class="messages">
                @if( Session::has('message') )
                    <div class="alert alert-{{ Session::get("message.type") }} alert-dismissible fade in" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <p><strong>Notice:</strong> {{Session::get("message.msg")}}</p>
                    </div>
                @endif

                @if( Session::has('error') )
                    <div class="alert alert-{{ Session::get("error.type") }} alert-dismissible fade in" role="alert">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <p><strong>Notice: </strong> {{Session::get("error.msg")}}</p>
                    </div>
                @endif
            </div>

            @yield('content')
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->

@yield('pre-script')
<script src="/js/app.js"></script>
<script src="{{ asset('js/videos.js') }}"></script>


@yield('pos-script')

<script>
    $(".user-menu, .messages-menu, .notifications-menu, .tasks-menu").on('click', function () {
        $(this).toggleClass('open');
    });
</script>
</body>
</html>