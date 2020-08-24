@extends('layouts.error')

@section('title', '404 Not Found')

@section('message', '該当のページを見つける事ができませんでした。')

@section('content', 'URLが間違っているか、ページが移動または削除された可能性があります。')

@section('link')
    <v-btn href="/" class="mt-10">TOPへ戻る</v-btn>
@endsection