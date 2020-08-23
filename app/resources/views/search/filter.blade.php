@extends('layouts.app')

@section('content')

<div class="container">
    <h2>ランチを探す</h2>
    @if ($errors->any())
        <p id="restaurant-create-error" class="alert alert-danger">※ 入力項目を確認してください。</p>
    @endif

    {{ Form::open(['route' => 'search.filter', 'method' => 'GET']) }}
        <div class="form-group">
            <label>都道府県</label>
            @error('prefecture')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('prefecture', config('data.prefecture'), null, ['class' => 'custom-select', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            <label>区市町村</label>
            @error('city')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('city', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>番地など</label>
            @error('street_address')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('street_address', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>価格</label>
            @error('low_budget')<span class="required">{{ $message }}</span>@enderror
            @error('high_budget')<span class="required">{{ $message }}</span>@enderror
            <div class="row form-group mx-2">
                {{ Form::select('low_budget', config('data.low_budget'), null, ['class' => 'p-2 col-3 custom-select', 'placeholder' => '']) }}
                <p class="mt-2 mx-2">〜</p>
                {{ Form::select('high_budget', config('data.high_budget'), null, ['class' => 'p-2 col-3 custom-select', 'placeholder' => '']) }}
            </div>
        </div>
        <div class="form-group">
            <label>カテゴリ</label>
            {{ Form::select('category_id_1', config('data.category'), null, ['class' => 'category-select custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_2', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_3', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_4', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_5', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
        </div>
        <div class="text-center mt-5">
            {!! Form::button('検索する', ['class' => 'btn btn-success py-2 px-5','type' => 'submit']) !!}
        </div>
    {{ Form::close() }}

</div>

@endsection
