<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all');
        $query = Quote::with(['user', 'likes']);

        if ($filter === 'mine' && Auth::check()) {
            $query->where('user_id', Auth::id());
        } elseif ($filter === 'liked' && Auth::check()) {
            $query->whereHas('likes', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }

        $quotes = $query->latest()->get();

        return view('welcome', compact('quotes', 'filter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuoteRequest $request)
    {
        Auth::user()->quotes()->create($request->validated());
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuoteRequest $request, Quote $quote)
    {
        abort_if($quote->user_id != Auth::id(), 403);

        $quote->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        abort_if($quote->user_id != Auth::id(), 403);
        $quote->delete();
        return redirect()->back();
    }

    /**
     * Toggle like for the specified quote.
     */
    public function toggleLike(Quote $quote)
    {
        $user = Auth::user();

        if ($quote->likes()->where('user_id', $user->id)->exists()) {
            $quote->likes()->where('user_id', $user->id)->delete();
        } else {
            $quote->likes()->create(['user_id' => $user->id]);
        }

        return redirect()->back();
    }
}