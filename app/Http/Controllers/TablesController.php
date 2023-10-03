<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tables;

class TablesController extends Controller
{
    public function index()
    {
        $kart = Tables::all();

        return view("Tables.index", ['tables' => $kart]);
    }
}
