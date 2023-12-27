@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('pemesanans.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pemesanans.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pemesanans.inputs.tanggal_pemesanan')</h5>
                    <span>{{ $pemesanan->tanggal_pemesanan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemesanans.inputs.jam_mulai')</h5>
                    <span>{{ $pemesanan->jam_mulai ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemesanans.inputs.jam_selesai')</h5>
                    <span>{{ $pemesanan->jam_selesai ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemesanans.inputs.nama_pemesan')</h5>
                    <span>{{ $pemesanan->nama_pemesan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemesanans.inputs.jumlah_pelanggan')</h5>
                    <span>{{ $pemesanan->jumlah_pelanggan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemesanans.inputs.meja_id')</h5>
                    <span>{{ optional($pemesanan->meja)->id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pemesanans.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Pemesanan::class)
                <a
                    href="{{ route('pemesanans.create') }}"
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
