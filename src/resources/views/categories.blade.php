@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection



@section('content')
<div class="content">
    <div class="form__create">
        <form action="/categories" method="post">
            @csrf
            <input class="form__create-input" type="text" name="name">
            <button class="form__create-button" type="submit">作成</button>
        </form>
    </div>
    <table class="table">
        <tr>
            <th class="table__title">category</th>
        </tr>
        @foreach($categories as $category)
        <tr class="table__row">
            <td>
                <form action="/categories/{{ $category -> id }}" method="post">
                    @csrf
                    @method('patch')
                    <input class="table__row-content" type="text" name="name" value="{{ $category -> name }}">
                    <button class="table__row-update" type="submit">更新</button>
                </form>
            </td>
            <td>
                <form action="/categories/{{ $category -> id }}" method="post">
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