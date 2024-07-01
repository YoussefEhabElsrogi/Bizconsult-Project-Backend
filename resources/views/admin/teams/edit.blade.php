@extends('admin.master')

@section('title', __('keywords.edit_team'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_team') }}</h2>

                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.teams.update', ['team' => $team]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-label field="name"></x-form-label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('keywords.name') }}" value="{{ $team->name }}">
                                    <x-validation-error field="name"></x-validation-error>
                                </div>

                                <div class="col-md-6">
                                    <x-form-label field="position"></x-form-label>
                                    <input type="text" name="position" class="form-control"
                                        placeholder="{{ __('keywords.position') }}" value="{{ $team->position }}">
                                    <x-validation-error field="position"></x-validation-error>
                                </div>

                                <div class="col-md-12">
                                    <x-form-label field="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file">
                                    <x-validation-error field="image"></x-validation-error>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <x-form-label field="facebook"></x-form-label>
                                    <input type="url" name="facebook" class="form-control"
                                        placeholder="{{ __('keywords.facebook') }}" value="{{ $team->facebook }}">
                                    <x-validation-error field="facebook"></x-validation-error>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <x-form-label field="linkedin"></x-form-label>
                                    <input type="url" name="linkedin" class="form-control"
                                        placeholder="{{ __('keywords.linkedin') }}" value="{{ $team->linkedin }}">
                                    <x-validation-error field="linkedin"></x-validation-error>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <x-form-label field="twitter"></x-form-label>
                                    <input type="url" name="twitter" class="form-control"
                                        placeholder="{{ __('keywords.twitter') }}" value="{{ $team->twitter }}">
                                    <x-validation-error field="twitter"></x-validation-error>
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
