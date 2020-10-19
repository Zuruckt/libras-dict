<div class="card shadow mb-4 rounded @if (!$single) {{'mx-2'}} @endif " style="max-width: 240px">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{$expression->text}}</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Ações:</div>
                <a href="{{route('admin.expressions.edit', $expression->id)}}" class="dropdown-item"><i class="fas fa-pen"></i> Editar</a>
                <a href="placeholder" class="dropdown-item"><i class="fas fa-times"></i> Deletar</a>
            </div>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body p-0">
        <span>
            <img src="{{asset($expression->gif_path)}}" style="height: 180px; max-width: 240px" class="w-100" alt="{{$expression->text}}">
        </span>
        <p class="mt-1 mb-1 px-1 d-flex flex-wrap justify-content-center">
            @forelse($expression->tags as $tag)
            <a href="/expression?tag={{$tag->text}}" class="badge badge-primary mr-1 mb-1">{{$tag->text}}</a>
            @empty
            Sem etiquetas
            @endforelse
        </p>
    </div>
</div>
