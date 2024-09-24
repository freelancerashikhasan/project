<div class="card collapse" id="categoryCollapse">
    <div class="card-header">
        <h4 class="card-title">User Form</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group ">
                    <label class="col-md-3 form-label">User Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="User Name" name="name" id="name">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group ">
                    <label class="col-md-3 form-label">User E-mail</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" placeholder="E-mail" name="email" id="email">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group ">
                    <label class="col-md-3 form-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group ">
                    <label class="col-md-3 form-label">Role</label>
                    <div class="col-md-9">
                        <select name="access_type" id="access_type">
                            <option value="" selected disabled>Select Role</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <button class="btn btn-success" onclick="addUser()">Submit User</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function clearField(){
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
        $('#access_type').val('').trigger('change');
    }
    function addUser() {
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let access_type = $('#access_type').val();


        $.ajax({
            url: '{{ route("admin.user.store") }}',
            type: 'POST',
            // contentType: 'application/json',
            data: {
                name: name,
                email: email,
                password:  password,
                access_type: access_type,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                toastr.success("Data saved successfully!");
                clearField();
                $('#categoryCollapse').toggle('hide');
                $('#categoryTable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.log("An error occurred while saving data: " + error);
            }
        });
    }
</script>
@endpush
