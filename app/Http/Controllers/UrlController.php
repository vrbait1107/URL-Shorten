<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Classes\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class UrlController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'url' => ['required', 'url'],
        ]);

        try {

            $builder = new Builder();
            $requestURL = $request->url;

            $convertToShortURL = $builder->destinationUrl($requestURL)
            ->deactivateAt(now()
            ->addDay())
            ->make();

            $convertedURL = $convertToShortURL->default_short_url;

            return back()->with([
                'status' => "URL Shortened Successfully. {$convertedURL}",
                'class' => 'success'
            ]);
            
        } catch (\Exception $ex) {
            return back()->with([
                'status' => "Something Went Wrong",
                'class' => 'danger'
            ]);
        }
    }
}
