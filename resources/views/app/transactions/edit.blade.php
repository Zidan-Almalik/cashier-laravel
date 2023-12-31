@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('data.transaksi') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.stoks.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('data.transaksi.update', $data) }}"
                class="mt-4"
            >
            <div class="row">
                <x-inputs.group class="col-sm-12">
                    <x-inputs.date
                        name="tanggal"
                        label="Tanggal"
                        :value="old('tanggal', $data->tanggal->toDateString())"
                        max="255"
                        placeholder="Tanggal"
                        required
                    ></x-inputs.date>
                </x-inputs.group>

                <x-inputs.group class="col-sm-12">
                    <x-inputs.number
                        name="total_harga"
                        label="Total Harga"
                        :value="old('total_harga', $data->total_harga)"
                
                        placeholder="Total Harga"
                        required
                    ></x-inputs.number>
                </x-inputs.group>
            
                <x-inputs.group class="col-sm-12">
                    <x-inputs.select name="metode_pembayaran" label="Metode Pembayaran" required>
                        <option value="Cash" {{ $data->metode_pembayaran == 'Cash' ? 'selected' : '' }}>Cash</option>
                        <option value="Qris" {{ $data->metode_pembayaran == 'Qris' ? 'selected' : '' }}>Qris</option>
                    </x-inputs.select>
                </x-inputs.group>

                <x-inputs.group class="col-sm-12">
                    <x-inputs.textarea name="keterangan" label="keterangan" maxlength="255" required
                        >{{ old('keterangan', $data->keterangan)
                        }}</x-inputs.textarea
                    >
                </x-inputs.group>
            </div>

                <div class="mt-4">
                    <a href="{{ route('data.transaksi') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
