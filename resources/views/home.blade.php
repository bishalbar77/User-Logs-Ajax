@extends('layouts.app')
@section('content')
<div class="sidenav">
    <a class="p-3"></a>
    <li class="menu-item" aria-haspopup="true">
        <a href="/home" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-tasks text-info"></i>
            </span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>
    <li class="menu-item" aria-haspopup="true">
        <a href="/users" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-history text-danger"></i>
            </span>
            <span class="menu-text">Log Activity</span>
        </a>
    </li>
    <li class="menu-item" aria-haspopup="true">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="svg-icon menu-icon">
                <i class="fa fa-sign-out text-primary"></i>
            </span>

            <span class="menu-text">Logout</span>
        </a>
    </li>
</div>

<div class="container">
    <div class="col-lg-6 col-xxl-4">
        <div class="row justify-content-center">
            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            
            function drawChart() {
            var data = google.visualization.arrayToDataTable([

            ['Task', 'Hours per Day'],
            ['Online', <?php echo $online; ?>],
            ['Offline',  <?php echo $offline; ?>]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'USER LOGS', 'width':450, 'height':400, 'fontSize':14};
            

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
            }
            </script>
        </div>
    </div>
</div>
@endsection
