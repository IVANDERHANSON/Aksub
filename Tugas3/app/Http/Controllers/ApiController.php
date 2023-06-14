<?php

namespace App\Http\Controllers;

use App\Http\Resources\BukuResource;
use App\Models\Buku;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {
        $bukus = Buku::all();
        return BukuResource::collection($bukus);
    }
}
