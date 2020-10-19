@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-5">お勧めのランチを紹介しよう！</h2>
    @if ($errors->any())
        <p id="restaurant-create-error" class="alert alert-danger">※ 入力項目を確認してください。</p>
    @endif

    {{ Form::open(['route' => 'restaurant.confirm', 'method' => 'post']) }}
        <div class="form-group">
            <label>店舗名</label><span class="required">※</span>
            @error('store_name')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('store_name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>店舗情報</label><span class="required">※</span>
            @error('store_infomation')<span class="required">{{ $message }}</span>@enderror
            {{ Form::textarea('store_infomation', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>都道府県</label><span class="required">※</span>
            @error('prefecture')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('prefecture', config('data.prefecture'), null, ['class' => 'custom-select', 'placeholder' => '選択してください']) }}
        </div>
        <div class="form-group">
            <label>区市町村</label><span class="required">※</span>
            @error('city')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('city', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>番地など</label><span class="required">※</span>
            @error('street_address')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('street_address', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>下限価格</label><span class="required">※</span>
            @error('low_budget')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('low_budget', config('data.low_budget'), null, ['class' => 'custom-select', 'placeholder' => '選択してください']) }}
        </div>
        <div class="form-group">
            <label>上限価格</label><span class="required">※</span>
            @error('high_budget')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('high_budget', config('data.high_budget'), null, ['class' => 'custom-select', 'placeholder' => '選択してください']) }}
        </div>
        <div class="form-group">
            <label>カテゴリ</label><span class="required">※</span>
            @error('category_id_1')<span class="required">{{ $message }}</span>@enderror
            @error('category_id_2')<span class="required">{{ $message }}</span>@enderror
            @error('category_id_3')<span class="required">{{ $message }}</span>@enderror
            @error('category_id_4')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('category_id_1', config('data.category'), null, ['class' => 'category-select custom-select mb-1', 'placeholder' => '選択してください']) }}
            {{ Form::select('category_id_2', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_3', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_4', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_5', config('data.category'), null, ['class' => 'category-select display-none custom-select mb-1', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            <label>緯度</label>
            @error('latitude')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => 'ex) 35.705623']) }}
        </div>
        <div class="form-group">
            <label>経度</label>
            @error('longitude')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => 'ex) 139.751919']) }}
            <span class="ml-2">※ 緯度と経度は、入力すると地図で探すに表示され、検索されやすくなります。
                Google mapなどで調べ、入力してください。
            </span>
        </div>
        <div class="text-center mt-5">
            {{ Form::button('確認', ['class' => 'btn btn-success py-2 px-5','type' => 'submit']) }}
        </div>
    {{ Form::close() }}

</div>

@endsection
