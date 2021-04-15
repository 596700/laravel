@extends('layouts.app')

@section('title', 'About')

@section('content')

    @include('layouts.nav')
    <div class="container">
        <div class="jumbotron">
            <h1>About</h1>
            <p>本サイトは転職活動のためのポートフォリオ作品です。</p>
            <p>以前働いてた職場で用いていたものをモチーフにして作ってみました。</p>
            <p>組織の所有している情報資産に対して存在する脆弱性を評価(*1)し、管理することを目的としています。</p>
            <br />
            <br />
            <h1>How to use</h1>
            <p>
                1. 所有している情報資産の製品(*2)、バージョン(*2)をそれぞれ登録します。<br />
            </p>
            <p>
                2. 製品/バージョン(*2)を紐づけます。<br />
                &nbsp;&nbsp;&nbsp;&nbsp;製品/バージョンはマイリストに保存できます。
            </p>
            <p>
                3. 製品/バージョンが影響を受けるCVEを調査し、CVE(*2)を登録します。
            </p>
            <br />
            <br />
            <strong>*1 本サイトは<a href="https://www.ipa.go.jp/security/vuln/CVE.html">CVE</a>(Common Vulnerabilities and Exposures)をもとに脆弱性の評価を行います。</strong>
            <br />
            <strong>*2 すでに登録済みの場合は登録済みのものを利用してください。</strong>
        </div>
    </div>
