@extends('admin.layouts.app')

 
@section('meta-tags')
<title>Blog Categories</title>
@endsection


@section('admin-content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blog Categories</li>
                    </ol>
                </div>
                <h4 class="page-title">Blog Categories</h4>
            </div>
        </div>
    </div>
    @include('admin.alerts')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ url('admin/blog/addnewcategory') }}" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Dated</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $r)
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->visible_status }}</td>
                                <td>{{ date('d M Y, h:s a ', strtotime($r->created_at)) }}</td>
                                <td class="table-action text-center">
                                    <a href="{{url('admin/blogcategory/edit')}}/{{ $r->id }}" class="action-icon" title="Edit Category"> <i class="mdi mdi-pencil"></i></a>
                                    <a onclick="deletefunction({{ $r->id }})" href="javascript:void(0)" class="action-icon" title="Delte Category"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div> <!-- container -->
<script type="text/javascript">
    function deletefunction(id)
    {
        Swal.fire({
          title: 'Are You Sure?',
          icon: 'warning',
          html: 'All Blogs Will Be Deleted of Related Category',
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: 'Delete',
          denyButtonText: `Don't save`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
                
                var deletedurl = "{{ url('admin/deleteblogcategory/') }}/"+id;

                window.location.replace(deletedurl);


          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
        })
    }
</script>

@endsection