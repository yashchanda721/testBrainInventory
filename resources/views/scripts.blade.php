  <!--   Core JS Files   -->
  <script src="{{asset('/resources/js/core/jquery.min.js')}}"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  </script>
  <script type="text/javascript">
      google.charts.load("current", {
          packages: ["corechart"]
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(temp_array=[]) {
          var data = google.visualization.arrayToDataTable(temp_array);

          var options = {
              title: 'Trip',
              pieHole: 0.6,
          };

          var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
          chart.draw(data, options);
      }

      $(document).on('change', '#donutChartSelect', function(e) {
          var freq = $(this).val();
          var getDonutChartDataUrl = $(this).attr('url');
          $.ajax({
              type: "GET",
              url: getDonutChartDataUrl,
              data: {freq:freq},
              contentType: "application/json; charset=utf-8",
              dataType: "json",
              success: function(result) {
                  var temp_array = [];
                  temp_array.push(['Task', 'Hours per Day']);
                  let completedTrips = result['trips'].filter(i=>i.trip_status==2);
                  temp_array.push(['Completed',completedTrips.length]);
                  let inProgressTrips = result['trips'].filter(i=>i.trip_status==1);
                  temp_array.push(['In Progress',inProgressTrips.length]);
                  let cancelledTrips = result['trips'].filter(i=>i.trip_status==3);
                  temp_array.push(['Cancelled',cancelledTrips.length]);
                  drawChart(temp_array);
              }
          });
      });
  </script>
  <script type="text/javascript">
      google.charts.load('current', {
          'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawLineChart(temp_array=[]) {
          var data = google.visualization.arrayToDataTable(temp_array);

          var options = {
              title: 'Sales Performance',
              curveType: 'function',
              legend: {
                  position: 'bottom'
              }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
      }

      $(document).on('change', '#lineChartSelect', function(e) {
          var date_type = $(this).val();
          var getDonutChartDataUrl = $(this).attr('url');
          $.ajax({
              type: "GET",
              url: getDonutChartDataUrl,
              data: {"date_type":date_type},
              contentType: "application/json; charset=utf-8",
              dataType: "json",
              success: function(result) {
                  var temp_array = [];
                  temp_array.push(['Months', 'Sales']);
                  for(var i in result['trips']){
                      var month = result['trips'][i]['month'];
                      var cost = result['trips'][i]['cost'];
                      temp_array.push([month,cost]);
                  }
                  drawLineChart(temp_array);
              }
          });
      });
  </script>