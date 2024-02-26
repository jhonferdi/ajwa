@extends('layouts/main')

@section('container')
<H1 class="text-center mb-3">{{ $title }}</H1>
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-body">
          <form action="/update/{{ $data->id_jemaah }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div> --}}
            <div class="mb-3">
              <label for="kodeagent" class="form-label">Kode Agent</label>
              <input type="text" name="kode_agent" class="form-control" id="kodeagent" value="{{ $data->kode_agent }}">
            </div>
            <div class="mb-3">
              <label for="emailjemaah" class="form-label">Email address</label>
              <input type="email" name="email_jemaah" class="form-control" id="emailjemaah" value="{{ $data->email_jemaah }}">
            </div>
            <div class="mb-3">
              <label for="namalengkapjemaah" class="form-label">Nama Lengkap Jemaah</label>
              <input type="text" name="nama_lengkap_jemaah" class="form-control" id="namalengkapjemaah" value="{{ $data->nama_lengkap_jemaah }}">
            </div>
            <div class="mb-3">
              <label for="noktpjemaah" class="form-label">No KTP</label>
              <input type="number" name="no_ktp" class="form-control" id="noktpjemaah" value="{{ $data->no_ktp }}">
            </div>
            <div class="mb-3">
              <label for="tempatlahirjemaah" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempatlahirjemaah" value="{{ $data->tempat_lahir }}">
            </div>
            <div class="mb-3">
              <label for="tanggallahirjemaah" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" id="tanggallahirjemaah" value="{{ $data->tanggal_lahir }}">
            </div>
            <div class="mb-3">
              <label for="jeniskelaminjemaah" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin">
                <option selected disabled hidden>{{ $data->jenis_kelamin }}</option>
                <option value="LAKI-LAKI">LAKI-LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label for="alamatjemaah" class="form-label">Alamat</label>
              <input type="text" name="alamat_jemaah" class="form-control" id="alamatjemaah" value="{{ $data->alamat_jemaah }}">
            </div>
            <div class="mb-3">
              <label for="ahliwaris" class="form-label">Ahli Waris</label>
              <input type="text" name="ahli_waris" class="form-control" id="ahliwaris" value="{{ $data->ahli_waris }}">
            </div>
            <div class="mb-3">
              <label for="nojemaah" class="form-label">No Telepon</label>
              <input type="number" name="no_telepon" class="form-control" id="nojemaah" value="{{ $data->no_telepon }}">
            </div>
            <div class="mb-3">
              <label for="nokeluargajemaah" class="form-label">No Telepon Keluarga</label>
              <input type="number" name="no_telepon_keluarga" class="form-control" id="nokeluargajemaah" value="{{ $data->no_telepon_keluarga }}">
            </div>
            <div class="mb-3">
              <label for="namapendamping" class="form-label">Nama Pendamping</label>
              <input type="text" name="nama_pendamping" class="form-control" id="namapendamping" value="{{ $data->nama_pendamping }}">
            </div>
            <div class="mb-3">
              <label for="ayahjemaah" class="form-label">Nama Ayah</label>
              <input type="text" name="nama_ayah" class="form-control" id="ayahjemaah" value="{{ $data->nama_ayah }}">
            </div>
            <div class="mb-3">
              <label for="kakekjemaah" class="form-label">Nama Kakek</label>
              <input type="text" name="nama_kakek" class="form-control" id="kakekjemaah" value="{{ $data->nama_kakek }}">
            </div>
            <div class="mb-3">
              <label for="paketumroh" class="form-label">Paket Umroh</label>
              <select class="form-select" name="paket_umroh" aria-label="Default select example">
                <option selected disabled hidden>{{ $data->paket_umroh }}</option>
                <option value="29900000">Rp. 29.900.000</option>
                <option value="32900000">Rp. 32.900.000</option>
                <option value="37900000">Rp. 37.900.000</option>
                <option value="43000000">Rp. 43.000.000</option>
                <option value="43500000">Rp. 43.500.000</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tanggalpendaftaran" class="form-label">Tanggal Pendaftaran</label>
              <input type="date" name="tanggal_pendaftaran" class="form-control" id="tanggalpendaftaran" value="{{ $data->tanggal_pendaftaran }}">
            </div>
            <div class="mb-3">
              <label for="tanggalkeberangkatan" class="form-label">Tanggal Keberangkatan</label>
              <input type="date" name="tanggal_keberangkatan" class="form-control" id="tanggalkeberangkatan" value="{{ $data->tanggal_keberangkatan }}">
            </div>
            <div class="mb-3">
              <label for="informasivia" class="form-label">Informasi Via</label>
              <input type="text" name="informasi_via" class="form-control" id="informasivia" value="{{ $data->informasi_via }}">
            </div>
            <div class="mb-3">
              <label for="jeniskamar" class="form-label">Jenis Kamar</label>
              <select class="form-select" name="jenis_kamar" aria-label="Default select example">
                <option selected disabled hidden>{{ $data->jenis_kamar }}</option>
                <option value="QUAD">QUAD</option>
                <option value="TRIPLE">TRIPLE</option>
                <option value="DOUBLE">DOUBLE</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kursiroda" class="form-label">Kursi Roda</label>
              <select class="form-select" name="kursi_roda" aria-label="Default select example">
                <option selected disabled hidden>{{ $data->kursi_roda }}</option>
                <option value="TIDAK">TIDAK</option>
                <option value="IYA">IYA</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="norekeningjemaah" class="form-label">Nomor Rekening</label>
              <input type="number" name="nomor_rekening" class="form-control" id="norekeningjemaah" value="{{ $data->nomor_rekening }}">
            </div>
            <div class="mb-3">
              <label for="dppembayaran" class="form-label">DP Pembayaran</label>
              <input type="number" name="dp_pembayaran" class="form-control" id="dppembayaran" value="{{ $data->dp_pembayaran }}">
            </div>
            {{-- 
            <div class="mb-3">
              <label for="buktitransfer" class="form-label">Bukti Transfer</label>
              <input type="text" class="form-control" id="buktitransfer">
            </div>
            <div class="mb-3">
              <label for="pasfotojemaah" class="form-label">Pas Foto 4x6</label>
              <input type="text" class="form-control" id="pasfotojemaah">
            </div>
            <div class="mb-3">
              <label for="ktpjemaah" class="form-label">KTP</label>
              <input type="text" class="form-control" id="ktpjemaah">
            </div>
            <div class="mb-3">
              <label for="kkjemaah" class="form-label">Kartu Keluarga</label>
              <input type="text" class="form-control" id="kkjemaah">
            </div>
            <div class="mb-3">
              <label for="passportjemaah" class="form-label">Passport</label>
              <input type="text" class="form-control" id="passportjemaah">
            </div>
            <div class="mb-3">
              <label for="vaksinmeningitis" class="form-label">Vaksin Meningitis</label>
              <input type="text" class="form-control" id="vaksinmeningitis">
            </div> --}}
            <div class="mb-3">
              <label for="mediasosial" class="form-label">Media Sosial</label>
              <input type="text" name="media_sosial" class="form-control" id="mediasosial" value="{{ $data->media_sosial }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection