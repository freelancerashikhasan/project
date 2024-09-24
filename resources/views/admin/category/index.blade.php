@extends('layouts.app')
@section('content')
<!-- Row -->
<div class="row mt-5">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        @include('admin.category.collapse')
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="justify-content: space-between;">
                <h4 class="card-title">Category List</h4>
                <span>
                    <button id="categoryBtn" class="btn btn-success">Add Category</button>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table id="categoryTable" class="display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Fields</th>
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
<script>
    $('#categoryBtn').on('click', function(){
        $('#categoryCollapse').toggle();
    });
    $(document).ready(function() {
        $('#categoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url()->current() }}',
                type: 'get'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name' },
                { data: 'description' },
                { data: 'data', name: 'data', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection
