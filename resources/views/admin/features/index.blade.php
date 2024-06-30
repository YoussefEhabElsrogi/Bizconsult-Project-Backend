@extends('admin.master')

@section('title', __('keywords.features'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.features') }}</h2>
                    <div class="page-title-right">
                        <x-action-button href="{{ route('admin.features.create') }}" color="primary"
                            content="{{ __('keywords.add_new') }}"></x-action-button>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <x-success-alert></x-success-alert>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.title') }}</th>
                                    <th width="15%">{{ __('keywords.icon') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($features as $feature)
                                    <tr>
                                        <td>{{ $features->firstItem() + $loop->index }}</td>
                                        <td>{{ $feature->title }}</td>
                                        <td>
                                            {{ $feature->icon }}
                                        <td>
                                            <x-action-button
                                                href="{{ route('admin.features.edit', ['feature' => $feature]) }}"
                                                color="success" content='<i class="fe fe-24 fe-edit"></i>'>
                                            </x-action-button>

                                            <x-action-button
                                                href="{{ route('admin.features.show', ['feature' => $feature]) }}"
                                                color="primary" content='<i class="fe fe-24 fe-eye"></i>'>
                                            </x-action-button>

                                            <x-delete-button
                                                href="{{ route('admin.features.destroy', ['feature' => $feature]) }}"
                                                id="{{ $feature->id }}">
                                            </x-delete-button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">
                                            <x-empty-alert></x-empty-alert>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $features->render('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
