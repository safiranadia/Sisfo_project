<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReturnsExport;
use App\Models\Returns;

class ReturnsController extends Controller
{
    public function index()
    {
        $returns = Returns::all();
        return view('pages.returns_page', compact('returns'));
    }

    public function export()
    {
        return Excel::download(new ReturnsExport, 'returns.xlsx');
    }
}
