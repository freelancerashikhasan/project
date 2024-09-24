<div class="card collapse" id="categoryCollapse">
    <div class="card-header">
        <h4 class="card-title">Category Form</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group ">
                    <label class="col-md-3 form-label">Category Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Category Name" name="name" id="name">
                        <span id="name_Error" class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label class="col-md-3 form-label">Category Description</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Category Description" name="description" id="description">
                        <span id="description_Error" class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <div class="d-flex" style="justify-content: space-between;">
                        <p class="col-md-3 form-label">Required Fields</p>
                        <button class="btn btn-primary" id="addRow"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="inputTable">
                            <thead>
                                <tr>
                                    <th>Field Name</th>
                                    <th>Field Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <button class="btn btn-success" onclick="addCategory()">Submit Category</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function() {
        $('#addRow').click(function() {
            $('#inputTable tbody').append(`
                <tr>
                    <td><input type="text" class="form-control" placeholder="Field Name"></td>
                    <td>
                        <select class="form-control fieldType">
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="date">Date</option>
                            <option value="select">Select</option>
                        </select>
                        <div class="custom-options d-flex" style="margin-top: 10px;display:none !important;">
                            <input type="text" class="form-control option-name" placeholder="Option Name">
                            <input type="text" class="form-control option-value" placeholder="Option Value">
                            <button class="btn btn-success addOption" style="margin-top: 5px;">Add Option</button>
                        </div>
                        <div class="options-list"></div>
                    </td>
                    <td>
                        <button class="btn btn-danger deleteRow"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `);
        });

        $(document).on('change', '.fieldType', function() {
            var $row = $(this).closest('tr');
            let type = $row.find('.fieldType').val();
            if (type === 'select') {
                console.log('select');
                $row.find('.custom-options').css('display', '');
            } else {
                console.log('inp');

                $row.find('.custom-options').css('display', 'none !important');
                $row.find('.options-list').empty();
            }
        });

        $(document).on('click', '.addOption', function() {
            var $row = $(this).closest('tr');
            var optionName = $row.find('.option-name').val();
            var optionValue = $row.find('.option-value').val();

            if (optionName && optionValue) {
                $row.find('.options-list').append(`
                    <div>Name : ${optionName} (value: ${optionValue})</div>
                `);
                $row.find('.option-name').val('');
                $row.find('.option-value').val('');
            } else {
                alert("Please enter both option name and value.");
            }
        });

        $(document).on('click', '.deleteRow', function() {
            $(this).closest('tr').remove();
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function clearField(){
        $('#name').val('');
        $('#description').val('');
        $('#inputTable tbody').empty();
    }
    function addCategory() {
        let name = $('#name').val();
        let description = $('#description').val();
        const rows = [];

        $('#inputTable tbody tr').each(function() {
            const category = $(this).find('input[placeholder="Category"]').val();
            const fieldName = $(this).find('input[placeholder="Field Name"]').val();
            const fieldType = $(this).find('.fieldType').val();
            const options = [];


            $(this).find('.options-list div').each(function() {
                const text = $(this).text();
                const name = text.split(' (value: ')[0];
                const value = text.split(' (value: ')[1]?.replace(')', '');

                options.push({
                    name: name,
                    value: value
                });
            });

            rows.push({
                category: category,
                fieldName: fieldName,
                fieldType: fieldType,
                options: options
            });
        });

        const data = {
            name: name,
            description: description,
            rows: rows,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: '{{ route("admin.category.store") }}',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
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
