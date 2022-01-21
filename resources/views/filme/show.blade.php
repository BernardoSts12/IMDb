@extends ('layouts.main')

@section ('title', $Filme->name )

@section ('content')



<div class="show ">

    <div class="col-lg-12 col-md-6 title">

        <h1>{{ $Filme->name }}</h1>
        <h4 class="avaliacao">
            <div><i class="fa fa-star" aria-hidden="true" style="color:#FC0;"> </i>{{ $Filme->nota }}/10 </div>

            <form method="POST" action="/assessment/{{ $Filme->id}}" enctype="multipart/form-data">
			<div class="estrelas">
            @csrf
    

				<input type="radio" id="vazio" name="estrela" value="" {{$checked[0]}}>
				
				<label for="estrela_um"><i class="fa"></i></label>
				<input type="radio" id="estrela_um" name="estrela" value="1" {{$checked[1]}} {{$disabled}}>
				
				<label for="estrela_dois"><i class="fa"></i></label>
				<input type="radio" id="estrela_dois" name="estrela" value="2" {{$checked[2]}} {{$disabled}}>
				
				<label for="estrela_tres"><i class="fa"></i></label>
				<input type="radio" id="estrela_tres" name="estrela" value="3" {{$checked[3]}} {{$disabled}}>
				
				<label for="estrela_quatro"><i class="fa"></i></label>
				<input type="radio" id="estrela_quatro" name="estrela" value="4" {{$checked[4]}} {{$disabled}}>
				
				<label for="estrela_cinco"><i class="fa"></i></label>
				<input type="radio" id="estrela_cinco" name="estrela" value="5" {{$checked[5]}} {{$disabled}}>
				
                @if($disabled == null)
                <button class="btn" type="submit">Avaliar</button>
                @endif
			</div>
		</form>
        </h4>

        
    </div>

    <div class="col-xl-4 col-md-4">
        <img src="/img/filmes/{{ $Filme->image }}" alt="">
    </div>


    <div class="col-xl-8 col-md-12">
        <iframe src="{{ $Filme->link }}" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="col-lg-12">
        <h4>DESCRIÇÃO</h4>
        <p>{{ $Filme->desc}}</p>
    </div>
</div>


<div class="coment" id="coment">
    <div class="container mt-5 mb-5">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="p-3">
                        <h6>Comentários</h6>
                    </div>


                    <form class="mt-3 d-flex flex-row align-items-center p-3 form-color" action="/comment/{{ $Filme->id}}" method="POST">
                        @csrf
                        <input type="text"  class="form-control" placeholder="Enter your comment..." id="comentario" name="comentario" required>
                    </form>


                    <div class="mt-2">

                        @if($flag == true)

                        @foreach($commentTarget as $commentTarget)

                        <div class="d-flex flex-row p-3 comment">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center"> <span class="mr-2 username">{{$commentTarget->user_name}}</span>

                                        @auth
                                        @if($user->id == $commentTarget->user_id)
                                        <div class="dropdown option">
                                            <button class="" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                                                <i class="fa fa-ellipsis-v option" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <form action="/comment/{{$commentTarget->id}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  >
                                                        Deletar
                                                    </button>
                                                </form>
                                            </ul>
                                        </div>
                                        @endif
                                        @endauth
                                    </div>
                                </div>
                                <p class="text-justify comment-text mb-0">{{$commentTarget->comment}}</p>
                            </div>
                        </div>

                        @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection