<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $user = Auth::user();
        return view('home', compact('title', 'user'));
    }

    public function admin(){
        $title = 'Admin Dashboard';
        $user = Auth::user();
        return view('admin-page', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Tour $wisata)
    {
        $title = "Pesan Tiket";
        $dataPesan = [
            'nama_wisata' => $wisata->nama_wisata,
            'harga' => $wisata->harga,
            'jumlah_pemesanan' =>  $request->quantity,
            'total_harga' => $wisata->harga * $request->quantity
        ];

        session(['data_pesan' => $dataPesan]);

        return view('pesan/create', compact('title', 'dataPesan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $dataPesan = $request->validate([
            'tanggal_berkunjung' => 'required|date_format:y/m/d|after_or_equal:'. now()->toDateString(),
            'nama' => 'required|string|min:3',
            'payment_method' => 'required|in:cash,e-wallet'
        ]);
        $dataTransaksi = session()->get('data_pesan');
        $dataUser = User::where('id', Auth::id())->firstOrFail();

        $formatTanggalDatabase = Carbon::createFromFormat('y/m/d', $dataPesan['tanggal_berkunjung'])->format('Y-m-d');
        $idWisata = Tour::where('nama_wisata', $dataTransaksi['nama_wisata'])->firstOrFail();

        DB::beginTransaction();

        try {

            $order = Transaction::create([
                'tour_id' => $idWisata->id,
                'user_id' => $dataUser->id,
                'price' => $dataTransaksi['total_harga'],
                'tanggal_berkunjung' => $formatTanggalDatabase ,
                'quantity' => $dataTransaksi['jumlah_pemesanan'],
                'status' => 'Menunggu Pembayaran'
            ]);
            if ($dataPesan['payment_method'] == 'e-wallet') {
                if ($dataUser->saldo < $dataTransaksi['total_harga']) {
                    throw new \Exception("Saldo Kamu kurang");
                } else {
                    $dataUser->saldo -= $dataTransaksi['total_harga'];
                    $dataUser->save();
                    $order->update(['status' => 'Transaksi Berhasil']);
                }
            }

            DB::commit();
            notify()->success('Pemesanan Tiket Berhasil');

            return redirect()->route('riwayat');
        } catch (\Exception $th) {
            DB::rollBack();
            notify()->warning('Terjadi Kesalahan:' . $th->getMessage());
            return redirect()->back();
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $wisata)
    {   
        $title = 'Detail Pesan';
        $gambarWisata = Tour::where('id', $wisata->tour_id)->first()->gambar;
        $deskripsiWisata = Tour::where('id', $wisata->tour_id)->first()->deskripsi;
        return view('pesan.show', compact('title', 'wisata', 'gambarWisata', 'deskripsiWisata'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function riwayat_pesanan()
    {
        $title = "Pesan Tiket";
        $riwayatTransaksi = Auth::user()->transaction->all();
        return view('pesan.index', compact('title', 'riwayatTransaksi'));
    }
}
