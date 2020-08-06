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
        <div class="card-body">
            <form id="clear">
                <div class="row">               
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="0">
                            <label>Method</label>
                            <input type="text" name="method" class="form-control column_filter" id="col0_filter" placeholder="Method">
                        </div>
                    </div>
				 
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col1" data-column="1">
                            <label>IP Address</label>
                            <input type="text" name="ip" class="form-control column_filter" id="col1_filter" placeholder="IP Address">
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col2" data-column="2">
                            <label>Time</label>
                            <input type="text" name="time" class="form-control column_filter" id="col02_filter" placeholder="Time">
                        </div>
                    </div>
				 
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col3" data-column="3">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control column_filter" id="col3_filter" placeholder="Date">
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col4" data-column="4">
                            <label>Location</label>
                            <input type="text" name="current_location" class="form-control column_filter" id="col4_filter" placeholder="Location">
                        </div>
                    </div>
                    
                </div>
            </form>
            <div class="row mt-8">
                <div class="col-lg-12">
                    <button class="btn btn-secondary btn-secondary--icon" onclick="ClearFields();">
                        <span>
                            <i class="la la-close"></i>
                            <span>Reset</span>
                        </span>
                    </button></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="container">
                <table class="table table-borderless table-striped" id="ex">
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>IP address</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th width="200px">Current Location</th>
                            <th width="300px">Device Address</th>
                            <th>I/O Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $key => $log)
                        @if($log->user_id==$users->id)
                        <tr>
                            <td><label class="badge badge-success">{{ $log->method }}</label></td>
                            <td>{{ $log->ip }}</td>
                            <td><button class="btn btn-primary btn-sm">{{ $log->updated_at->format('H:i:s') }}</button></td>
                            <td>{{ $log->updated_at->format('m/d/Y') }}</td>
                            <td>{{ $log->current_location }}</td>
                            <td>{{ $log->agent }}</td>
                            <td class="pl-3"><a href="{{ route('logs.show', $log->id) }}" 
                                    class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="View">
                                    <i class="fa fa-info-circle text-info"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection