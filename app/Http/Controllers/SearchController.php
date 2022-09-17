<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class SearchController extends Controller
{
    use Searchable;

    public function query(Request $request)
    {
        if ($request->has('query')) {
            $assets = Asset::search($request->get('query'))->orderBy('updated_at', 'desc')->paginate(4);
        } else {
            $assets = Asset::orderBy('updated_at', 'desc')->paginate(4);
        }
        return view('search.index', compact('assets'));
    }
}
