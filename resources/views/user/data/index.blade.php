@extends('layouts.app')
@section('content')
<!-- Row -->
<div class="row mt-5">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        @include('user.data.collapse')
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="justify-content: space-between;">
                <h4 class="card-title">Data List</h4>
                <span>
                    <button id="categoryBtn" class="btn btn-success">Add Data</button>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="col-md-3 form-label">Category</label>
                            <div class="col-md-9">
                                <select name="category_search" class=" select2 custom-select" id="category_search"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <table id="categoryTable" class="display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
      $.ajax({
          url: "{{ route('user.categories') }}",
          dataType: "json",
          success: function (data) {
              var html = "";
              $.each(data, function (index, value) {
                  html += '<option value="">Select</option>';
                  html +=
                      '<option value="' +
                      value.id +
                      '">' +
                      value.name +
                      "</option>";
              });
              $("#category_id, #category_search").html(html);
          },
      });
      $('#category_id, #category_search').select2({
          placeholder: 'Select Category',
      });
  });
  $('#categoryBtn').on('click', function(){
      $('#categoryCollapse').toggle();
  });
  $(document).ready(function() {
    $('#category_search').on('change', function(){
        $('#categoryTable').DataTable().ajax.reload();
    });
      $('#categoryTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: '{{ url()->current() }}',
              type: 'get',
              data: function(d) {
                  d.category_id = $('#category_search').val();
              }
          },
          columns: [
              { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
              { data: 'user', name: 'user', orderable: true, searchable: true },
              { data: 'category', name: 'category', orderable: true, searchable: true },
              { data: 'data', name: 'category', orderable: false, searchable: false  },
              { data: 'actions', name: 'actions', orderable: false, searchable: false }
          ]
      });
  });
</script>
@endpush
