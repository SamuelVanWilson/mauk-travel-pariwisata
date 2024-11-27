<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Wisata Indah Mauk";
        $user = Auth::user();
        $userRole = 'guest';
        $tours = Tour::with('category')->get();
        if (Auth::check()) {
            $userRole = $user->role->nama;
        }
        return view("tours.index", compact('title', 'user', 'userRole', 'tours'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Wisata Baru";
        // $AllCategory = Category::pluck('nama')->toArray();
        // dd(implode(',', $AllCategory));
        $user = Auth::user();
        $kategori = Category::all();
        return view("tours.admin.create", compact('title', 'user', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $allCategory = Category::pluck('nama')->toArray();
        $categoryChose = Category::where('nama', $request->kategori)->first();
        $request->validate([
            'nama_wisata' => 'required|string|min:3',
            'tempat_wisata' => 'required|string|min:4',
            'harga' => 'required|integer|min:4',
            'kategori' => 'required|in:'.implode(',', $allCategory),
            'deskripsi' => 'required|string'
        ]);

        $data = $request->except('gambar');
        $data['category_id'] = $categoryChose->id;

        if ($request->hasFile('gambar')) {
            $img = $request->file('gambar');
            $request->validate(['gambar' => 'image|mimes:jpg,png,jpeg|max:3048']);
            $img->storeAs('public/img_wisata', $img->hashName());    
            $data['gambar'] = $img->hashName(); 
        }

        Tour::create($data);
        notify()->success('Wisata Baru Berhasil Ditambahkan');  
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  Tour $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $wisata)
    {
        $title = 'Detail Wisata Mauk';
        $user = Auth::user();
        return view('tours.show', compact('title', 'wisata', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Tour $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $admin)
    {
        $title = "Edit Wisata";
        $user = Auth::user();
        $wisata = $admin;
        $kategori = Category::all();
        return view("tours.admin.edit", compact('title', 'user', 'kategori', 'wisata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Tour $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $admin)
    {
        $allCategory = Category::pluck('nama')->toArray();
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'tempat_wisata' => 'required|string|max:255',
            'harga' => 'required|integer|min:4',
            'deskripsi' => 'required',
            'kategori' => 'required|in:'.implode(',', $allCategory)
        ]);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('gambar')) {
            $img = $request->file('gambar');
            if ($admin->gambar == 'view.jpg') {
                Storage::delete('public/img_wisata', $admin->gambar);
            }
            $img->storeAs('public/img_wisata', $img->hashName());
            $data['gambar'] = $img->hashName();
        }

        $admin->update($data);
        notify()->success('Data Wisata Berhasil Diubah');
        return redirect()->route('tours.show', $admin->nama_wisata);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Tour $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $admin)
    {
        $admin->delete();
        notify()->success('Data Wisata Berhasil Dihapus');
        return redirect()->route('tours.index');
    }
}
