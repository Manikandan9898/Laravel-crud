@extends('students.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- @if (session('flash_message'))
                    {{ session('flash_message') }}
                @endif -->
                <!-- @if (Session::has('flashMessage'))
  <div class="alert {{ Session::has('flashType') ? 'alert-'.session('flashType') : '' }}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session('flashMessage') }}
  </div>
@endif -->
@if (Session::has('flashMessage'))
    <div class="alert {{ Session::has('flashType') ? 'alert-' . session('flashType') : '' }} alert-dismissible fade show" role="alert">
        {{ session('flashMessage') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                <div class="mt-5 card">
                    <div class="card-header">
                        <h2 class="d-flex justify-content-center">Students Details</h2>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card card-body" style="border:none;">
                                <form action="{{ route('search') }}" method="get">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="search" value="{{ isset($searchTerm) ? $searchTerm : '' }}" name="search_term">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($students->perPage() * ($students->currentPage() - 1)) }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>
                                            <!-- edit -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit the information of  {{ $item->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('student.update', ['student' => $item->id]) }}" method="post" class="mt-2">
    @csrf
    @method('PATCH')
    <label>Name</label>
    <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control mt-2">
    <span class="text-danger">@error('name') {{ $message }} @enderror</span><br>
    <label>Address</label>
    <input type="text" name="address" id="address" value="{{ $item->address }}" class="form-control mt-2">
    <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>
    <label>Mobile</label>
    <input type="text" name="mobile" id="mobile" value="{{ $item->mobile }}" class="form-control mt-2">
    <span class="text-danger">@error('mobile') {{ $message }} @enderror</span><br>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete -->
                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"style="height:38px;">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $students->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
