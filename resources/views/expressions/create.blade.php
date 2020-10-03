@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Criar Expressão</div>

                <div class="card-body">
                    <form action="/expression/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <input name="text" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="tags[]">Etiquetas <i data-toggle="tooltip" data-placement="top" title="Segure a tecla CTRL e clique nas que quiser inserir!" class="far fa-question-circle"></i></label>
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
                        
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
