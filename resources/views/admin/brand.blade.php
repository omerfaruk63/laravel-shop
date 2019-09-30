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
            @foreach ($brands as $bra)
              <tr>
                <th scope="row">{{ $bra->id }}</th>
                <td>{{ $bra->url }}</td>
                <td>{{ $bra->title }}</td>
                <td>{{ $bra->description }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

@endsection
