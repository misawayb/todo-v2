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
            <input class="form__create-todo" type="text" name="content">
            <select class="form__create-category" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category -> id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="form__create-button" type="submit">作成</button>
        </form>
    </div>
    <div class="form__category">
        <h2>Todo検索</h2>
        <form action="/todos/search" method="get">
            @csrf
            <input class="form__search-todo" type="text" name="content">
            <select class="form__search-category" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category -> id }}">{{ $category->name }}</option>
                @endforeach
            </select>
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
            <form id="update-{{ $todo->id }}" action="/todos/{{ $todo -> id }}" method="post">
                @csrf
                @method('patch')
            </form>
            <td>
                <input class="list__todo" form="update-{{ $todo->id }}" type="text" name="content" value="{{ $todo -> content }}">
            </td>
            <td>
                {{$todo->category->name }}
            </td>
            <td>
                <button class="table__row-update" form="update-{{ $todo->id }}" type="submit">更新</button>
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