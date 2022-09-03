@extends('layouts.main')

@section('contents')
<!-- Breadcrumb -->
<nav>
    <ol class="breadcrumb px-4 py-2">
        <li class="breadcrumb-item" style="text-decoration: none; color: black; font-size:20px; font-weight:bold;">{{$judul}}</li>
    </ol>
</nav>


<!-- Filtering -->
<div class="card mb-3 pb-3">
    <form class="from-group row" action="/posts" type="get" action="{{url('/search')}}">
        <div class="col-md-2 mt-4">
            <h6 class="font-weight-bold px-4 py-2 text-dark">Filter</h6>
        </div>
        <div class="col-md-2">
            <div class="row">
                <h6 class="font-weight-bold text-dark mt-2">Project Name</h6>
            </div>
            <div class="row m-0">
                <input type="text" name="projectname" id="projectName" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <h6 class="font-weight-bold text-dark mt-2">Client</h6>
            <select class="form-select" aria-label="Default select example">
                <option id="pilih">All Client</option>
                @foreach ($projects as $project)
                <option class="opsi" value='{{$project->client_name}}'>{{$project->client_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <h6 class="font-weight-bold text-dark mt-2">Status</h6>
            <select class="form-select" aria-label="Default select example">
                <option id="pilih">All Status</option>
                @foreach ($projects as $project)
                <option class="opsi" value='{{$project->Project_status}}'>{{$project->Project_status}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <h6 class="font-weight-bold text-dark mt-2"></h6>
            <div class="btn btn-primary mt-4" style="width: 150px;" id="search" type="submit">Search</div>
            <div class="btn btn-danger mt-4" style="width: 150px;" id="clear">Clear</div>
        </div>
    </form>
</div>
<!-- button new dan delete -->
<a class="btn btn-primary mb-3" style="width:100px;" href="{{url('/add')}}">New</a>
<div class="btn btn-danger mb-3" style="width:100px;">Delete</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Action</th>
                    <th>Project Name</th>
                    <th>Client</th>
                    <th>Project Start</th>
                    <th>Project End</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td></td>
                    <td><a href="{{url('/edit')}}" class="edit">Edit</a></td>
                    <td>{{$project->project_name}}</td>
                    <td>{{$project->client_name}}</td>
                    <td>{{$project->project_start}}</td>
                    <td>{{$project->project_end}}</td>
                    <td>{{$project->Project_status}}</td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('template/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('template/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "pageLength": 5,
            'dom': 'rtip',
            'columnDefs': [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }],
            'select': {
                'style': 'multi'
            },
            'order': [
                [1, 'asc']
            ]
        });


        // Handle form submission event
        $('#frm-example').on('submit', function(e) {
            var form = this;

            var rows_selected = table.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId) {
                // Create a hidden element
                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });
        });
    });


    $('.form-select').click(function() {
        $('#pilih').remove();
    });
</script>
@endsection