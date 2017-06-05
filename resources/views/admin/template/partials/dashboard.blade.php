@extends('admin.template.admin')

@section('pos-script')
    <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/graphs-for-reports.js') }}"></script>
@stop

@section('content')

    <h1>User: {{auth()->user()->name}}</h1>
    <h2>Role: {{auth()->user()->role}}</h2>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        150
                    </h3>
                    <p>
                        New Orders
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        53<sup style="font-size: 20px">%</sup>
                    </h3>
                    <p>
                        Bounce Rate
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        44
                    </h3>
                    <p>
                        User Registrations
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        65
                    </h3>
                    <p>
                        Unique Visitors
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Author Preferences</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                    <div class="item">
                        <div id="pie-chart"></div>
                    </div>
                </div>
            </div>
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Block B</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                    <div class="item">
                        <div id="pie-chart"></div>
                    </div>
                </div>
            </div>

        </section><!-- right col -->
    </div><!-- /.row (main row) -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Block A</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                    <div class="item">
                        <h2>Block A</h2>
                    </div>
                </div>
            </div>
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Block B</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                    <div class="item">
                        <h2>Block B</h2>
                    </div>
                </div>
            </div>

        </section><!-- right col -->
    </div><!-- /.row (main row) -->


@endsection