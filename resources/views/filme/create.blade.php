@extends ('layouts.main')

@section ('title', 'Adicionar Filme')

@section ('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Adicionar Filme</h1>
  <form action="/filme" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem do Filme:</label>
      <input type="file" id="image" name="image" class="from-control-file" required>
    </div>

    <div class="form-group">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Filme" required>
    </div>

    <div class="form-group">
      <label for="desc">Descrição:</label>
      <textarea name="desc" id="desc" class="form-control" placeholder="Descrição do Filme?" required></textarea>
    </div>

    <div class="form-group">
      <label for="link">Adicionar Link do Vídeo (Youtube):</label>
      <input type="text" class="form-control" id="link" name="link" placeholder="Adicione um link" required>
    </div>

    <div class="form-group">
      <label for="nota">Nota do Filme:</label>
      <input type="number" id="nota" name="nota" min="0" max="10"  step="any">
    </div>


    <input type="submit" class="btn btn-primary" value="Adicionar Filme">
  </form>

</div>

@endsection