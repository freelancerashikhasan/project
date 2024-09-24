<div class="card collapse" id="categoryCollapse">
    <div class="card-header">
        <h4 class="card-title">Url Shorter</h4>
    </div>
    <div class="card-body">
        <div class="row" id="dataForm">
            <div class="col-lg-6 col-md-6">
                <div class="form-group ">
                    <label class="col-md-3 form-label">Original Url</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name='original_url' id="original_url" placeholder="Original Url">
                        <span id="original_url_Error" class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <button class="btn btn-success" onclick="addUrl()">Submit Url</button>
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
        $('#original_url').val('');
    }
    function addUrl() {
       let original_url = $('#original_url').val();

        $.ajax({
            url: '{{ route("url.store") }}',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                original_url: original_url
            }),
            success: function(response) {
                toastr.success("Url Shorted!");
                clearField();
                $('#categoryCollapse').toggle('hide');
                $('#categoryTable').DataTable().ajax.reload();
            },
            error: function(error) {
                var $errors = error.responseJSON.errors;
                $.each($errors, function(key, value) {
                    toastr.error(value[0]);
                    $('#'+key+'_Error').html(value[0]);
                    $('#'+key).addClass('border-danger');
                });
            }
        });
    }

</script>
@endpush
