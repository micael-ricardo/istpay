<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\candidato_vaga;


class DashboardController extends Controller
{
  public function index()
  {

    $vagas = Vaga::where('pausada', false)->get();
    return view('adm/dashboard', ['vagas' => $vagas]);
  }

      // Delete
      public function destroy(string $id)
      {
          $vaga = candidato_vaga::findOrFail($id);
          $vaga->delete();
          return response()->json(['success' => true]);
      }

}
