@php $editing = isset($stok) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jumlah"
            label="Jumlah"
            :value="old('jumlah', ($editing ? $stok->jumlah : ''))"
            max="255"
            placeholder="Jumlah"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="menu_id" label="Menu" required>
            @php $selected = old('menu_id', ($editing ? $stok->menu_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Menu</option>
            @foreach($menus as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
