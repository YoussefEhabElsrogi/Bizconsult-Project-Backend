@extends('admin.master')

@section('title', __('keywords.edit_service'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_service') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.services.update', ['service' => $service]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label filed='title'></x-form-label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="{{ __('keywords.title') }}" value="{{ $service->title }}">
                                        <x-validation-error filed='title'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label filed='icon'></x-form-label>
                                        <input type="text" id="icon" name="icon" class="form-control"
                                            placeholder="{{ __('keywords.icon') }}" value="{{ $service->icon }}">
                                        <x-validation-error filed='icon'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <x-form-label filed='description'></x-form-label>
                                        <textarea id="description" name="description" class="form-control" placeholder="{{ __('keywords.description') }}">{{ $service->description }}</textarea>
                                        <x-validation-error filed='description'></x-validation-error>
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
