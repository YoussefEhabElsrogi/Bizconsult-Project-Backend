@extends('admin.master')

@section('title', __('keywords.edit_member'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_member') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.members.update', ['member' => $member]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='name'></x-form-label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="{{ __('keywords.name') }}" value="{{ $member->name }}">
                                        <x-validation-error field='name'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='position'></x-form-label>
                                        <input type="text" id="position" name="position" class="form-control"
                                            placeholder="{{ __('keywords.position') }}" value="{{ $member->position }}">
                                        <x-validation-error field='position'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <x-form-label field="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file mb-2">
                                    <x-validation-error field="image"></x-validation-error>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='facebook'></x-form-label>
                                        <input type="text" id="facebook" name="facebook" class="form-control"
                                            placeholder="{{ __('keywords.facebook') }}" value="{{ $member->facebook }}">
                                        <x-validation-error field='facebook'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='twitter'></x-form-label>
                                        <input type="text" id="twitter" name="twitter" class="form-control"
                                            placeholder="{{ __('keywords.twitter') }}" value="{{ $member->twitter }}">
                                        <x-validation-error field='twitter'></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field='linkedin'></x-form-label>
                                        <input type="text" id="linkedin" name="linkedin" class="form-control"
                                            placeholder="{{ __('keywords.linkedin') }}" value="{{ $member->linkedin }}">
                                        <x-validation-error field='linkedin'></x-validation-error>
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
