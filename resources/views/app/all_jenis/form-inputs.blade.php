@php $editing = isset($jenis) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_jenis"
            label="Nama Jenis"
            :value="old('nama_jenis', ($editing ? $jenis->nama_jenis : ''))"
            maxlength="255"
            placeholder="Nama Jenis"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="kategori_id" label="Kategori" required>
            @php $selected = old('kategori_id', ($editing ? $jenis->kategori_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Kategori</option>
            @foreach($kategoris as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
