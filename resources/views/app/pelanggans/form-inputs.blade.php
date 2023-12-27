@php $editing = isset($pelanggan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama"
            label="Nama"
            :value="old('nama', ($editing ? $pelanggan->nama : ''))"
            maxlength="255"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $pelanggan->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nomor_telepon"
            label="Nomor Telepon"
            :value="old('nomor_telepon', ($editing ? $pelanggan->nomor_telepon : ''))"
            maxlength="255"
            placeholder="Nomor Telepon"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="alamat" label="Alamat" maxlength="255" required
            >{{ old('alamat', ($editing ? $pelanggan->alamat : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
