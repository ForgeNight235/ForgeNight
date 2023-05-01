@extends('layouts.layout')

@section('title', 'Каталог магазина')

@section('content')
    <section class="catalog">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>каталог</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Warhammer 40 000
                </h1>
                <p>5 товар(ов) найдено</p>
            </div>

            <div class="catalog-container">
                <div class="filter">
                    <h3>
                        Фильтры
                    </h3>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Сортировать по:
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">новизне</a></li>
                            <li><a class="dropdown-item" href="#">по возрастанию</a></li>
                            <li><a class="dropdown-item" href="#">по убыванию</a></li>
                        </ul>
                    </div>
                    <span></span>
                    <select name="" id="">
                        <option value="">новизне</option>
                        <option value="">по возрастанию</option>
                        <option value="">по убыванию</option>
                    </select>
                </div>

                <div class="filter">

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Фракции
                                </button>
                            </h4>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                    <a href="?category">warhammer 40000</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <style>
            .catalog-container .accordion-body a{
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 20px;
                color: #232323;
            }
            .catalog-container .accordion-body{
                display: grid;
                gap: 20px;
            }
            .catalog-container {
                color: #232323;
            }

            .catalog-container .filter {
                display: grid;
                gap: 13px;
            }
            .catalog-container .filter select{
                outline: none;
                cursor: pointer;
                border-radius: 20px;
                background: none;
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 20px;
                height: 40px;
                width: fit-content;
                padding: 10px 25px 10px 10px;
            }
            .catalog-container .filter option{
                background: #F4DC5E;
                cursor: pointer;
            }


            .catalog-container .filter span {
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 20px;
                line-height: 25px;
            }

            .catalog-container .filter h3 {
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 32px;
                line-height: 39px;
                text-transform: capitalize;
            }
            .catalog-container .filter h4{

            }
        </style>
    </section>
@endsection
