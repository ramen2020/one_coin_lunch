@extends('layouts.error')

@section('title', '500 Internal Server Error')
{{-- サーバ内部エラー --}}

@section('message', 'サーバー内部でエラーが発生しました。')

@section('content', 'webアプリケーションのプログラムに問題があります。お問い合わせフォームより、管理者へ連絡のほどお願いします。')