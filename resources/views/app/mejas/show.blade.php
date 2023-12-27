@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('mejas.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.mejas.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.mejas.inputs.nomor_meja')</h5>
                    <span>{{ $meja->nomor_meja ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mejas.inputs.kapasitas')</h5>
                    <span>{{ $meja->kapasitas ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mejas.inputs.status')</h5>
                    <span>{{ $meja->status ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('mejas.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Meja::class)
                <a href="{{ route('mejas.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
