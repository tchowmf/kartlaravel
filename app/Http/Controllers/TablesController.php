<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kart;
use App\Models\Tables;
use App\Models\Voltas;
use Illuminate\View\View;

class TablesController extends Controller
{
    public function index(): View
    {
        return view("Tables.index");
    }

    public function getTables($racetrack): View
    {
        return view("Tables.getTables", compact(['']));
    }
}
