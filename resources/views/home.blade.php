@extends('layouts.app')


@section('content')

  <div class="container ">
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Track url</th>
        </tr>
        </thead>
        <tbody>

        @if (isset($users))
          @foreach ($users as $user)
            <tr>
              <td>{{$user['id']}}</td>
              <td>{{$user['name']}}</td>
              <td>{{$user['email']}}</td>
              <td><a href="{{ url('')."/analytics/user/".$user['track_url']}}"><i class="fas fa-link"></i>&nbsp;Visit</a></td>
            </tr>

          @endforeach
        @else
          <h1>No visits</h1>
        @endif

        </tbody>
      </table>

      @if (isset($users))
        <div class="pagination-container">
          {{ $users->links() }}
        </div>
      @endif
    </div>
  </div>

@endsection

