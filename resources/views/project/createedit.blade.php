@extends('layouts.main')

@section('contents')
<!-- Breadcrumb -->
<nav>
    <ol class="breadcrumb px-4 py-2">
        <li class="breadcrumb-item"><a href="{{url('/')}}" style="text-decoration: none; color: black; font-size:20px; font-weight:bold;">{{$judul}}</a></li>
        <li class="breadcrumb-item" style="text-decoration: none; color: black; font-size:20px; font-weight:bold;">{{$subjudul}}</li>
    </ol>
</nav>

<!-- Form -->
<div class="card mt-3">
    <form class="py-3 px-4" action="{{url('/add')}}" method="POST">
       
        <div class="mb-3">
            <label for="projectname" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="projectname" aria-describedby="emailHelp" name="projectname">
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="clientname" name="clientname">
        </div>
        <div class="mb-3">
            <label for="client_address" class="form-label">Client Address</label>
            <input type="text" class="form-control" id="clientaddress" name="clieantaddress">
        </div>
        <div class="mb-3">
            <label for="projectstart" class="form-label">Project Start</label>
            <input type="date" class="form-control" id="projectstart" name="projectstart">
        </div>
        <div class="mb-3">
            <label for="projectend" class="form-label">Project End</label>
            <input type="date" class="form-control" id="projectend" name="projectend">
        </div>
        <div class="mb-3">
            <label for="projectstatus" class="form-label">Project Status</label>
            <select class="form-select form-select-xs mb-3" name="project_status" id="">
                @foreach ($projects as $project)
                <option class="opsi" value="{{$project->Project_status}}">{{$project->Project_status}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a class="btn btn-secondary" href="{{url('/')}}">back</a>
    </form>

    @endsection

    @section('scripts')

    @endsection