<div class="card collapse" id="categoryCollapse">
    <div class="card-header">
        <h4 class="card-title">Data Form</h4>
    </div>
    <div class="card-body">
        <div class="row" id="dataForm">
            <div class="col-lg-6 col-md-6">
                <div class="form-group ">
                    <label class="col-md-3 form-label">Category</label>
                    <div class="col-md-9">
                        <select name="category_id" class=" select2 custom-select" id="category_id"></select>
                        <span id="category_id_Error" class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div id="fieldContainer" class="row m-3 w-100">

            </div>

            <div class="col-lg-12 col-md-12">
                <button class="btn btn-success" onclick="addData()">Submit Data</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>

    $('#category_id').on('change', function() {
        var categoryId = $(this).val();
        var url = '{{ route("user.category",':id') }}';
        url = url.replace(':id', categoryId);
        if (categoryId) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#fieldContainer').empty();

                    data.categoryFields.forEach(function(field) {


                        if (field.type === 'select') {
                            var selectHtml = `
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <select name="${field.name}" class="form-control" id="${field.name}"></select>
                                                <input type='hidden' name='field_id' value="${field.id}">
                                                </div>
                                        </div>`;
                            $('#fieldContainer').append(selectHtml);
                            loadFieldOptions(field.id, field.selectOptions,field.name);
                        }else{
                            var fieldHtml = `<div class="col-md-6">
                                            <div class="form-group ">
                                                <label>${field.name}</label>
                                                <input type="${field.type}" class="form-control" name="${field.name}"  id="${field.name}" placeholder="${field.name}">
                                                <input type='hidden' name='field_id' value="${field.id}">
                                            </div>
                                        </div>`;
                            $('#fieldContainer').append(fieldHtml);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching fields:', error);
                }
            });
        } else {
            $('#fieldContainer').empty();
        }
    });

    function loadFieldOptions(fieldId, options,fieldName) {
        options.forEach(function(option) {
            $(`#${fieldName}`).append(`<option value="${option.value}">${option.name}</option>`);
            $(`#${fieldName}`).select2();
        });
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function clearField(){
        $('#category_id').val('').trigger('change');
        $('#fieldContainer').empty();
    }
    function addData() {
        var jsonData = {};
        var category_id = $('#category_id').val();
        var fieldsData = {};


        $('.form-group').each(function() {
            var fieldValue = {};
            var fieldName = '';

            $(this).find('input, select').each(function() {
                var name = $(this).attr('name');
                var value = $(this).val();


                if ($(this).attr('type') === 'hidden' && name === 'field_id') {
                    fieldValue.field_id = value;
                } else if (name) {
                    fieldName = name;
                    fieldValue.value = value;
                }
            });


            if (fieldValue.field_id && fieldName) {
                fieldsData[fieldName] = fieldValue;
            }
        });


        jsonData.category_id = category_id;
        jsonData.data = fieldsData;

        console.log(jsonData);

        $.ajax({
            url: '{{ route("user.data.store") }}',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(jsonData),
            success: function(response) {
                toastr.success("Data saved successfully!");
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
