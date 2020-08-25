@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-10">編集する</h2>
    @if ($errors->any())
        <p id="restaurant-create-error" class="alert alert-danger">※ 入力項目を確認してください。</p>
    @endif

    {{ Form::open(['route' => ['restaurant.update', $restaurant['id']], 'method' => 'put']) }}
        <div class="form-group">
            <label>店舗名</label><span class="required">※</span>
            @error('store_name')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('store_name', $restaurant['store_name'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>店舗情報</label><span class="required">※</span>
            @error('store_infomation')<span class="required">{{ $message }}</span>@enderror
            {{ Form::textarea('store_infomation', $restaurant['store_infomation'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>都道府県</label><span class="required">※</span>
            @error('prefecture')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('prefecture', config('data.prefecture'), $restaurant['prefecture_id'], ['class' => 'custom-select']) }}
        </div>
        <div class="form-group">
            <label>区市町村</label><span class="required">※</span>
            @error('city')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('city', $restaurant['city'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>番地など</label><span class="required">※</span>
            @error('street_address')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('street_address', $restaurant['street_address'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>下限価格</label><span class="required">※</span>
            @error('low_budget')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('low_budget', config('data.low_budget'), $restaurant['low_budget'], ['class' => 'custom-select', 'placeholder' => '選択してください']) }}
        </div>
        <div class="form-group">
            <label>上限価格</label><span class="required">※</span>
            @error('high_budget')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('high_budget', config('data.high_budget'), $restaurant['high_budget'], ['class' => 'custom-select', 'placeholder' => '選択してください']) }}
        </div>

        <div class="form-group">
            <label>カテゴリ</label><span class="required">※</span>
            @error('category_id_1')<span class="required">{{ $message }}</span>@enderror
            @error('category_id_2')<span class="required">{{ $message }}</span>@enderror
            @error('category_id_3')<span class="required">{{ $message }}</span>@enderror
            @error('category_id_4')<span class="required">{{ $message }}</span>@enderror
            {{ Form::select('category_id_1', config('data.category'), $restaurant['category_id_1'], ['class' => 'category-select custom-select mb-1']) }}
            {{ Form::select('category_id_2', config('data.category'), $restaurant['category_id_2'] ?? null, ['class' => 'category-select custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_3', config('data.category'), $restaurant['category_id_3'] ?? 0, ['class' => 'category-select custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_4', config('data.category'), $restaurant['category_id_4'] ?? 0, ['class' => 'category-select custom-select mb-1', 'placeholder' => '']) }}
            {{ Form::select('category_id_5', config('data.category'), $restaurant['category_id_5'] ?? 0, ['class' => 'category-select custom-select mb-1', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            <label>緯度</label>
            @error('latitude')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('latitude', $restaurant['latitude'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>経度</label>
            @error('longitude')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('longitude', $restaurant['longitude'], ['class' => 'form-control']) }}
            <span class="ml-2">※ 緯度と経度は、入力すると地図で探すに表示され、検索されやすくなります。
                Google mapなどで調べ、入力してください。
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                {!! Form::submit('戻る', ['name' => 'submit', 'class' => 'btn btn-secondary float-right']) !!}
                {!! Form::submit('投稿する', ['name' => 'submit', 'class' => 'btn btn-success float-right mr-3']) !!}
            </div>
        </div>
    {{ Form::close() }}

</div>

@endsection
