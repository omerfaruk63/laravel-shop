@extends('layouts.adminlayout')

@section('content')

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
                <th scope="col">Description</th>
                  <th scope="col">Price</th>
                    <th scope="col">Content</th>
                    <th scope="col">İmage</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($products as $pro)
              <tr>
                <th scope="row">{{ $pro->id }}</th>
                <td>{{ $pro->name }}</td>
                <td>{{ $pro->description }}</td>
                <td>{{ $pro->price }}</td>
                <td>{{ $pro->content }}</td>
                  <td><img src="{{ $pro->image }}" style="width:25px;height:25px;" alt=""></td>
              </tr>
            @endforeach

          </tbody>
        </table>

@endsection
