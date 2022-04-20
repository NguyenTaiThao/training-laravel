@extends('layouts.full')

@section('slide-content')
    <div class="content">
        <div class="screen">
            <div class="slide">
                <div class="page1-content">
                    <p class="title">博報堂プロダクツ株式会社</p>
                    <p class="subtitle">12月の面談：発表・課題提出</p>
                    <p class="name">内定者・グェン・タイ・タオ</p>
                    <p class="date">2021年12月24日</p>
                </div>
            </div>
            <a href="{{ route('page-1') }}" class="close-btn">X</a>
            <div class="btn-group">
                <a>
                    < </a>
                        <a href="{{ route('f-page-2') }}">></a>
            </div>
        </div>
    </div>
@endsection
