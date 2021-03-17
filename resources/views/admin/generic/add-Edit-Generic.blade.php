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
                        <li class="breadcrumb-item active" aria-current="page">Add Generic</li>
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
                            <form @if(empty($genericdata['id'])) action="{{url('admin/add-edit-generic')}}" @else   action="{{url('admin/add-edit-generic/'.$genericdata['id'] )}}" @endif method="post">
                                @csrf
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Category Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="single-select select2-hidden-accessible" name="category_id" id="category_id" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">select category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category['id']}}" @if(!empty($genericdata['category_id']) && $genericdata['category_id'] == $category['id']) selected="" @endif>{{$category['name']}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Category Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" id="name" class="form-control" @if(!empty($genericdata['name'])) value="{{$genericdata['name']}}" @else value="{{ old('name')}}" @endif />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(empty($genericdata['id'])) 
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
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
   
</script>
@endsection