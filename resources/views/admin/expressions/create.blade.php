@extends('layouts.app')

@section('content')
<div class="row justify-content-center">

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Criar Expressão </h6>
            </div>
            <div class="card-body">
                <form action="store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="text">Texto</label>
                        <input name="text" type="text" class="form-control">

                        @error('text')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tags[]">Etiquetas <i data-toggle="tooltip" data-placement="top"
                                title="Segure a tecla CTRL e clique nas que quiser inserir!"
                                class="far fa-question-circle"></i></label>
                        <select name="tags[]" class="form-control w-25" multiple>
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->text}}</option>
                            @endforeach
                        </select>

                        @error('tags')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Arquivo</label>
                        <input name="file" type="file" class="form-control-file" accept="image/gif">
                    </div>
                    
                    @error('file')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror

                    <button type="submit" class="btn btn-info">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
