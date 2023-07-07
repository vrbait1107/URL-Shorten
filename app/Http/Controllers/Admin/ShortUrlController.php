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
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $shortUrl): View
    {
        $data = ShortUrl::find($shortUrl->id, ['id', 'destination_url', 'default_short_url']);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortUrl $shortUrl)
    {
        $request->validate([
            'destination_url' => ['url', 'required'],
            'default_short_url' => ['url', 'required']
        ]);

        $isUpdated = ShortUrl::where("id", $shortUrl->id)->update([
            'destination_url' => $request->destination_url,
            'default_short_url' => $request->default_short_url
        ]);

        if (!$isUpdated) {
            return back()->with(
                [
                    'status' => "Sorry, Something Went Wrong",
                    'class' => 'danger'
                ]
            );
        }

        return to_route('dashboard')->with([
            'status' => "Data Updated Successfully.",
            'class' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function disable(Request $request, ShortUrl $shortUrl)
    {
        $isDisbaled = ShortUrl::where("id", $shortUrl->id)->update([
            'deactivated_at' => now(),
        ]);

        if (!$isDisbaled) {
            return back()->with(
                [
                    'status' => "Sorry, Something Went Wrong",
                    'class' => 'danger'
                ]
            );
        }

        return to_route('dashboard')->with([
            'status' => "Data Disabled Successfully.",
            'class' => 'success'
        ]);
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
