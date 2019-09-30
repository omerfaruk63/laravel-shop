@extends('layouts.adminlayout')

@section('content')
        <form method="POST" action="{{ route('brandadd.post') }}">
            {{ csrf_field() }}
    <div class="form-group">
      <label for="">Brand Url</label>
      <input type="text" class="form-control" name="url" placeholder="Enter Url">

    </div>
    <div class="form-group">
      <label for="">Brand Title</label>
      <input type="text" class="form-control" name="title" placeholder="Enter Title">

    </div>

    <div class="form-group">
      <label for="">Brand description</label>
      <input type="text" class="form-control" name="description" placeholder="Enter Description">

    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
