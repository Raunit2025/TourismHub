<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('reviews')->paginate(12);
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'destination' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'max_participants' => 'required|integer|min:1',
            'start_time' => 'required|date_format:H:i',
            'itinerary' => 'required|array',
            'inclusions' => 'required|array',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $package = Package::create($validated);

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('packages', 'public');
                $images[] = $path;
            }
            $package->update(['images' => $images]);
        }

        return redirect()->route('packages.show', $package)
            ->with('success', 'Package created successfully!');
    }

    public function show(Package $package)
    {
        $package->load('reviews');
        return view('packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'destination' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'max_participants' => 'required|integer|min:1',
            'start_time' => 'required|date_format:H:i',
            'itinerary' => 'required|array',
            'inclusions' => 'required|array',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $package->update($validated);

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('packages', 'public');
                $images[] = $path;
            }
            $package->update(['images' => $images]);
        }

        return redirect()->route('packages.show', $package)
            ->with('success', 'Package updated successfully!');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')
            ->with('success', 'Package deleted successfully!');
    }
} 