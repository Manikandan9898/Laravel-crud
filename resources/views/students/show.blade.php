@extends('students.layout')
@section('content')
 <div class="container"> 
 
<div class=" mt-5 card ">
  <div class="card-header  d-flex justify-content-center "><h2>Student Details</h2></div>
  <div class="card-body ">
   
 
        <div class="card-body ">
        <h5 class="card-title">Name : {{ $student->name }}</h5>
        <p class="card-text">Address : {{ $student->address }}</p>
        <p class="card-text">Mobile : {{ $student->mobile }}</p>
  </div>
       
    
  
  </div>
</div></div>