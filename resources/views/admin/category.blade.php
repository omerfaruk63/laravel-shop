@extends('layouts.adminlayout')

@section('content')

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Url</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $cat)
              <tr>
                <th scope="row">{{ $cat->id }}</th>
                <td>{{ $cat->url }}</td>
                <td>{{ $cat->title }}</td>
                <td>{{ $cat->description }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

@endsection
