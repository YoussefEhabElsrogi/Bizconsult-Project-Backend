@extends('admin.master')

@section('title', __('keywords.teams'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">

                    <h2 class="h5 page-title">{{ __('keywords.teams') }}</h2>

                    <div class="page-title-right">
                        <x-action-button href="{{ route('admin.teams.create') }}" color='primary'
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
                                    <th>{{ __('keywords.name') }}</th>
                                    <th width="15%">{{ __('keywords.position') }}</th>
                                    <th width="15%">{{ __('keywords.image') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teams as $team)
                                    <tr>
                                        <td>{{ $teams->firstItem() + $loop->index }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>
                                            {{ $team->position }}
                                        </td>
                                        <td>
                                            <img src="{{ asset("storage/teams/$team->image") }}"
                                                alt="No Image Found"width="50px">
                                        </td>
                                        <td>

                                            <x-action-button href="{{ route('admin.teams.edit', ['team' => $team]) }}"
                                                color="success" content='<i class="fe fe-24 fe-edit"></i>'>
                                            </x-action-button>

                                            <x-action-button href="{{ route('admin.teams.show', ['team' => $team]) }}"
                                                color="primary" content=' <i class="fe fe-24 fe-eye"></i>'>
                                            </x-action-button>

                                            <x-delete-button href="{{ route('admin.teams.destroy', ['team' => $team]) }}"
                                                id="{{ $team->id }}">
                                            </x-delete-button>

                                        </td>
                                    </tr>
                                @empty
                                    <x-empty-alert></x-empty-alert>
                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                        {{ $teams->render('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
