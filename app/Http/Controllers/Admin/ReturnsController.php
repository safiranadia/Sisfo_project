<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Returns;
use Barryvdh\DomPDF\Facade\Pdf;

class ReturnsController extends Controller
{
    public function index()
    {
        $returns = Returns::all();
        return view('pages.returns_page', compact('returns'));
    }

    public function exportPdf()
    {
        $returns = Returns::all();

        $pdf = Pdf::loadView('exports.returns', compact('returns'));

        return $pdf->download('returns.pdf');
    }
}
