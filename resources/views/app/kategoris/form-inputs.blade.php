@php $editing = isset($kategori) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama"
            label="Nama"
            :value="old('nama', ($editing ? $kategori->nama : ''))"
            maxlength="255"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
