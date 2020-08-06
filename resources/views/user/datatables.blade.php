@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
     <div class="sidenav">
            <a class="p-2"></a>
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
       
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.users.index') }}",
                "columns": [
                    { data: 'id', name: 'id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status'},
                    { data: 'actions', name: 'actions'},
                    { data: 'action', name: 'action'}
                ]
            });
        });
    </script>
@endsection
