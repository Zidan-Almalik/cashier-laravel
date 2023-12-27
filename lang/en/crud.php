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
        'name' => 'All Jenis',
        'index_title' => 'AllJenis List',
        'new_title' => 'New Jenis',
        'create_title' => 'Create Jenis',
        'edit_title' => 'Edit Jenis',
        'show_title' => 'Show Jenis',
        'inputs' => [
            'nama_jenis' => 'Nama Jenis',
            'kategori_id' => 'Kategori',
        ],
    ],

    'kategoris' => [
        'name' => 'Kategoris',
        'index_title' => 'Kategoris List',
        'new_title' => 'New Kategori',
        'create_title' => 'Create Kategori',
        'edit_title' => 'Edit Kategori',
        'show_title' => 'Show Kategori',
        'inputs' => [
            'nama' => 'Nama',
        ],
    ],

    'mejas' => [
        'name' => 'Mejas',
        'index_title' => 'Mejas List',
        'new_title' => 'New Meja',
        'create_title' => 'Create Meja',
        'edit_title' => 'Edit Meja',
        'show_title' => 'Show Meja',
        'inputs' => [
            'nomor_meja' => 'Nomor Meja',
            'kapasitas' => 'Kapasitas',
            'status' => 'Status',
        ],
    ],

    'menus' => [
        'name' => 'Menus',
        'index_title' => 'Menus List',
        'new_title' => 'New Menu',
        'create_title' => 'Create Menu',
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
        'name' => 'Pelanggans',
        'index_title' => 'Pelanggans List',
        'new_title' => 'New Pelanggan',
        'create_title' => 'Create Pelanggan',
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
        'name' => 'Pemesanans',
        'index_title' => 'Pemesanans List',
        'new_title' => 'New Pemesanan',
        'create_title' => 'Create Pemesanan',
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
        'name' => 'Stoks',
        'index_title' => 'Stoks List',
        'new_title' => 'New Stok',
        'create_title' => 'Create Stok',
        'edit_title' => 'Edit Stok',
        'show_title' => 'Show Stok',
        'inputs' => [
            'jumlah' => 'Jumlah',
            'menu_id' => 'Menu',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
