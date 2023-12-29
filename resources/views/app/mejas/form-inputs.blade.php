@php $editing = isset($meja) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nomor_meja"
            label="Nomor Meja"
            :value="old('nomor_meja', ($editing ? $meja->nomor_meja : ''))"
            max="255"
            placeholder="Nomor Meja"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="kapasitas"
            label="Kapasitas"
            :value="old('kapasitas', ($editing ? $meja->kapasitas : ''))"
            max="255"
            placeholder="Kapasitas"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $meja->status : '')) @endphp
            <option value="dipesan" {{ $selected == 'dipesan' ? 'selected' : '' }} >Dipesan</option>
            <option value="kosong" {{ $selected == 'kosong' ? 'selected' : '' }} >Kosong</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
