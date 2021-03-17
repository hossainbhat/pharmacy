@extends("layouts.admin_layouts.admin_layouts")
@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
<div class="page-content">
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Setting</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
    </ol>
</nav>
</div>

</div>
<!--end breadcrumb-->
<div class="row">
<div class="col-xl-9 mx-auto">
<h6 class="mb-0 text-uppercase">Change Password</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="p-4 border rounded">
            <form class="row g-3 needs-validation" novalidate action="{{ url('/admin/update-pwd') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <label for="current_pwd" class="form-label">Current Password</label>
                    <input type="password" name="current_pwd" class="form-control" id="current_pwd" required>
                    <span id="chkPwd"></span>
                    <div class="invalid-feedback">Fild Must bot be empty.</div>
                </div>
                <div class="col-md-12">
                    <label for="new_pwd" class="form-label">New Password</label>
                    <input type="password" name="new_pwd" class="form-control" id="new_pwd" required>
                    <div class="invalid-feedback">Fild Must bot be empty.</div>
                </div>
                <div class="col-md-12">
                    <label for="confirm_pwd" class="form-label">Confirm New Password</label>
                    <input type="password" name="confirm_pwd" class="form-control" id="confirm_pwd" required>
                    <div class="invalid-feedback">Fild Must bot be empty.</div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
<!--end row-->
</div>
</div>

@endsection
@section("script")
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
        })()
</script>
<script>

$(document).ready(function(){

$("#current_pwd").keyup(function(){
    var current_pwd = $("#current_pwd").val();
    $.ajax({
        type:'post',
        url:'/admin/check-pwd',
        data:{current_pwd:current_pwd},
        success:function(resp){
            // alert(resp);
            if(resp=="false"){
                $("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
            }else if(resp=="true"){
                $("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
            }
        },error:function(){
            alert("Error");
        }
    });
  });
});
</script>
@endsection