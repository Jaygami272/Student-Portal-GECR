@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Departments</h1>
        </div>
        
    </div>
</div>
<section class="section">
    @include('common.errors')
  
    <div class="clearfix"></div>
  
    <form method="POST" onsubmit="return dis()"; action="{{ route('departments.store') }}">
      @csrf
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="department_name" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">HOD Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">HOD Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" required>
        </div>
    </div>
  
      <div class="">
        <button type="submit" class="btn btn-gray" id="bt" name="sbt">Save</button>
        <a href="{{route('departments.index')}}"><button type="button" class="btn btn-secondary">Back</button></a>
      </div>
  
    </form>
  
    </div>
    </div>
    </div>
    </div>
  </section>
@endsection
