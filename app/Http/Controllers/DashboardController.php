<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vagas_candidato_view;


class DashboardController extends Controller
{
  public function index()
  {
    return view('adm.dashboard');
  }
}
