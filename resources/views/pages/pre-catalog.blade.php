@extends('layouts.layout')

@section('title', 'Каталог по категориям | ForgeNight')

@section('content')
    <div class="container">
        <div class="big__breadcrumbs">
            <a href="{{ route('page.home') }}">
                <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                <p>вернуться на главную страницу</p>
            </a>
        </div>
    </div>

    <style>
        .big__breadcrumbs a{
            display: flex;
            gap: 12px;
            text-decoration: none;
        }
        .big__breadcrumbs p{
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 28px;
            line-height: 34px;

            color: #232323;
        }
    </style>
@endsection
