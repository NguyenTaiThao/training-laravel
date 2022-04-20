@extends('layouts.index')

@section('slide-content')
    <div class="screen">
        <div class="slide">
            <div class="page6-content">
                <p class="page-title">好きな広告の説明</p>
                <div class="content-wrapper">
                    <div class="text">
                        <b>Điện Máy Xanhスーパーは？</b>
                        <p>
                            ベトナムの有名なスーパーです。売っているのは家電製品とテクノロジー製品だ。
                        </p>
                        <br />
                        <b>有名になった理由</b>
                        <ul>
                            <li>広告の画像は奇妙で、すごくて、物議を醸したこと。</li>
                            <li>覚えやすいキャッチフレーズを繰り返して使用したこと。</li>
                            <li>
                                意見が分かれることを生かして、TVCの代わりにソーシャルネットワークに広告させたこと。
                            </li>
                        </ul>
                        <br />
                        <b>広告のリンク：</b><a href="https://www.youtube.com/watch?v=IvykdsPU_G0">こちらです</a>
                        <br />
                        <b>詳細のリンク：</b><a
                            href="https://docs.google.com/document/d/1Jy0_DF1s58dHewrFIch4QVxvuFUPl90Bpa95v9bXrmQ/edit?usp=sharing">こちらです</a>
                    </div>
                    <div class="image">
                        <div class="ad-name">
                            <p>Điện Máy Xanhスーパー の広告</p>
                            <p>（ディエン・マイ・サイン）</p>
                        </div>
                        <img src="{{ asset('assets/images/dmx.png') }}" alt="diem may xanh logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
