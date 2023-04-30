@extends('layouts.layout')

@section('title', 'Каталог по категориям | ForgeNight')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{ route('page.home') }}">
                <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                <p>вернуться на главную страницу</p>
            </a>
        </div>
    </div>

    <style>
        .breadcrumbs a{
            display: flex;
            gap: 12px;
            text-decoration: none;
        }
        .breadcrumbs img{
            --size: 15px;
            width: var(--size);
            height: var(--size);
            margin: auto 0;
        }
        .breadcrumbs p{
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            color: #232323;
        }
    </style>
@endsection
