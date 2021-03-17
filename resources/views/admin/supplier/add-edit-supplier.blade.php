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
                        <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                   
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                            <form @if(empty($supplierdata['id'])) action="{{url('admin/add-edit-supplier')}}" @else   action="{{url('admin/add-edit-supplier/'.$supplierdata['id'] )}}" @endif method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" id="name" class="form-control" @if(!empty($supplierdata['name'])) value="{{$supplierdata['name']}}" @else value="{{ old('name')}}" @endif />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" id="email" class="form-control" @if(!empty($supplierdata['email'])) value="{{$supplierdata['email']}}" @else value="{{ old('email')}}" @endif />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="phone" id="phone" class="form-control" @if(!empty($supplierdata['phone'])) value="{{$supplierdata['phone']}}" @else value="{{ old('phone')}}" @endif />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" id="address" class="form-control" @if(!empty($supplierdata['address'])) value="{{$supplierdata['address']}}" @else value="{{ old('address')}}" @endif />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(empty($supplierdata['id'])) 
                                        <input type="submit" class="btn btn-primary px-4" value="create" />
                                        @else
                                        <input type="submit" class="btn btn-primary px-4" value="Update" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("script")

@endsection