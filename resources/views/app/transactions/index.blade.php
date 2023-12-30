@extends('layouts.app')

@push('styles')
    s
@endpush

@section('content')
    <div class="d-flex flex-wrap-reverse align-items-end justify-content-start">
        <div class="p-3 w-100 rounded rounded-3 bg-white mr-4" style="flex-basis: 70%;">
            <div class="d-flex align-items-center justify-content-between gap-2 mb-5">
                <h2>Pilih Kategori</h2>

                <div class="input-group w-50">
                    <input type="text" class="form-control input-menu" placeholder="Cari Menu"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text cari-menu" id="basic-addon2" style="cursor: pointer">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
            <div class="w-100 mb-5">
                <div class="d-flex align-items-center justify-content-start flex-wrap">
                    @foreach ($jenis as $j)
                        <div class="px-3 py-1 rounded bg-primary mr-3 cursor-pointer jenis" id="{{ $j->id }}"
                            style="cursor: pointer;">
                            {{ $j->nama_jenis }}
                        </div>
                    @endforeach
                </div>
            </div>

            <h2 class="mb-4"><span class="judul-menu">Semua</span> Menu</h2>
            <div class="d-flex align-items-start justify-content-start w-100 flex-wrap" id="daftar-menu">
                @foreach ($menu as $m)
                    <div class="card mr-md-4 mb-4" style="width: 18rem;">
                        <img class="card-img-top" src="{{ Storage::url($m->image) }}" alt="Gambar Menu"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $m->nama_menu }}</h5>
                            <p class="card-text">{{ $m->deskripsi }}</p>
                            <span class="font-italic">Rp. {{ $m->harga }}</span>
                            <div class="w-full d-flex justify-content-end">
                                <button class="btn btn-primary btn-pilih-menu" id="{{ $m->id }}">Pilih</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="right-side p-3 bg-white rounded-3" style="flex-basis: 25%">
            <h2 class="mb-5">Bills</h2>
            <div id="menu-dipilih" class="w-100 mb-4">

            </div>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <span class="font-weight-bold">Total</span>
                <span>Rp. <span id="total">0</span></span>
            </div>
            <h5>Payment Method</h5>
            <div class="overflow-scroll d-flex flex-wrap mb-3">
                <div class="rounded rounded-3 border border-primary text-center mr-2 mb-2 d-flex align-items-center flex-column justify-content-center methods"
                    style="width: 60px; height: 60px; cursor: pointer;" id="Cash">
                    <img src="image/cash.png" alt="cash" style="width: 30px; height: 30px; object-fit: cover;">
                    <span style="font-size: 12px">Cash</span>
                </div>
                <div class="rounded rounded-3 border border-primary text-center mr-2 mb-2 d-flex align-items-center flex-column justify-content-center methods"
                    style="width: 60px; height: 60px; cursor: pointer;" id="Qris">
                    <img src="image/qr.png" alt="qr" style="width: 30px; height: 30px; object-fit: cover;">
                    <span style="font-size: 12px">Qris</span>
                </div>
            </div>
            <div class="mb-3">
                <h6>Keterangan</h6>
                <textarea id="keterangan" class="w-100 border p-2" style="height: 100px; font-size: 14px;"></textarea>
            </div>
            <button class="btn btn-primary w-100" id="cetak-nota">Cetak Nota</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const object = JSON.stringify(@json($menu))
            const data = JSON.parse(object)

            let tombolCariMenu = document.querySelector('.cari-menu')

            tombolCariMenu.addEventListener('click', () => {
                let value = document.querySelector('.input-menu').value.toLowerCase()

                let menu = data.filter(menu => menu.nama_menu.toLowerCase().includes(value))
                let pesanTidakAda =
                    `<p class="font-italic font-weight-bold text-danger">Menu tidak ditemukan</p>`

                if (menu.length == 0) {
                    document.querySelector("#daftar-menu").innerHTML = pesanTidakAda
                } else {
                    let element = ``
                    menu.map(item => {
                        element += ` <div class="card mr-md-4 mb-4" style="width: 18rem;">
                    <img class="card-img-top" src="${item.image.replace('public', 'storage')}" alt="Gambar Menu" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">${item.nama_menu}</h5>
                        <p class="card-text">${item.deskripsi}</p>
                        <span class="font-italic">Rp. ${item.harga}</span>
                        <div class="w-full d-flex justify-content-end">
                            <button class="btn btn-primary">Pilih</button>
                        </div>
                    </div>
                </div>`
                    })

                    document.querySelector("#daftar-menu").innerHTML = element
                }
            })

            const jenis = Array.from(document.querySelectorAll('.jenis'))

            jenis.map(item => {
                item.addEventListener('click', event => {
                    const id = event.target.id

                    let menu = data.filter(menu => menu.jenis.id == id)
                    let pesanTidakAda =
                        `<p class="font-italic font-weight-bold text-danger">Menu tidak ditemukan</p>`

                    if (menu.length == 0) {
                        document.querySelector("#daftar-menu").innerHTML = pesanTidakAda
                    } else {
                        let element = ``
                        menu.map(item => {
                            element += ` <div class="card mr-md-4 mb-4" style="width: 18rem;">
                    <img class="card-img-top" src="${item.image.replace('public', 'storage')}" alt="Gambar Menu" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">${item.nama_menu}</h5>
                        <p class="card-text">${item.deskripsi}</p>
                        <span class="font-italic">Rp. ${item.harga}</span>
                        <div class="w-full d-flex justify-content-end">
                            <button class="btn btn-primary">Pilih</button>
                        </div>
                    </div>
                </div>`
                        })

                        document.querySelector("#daftar-menu").innerHTML = element
                    }
                })
            })

            let menuPilihan = []
            let total = 0
            let method = ""
            let keterangan = ""
            const btnMenu = Array.from(document.querySelectorAll('.btn-pilih-menu'))

            btnMenu.map(btn => {
                btn.addEventListener('click', event => {
                    let id = event.target.id

                    if (menuPilihan.find(item => item.id == id)) {
                        menuPilihan = menuPilihan.map(item => {
                            if (item.id == id) {

                                return {
                                    ...item,
                                    jumlah: parseInt(item.jumlah) + 1,
                                    sub_total: item.sub_total + item.harga,
                                }
                            } else {
                                return item
                            }
                        })
                    } else {
                        let menu = data.find(item => item.id == id)
                        let dataPilihan = {
                            id: menu.id,
                            nama: menu.nama_menu,
                            image: menu.image,
                            harga: menu.harga,
                            jumlah: 1,
                            sub_total: menu.harga
                        }
                        menuPilihan.unshift(dataPilihan)
                    }

                    tampilMenuPilihan()
                })
            })

            function hapusMenuPilihan() {
                const btnHapusMenu = Array.from(document.querySelectorAll(".hapus-menu"))

                btnHapusMenu.map(btn => {
                    btn.addEventListener('click', event => {
                        menuPilihan = menuPilihan.filter(item => item.id !=
                            event.target.id)

                        tampilMenuPilihan()
                    })
                })
            }

            function inputJumlahMenu() {
                const inputJumlahMenu = Array.from(document.querySelectorAll(".input-jumlah"))

                inputJumlahMenu.map(inputMenu => {
                    inputMenu.addEventListener("change", event => {

                        menuPilihan = menuPilihan.map(item => {
                            if (item.id == event.target.id) {
                                return {
                                    ...item,
                                    jumlah: event.target.value,
                                    sub_total: event.target.value * item.harga
                                }
                            } else {
                                return item
                            }
                        })
                        tampilMenuPilihan()
                    })
                })
            }

            function tampilMenuPilihan() {
                let menuElement = ``
                let subTotal = 0
                menuPilihan.map(item => {
                    subTotal += item.sub_total
                    menuElement += `  <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <img src="${item.image.replace('public', 'storage')}" alt="gambar menu" class="mr-2" style="width: 50px; height: 50px; object-fit: cover;">
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">${item.nama}</span>
                            <div class="opacity-75 border border danger "  style="cursor: pointer;">
                                <i class="fas fa-times hapus-menu" id="${item.id}"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" value="${item.jumlah}" id="${item.id}" class="text-center input-jumlah" id="1"
                                style="width: 40px; height: 20px;">
                            <span>Rp. ${item.sub_total}</span>
                        </div>
                    </div>
                </div>`
                })
                total = subTotal
                document.querySelector("#menu-dipilih").innerHTML = menuElement
                hapusMenuPilihan()
                inputJumlahMenu()
                document.querySelector("#total").innerHTML = total
            }

            const methods = Array.from(document.querySelectorAll(".methods"))
            methods.map(item => {
                item.addEventListener("click", () => {
                    method = item.id
                })
            })

            document.querySelector("#keterangan").addEventListener("change", event => {
                keterangan = event.target.value
            })


            document.querySelector("#cetak-nota").addEventListener("click", () => {
                const dataAPI = {
                    total_harga: total,
                    metode_pembayaran: method,
                    keterangan: keterangan,
                    menu: menuPilihan
                }

                const option = {
                    method: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(dataAPI)
                }
                console.log(dataAPI)
                fetch(`{{ url('tambah-transaksi') }}`, option)
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
            })            

        })
    </script>
@endpush
