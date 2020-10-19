@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Expressão</h6>
            </div>

            @php
                foreach($expression->tags as $tag) {
                    $selected[] = $tag->id;
                }
            @endphp

            <div class="card-body m-0 p-0 d-flex flex-wrap">
                <div class="col-md-1"></div>
                <div class="col-md-7 p-1 m-1">
                    <form action="/admin/expressions/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <input name="text" type="text" class="form-control" value="{{$expression->text}}">

                            @error('tags')
                            <p class="help is-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags[]">Etiquetas <i data-toggle="tooltip" data-placement="top"
                                    title="Segure a tecla CTRL e clique nas que quiser inserir!"
                                    class="far fa-question-circle"></i></label>
                            <select name="tags[]" class="form-control w-25" multiple>
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if (in_array($tag->id, $selected)) {{'selected'}} @endif>{{$tag->text}}</option>
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

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
                <div class="col-md-3 p-1 m-1 mt-4">
                    <x-expression-card :expression="$expression" :single="true" />
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row justify-content-center">

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Criar Expressão </h6>
            </div>
            <div class="card-body">
            <div class="col-md-12">
                <div class="col-md-6">
                    <form action="store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <input name="text" type="text" class="form-control">

                            @error('tags')
                            <p class="help is-danger">{{$message}}</p>
@enderror
</div>

<div class="form-group">
    <label for="tags[]">Etiquetas <i data-toggle="tooltip" data-placement="top"
            title="Segure a tecla CTRL e clique nas que quiser inserir!" class="far fa-question-circle"></i></label>
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
<div class="col-md-6">
    <x-expression-card :expression="$expression" :single="true" />
</div>

</div>
</div>
</div>
</div> --}}
@endsection
