<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'all_jenis' => [
        'name' => 'Jenis',
        'index_title' => 'Jenis',
        'new_title' => 'Jenis Baru',
        'create_title' => 'Buat Jenis',
        'edit_title' => 'Edit Jenis',
        'show_title' => 'Show Jenis',
        'inputs' => [
            'nama_jenis' => 'Nama Jenis',
            'kategori_id' => 'Kategori',
        ],
    ],

    'kategoris' => [
        'name' => 'Kategori',
        'index_title' => 'List Kategori',
        'new_title' => 'Kategori Baru',
        'create_title' => 'Buat Kategori',
        'edit_title' => 'Edit Kategori',
        'show_title' => 'Show Kategori',
        'inputs' => [
            'nama' => 'Nama',
        ],
    ],

    'mejas' => [
        'name' => 'Meja',
        'index_title' => 'List Meja',
        'new_title' => 'Meja Baru',
        'create_title' => 'Buat Meja',
        'edit_title' => 'Edit Meja',
        'show_title' => 'Show Meja',
        'inputs' => [
            'nomor_meja' => 'Nomor Meja',
            'kapasitas' => 'Kapasitas',
            'status' => 'Status',
        ],
    ],

    'menus' => [
        'name' => 'Menu',
        'index_title' => 'List Menu',
        'new_title' => 'Menu Baru',
        'create_title' => 'Buat Menu',
        'edit_title' => 'Edit Menu',
        'show_title' => 'Show Menu',
        'inputs' => [
            'nama_menu' => 'Nama Menu',
            'harga' => 'Harga',
            'image' => 'Image',
            'jenis_id' => 'Jenis',
        ],
    ],

    'pelanggans' => [
        'name' => 'Pelanggan',
        'index_title' => 'List Pelanggan',
        'new_title' => 'Pelanggan Baru',
        'create_title' => 'Buat Pelanggan',
        'edit_title' => 'Edit Pelanggan',
        'show_title' => 'Show Pelanggan',
        'inputs' => [
            'nama' => 'Nama',
            'email' => 'Email',
            'nomor_telepon' => 'Nomor Telepon',
            'alamat' => 'Alamat',
        ],
    ],

    'pemesanans' => [
        'name' => 'Pemesanan',
        'index_title' => 'List Pemesanan',
        'new_title' => 'Pemesanan Baru',
        'create_title' => 'Buat Pemesanan',
        'edit_title' => 'Edit Pemesanan',
        'show_title' => 'Show Pemesanan',
        'inputs' => [
            'tanggal_pemesanan' => 'Tanggal Pemesanan',
            'jam_mulai' => 'Jam Mulai',
            'jam_selesai' => 'Jam Selesai',
            'nama_pemesan' => 'Nama Pemesan',
            'jumlah_pelanggan' => 'Jumlah Pelanggan',
            'meja_id' => 'Meja',
        ],
    ],

    'stoks' => [
        'name' => 'Stok',
        'index_title' => 'List Stok',
        'new_title' => 'Stok Baru',
        'create_title' => 'Buat Stok',
        'edit_title' => 'Edit Stok',
        'show_title' => 'Show Stok',
        'inputs' => [
            'jumlah' => 'Jumlah',
            'menu_id' => 'Menu',
        ],
    ],

    'users' => [
        'name' => 'User',
        'index_title' => 'List User',
        'new_title' => 'User Baru',
        'create_title' => 'Buat User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role'
        ],
    ],
];
