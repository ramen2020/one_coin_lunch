@extends('layouts.app')

@section('content')

<div class="container">
    <h2>申請完了</h2>
    <p>以下で申請いたしました。</p>
    <p>管理者が審査いたしますので、少々お待ちください。</p>
        <div class="form-group">
            <label>店舗名</label>
            <div class="form-control mb-1" readonly>{{ $input['store_name'] }}</div>
        </div>
        <div class="form-group">
            <label>店舗情報</label>
            <div class="form-control mb-1" readonly>{{ $input['store_infomation'] }}</div>
        </div>
        <div class="form-group">
            <label>都道府県</label><br>
            <div class="form-control">{{ config('data.prefecture')[$input['prefecture']] }}</div>
        </div>
        <div class="form-group">
            <label>区市町村</label>
            <div class="form-control mb-1" readonly>{{ $input['city'] }}</div>
        </div>
        <div class="form-group">
            <label>番地など</label>
            <div class="form-control mb-1" readonly>{{ $input['street_address'] }}</div>
        </div>
        <div class="form-group">
            <label>下限価格</label>
            <div class="form-control mb-1" readonly>{{ $input['low_budget'] }}</div>
        </div>
        <div class="form-group">
            <label>上限価格</label>
            <div class="form-control mb-1" readonly>{{ $input['high_budget'] }}</div>
        </div>

        <div class="form-group">
            <label>カテゴリ</label>
            @if(!empty(input['category_id_1']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[input['category_id_1']] }}</div>
            @endif
            @if(!empty(input['category_id_2']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[input['category_id_2']] }}</div>
            @endif
            @if(!empty(input['category_id_3']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[input['category_id_3']] }}</div>
            @endif
            @if(!empty(input['category_id_4']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[input['category_id_4']] }}</div>
            @endif
            @if(!empty(input['category_id_5']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[input['category_id_5']] }}</div>
            @endif
        </div>
        @if(!empty(input['latitude']))
            <div class="form-group">
                <label>緯度</label>
                {{ Form::text('latitude', null, ['class' => 'form-control', 'readonly']) }}
            </div>
        @endif
        @if(!empty(input['longitude']))
            <div class="form-group">
                <label>経度</label>
                {{ Form::text('longitude', null, ['class' => 'form-control', 'readonly']) }}
            </div>
        @endif

</div>

@endsection
