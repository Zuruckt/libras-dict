@forelse($expressions as $expression)
<div class="card mb-3">
    <div class="card-header">
        {{$expression->text}}
    </div>

    <div class="card-body">
        <img src="https://via.placeholder.com/280x180/" alt="{{$expression->text}}">
        @forelse($expression->tags as $tag)
        <ul class="list-unstyled d-inline-flex">
            <li><a href="/expression?tag={{$tag->text}}" class="badge badge-info">{{$tag->text}}</a></li>
        </ul>
        @empty
        <p class="text-center">Sem etiquetas</p>
        @endforelse

        <ul class="list-unstyled d-inline-flex">
            <li><a href="/expression/{{$expression->id}}/edit" class="btn btn-success"><i class="fas fa-pen"></i></a>
            </li>
            <li><a href="placeholder" class="btn btn-danger"><i class="fas fa-times"></i></a></li>
        </ul>
    </div>
</div>
</div>
@empty
<p class="text-center">Nenhuma expressão cadastrada</p>
@endforelse