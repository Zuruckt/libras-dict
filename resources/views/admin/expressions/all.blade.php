@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <!-- TODO: add notification plugin -->
    @if (session('expression_created'))
    <h2>{{session('expression_created')}}</h2>
    @endif
    @forelse($expressions as $expression)
    <x-expression-card :expression="$expression" />
    @empty
    <p class="text-center">Nenhuma expressão cadastrada</p>
    @endforelse
</div>
<div class="row justify-content-start">
{{$expressions->links()}}
</div>
@endsection
