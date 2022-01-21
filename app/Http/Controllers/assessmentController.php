<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assessment;

class assessmentController extends Controller
{
    public function store(Request $request, $id)
    {

        $userLog = auth()->check();

        if ($userLog == true) {

            $avaliacao = new assessment;


            $avaliacao->estrelas = $request->estrela;

            $user = auth()->user();
            $avaliacao->user_id = $user->id;
            $avaliacao->filme_id = $id;
            $avaliacao->save();

            return back();
        } else {
            return redirect('login');
        }
    }
}
