@php $editing = isset($menu) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_menu"
            label="Nama Menu"
            :value="old('nama_menu', ($editing ? $menu->nama_menu : ''))"
            maxlength="255"
            placeholder="Nama Menu"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="harga"
            label="Harga"
            :value="old('harga', ($editing ? $menu->harga : ''))"
            step="0.01"
            placeholder="Harga"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="alamat" label="Alamat" maxlength="255" required
            >{{ old('alamat', ($editing ? $menu->deskripsi : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $menu->image ? \Storage::url($menu->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="jenis_id" label="Jenis" required>
            @php $selected = old('jenis_id', ($editing ? $menu->jenis_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Jenis</option>
            @foreach($allJenis as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
