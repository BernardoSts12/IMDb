@extends ('layouts.main')

@section ('title', 'Pagina Incial')

@section ('content')



<div class="container">
    <div class="row">
        
        @foreach($filmes as $filmes)
        <div class="col-md-3">
            <a href="/filme/{{$filmes->id}}">
            <div class="profile-card-6"><img src="/img/filmes/{{$filmes->image}}" class="img img-responsive">
                <div class="profile-name">{{$filmes->name}}
                </div>
                <div class="profile-overview">
                    <div class="profile-overview">
                        <div class="row text-center">
                            
                            <div class="col-xs-4">
                                <h3>{{ $filmes->nota }}/10</h3>
                                <h5>NOTA</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endforeach
        
        
        
    </div>
</div>
@endsection