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
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                            <form @if(empty($productdata['id'])) action="{{url('admin/add-edit-importProduct')}}" @else   action="{{url('admin/add-edit-importProduct/'.$productdata['id'] )}}" @endif method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="company" id="company" class="form-control" @if(!empty($productdata['company'])) value="{{$productdata['company']}}" @else value="{{ old('company')}}" @endif />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Category Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="category" id="category" class="form-control" @if(!empty($productdata['category'])) value="{{$productdata['category']}}" @else value="{{ old('category')}}" @endif />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Generic Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="generic" id="generic" class="form-control" @if(!empty($productdata['generic'])) value="{{$productdata['generic']}}" @else value="{{ old('generic')}}" @endif/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Strength Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="strength" id="strength" class="form-control"  @if(!empty($productdata['strength'])) value="{{$productdata['strength']}}" @else value="{{ old('strength')}}" @endif />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Medicine Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="product" id="product" class="form-control" @if(!empty($productdata['product'])) value="{{$productdata['product']}}" @else value="{{ old('product')}}" @endif  />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(empty($categorydata['id'])) 
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