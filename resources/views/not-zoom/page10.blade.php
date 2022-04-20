@extends('layouts.index')

@section('slide-content')
    <div class="screen">
        <div class="slide">
            <div class="page10-content">
                <p class="page-title">学んだこと</p>
                <div class="content-wrapper">
                    <div class="text">
                        <ul>
                            <li>HTML・CSSの復習</li>
                            <li>GitHubにディプロイ</li>
                            <li>日本語の練習</li>
                            <li>HTML・CSSのみでウェブサイトを作成する苦しみ</li>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="{{ asset('assets/images/teacher.png') }} " alt="diem may xanh logo"
                            style="width: 300px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
