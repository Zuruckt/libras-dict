<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpression;
use App\Http\Requests\UpdateExpression;
use App\Models\Expression;
use App\Models\Tag;
use Illuminate\Http\Request;

class ExpressionController extends Controller
{
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
        return view('expressions.all'. [
            'expressions' => Expression::all()
        ]);
    }

    public function store(StoreExpression $request)
    {   
        //TODO
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
