@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="form__create">
        <h2>新規作成</h2>
        <form action="/todos" method="post">
            @csrf
            <input class="form__create-todo" type="text" name="create-todo">
            <input class="form__create-category" type="text" name="create-category" placeholder="カテゴリ">
            <button class="form__create-button" type="submit">作成</button>
        </form>
    </div>
    <div class="form__category">
        <h2>Todo検索</h2>
        <form action="/categories" method="post">
            @csrf
            <input class="form__search-todo" type="text" name="search-todo">
            <input class="form__search-category" type="search" name="search-category" placeholder="カテゴリ">
            <button class="form__search-button" type="submit">検索</button>
        </form>
    </div>
    <table class="table">
        <tr>
            <th class="table__title-todo">Todo</th>
            <th class="table__title-category">カテゴリ</th>
        </tr>
        @foreach($todos as $todo)
        <tr class="table__row">
            <td>
                <form action="/todos/{{ $todo -> id }}" method="post">
                    @csrf
                    @method('patch')
                    <input class="list__todo" type="text" name="list__todo" value="{{ $todo -> content }}">
                </form>
            </td>
            <td>
                {{$todo->category->name }}
            </td>
            <td>
                <form action="/todos/{{ $todo -> id }}" method="post">
                    @csrf
                    @method('patch')
                    <button class="table__row-update" type="submit">更新</button>
                </form>
            </td>
            <td>
                <form action="/todos/{{ $todo -> id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="table__row-delete" type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection