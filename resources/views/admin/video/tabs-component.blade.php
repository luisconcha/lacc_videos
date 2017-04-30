<?php

$tabs = [
    [
        'title' => 'Information',
        'link'  => '#fa-icons',
        'route' => !isset( $data ) ? route( 'admin.videos.create' ) : route( 'admin.videos.create', [ 'video' => $data->id ] )
    ], [
        'title' => 'Series and category',
        'link'  => '#glyphicons',
        'route' => ''
    ], [
        'title' => 'Video and Thumbnail',
        'link'  => '#video_thumbnail',
        'route' => ''
    ],
];

?>
<h3>Manage videos</h3>
<div class="text-right">
    <a href="{{route('admin.videos.index')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> List video</a>
</div>

<div class='content'>
    <div class='col-xs-12'>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                {{--@foreach($tabs as $key => $tab)--}}
                {{--<li {{ $key == 0 ? "class=active" : '' }}  class="{{ !isset($data)?'disabled':'' }}"--}}
                {{--data-toggle="tab">--}}
                {{--<a href="{{ !isset($data)? '#':$tab['link'] }}" data-toggle="tab">{{ $tab['title'] }}</a>--}}
                {{--</li>--}}
                {{--@endforeach--}}
                @foreach($tabs as $key => $tab)
                    <li {{ $key == 0 ? "class=active" : '' }}  class="{{ !isset($data)?'disabled':'' }}"
                        data-toggle="tab">
                        <a href="{{ $tab['link'] }} {{ $tab['route'] }}" data-toggle="tab">{{ $tab['title'] }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @include('admin.errors._check')

                <div class="tab-pane active" id="fa-icons">
                    <section>
                        {!! $slot !!}
                    </section>

                </div>

                <div class="tab-pane" id="glyphicons">

                    <h2>2</h2>
                </div>

                <div class="tab-pane" id="video_thumbnail">

                    <h2>3</h2>
                </div>

            </div>
        </div>
    </div>
</div>

        