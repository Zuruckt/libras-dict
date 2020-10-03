<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\StoreExpression;
use App\Http\Requests\UpdateExpression;
use App\Models\Expression;
use App\Models\Tag;
use Illuminate\Http\Request;

class ExpressionController extends Controller
{   
    private $helper;

    public function __construct()
    {
        $this->helper = new FileHelper;
    }
    public function create()
    {
        return view('expressions.create', [
            'tags' => Tag::all(),
        ]);
    }

    public function delete(Expression $expression){
        //TODO
    }
    public function edit(Expression $expression)
    {
        return view('expressions.create', [
            'expression' => $expression,
            'tags' => Tag::all(),
        ]);
    }

    public function index() {
        return view('expressions.all', [
            'expressions' => Expression::all(),
            'tags' => Tag::all()
        ]);
    }

    public function store(StoreExpression $request)
    {   
        $request->validate($request->rules());
        
        $data = array_merge(
            $request->except('tags'),
            [
                'user_id' => auth()->id(),
                'gif_path' => $this->helper->store($request->file, 'public')
            ]
        );

        $expression = Expression::create($data);

        if (!$expression) {
            abort(500, 'Não foi possível salvar a expressão.');
        }

        if (!$expression->tags()->sync($request->tags)) {
            abort(500, 'Não foi possível sincronizar as Tags.');
        }

        return redirect('/expression')->with('expression_created', 'Expressão registrada com sucesso');
    }

    public function show(Expression $expression)
    {
        return view('expression.single', [
            'expression' => $expression
        ]);
    }

    public function update(UpdateExpression $request) {
        //todo
    }
}
