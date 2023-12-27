@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('stoks.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.stoks.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.stoks.inputs.jumlah')</h5>
                    <span>{{ $stok->jumlah ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stoks.inputs.menu_id')</h5>
                    <span>{{ optional($stok->menu)->nama_menu ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('stoks.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Stok::class)
                <a href="{{ route('stoks.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
