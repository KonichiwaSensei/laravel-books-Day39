<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('books')->get();

        return view('books.show', $reviews);
    }


    public function store(Request $request)
    {
        $user = Auth::user();
       // dd($user, $request->input());
        

        $review = new Review();
        $review->user_id = $user->id;
        $review->book_id = $request->post('book_id');
        $review->review_text = $request->post('review_text');
        $review->save();

        session()->flash('success_message', 'Review sucessfully made.');

        return redirect()->route('books.show', $review->book_id);

        // return redirect()->back();
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.review', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $review = Review::findOrFail($id);
        $review->user_id = $user->id;
        // $review->book_id = $request->post('book_id');
        $review->review_text = $request->post('review_text');
        $review->save();

        session()->flash('success_message', 'Review updated.');

        return redirect()->route('books.show', $review->book_id);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        session()->flash('success_message', 'Review deleted.');

        return redirect()->route('books.show', $review->book_id);
    }
}
