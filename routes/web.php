<?php
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('App');
});

Route::get('/github-users', function () {
    $githubToken = env('VITE_GITHUB_TOKEN'); 

    $response = Http::withHeaders([
        'Accept' => 'application/vnd.github+json',
        'Authorization' => '$githubToken',
        'X-GitHub-Api-Version' => '2022-11-28',
    ])->get('https://api.github.com/users?per_page=10');

    return $response->json();
});