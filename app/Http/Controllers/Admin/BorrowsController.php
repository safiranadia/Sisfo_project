<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrows;
use Barryvdh\DomPDF\Facade\Pdf;

class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrows::all();

        // dd($borrows);
        return view('pages.borrowing_page', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportPdf() 
    {
        $borrows = Borrows::all();

        $pdf = Pdf::loadView('exports.borrows', compact('borrows'));

        return $pdf->download('borrows.pdf');
    }

    /**
     * Approve a borrow request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        $borrow = Borrows::findOrFail($id);
        
        if ($borrow->is_approved) {
            return redirect()->back()->with('error', 'This borrow request has already been approved.');
        }
        
        $borrow->update([
            'is_approved' => true,
            'status' => 'borrowed'
        ]);
        
        
        return redirect()->back()->with('success', 'Borrow request approved successfully.');
    }
}

