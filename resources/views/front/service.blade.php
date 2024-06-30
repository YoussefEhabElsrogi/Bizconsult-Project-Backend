@extends('front.master')

@section('title', 'service')

@section('service-active', 'active')

@section('hero')
    <x-hero-section title="Service Us" subTitle="Servie"></x-hero-section>
@endsection

@section('content')

    <x-front-services-component></x-front-services-component>

    <x-front-testimonials-component></x-front-testimonials-component>>

@endsection
