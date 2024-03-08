@extends('students.layout')
@section('content')
 
<div class=" mt-3 card">
  <div class="card-header d-flex justify-content-center"><h2>Student  Creation Page</h2></div>
  <div class="card-body">
      
      <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
        <label class="mt-2">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
        <label class="mt-2">Address</label>
        <input type="text" name="address" id="address"value="{{old('address')}}" class="form-control">
        <span class="text-danger">@error('address') {{$message}} @enderror</span> 
        </div>
        <div class="form-group">

        <label class="mt-2">Mobile</label>
        <input type="text" name="mobile" id="mobile" value="{{old('mobile')}}"class="form-control">
        <span class="text-danger">@error('mobile') {{$message}} @enderror</span>
        </div>
        <input  type="submit" value="Save" class="btn btn-success mt-2 ">
    </form>
   
  </div>
</div>
 
@stop