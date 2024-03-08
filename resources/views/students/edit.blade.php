@extends('students.layout')
@section('content')
 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ url('student/' .$students->id) }}"  class="mt-2" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
        <label>Name</label>
        <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control mt-2">
        <!-- <span class="text-danger">@error('name') {{$message}} @enderror</span></br> -->
        <label>Address</label>
        <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control mt-2">
        <!-- <span class="text-danger">@error('address') {{$message}} @enderror</span></br> -->
        <label>Mobile</label>
        <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control mt-2">
        <!-- <span class="text-danger">@error('mobile') {{$message}} @enderror</span></br> -->
        <input type="submit" value="Update" class="btn btn-success mt-2">
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 
@stop