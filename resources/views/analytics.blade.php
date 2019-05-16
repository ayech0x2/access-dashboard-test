@extends('layouts.app')


@section('content')
  <div class="container ">
    <div class="row">
      <div class="title"><span>Visits of:&nbsp;</span> <strong class="user"> {{$user->name}}</strong></div>
      <table class="table">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Visit id</th>
          <th scope="col">Ip address</th>
          <th scope="col">Platform</th>
          <th scope="col">Device</th>
          <th scope="col">Country</th>
          <th scope="col">Date of visit</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @if (isset($visits))
          @foreach ($visits as $visit)
            <tr>
              <td>{{$visit['id']}}</td>
              <td>{{$visit['ip_address']}}</td>
              <td>{{$visit['platform']}}</td>
              <td>{{$visit['device']}}</td>
              <td>{{$visit['country']}}</td>
              <td>  {{date('d:m:Y', strtotime($visit['created_at'])) }}</td>
              <td style="text-align: center"><i onclick="removeVisit({{$visit->id}})" style="cursor:pointer;"
                                                class="fas fa-trash"></i></td>
            </tr>

          @endforeach
        @else
          <h1>No visits</h1>
        @endif

        </tbody>
      </table>

      @if (isset($visits))
        <div class="pagination-container">
          {{ $visits->links() }}
        </div>
      @endif
    </div>
  </div>
  <script>
    function removeVisit(id, csrf_token) {
      $.ajax({
        url: '/remove',
        type: 'POST',
        data: {
          "_token": "{{ csrf_token() }}",
          id: id,
        },
        dataType: 'JSON',
        success: function (data) {
          alert("Visit deleted");
          location.reload();
        }
      });
    }
  </script>
@endsection

