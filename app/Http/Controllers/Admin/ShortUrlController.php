<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = ShortUrl::get(['id', 'destination_url', 'default_short_url']);
        return view('dashboard', compact('data'));
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
    public function show(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortUrl $shortUrl)
    {

        $isDeleted = $shortUrl->delete();

        if (!$isDeleted) {
            return back()->with(
                [
                    'status' => "Sorry, Something Went Wrong",
                    'class' => 'danger'
                ]
            );
        }

        return back()->with([
            'status' => "Data Deleted Successfully.",
            'class' => 'success'
        ]);
    }
}
