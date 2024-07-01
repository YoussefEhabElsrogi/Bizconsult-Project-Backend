@extends('front.master')

@section('title', 'about')

@section('about-active', 'active')

@section('hero')
    <x-hero-section title="About Us" subTitle="About"></x-hero-section>
@endsection

@section('content')

    <x-front-abouts-component></x-front-abouts-component>

    <x-front-features-component></x-front-features-component>

    <x-front-teams-component></x-front-teams-component>

@endsection
