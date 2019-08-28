<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddMessage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Board;

class BoardController extends Controller
{
    public function index()
    {
        return view('board');
    }

    public function store(AddMessage $request)
    {
        $user=Auth::user();
        $data=$request->validated();
        $data['author'] = $user->name;
        $data['user_id'] = $user->id;
        Board::create($data);
        return view('board');
    }

    public function show()
    {
        $messages = Board::all();
        return view('index', compact('messages'));
    }

    public function edit(Board $message)
    {
        $messages=Board::findOrfail($message);
        return view('index', compact('messages'));
    }
}
