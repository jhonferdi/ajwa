<?php

namespace App\Http\Controllers;

use App\Models\Jemaah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class JemaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        // SEARCH
        if($req->has('search')){
            $models = Jemaah::where('nama_lengkap_jemaah', 'LIKE', '%' .$req->search. '%')->paginate(5);
        } else {
            $models = Jemaah::orderBy('id_jemaah')->paginate(5);
        }

        return view('jemaah', [
                "title" => "Data Jemaah",
                "jemaahs" => $models
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inputdatajemaah', [
            "title" => "Tambah Data Jemaah"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $accepted_body = $req->only([
            'kode_agent',
            'email_jemaah', 
            'nama_lengkap_jemaah',
            'no_ktp',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'alamat_jemaah',
            'ahli_waris',
            'no_telepon',
            'no_telepon_keluarga',
            'nama_pendamping',
            'nama_ayah',
            'nama_kakek',
            'paket_umroh',
            'tanggal_pendaftaran',
            'tanggal_keberangkatan',
            'informasi_via',
            'jenis_kamar',
            'kursi_roda',
            'nomor_rekening',
            'dp_pembayaran',
            'bukti_transfer',
            'pas_foto_jemaah',
            'ktp_jemaah',
            'kk_jemaah',
            'pasport_asli',
            'bukti_vaksin_maningitis',
            'media_sosial',
        ]);

        $validator = Validator::make($accepted_body, [
            'kode_agent' => ['required', 'string', 'max:50'],
            'email_jemaah' => ['required', 'string', 'max:255'], 
            'nama_lengkap_jemaah' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:64'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat_jemaah' => ['required', 'string', 'max:255'],
            'ahli_waris' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:15'],
            'no_telepon_keluarga' => ['required', 'string', 'max:15'],
            'nama_pendamping' => ['required', 'string', 'max:255'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'nama_kakek' => ['required', 'string', 'max:255'],
            'paket_umroh' => ['required'],
            'tanggal_pendaftaran' => ['required'],
            'tanggal_keberangkatan' => ['required'],
            'informasi_via' => ['required', 'string', 'max:100'],
            'jenis_kamar' => ['required', 'string', 'max:20'],
            'kursi_roda' => ['required', 'string', 'max:20'],
            'nomor_rekening' => ['required', 'string', 'max:100'],
            'dp_pembayaran' => ['required'],
            'bukti_transfer' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            // 'pas_foto_jemaah' => ['required'],
            // 'ktp_jemaah' => ['required'],
            // 'kk_jemaah' => ['required'],
            // 'pasport_asli' => ['required'],
            // 'bukti_vaksin_maningitis' => ['required'],
            'media_sosial' => ['required', 'string', 'max:100'],
        ],
        [
            'kode_agent.required' => 'wajib mengisi kode_agent!',
            'jenis_kelamin.required' => 'wajib mengisi jenis_kelamin'
        //     'peg_nama_lengkap.max' => 'maximal nama lengkap adalah 50 huruf!',
        ]
        );

        // if ($validator->fails()) {
        //     return response()->json([
        //         "status" => "fail",
        //         "message" => "Gagal Mengisi Data",
        //         "error" => $validator->errors(),
        //     ], 401);
        // }

        if ($validator->fails())
            return (["error" => $validator->errors()
        ]);

        

        $model = new Jemaah();
        $model->kode_agent = $req->kode_agent;
        $model->email_jemaah = $req->email_jemaah;
        $model->nama_lengkap_jemaah = $req->nama_lengkap_jemaah;
        $model->no_ktp = $req->no_ktp;
        $model->tempat_lahir = $req->tempat_lahir;
        $model->tanggal_lahir = $req->tanggal_lahir;
        $model->usia_jemaah = Carbon::parse($req->usia_jemaah)->diff(Carbon::now())->y;
        $model->jenis_kelamin = $req->jenis_kelamin;
        $model->alamat_jemaah = $req->alamat_jemaah;
        $model->ahli_waris = $req->ahli_waris;
        $model->no_telepon = $req->no_telepon;
        $model->no_telepon_keluarga = $req->no_telepon_keluarga;
        $model->nama_pendamping = $req->nama_pendamping;
        $model->nama_ayah = $req->nama_ayah;
        $model->nama_kakek = $req->nama_kakek;
        $model->paket_umroh = $req->paket_umroh;
        $model->tanggal_pendaftaran = $req->tanggal_pendaftaran;
        $model->tanggal_keberangkatan = $req->tanggal_keberangkatan;
        $model->informasi_via = $req->informasi_via;
        $model->jenis_kamar = $req->jenis_kamar;
        $model->kursi_roda = $req->kursi_roda;
        $model->nomor_rekening = $req->nomor_rekening;
        $model->dp_pembayaran = $req->dp_pembayaran;

        $buktitransfer = Str::uuid().'.'.$req->bukti_transfer->extension();
        $req->bukti_transfer->move(public_path('storage/buktitransfer'), $buktitransfer);
        $model->bukti_transfer = $buktitransfer;
        
        $model->pas_foto_jemaah = $req->pas_foto_jemaah;
        $model->ktp_jemaah = $req->ktp_jemaah;
        $model->kk_jemaah = $req->kk_jemaah;
        $model->pasport_asli = $req->pasport_asli;
        $model->bukti_vaksin_maningitis = $req->bukti_vaksin_maningitis;
        $model->media_sosial = $req->media_sosial;

        

        $model->save();
        // return response()->json([
        //     'success' => true,
        //     'model' => $model,
        // ], 201);

        return redirect('/jemaah')->with('success', 'Jemaah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jemaah::find($id);
        return view('editdatajemaah', [
            "title" => "Edit Data Jemaah",
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $accepted_body = $req->only([
            'kode_agent',
            'email_jemaah', 
            'nama_lengkap_jemaah',
            'no_ktp',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'alamat_jemaah',
            'ahli_waris',
            'no_telepon',
            'no_telepon_keluarga',
            'nama_pendamping',
            'nama_ayah',
            'nama_kakek',
            'paket_umroh',
            'tanggal_pendaftaran',
            'tanggal_keberangkatan',
            'informasi_via',
            'jenis_kamar',
            'kursi_roda',
            'nomor_rekening',
            'dp_pembayaran',
            'bukti_transfer',
            'pas_foto_jemaah',
            'ktp_jemaah',
            'kk_jemaah',
            'pasport_asli',
            'bukti_vaksin_maningitis',
            'media_sosial',
        ]);

        $validator = Validator::make($accepted_body, [
            'kode_agent' => ['required', 'string', 'max:50'],
            'email_jemaah' => ['required', 'string', 'max:255'], 
            'nama_lengkap_jemaah' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:64'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat_jemaah' => ['required', 'string', 'max:255'],
            'ahli_waris' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:15'],
            'no_telepon_keluarga' => ['required', 'string', 'max:15'],
            'nama_pendamping' => ['required', 'string', 'max:255'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'nama_kakek' => ['required', 'string', 'max:255'],
            'paket_umroh' => ['required'],
            'tanggal_pendaftaran' => ['required'],
            'tanggal_keberangkatan' => ['required'],
            'informasi_via' => ['required', 'string', 'max:100'],
            'jenis_kamar' => ['required', 'string', 'max:20'],
            'kursi_roda' => ['required', 'string', 'max:20'],
            'nomor_rekening' => ['required', 'string', 'max:100'],
            'dp_pembayaran' => ['required'],
            // 'bukti_transfer' => ['required'],
            // 'pas_foto_jemaah' => ['required'],
            // 'ktp_jemaah' => ['required'],
            // 'kk_jemaah' => ['required'],
            // 'pasport_asli' => ['required'],
            // 'bukti_vaksin_maningitis' => ['required'],
            'media_sosial' => ['required', 'string', 'max:100'],
        ],
        [
            'kode_agent.required' => 'wajib mengisi kode_agent!',
        //     'peg_nama_lengkap.max' => 'maximal nama lengkap adalah 50 huruf!',
        ]
        );

        if ($validator->fails())
            return (["error" => $validator->errors()
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         "status" => "fail",
        //         "message" => "Gagal Mengisi Data",
        //         "error" => $validator->errors(),
        //     ], 401);
        // }

        $model = Jemaah::findOrFail($id);
        $model->kode_agent = $req->kode_agent;
        $model->email_jemaah = $req->email_jemaah;
        $model->nama_lengkap_jemaah = $req->nama_lengkap_jemaah;
        $model->no_ktp = $req->no_ktp;
        $model->tempat_lahir = $req->tempat_lahir;
        $model->tanggal_lahir = $req->tanggal_lahir;
        $model->usia_jemaah = Carbon::parse($req->usia_jemaah)->diff(Carbon::now())->y;
        $model->jenis_kelamin = $req->jenis_kelamin;
        $model->alamat_jemaah = $req->alamat_jemaah;
        $model->ahli_waris = $req->ahli_waris;
        $model->no_telepon = $req->no_telepon;
        $model->no_telepon_keluarga = $req->no_telepon_keluarga;
        $model->nama_pendamping = $req->nama_pendamping;
        $model->nama_ayah = $req->nama_ayah;
        $model->nama_kakek = $req->nama_kakek;
        $model->paket_umroh = $req->paket_umroh;
        $model->tanggal_pendaftaran = $req->tanggal_pendaftaran;
        $model->tanggal_keberangkatan = $req->tanggal_keberangkatan;
        $model->informasi_via = $req->informasi_via;
        $model->jenis_kamar = $req->jenis_kamar;
        $model->kursi_roda = $req->kursi_roda;
        $model->nomor_rekening = $req->nomor_rekening;
        $model->dp_pembayaran = $req->dp_pembayaran;
        $model->bukti_transfer = $req->bukti_transfer;
        $model->pas_foto_jemaah = $req->pas_foto_jemaah;
        $model->ktp_jemaah = $req->ktp_jemaah;
        $model->kk_jemaah = $req->kk_jemaah;
        $model->pasport_asli = $req->pasport_asli;
        $model->bukti_vaksin_maningitis = $req->bukti_vaksin_maningitis;
        $model->media_sosial = $req->media_sosial;

        $model->update();

        return redirect('/jemaah')->with('success', 'Data Jemaah Berhasil Diubah');

        // return response()->json([
        //     'model' => $model,
        //     'success' => true,
        // ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Jemaah::findOrFail($id);
        $model->delete();
        return redirect('/jemaah')->with('success', 'Data Jemaah Berhasil Dihapus');
    }
}
