@extends('layouts.app')
@section('content')
<!-- Row -->
<div class="row mt-5">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        @include('url.collapse')
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="justify-content: space-between;">
                <h4 class="card-title">Url List</h4>
                <span>
                    <button id="categoryBtn" class="btn btn-success">Add Url</button>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table id="categoryTable" class="display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Original Url</th>
                                    <th>Short Url</th>
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
    $('#categoryBtn').click(function() {
        $('#categoryCollapse').toggle();
    });
  $(document).ready(function() {

      $('#categoryTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: '{{ url()->current() }}',
              type: 'get',

          },
          columns: [
              { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
              { data: 'original_url', name: 'original_url', orderable: true, searchable: true },
              { data: 'short_url', name: 'short_url', orderable: true, searchable: true },

          ]
      });
  });
</script>
@endpush
