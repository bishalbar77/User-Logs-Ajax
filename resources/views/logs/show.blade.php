@extends('layouts.app')

@section('content')
<div class="container">
<div class="sidenav">
<a class="p-5"></a>
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
<div class="card-title">
    <h4 class="card-label">Log Activity</h4>
</div>
    <div class="form-group">
    <table class="table table-bordered table-striped">
    
    <tr>
        <th>Method</th>
        <th>User Input</th>
        <th width="200px">Output Route</th>
        <th width="200px">Time</th>
    </tr>
        <tr>
            <td><label class="badge badge-success">{{ $log->method }}</label></td>
            <td>{{ $log->subject }}</td>
            <td>{{ $log->url }}</td>
            <td><button class="btn btn-primary btn-sm">{{ $log->updated_at->format('H:i:s') }}</button></td>
        </tr>
</table>
    </div>
</div>

@endsection