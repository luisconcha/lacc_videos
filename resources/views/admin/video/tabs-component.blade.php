<?php

$tabs = [
    [
        'title' => 'Information',
        'link'  => '#fa-icons',
        'route' => ''
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
                @foreach($tabs as $key => $tab)
                <li {!! (!empty($data)) ? '' : 'class="disabled"' !!}>
                    {{--<li {!! $key == 0 ? 'class="active"': '' !!}>--}}
                <a href="{{ $tab['link'] }}" {!! (!empty($data) || $key == 0) ? 'data-toggle="tab"': '' !!}>{{ $tab['title'] }}</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @include('admin.errors._check')

                <div class="tab-pane active" id="fa-icons">
                    <section>
                        {!! $information !!}
                    </section>

                </div>

                <div class="tab-pane" id="glyphicons">
                    <section>
                        {!! $seriesAndCategory !!}
                    </section>
                </div>

                <div class="tab-pane" id="video_thumbnail">
                    <section>
                        {!! $videoAndThumbnail !!}
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

        