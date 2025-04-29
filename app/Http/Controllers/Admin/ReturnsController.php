<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Returns;

class ReturnsController extends Controller
{
    public function index()
    {
        $returns = Returns::all();
        return view('pages.returns_page', compact('returns'));
    }
}
