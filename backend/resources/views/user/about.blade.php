@extends('layouts.app')

@section('title', 'サイトについて')

@section('content')

    @include('layouts.nav')
    <div class="container">
        <div class="jumbotron">
            <h1>About</h1>
            <p>このサイトは転職活動のためのポートフォリオ作品です。</p>
            <p>以前働いてた職場で用いていたものをモチーフにして作ってみました。</p>
            <p>組織の所有している情報資産に対して存在する脆弱性を評価し、管理することを目的としています。</p>
        </div>
    </div>
