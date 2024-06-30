@extends('admin.master')

@section('title', __('keywords.abouts'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">

                    <h2 class="h5 page-title">{{ __('keywords.abouts') }}</h2>

                    <div class="page-title-right">
                        <x-action-button href="{{ route('admin.abouts.create') }}" color='primary'
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
                                @forelse ($abouts as $about)
                                    <tr>
                                        <td>{{ $abouts->firstItem() + $loop->index }}</td>
                                        <td>{{ $about->title }}</td>
                                        <td>
                                            {{ $about->icon }}
                                        </td>
                                        <td>

                                            <x-action-button
                                                href="{{ route('admin.abouts.edit', ['about' => $about]) }}"
                                                color="success" content='<i class="fe fe-24 fe-edit"></i>'>
                                            </x-action-button>

                                            <x-delete-button
                                                href="{{ route('admin.abouts.destroy', ['about' => $about]) }}"
                                                id="{{ $about->id }}">
                                            </x-delete-button>

                                        </td>
                                    </tr>
                                @empty
                                    <x-empty-alert></x-empty-alert>
                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                        {{ $abouts->render('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
