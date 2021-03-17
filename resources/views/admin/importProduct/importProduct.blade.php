@extends("layouts.admin_layouts.admin_layouts")
@section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Import Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="{{url('admin/add-edit-importProduct')}}" style="float: right;"><button type="button" class="btn btn-success btn-sm">Add Product</button></a>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
         Upload Validation Error<br><br>
         <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
    
       @if($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
       </div>
       @endif
        <form action="{{url('admin/import-product')}}" method="post" enctype="multipart/form-data">
            @csrf
        <h6 class="mb-0 text-uppercase">
            <div class="row mb-3">
                <div class="col-sm-9 text-secondary">
                    <input type="file" name="select_file" class="form-control"/>
                </div>
                <div class="col-sm-3 text-secondary">
                    <input type="submit" name="upload" class="btn btn-success" value="upload file">
                    {{-- <button type="submit" class="btn btn-success"></button> --}}
                </div>
            </div>
        
        </h6>
    </form>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                {{-- <th>SL.</th> --}}
                                <th>Company</th>
                                <th>Category</th>
                                <th>Generic</th>
                                <th>Strength</th>
                                <th>Medicine</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($importProducts as $key => $product)
                            <tr>
                                {{-- <td>{{$key+1}}</td> --}}
                                <td>{{$product['company']}}</td>
                                <td>{{$product['category']}}</td>
                                <td>{{$product['generic']}}</td>
                                <td>{{$product['strength']}}</td>
                                <td>{{$product['product']}}</td>
                                {{-- <td>
                                    <a href="{{url('admin/add-edit-importProduct/'.$product['id'])}}">
                                        <svg xmlns="#" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link text-primary"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                    </a>
                                    /
                                    <a href="{{url('admin/delete-importProduct/'.$product['id'])}}">
                                        <svg xmlns="#" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </td> --}}
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