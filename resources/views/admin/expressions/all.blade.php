@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Expressões</h2>
                    <div class="">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" name="search" aria-label="Pesquisa">
                            <button class="btn btn-info my-2 my-sm-0" type="submit"><i
                                    class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- TODO: add notification plugin -->
                <div class="card-body">
                    @if (session('expression_created'))
                    <h2>{{session('expression_created')}}</h2>
                    @endif
                </div>


                <div class="card-body">
                    Teste
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
