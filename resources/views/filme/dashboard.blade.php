@extends ('layouts.main')

@section ('title', 'Dashboard')

@section ('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Lista de Filmes</h1>
    <a href="/filme/create" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Adicionar Filme</a> 
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($filmes) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Capa</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filmes as $filmes)
            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td>{{$filmes->name}}</td>
                <td><img src="/img/filmes/{{$filmes->image}}" style="max-height: 50px;" alt=""></td>
                <td>
                        <a href="/filme/edit/{{ $filmes->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                            <form action="/filme/{{ $filmes->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <h3>Lista vazia</h3>
    @endif
</div>


@endsection