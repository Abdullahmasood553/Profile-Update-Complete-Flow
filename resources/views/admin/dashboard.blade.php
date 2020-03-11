@extends('layouts.master')
@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="" class="navbar-brand">ABNATION</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="" class="nav-link active">Dashboard</a>
                </li>
            </ul>


            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown mr-2">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell text-danger">&nbsp;&nbsp;<span class="badge badge-danger">{{ $business_count }}</span></i>
                    </a>
                <div class="dropdown-menu">
                    @foreach($notifications as $notification)
               
                    <a href="" class="dropdown-item"><i class="fas fa-user-circle"></i>
                           {{ $notification->notif_data }}
                        </a>
                        @endforeach
                    </div>
                </li>
        
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i> Welcome {{Auth::guard('admin')->user()->name}}
                    </a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item"><i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.logout')}}" class="nav-link"><i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Tables -->


<section id="posts" class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Business Listings</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Website</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($businesses as $business)
                            <tr>
                                <td>{{ $business->id }}</td>
                                <td>{{ $business->business_name }}</td>
                                <td>{{ $business->business_email }}</td>
                                <td>{{ $business->business_phone }}</td>
                                <td>{{ $business->business_website }}</td>
                                <td><a href="" class="btn btn-secondary"><i class="fas fa-angle-double-right"></i>Details</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h3>Posts</h3>
                        <h4 class="display-4">
                            <i class="fas fa-pencil-alt"></i>{{ $business_count }}
                        </h4>
                        <a href="" class="btn btn-outline-light btn-sm">View</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
