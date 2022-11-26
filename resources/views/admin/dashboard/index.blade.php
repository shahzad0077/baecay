@extends('admin.layouts.app')

 
@section('meta-tags')
<title>Dashboard</title>
@endsection


@section('admin-content')
<div class="content-page">
    <div class="content">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <!-- <li class="breadcrumb-item active">Projects</li> -->
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card widget-inline">
                    <div class="card-body p-0">
                        <div class="row no-gutters">

                            <div class="col-sm-6 col-xl-4">
                                <div class="card shadow-none m-0 border-left">
                                    <div class="card-body text-center">
                                        <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                        <h3><span>{{ $data->where('active' , 1)->where('approve_status' , 'approved')->count() }}</span></h3>
                                        <p class="text-muted font-15 mb-0">Approved Users</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="card shadow-none m-0 border-left">
                                    <div class="card-body text-center">
                                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                        <h3><span>{{ $data->where('active' , 1)->where('user_type' , 'customer')->where('approve_status' , 'notapproved')->count() }}</span></h3>
                                        <p class="text-muted font-15 mb-0">Pending Users</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="card shadow-none m-0 border-left">
                                    <div class="card-body text-center">
                                        <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                        <h3><span>${{ DB::table('payments')->sum('amount') }}</span> </h3>
                                        <p class="text-muted font-15 mb-0">Total Earning</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->


        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="header-title mb-3">Recent User Requests</h4>


                        <div class="table-responsive">
                            <table class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Dated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                @if($data->where('user_type' , 'customer')->where('approve_status' , 'notapproved')->count() > 0)
                                <tbody>
                                    @foreach($data->where('user_type' , 'customer')->where('approve_status' , 'notapproved') as $r)
                                    <tr>
                                        <td><a href="{{url('/admin/user/viewuserrequest')}}/{{ $r->id }}">{{ $r->name }}</a> </td>
                                        <th>{{ $r->email }}</th>
                                        <td>{{ $r->phonenumber }}</td>
                                        <td>{{ Cmf::date_format($r->created_at) }}</td>
                                        <td>
                                           <a href="{{url('/admin/user/viewuserrequest')}}/{{ $r->id }}"> <button class="btn-sm btn btn-primary">View Request</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    

                                </tbody>
                                @else

                                <tr>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td>No Any User Requests</td>
                                    <td></td>
                                    <td>
                                        
                                    </td>
                                </tr>

                                


                                @endif
                            </table> 
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- End Content -->

</div> <!-- content-page -->
@endsection