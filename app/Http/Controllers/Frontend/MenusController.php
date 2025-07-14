<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenusController extends Controller
{
     public function getActiveMenus()
    {
        return Menu::with('children')
                ->whereNull('parent_id')
                ->active() // Menggunakan scope active
                ->orderBy('order')
                ->get();
    }
}
