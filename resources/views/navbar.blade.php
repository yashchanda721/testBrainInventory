<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('/resources/img/sidebar-1.jpg')}}">
    <div class="logo"><a href="javascript:void(0)" class="simple-text logo-normal">
            Brain Inventory Test
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ (Request::segment(1)=='chart1')?'active':''}}">
                <a class="nav-link" href="{{route('chart1')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Donut Chart</p>
                </a>
            </li>
            <li class="nav-item {{ (Request::segment(1)=='chart2')?'active':''}}">
                <a class="nav-link" href="{{route('chart2')}}">
                    <i class="material-icons">person</i>
                    <p>Line Chart</p>
                </a>
            </li>
        </ul>
    </div>
</div>