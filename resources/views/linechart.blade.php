@include('top')

<body class="">
  <div class="wrapper ">
    @include('navbar')
    <div class="main-panel">
      <div class="content">
        <div class="form-group">
          <label>Filter</label>
          <select class="form-control selectpicker" url="{{route('chart2.data')}}" data-style="btn btn-link" id="lineChartSelect">
            <option value="">--Select Month Type--</option>
            <option value="1">Booking Month</option>
            <option value="2">Trip Month</option>
          </select>
        </div>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
      </div>
      @include('footer')
    </div>
  </div>

  @include('scripts')
</body>

</html>