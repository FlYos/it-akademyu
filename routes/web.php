<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function() {
    $q = request('q');

    $data = Http::get("https://api-adresse.data.gouv.fr/search/?q=".http_build_query(compact('q')))->json();

    return view('welcome', [
        'data' => $data
    ]);
});

Route::get('/graphql', function() {
    $query = <<<GQL
query {
    characters(filter:{name:"rick"}) {
      info {
        count,pages
      },
      results {
        name,gender
      }
    }
  }
GQL;

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('https://rickandmortyapi.com/graphql', [
        'query' => $query
    ]);

    return $response->json();
});
