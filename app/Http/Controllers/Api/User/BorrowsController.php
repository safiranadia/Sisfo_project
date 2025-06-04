<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrows;

class BorrowsController extends Controller
{
    
    public function countByUserId($userId)
    {
        $borrow = Borrows::where('user_id', $userId)->count();

        return response()->json(['data' => $borrow], 200);
    }
    
    public function showByUserId($userId)
    {
        $borrows = Borrows::with('item') // ini ambil relasi 'item'
            ->where('user_id', $userId)
            ->get();

        if ($borrows->isEmpty()) {
            return response()->json(['message' => 'No borrows found for this user'], 404);
        }

        return response()->json(['data' => $borrows], 200);
    }

    public function showByBorrowIdAndUserId($borrowId, $userId)
    {
        $borrow = Borrows::where('id', $borrowId)
            ->where('user_id', $userId)
            ->first();

        if (!$borrow) {
            return response()->json(['message' => 'Borrow not found for this user'], 404);
        }

        return response()->json(['data' => $borrow], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'borrow_date' => 'required|date',
            'purposes' => 'required|string',
        ]);

        $borrow = Borrows::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'borrow_date' => $request->borrow_date,
            'purposes' => $request->purposes,
        ]);

        return response()->json(['message' => 'Borrow created successfully', 'data' => $borrow], 201);
    }

    public function destroy($id)
    {
        $borrow = Borrows::findOrFail($id);

        if ($borrow->is_approved) {
            return response()->json(['message' => 'This borrow already approved and cannot be deleted'], 409);
        }

        $borrow->delete();

        return response()->json(['message' => 'Borrow deleted successfully'], 200);
    }
}

