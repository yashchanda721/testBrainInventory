@include('top')

<body class="">
  <div class="wrapper ">
    @include('navbar')
    <div class="main-panel">
      <div class="content">
          <div class="form-group">
            <label>Filter</label>
            <select class="form-control selectpicker" url="{{route('chart1.data')}}" data-style="btn btn-link" id="donutChartSelect">
              <option value="">--Select Frequency--</option>
              <option value="1">Weekly</option>
              <option value="2">Monthly</option>
              <option value="3">Yearly</option>
            </select>
          </div>
          
          <div id="donutchart" style="width: 900px; height: 500px;"></div>
      </div>
      @include('footer')
    </div>
  </div>

  @include('scripts')
</body>

</html>