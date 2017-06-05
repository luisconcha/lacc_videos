google.charts.load('current', { packages: [ 'corechart' ] });
google.charts.setOnLoadCallback(drawChart);


function drawChart() {

    $.ajax({
        url     : "graphics/list-published-videos",
        type    : "GET",
        dataType: "json"
    }).done(function ( response ) {
        console.log('RESP: ', response);

        let data = new google.visualization.arrayToDataTable([
            [ 'Dolorem sapiente beatae eaque.', '1 ' ],
            [ 'Nulla rerum pariatur hic.', '2' ],
            [ 'Aut repudiandae porro facere.', '2' ],
            //$.each(response, function ( i, value ) {
            //    //console.log('Duration: ', value.duration, ' Title: ', value.title);
            //    console.log('Obj: ', "['" + value.title + "'," + value.duration + "],");
            //    "['" + value.title + "'," + value.duration + "],"
            //})
        ]);
        data.addColumn('string', 'Title');
        data.addColumn('string', 'Duration');

        let options = {
            title : 'List of Videos',
            width : 700,
            height: 400
        };

        let chart = new google.visualization.PieChart(document.getElementById('pie-chart'));

        chart.draw(data, options);

    }).fail(function ( jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);

    }).always(function () {
        console.log("Complete");
    });
}
