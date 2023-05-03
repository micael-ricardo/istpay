<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;


class DashboardController extends Controller
{
  public function index()
  {

    $vagas = Vaga::where('pausada', false)->get();
    return view('adm/dashboard', ['vagas' => $vagas]);
  }
}
