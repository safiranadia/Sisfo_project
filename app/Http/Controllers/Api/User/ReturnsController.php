<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrows;
use App\Models\Returns;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ReturnsController extends Controller
{
    
    public function countByUserId($userId)
    {
        $returns = Returns::where('user_id', $userId)->count();

        return response()->json(['data' => $returns], 200);
    }

    
    public function showByUserId($userId)
    {
        $returns = Returns::where('user_id', $userId)->get();

        if ($returns->isEmpty()) {
            return response()->json(['message' => 'No returns found for this user'], 404);
        }

        return response()->json(['data' => $returns], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'borrow_id' => 'required|exists:borrows,id',
            'return_date' => 'nullable|date',
            'condition' => 'required|in:good,bad,lost',
            'note' => 'nullable|string|max:500',
            'status' => 'required|in:finish,finish(bad),finish(lost)'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $borrow = Borrows::findOrFail($request->borrow_id);

            if ($borrow->return) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'This borrow already has a return record'
                ], 409);
            }

            $return = Returns::create([
                'user_id' => $borrow->user_id,
                'borrow_id' => $request->borrow_id,
                'return_date' => $request->return_date ?? now(),
                'condition' => $request->condition,
                'note' => $request->note,
                'status' => $request->condition === 'lost' ? 'finish(lost)' : 'finish'
            ]);

            $borrow->update(['status' => 'returned']);

            if ($request->condition !== 'lost') {
                $borrow->item->increment('stock', $borrow->quantity);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Return record created successfully',
                'data' => $return
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create return record',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

