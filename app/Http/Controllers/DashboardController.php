<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vagas_candidato_view;


class DashboardController extends Controller
{
  public function index(){

//     $query = vagas_candidato_view::all();
// dd( $query );

    return view('adm.dashboard');
  }
}
