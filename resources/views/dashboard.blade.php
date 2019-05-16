@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row">
      <h3 class="title">Number of visits: {{$visitCount}}</h3>
      <div class="charts  col-12">

        <div class="row">
          <div  class="chart-wrapper col-6">
            <h3 class="title">Title </h3>
            <canvas  id="chart-0" ></canvas>
          </div>

          <div class="chart-wrapper  col-6">
            <h3 class="title">All vists</h3>
            <canvas id="chart-1" ></canvas>
          </div>
        </div>
        <div class="row">
          <div  class="chart-wrapper  col-6">
            <h3 class="title">Visits by browser</h3>
            <canvas id="chart-2" ></canvas>
          </div>

          <div  class="chart-wrapper  col-6">
            <h3 class="title">Visits by device</h3>
            <canvas  id="chart-3" ></canvas>
          </div>
        </div>



      </div>
    </div>
  </div>

  <script>
    var ctx0 = document.getElementById("chart-0").getContext('2d');
    var ctx1 = document.getElementById("chart-1").getContext('2d');
    var ctx2 = document.getElementById("chart-2").getContext('2d');
    var ctx3 = document.getElementById("chart-3").getContext('2d');
    var groupedVisits = {!! json_encode($groupedVisits )!!};

    var obj = giveMeDataAndLabels(groupedVisits);

    // creating the chart for all visits
    var gradient = ctx1.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, '#f5bf45');
    gradient.addColorStop(1, '#da5d45');

    createChart(ctx1, 'bar', gradient, obj.data, obj.labels);


    // creating the charts for visits by browser
    var groupedVisitsByBrowser = {!! json_encode($groupedVisitsByBrowser )!!};
    var labels = [];
    var data = [];
    for (var property in groupedVisitsByBrowser) {
      var firstElement = groupedVisitsByBrowser[property];
      labels.push(firstElement[0].browser);
      data.push(groupedVisitsByBrowser[property].length);
    }
    createChart(ctx2, 'bar', gradient, data, labels);

    // creating the charts for visits by device
    var groupedVisitsByDevice = {!! json_encode($groupedVisitsByDevice )!!};
    var labels2 = [];
    var data2 = [];
    var color2 = [];
    for (var property in groupedVisitsByDevice) {
      var firstElement = groupedVisitsByDevice[property];
      labels2.push(firstElement[0].device);
      data2.push(groupedVisitsByDevice[property].length);
      color2.push(dynamicColors());

    }

    function dynamicColors() {
      var r = Math.floor(Math.random() * 255);
      var g = Math.floor(Math.random() * 255);
      var b = Math.floor(Math.random() * 255);
      return "rgb(" + r + "," + g + "," + b + ")";
    }

    var chartData = {

      labels: labels2,
      datasets: [{
        label: 'Vists ',
        backgroundColor: color2,
        data: data2
      }]
    };
    var ctx = $("#chart-3");
    var barGraph = new Chart(ctx, {
      type: 'pie',
      data: chartData
    });

    var visitsLastWeek = {!! json_encode($visitsLastWeek )!!};

    var labelsx = [];
    var datax = [];
    for (var property in visitsLastWeek) {
      var firstElement = visitsLastWeek[property];
      labelsx.push(moment(new Date(firstElement[0].created_at)).add(10, 'days').calendar());
      datax.push(visitsLastWeek[property].length);
    }
    createChart(ctx0, 'line', gradient, datax, labelsx);

    function giveMeDataAndLabels(object) {
      var labels = [];
      var data = [];
      for (var property in object) {
        var firstElement = object[property];
        labels.push(moment(new Date(firstElement[0].created_at)).add(10, 'days').calendar());
        data.push(object[property].length);
      }
      return {labels: labels, data: data};
    }

    function createChart(ctx, chartType, color, data, labels) {
      new Chart(ctx, {
        type: chartType,
        data: {
          labels: labels,
          datasets: [{
            label: 'All visits',
            data: data,
            backgroundColor: color,
          }]
        },
        options: {
          responsive: true
        }
      });
    }

  </script>
@endsection




