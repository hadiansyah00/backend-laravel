<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // Pastikan ini diimport
use Illuminate\View\View;
use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    /**
     * Menampilkan halaman utama
     */
    public function index(): View
    {
        try {
            // Ambil data kategori berita
            $response_berita = Http::get('https://perempuanaman.or.id/wp-json/wp/v2/posts', [
                'categories' => 179,
                '_embed' => true,
                'per_page' => 6
            ]);

            // Ambil data kategori buku
            $response_buku = Http::get('https://perempuanaman.or.id/wp-json/wp/v2/posts', [
                'categories' => 180,
                '_embed' => true,
                'per_page' => 6
            ]);

            $berita = $response_berita->successful() ? $response_berita->json() : [];
            $buku = $response_buku->successful() ? $response_buku->json() : [];

            if (!$response_berita->successful()) {
                \Log::error('Gagal fetch berita', ['status' => $response_berita->status()]);
            }

            if (!$response_buku->successful()) {
                \Log::error('Gagal fetch buku', ['status' => $response_buku->status()]);
            }

        } catch (\Exception $e) {
            $berita = [];
            $buku = [];
            \Log::error('Catch error', ['message' => $e->getMessage()]);
        }

        return view('front-pages.index', compact('berita', 'buku'));
    }



}