@extends ('layouts.main')

@section ('title', 'Editando o Filme: '. $filme->name)

@section ('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando o Filme: {{ $filme->name}}</h1>
  <form action="/filme/update/{{ $filme->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem do Filme:</label>
      <input type="file" id="image" name="image" class="from-control-file">
      <img src="/img/filmes/{{$filme->image}}" alt="{{ $filme->name}}" style="max-height: 50px;">
    </div>

    <div class="form-group">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Filme" value="{{$filme->name}}">
    </div>


    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="desc" id="desc" class="form-control" placeholder="Sinópse"> {{ $filme->desc}}</textarea>
    </div>

    <div class="form-group">
      <label for="link">Adicionar Link do Vídeo (Youtube):</label>
      <input type="text" class="form-control" id="link" name="link" placeholder="Adicione um link" value="{{$filme->link}}" required>
    </div>

    <div class="form-group">
      <label for="nota">Nota do Filme:</label>
      <input type="number" id="nota" name="nota" min="0" max="10" step="any">
    </div>

    <input type="submit" class="btn btn-primary" value="Editar Filme">
  </form>

</div>

@endsection