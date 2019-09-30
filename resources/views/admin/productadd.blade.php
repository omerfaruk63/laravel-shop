@extends('layouts.adminlayout')

@section('content')

        <form method="POST" action="{{ route('productadd.post') }}">
            {{ csrf_field() }}
    <div class="form-group">
      <label for="">Product Name</label>
      <input type="text" class="form-control" name="name" placeholder="Product Name">

    </div>
    <div class="form-group">
      <label for="">Product Url</label>
      <input type="text" class="form-control" name="url" placeholder="Product Url">
    </div>
    <div class="form-group">
      <label for="">Description</label>
      <input type="text" class="form-control" name="description" placeholder="Description">

    </div>
    <div class="form-group">
      <label for="">Price</label>
      <input type="text" class="form-control" name="price" placeholder="Price">

    </div>
    <div class="form-group">
      <label for="">Content</label>
      <input type="text" class="form-control" name="content" placeholder="Content">
    </div>

    <div class="form-group">
      <label for="">Category</label>
      <select id="pickup_place" name="category_id">
          @foreach ($categories as $cat)
        <option value="{{$cat->id}}" selected="selected">{{$cat->title}}</option>
        @endforeach
</select>
<div class="form-group">
  <label for="">Brand</label>
  <select id="pickup_place" name="brand_id">
      @foreach ($brands as $bra)
    <option value="{{$bra->id}}" selected="selected">{{$bra->title}}</option>
    @endforeach
</select>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection
