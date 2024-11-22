<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $title = "Wisata Indah Mauk";
        $user = Auth::user();
        $categories = Category::all();
        return view("tours.admin.kategori", compact('title', 'user', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'string|required']);
        $data = ["nama" => ucfirst($request->nama)];
        Category::create($data);
        notify()->success('Kategori Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy(Category $id)
    {
        $id->delete();
        notify()->success('Kategori Berhasil Dihapus');
        return redirect()->back();
    }
}
