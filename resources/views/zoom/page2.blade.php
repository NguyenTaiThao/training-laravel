@extends('layouts.full')

@section('slide-content')
    <div class="content">
        <div class="screen">
            <div class="slide">
                <div class="page2-content">
                    <p class="page-title">目次</p>
                    <div class="table-of-contents-wrapper">
                        <div class="table-of-content-item smooth-transition hidden" id="item-1">
                            <div class="number">01</div>
                            <div class="item">ウェブサイトの説明</div>
                        </div>
                        <div class="table-of-content-item smooth-transition hidden" id="item-2">
                            <div class="number">02</div>
                            <div class="item">好きな広告の説明</div>
                        </div>
                        <div class="table-of-content-item smooth-transition hidden" id="item-3">
                            <div class="number">03</div>
                            <div class="item">広告が好きな理由</div>
                        </div>
                        <div class="table-of-content-item smooth-transition hidden" id="item-4">
                            <div class="number">04</div>
                            <div class="item">学んだこと</div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="../page2.html" class="close-btn">X</a>
            <div class="btn-group">
                <a href="./f_index.html">
                    << /a>
                        <a href="./f_page3.html">></a>
            </div>
        </div>
    </div>
@endsection
