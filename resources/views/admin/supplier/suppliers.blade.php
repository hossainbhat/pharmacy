@extends("layouts.admin_layouts.admin_layouts")
@section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Supplier</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Medicine Suppliers</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="{{url('admin/add-edit-supplier')}}" style="float: right;"><button type="button" class="btn btn-success btn-sm">Add Supplier</button></a>
        <h6 class="mb-0 text-uppercase"> Supplier</h6>

        <hr>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="10%">SL.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th width="12%">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $key => $supplier)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$supplier['name']}}</td>
                                <td>{{$supplier['email']}}</td>
                                <td>{{$supplier['phone']}}</td>
                                <td>{{$supplier['address']}}</td>
                                <td>
                                    <a href="{{url('admin/add-edit-supplier/'.$supplier['id'])}}">
                                        <svg xmlns="#" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link text-primary"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                    </a>
                                    /
                                    <a href="{{url('admin/delete-supplier/'.$supplier['id'])}}">
                                        <svg xmlns="#" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection