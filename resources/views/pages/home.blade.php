@extends('layouts.layout')

@section('title', 'Главная страница')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <div class="main-slider-wrapper">
        <swiper-container class="mySwiper" direction="vertical" pagination="true" pagination-clickable="true">
            <swiper-slide class="swiper-slide">
                <div class="slide-text">
                    <h2>text description</h2>
                </div>
                <div class="slide-img">
                    <img src="{{ asset('images\main-slider\slide1.png') }}" alt="">
                </div>
            </swiper-slide>
            <swiper-slide>Slide 2</swiper-slide>
            <swiper-slide>Slide 3</swiper-slide>
        </swiper-container>
    </div>


    <div class="container">
        <div class="img-links">
            <div class="link">
                <a href="/pre-catalog">
                    <img src="{{ asset('images/img-links/order.png') }}" alt="order">
                </a>
            </div>
            <div class="link">
                <a href="/gallery">
                    <img src="{{ asset(asset('images/img-links/gallery.png')) }}" alt="gallery">
                </a>
            </div>
            <div class="link">
                <a href="/catalog">
                    <img src="{{ asset('images/img-links/catalog.png') }}" alt="catalog">
                </a>
            </div>
        </div>
    </div>


    @include('components.new-items')

    @include('components.sales')

    @include('components.news')

    @include('components.subscribe')
@endsection
