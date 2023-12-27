@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('pelanggans.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pelanggans.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pelanggans.inputs.nama')</h5>
                    <span>{{ $pelanggan->nama ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pelanggans.inputs.email')</h5>
                    <span>{{ $pelanggan->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pelanggans.inputs.nomor_telepon')</h5>
                    <span>{{ $pelanggan->nomor_telepon ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pelanggans.inputs.alamat')</h5>
                    <span>{{ $pelanggan->alamat ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pelanggans.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Pelanggan::class)
                <a
                    href="{{ route('pelanggans.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
