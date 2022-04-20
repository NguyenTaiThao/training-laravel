@extends('layouts.index')

@section('slide-content')
    <div class="screen">
        <div class="slide">
            <div class="page4-content">
                <p class="page-title">ウェブサイトの説明</p>
                <div class="content-wrapper">
                    <div class="text">
                        <ul>
                            <li><b>アイデア</b>：発表が理解やすいくなるため</li>
                            <li><b>ツール</b>：HTML・CSSのみ</li>
                            <li><b>ディプロイ</b>：GitHub</li>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="{{ asset('assets/images/powerpoint.jpg') }}" alt="powerpoint" />
                        <img src="{{ asset('assets/images/ggslide.png') }}" alt="powerpoint" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
