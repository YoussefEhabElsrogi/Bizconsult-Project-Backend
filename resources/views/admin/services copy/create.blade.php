@extends('admin.master')

@section('title', __('keywords.add_new_about'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.add_new_about') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='title'></x-form-label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="{{ __('keywords.title') }}">
                                        <x-validation-error field='title'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='icon'></x-form-label>
                                        <input type="text" id="icon" name="icon" class="form-control"
                                            placeholder="{{ __('keywords.icon') }}">
                                        <x-validation-error field='icon'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <x-form-label field='description'></x-form-label>
                                        <textarea id="description" name="description" class="form-control" placeholder="{{ __('keywords.description') }}"></textarea>
                                        <x-validation-error field='description'></x-validation-error>
                                    </div>
                                </div>
                            </div>
                            <x-submit-button></x-submit-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
