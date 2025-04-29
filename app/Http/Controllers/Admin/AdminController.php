<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Items;
use App\Models\Borrows;
use App\Models\Returns;

class AdminController extends Controller
{
    public function index()
    {
        $items = Items::simplePaginate(5);
        $returns = Returns::simplePaginate(5);
        $totalUser = User::count();
        $totalItem = Items::count();
        $totalBorrow = Borrows::count();
        $totalReturn = Returns::count();

        return view('dashboard', compact('items', 'returns', 'totalUser', 'totalItem', 'totalBorrow', 'totalReturn'));
    }
}

