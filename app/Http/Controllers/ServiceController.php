<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // Show form
    public function create()
    {
        return view('services.create');
    }

    // Store service
    public function store(Request $request)
    {
        Service::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return "Service Added Successfully";
    }

    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }
}