@extends('layouts/main')

@section('container')
    <H1>{{ $title }}</H1>
    <table class="table table-striped-columns">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama AGEN</th>
          <th scope="col">JABATAN</th>
          <th scope="col">UJRAH</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($agents as $agent)
        <tr>
          <th scope="row"></th>
          <td>{{ $agent["nama_lengkap"] }}</td>
          <td>{{ $agent["role_id"] }}</td> {{-- jabatan --}}
          <td>{{ $agent["total_ujrah"] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
@endsection