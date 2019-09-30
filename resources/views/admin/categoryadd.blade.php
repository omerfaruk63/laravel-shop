@extends('layouts.adminlayout')

@section('content')
        <form method="POST" action="{{ route('categoryadd.post') }}">
            {{ csrf_field() }}
    <div class="form-group">
      <label for="">Category Url</label>
      <input type="text" class="form-control" name="url" placeholder="Enter Url">

    </div>
    <div class="form-group">
      <label for="">Category Title</label>
      <input type="text" class="form-control" name="title" placeholder="Enter Title">

    </div>

    <div class="form-group">
      <label for="">Category description</label>
      <input type="text" class="form-control" name="description" placeholder="Enter Description">

    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
