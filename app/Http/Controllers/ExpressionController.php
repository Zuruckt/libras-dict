<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\StoreExpression;
use App\Http\Requests\UpdateExpression;
use App\Models\Expression;
use App\Models\Tag;

class ExpressionController extends Controller
{   
    private $helper;

    public function __construct()
    {
        $this->helper = new FileHelper;
    }
    public function create()
    {
        return view('admin.expressions.create', [
            'tags' => Tag::all(),
        ]);
    }

    public function delete(Expression $expression){
        //TODO
    }
    public function edit(Expression $expression)
    {
        return view('admin.expressions.edit', [
            'expression' => $expression,
            'tags' => Tag::all(),
        ]);
    }

    public function index($table = false) {
        
        $data = [
            'expressions' => Expression::paginate(8),
            'tags' => Tag::all()
        ];

        if ($table) {
            dd('sim');
            return view ('admin.expressions.table', $data);
        }

        return view('admin.expressions.all', $data);
    }

    public function store(StoreExpression $request)
    {   
        $request->validate($request->rules());
        
        $data = array_merge(
            $request->except(['file']),
            [
                'user_id' => auth()->id(),
                'gif_path' => str_replace('public/', 'storage/', $this->helper->store($request->file, 'public/gifs'))
            ]
        );

        $expression = Expression::create($data);

        if (!$expression) {
            abort(500, 'Não foi possível salvar a expressão.');
        }

        if (!$expression->tags()->sync($data['tags'])) {
            abort(500, 'Não foi possível sincronizar as Tags.');
        }

        return redirect()->route('admin.expressions.index')->with('expression_created', 'Expressão registrada com sucesso');
    }

    public function show(Expression $expression)
    {
        return view('admin.expressions.single', [
            'expression' => $expression
        ]);
    }

    public function update(UpdateExpression $request) {
        dd($request);
    }
}
