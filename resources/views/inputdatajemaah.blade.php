@extends('layouts/main')

@section('container')
<H1 class="text-center mb-3">{{ $title }}</H1>
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-body">
          <form action="/jemaah" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div> --}}
            <div class="mb-3">
              <label for="kodeagent" class="form-label">Kode Agent</label>
              <input type="text" name="kode_agent" class="form-control" id="kodeagent">
            </div>
            <div class="mb-3">
              <label for="emailjemaah" class="form-label">Email address</label>
              <input type="email" name="email_jemaah" class="form-control" id="emailjemaah">
            </div>
            <div class="mb-3">
              <label for="namalengkapjemaah" class="form-label">Nama Lengkap Jemaah</label>
              <input type="text" name="nama_lengkap_jemaah" class="form-control" id="namalengkapjemaah">
            </div>
            <div class="mb-3">
              <label for="noktpjemaah" class="form-label">No KTP</label>
              <input type="number" name="no_ktp" class="form-control" id="noktpjemaah">
            </div>
            <div class="mb-3">
              <label for="tempatlahirjemaah" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempatlahirjemaah">
            </div>
            <div class="mb-3">
              <label for="tanggallahirjemaah" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" id="tanggallahirjemaah">
            </div>
            <div class="mb-3" >
              <label for="jeniskelaminjemaah" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin">
                <option value="LAKI-LAKI">LAKI-LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label for="alamatjemaah" class="form-label">Alamat</label>
              <input type="text" name="alamat_jemaah" class="form-control" id="alamatjemaah">
            </div>
            <div class="mb-3">
              <label for="ahliwaris" class="form-label">Ahli Waris</label>
              <input type="text" name="ahli_waris" class="form-control" id="ahliwaris">
            </div>
            <div class="mb-3">
              <label for="nojemaah" class="form-label">No Telepon</label>
              <input type="number" name="no_telepon" class="form-control" id="nojemaah">
            </div>
            <div class="mb-3">
              <label for="nokeluargajemaah" class="form-label">No Telepon Keluarga</label>
              <input type="number" name="no_telepon_keluarga" class="form-control" id="nokeluargajemaah">
            </div>
            <div class="mb-3">
              <label for="namapendamping" class="form-label">Nama Pendamping</label>
              <input type="text" name="nama_pendamping" class="form-control" id="namapendamping">
            </div>
            <div class="mb-3">
              <label for="ayahjemaah" class="form-label">Nama Ayah</label>
              <input type="text" name="nama_ayah" class="form-control" id="ayahjemaah">
            </div>
            <div class="mb-3">
              <label for="kakekjemaah" class="form-label">Nama Kakek</label>
              <input type="text" name="nama_kakek" class="form-control" id="kakekjemaah">
            </div>
            <div class="mb-3">
              <label for="paketumroh" class="form-label">Paket Umroh</label>
              <select class="form-select" name="paket_umroh">
                <option value="29900000">Rp. 29.900.000</option>
                <option value="32900000">Rp. 32.900.000</option>
                <option value="37900000">Rp. 37.900.000</option>
                <option value="43000000">Rp. 43.000.000</option>
                <option value="43500000">Rp. 43.500.000</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tanggalpendaftaran" class="form-label">Tanggal Pendaftaran</label>
              <input type="date" name="tanggal_pendaftaran" class="form-control" id="tanggalpendaftaran">
            </div>
            <div class="mb-3">
              <label for="tanggalkeberangkatan" class="form-label">Tanggal Keberangkatan</label>
              <input type="date" name="tanggal_keberangkatan" class="form-control" id="tanggalkeberangkatan">
            </div>
            <div class="mb-3">
              <label for="informasivia" class="form-label">Informasi Via</label>
              <input type="text" name="informasi_via" class="form-control" id="informasivia">
            </div>
            <div class="mb-3">
              <label for="jeniskamar" class="form-label">Jenis Kamar</label>
              <select class="form-select" name="jenis_kamar">
                <option value="QUAD">QUAD</option>
                <option value="TRIPLE">TRIPLE</option>
                <option value="DOUBLE">DOUBLE</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kursiroda" class="form-label">Kursi Roda</label>
              <select class="form-select" name="kursi_roda">
                <option value="TIDAK">TIDAK</option>
                <option value="IYA">IYA</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="norekeningjemaah" class="form-label">Nomor Rekening</label>
              <input type="number" name="nomor_rekening" class="form-control" id="norekeningjemaah">
            </div>
            <div class="mb-3">
              <label for="dppembayaran" class="form-label">DP Pembayaran</label>
              <input type="number" name="dp_pembayaran" class="form-control" id="dppembayaran">
            </div>
            
            <div class="mb-3">
              <label for="buktitransfer" class="form-label">Bukti Transfer</label>
              <input type="file" name="bukti_transfer" class="form-control" id="buktitransfer">
            </div>
            {{-- 
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
              <input type="text" name="media_sosial" class="form-control" id="mediasosial">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection