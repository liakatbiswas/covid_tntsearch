<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function index()
    {
        return Inertia::render('Search/Index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // $results = User::search($query)->options([
        //     'query_by' => 'title, description',
        // ])->get();

        $results = User::search($query)->get();

        return Inertia::render('Search/Index', [
            'results' => $results,
            'query' => $query,
        ]);

    }
}
