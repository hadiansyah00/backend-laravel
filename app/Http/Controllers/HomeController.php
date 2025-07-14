<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  // HomeController.php
    public function index()
    {
        $page = Pages::with(['sections' => function($query) {
                $query->select('id', 'page_id', 'type', 'content', 'order')
                    ->orderBy('order');
            }])
            ->where('is_published', true)
            ->first(['id', 'title', 'slug', 'content']);

        return view('front.home', [
            'page' => $page,
            'featuredSections' => $page->sections ?? collect()
        ]);
    }
}
