<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Laravel\Scout\Searchable;

class AssetController extends Controller
{
    use Searchable;

    // Get/Show all assets
    public function index(): View
    {
        $cryptoListings = getenv('COIN_MARKET_CAP_DEFAULT_LISTINGS');
        $assets = Cache::remember($cryptoListings, 300, function () use ($cryptoListings) {
            $response = Http::withHeaders([
                'X-CMC_PRO_API_KEY' => getenv('COIN_MARKET_CAP_API_KEY')
            ])
                ->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/' . $cryptoListings, [
                    'limit' => '50'
                ]);
            return json_decode($response->body(), true)['data'];
        });

        return view('assets.index', [
            'assets' => $assets,
        ]);
    }

    // Show single asset
    public function show(Asset $asset): View
    {
        return view('assets.show', [
            'asset' => $asset
        ]);
    }

    // Show create form
    public function create(): View
    {
        return view('assets.create');
    }

    // Store asset data
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $asset = $request->validate([
            'symbol' => ['required', Rule::unique('assets', 'symbol')],
            'name' => ['required', Rule::unique('assets', 'name')],
            'price' => 'required',
            'percent_change_1h' => 'required',
            'percent_change_30d' => 'required',
            'volume_24h' => 'required',
            'market_cap' => 'required',
        ]);

        $asset['user_id'] = auth()->id();

        Asset::create($asset);

        return redirect('/')->with('message', 'Asset Added Successfully!');
    }

    // Show edit form
    public function edit(Asset $asset): View
    {
        return view('assets.edit', ['asset' => $asset]);
    }

    // Update asset data
    public function update(Request $request, Asset $asset): Redirector|Application|RedirectResponse
    {
        if ($asset->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'symbol' => 'required',
            'name' => 'required',
            'price' => 'required',
            'percent_change_1h' => 'required',
            'percent_change_30d' => 'required',
            'volume_24h' => 'required',
            'market_cap' => 'required'
        ]);
        $asset->update($formFields);

        return redirect('/search')->with('message', 'Asset Updated Successfully!');
    }

    // Delete asset data
    public function destroy(Asset $asset): Redirector|Application|RedirectResponse
    {
        if ($asset->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $asset->delete();
        return redirect('/assets/manage')->with('message', 'Asset Deleted Successfully!');
    }

    // Manage assets
    public function manage(): View
    {
        return view('assets.manage', [
            'assets' => auth()->user()->assets()->get()]);
    }
}
