@php $editing = isset($pemesanan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="tanggal_pemesanan"
            label="Tanggal Pemesanan"
            value="{{ old('tanggal_pemesanan', ($editing ? optional($pemesanan->tanggal_pemesanan)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jam_mulai"
            label="Jam Mulai"
            :value="old('jam_mulai', ($editing ? $pemesanan->jam_mulai : ''))"
            maxlength="255"
            placeholder="Jam Mulai"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jam_selesai"
            label="Jam Selesai"
            :value="old('jam_selesai', ($editing ? $pemesanan->jam_selesai : ''))"
            maxlength="255"
            placeholder="Jam Selesai"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_pemesan"
            label="Nama Pemesan"
            :value="old('nama_pemesan', ($editing ? $pemesanan->nama_pemesan : ''))"
            maxlength="255"
            placeholder="Nama Pemesan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jumlah_pelanggan"
            label="Jumlah Pelanggan"
            :value="old('jumlah_pelanggan', ($editing ? $pemesanan->jumlah_pelanggan : ''))"
            max="255"
            placeholder="Jumlah Pelanggan"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="meja_id" label="Meja" required>
            @php $selected = old('meja_id', ($editing ? $pemesanan->meja_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Meja</option>
            @foreach($mejas as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
