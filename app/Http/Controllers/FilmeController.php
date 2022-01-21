<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Filme;
use App\Models\Comment;
use App\Models\assessment;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {

            $filmes = Filme::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $filmes = Filme::all();
        }


        return view('welcome', ['filmes' => $filmes, 'search' => $search]);
    }

    public function store(Request $request)
    {

        $Filme = new Filme;

        $Filme->name = $request->name;
        $Filme->desc = $request->desc;
        $Filme->link = $request->link;
        $Filme->nota = $request->nota;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/filmes'), $imageName);
            $Filme->image = $imageName;
        }

        $Filme->save();

        return redirect('/dashboard')->with('msg', 'Evento Criado com Sucesso!');
    }

    public function dashboard()
    {

        $filmes = Filme::all();

        return view('filme.dashboard', ['filmes' => $filmes]);
    }

    public function edit($id)
    {

        $filme = Filme::findOrFail($id);

        return view('filme.edit', ['filme' => $filme]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();


        if ($request->hasFile('image') && $request->file('image')->isValid()) {


            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/filmes'), $imageName);
            $data['image'] = $imageName;
        }

        $filme = Filme::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Filme editado com sucesso');
    }

    public function destroy($id)
    {

        Filme::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Filme excluido com sucesso');
    }

    public function show($id)
    {


        $Filme =  Filme::findOrFail($id);


        /** Comentários**/
        $Commets = Comment::all();

        $i=0;
        $commentTarget[] =null;
        $flag= false;
        foreach($Commets as $Commets){
            
            if($Commets->filme_id == $id){
                $commentTarget[$i]= $Commets;
                $i++;
                $flag= true;
            }

        }

        $user = auth()->user();

        /** Avaliação do usuário**/
        $assessment = assessment::all();
        $idUser= auth()->id();

        $estrelas=0;

        $disabled=null;
        foreach($assessment as $assessment){
            
            if($assessment->filme_id == $id and $assessment->user_id == $idUser ){
                $estrelas = $assessment->estrelas;
                $disabled= "disabled";
            }
        }

        $checked[0]= null;
        $checked[1]=null;
        $checked[2]=null;
        $checked[3]=null;
        $checked[4]=null;
        $checked[5]=null;

        $i=1;
        while ($i <= 5){
            if($estrelas == $i){
                $checked[$i]="checked";
            }else{
                $checked[0]= "checked";
            }
            $i++;
        }



        return view('filme.show',['Filme' => $Filme, 'commentTarget' => $commentTarget, 'flag'=> $flag,'user'=>$user, 'checked'=> $checked, 'disabled'=>$disabled]);
    }

  
}
