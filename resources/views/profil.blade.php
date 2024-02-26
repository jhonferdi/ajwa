@extends('layouts/main')

@section('container')
    <H1>PROFIL AGENT</H1>
    <H3>{{ $profil["nama_lengkap"] }}</H3>
    <h3>{{ $umur }}</h3>
    <img src="imageprofil/{{ $image }}" alt="{{ $name }}" width="200px">
@endsection
