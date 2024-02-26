@extends('layouts/main')

@section('container')
    <H1 class="text-center mb-3">{{ $title }}</H1>
    <a class="btn btn-success mb-2" href="inputdatajemaah">Input Data</a>
      <div class="mb-2 col-5">
        <form action="/jemaah" method="GET">
        <input type="search" name="search" class="form-control" id="search">
        </form>
      </div>
    @if ($message = Session::get('success'))
      <div class="alert alert-success col-5" role="alert">
        {{ $message }}
      </div>
    @endif
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-success">
          <tr>
            <th scope="col">NO</th>
            <th scope="col">EMAIL JEMAAH</th>
            <th scope="col">NAMA JEMAAH</th>
            <th scope="col">PAKET UMROH</th>
            <th scope="col">KODE AGENT</th>
            <th scope="col">NOMOR KTP</th>
            <th scope="col">TEMPAT LAHIR</th>
            <th scope="col">TANGGAL LAHIR</th>
            <th scope="col">USIA JEMAAH</th>
            <th scope="col">JENIS KELAMIN</th>
            <th scope="col">ALAMAT JEMAAH</th>
            <th scope="col">AHLI WARIS</th>
            <th scope="col">NOMOR TELEPON</th>
            <th scope="col">NOMOR KELUARGA</th>
            <th scope="col">NAMA PENDAMPING</th>
            <th scope="col">NAMA AYAH</th>
            <th scope="col">NAMA KAKEK</th>
            <th scope="col">TANGGAL PENDAFTARAN</th>
            <th scope="col">TANGGAL KEBERANGKATAN</th>
            <th scope="col">INFORMASI VIA</th>
            <th scope="col">JENIS KAMAR</th>
            <th scope="col">KURSI RODA</th>
            <th scope="col">NOMOR REKENING</th>
            <th scope="col">DP PEMBAYARAN</th>
            <th scope="col">BUKTI TRANSFER</th>
            <th scope="col">PAS FOTO</th>
            <th scope="col">KTP</th>
            <th scope="col">KARTU KELUARGA</th>
            <th scope="col">PASSPORT</th>
            <th scope="col">VAKSIN MANINGITIS</th>
            <th scope="col">MEDIA SOSIAL</th>
            <th scope="col">Aksi</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Diperbaharui</th>
          </tr>
        </thead>
        @if ($jemaahs->count())
          <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($jemaahs as $index => $jemaah)
            <tr>
              <th scope="row">{{ $index + $jemaahs->firstItem() }}</th>
              <td>{{ $jemaah["email_jemaah"] }}</td>
              <td>{{ $jemaah["nama_lengkap_jemaah"] }}</td>
              <td>{{ $jemaah["paket_umroh"] }}</td>
              <td>{{ $jemaah["kode_agent"] }}</td>
              <td>{{ $jemaah["no_ktp"] }}</td>
              <td>{{ $jemaah["tempat_lahir"] }}</td>
              <td>{{ $jemaah["tanggal_lahir"] }}</td>
              <td>{{ $jemaah["usia_jemaah"] }}</td>
              <td>{{ $jemaah["jenis_kelamin"] }}</td>
              <td>{{ $jemaah["alamat_jemaah"] }}</td>
              <td>{{ $jemaah["ahli_waris"] }}</td>
              <td>{{ $jemaah["no_telepon"] }}</td>
              <td>{{ $jemaah["no_telepon_keluarga"] }}</td>
              <td>{{ $jemaah["nama_pendamping"] }}</td>
              <td>{{ $jemaah["nama_ayah"] }}</td>
              <td>{{ $jemaah["nama_kakek"] }}</td>
              <td>{{ $jemaah["tanggal_pendaftaran"] }}</td>
              <td>{{ $jemaah["tanggal_keberangkatan"] }}</td>
              <td>{{ $jemaah["informasi_via"] }}</td>
              <td>{{ $jemaah["jenis_kamar"] }}</td>
              <td>{{ $jemaah["kursi_roda"] }}</td>
              <td>{{ $jemaah["nomor_rekening"] }}</td>
              <td>{{ $jemaah["dp_pembayaran"] }}</td>
              
              <td>
                <a href="storage/buktitransfer/{{ $jemaah->bukti_transfer }}">Bukti Transfer</a>
              </td>
              {{-- <td></td><img src="{{ asset('storage/buktitransfer/'. $jemaah->bukti_transfer) }}" alt="" style="height: 100px; width: 100px"> --}}

              <td>{{ $jemaah["pas_foto_jemaah"] }}</td>
              <td>{{ $jemaah["ktp_jemaah"] }}</td>
              <td>{{ $jemaah["kk_jemaah"] }}</td>
              <td>{{ $jemaah["pasport_asli"] }}</td>
              <td>{{ $jemaah["bukti_vaksin_maningitis"] }}</td>
              <td>{{ $jemaah["media_sosial"] }}</td>
              <th>
                <a href="/editdatajemaah/{{ $jemaah->id_jemaah }}" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger delete" data-id="{{ $jemaah->id_jemaah }}" data-nama-jemaah="{{ $jemaah->nama_lengkap_jemaah }}">Delete</a>
              </th>
              <td>{{ $jemaah->created_at->diffForHumans() }}</td>
              <td>{{ $jemaah->updated_at->diffForHumans() }}</td>
            </tr>
            @endforeach
          </tbody>
      </table>
      {{ $jemaahs->links() }}
      @else
        <p>Jemaah Tidak Ditemukan<p>
      @endif
    </div>
    
<script></script>    
@endsection
