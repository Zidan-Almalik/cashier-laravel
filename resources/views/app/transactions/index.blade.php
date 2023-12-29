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
                    <input type="text" class="form-control" placeholder="Cari Menu" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
            <div class="w-100 mb-5 overflow-hidden">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="px-3 py-1 rounded border border-primary mr-3 cursor-pointer">
                        item 1
                    </div>
                </div>
            </div>

            <h2 class="mb-4">Kopi Menu</h2>
            <div class="d-flex align-items-start justify-content-start w-100 flex-wrap">
                <div class="card mr-md-4 mb-4" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Gambar Menu" style="height: 40%; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <div class="w-full d-flex justify-content-end">
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-side p-3 bg-white rounded-3" style="flex-basis: 25%">
            <h2 class="mb-5">Bills</h2>
            <div id="menu-dipilih" class="w-100 mb-4">
                <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <div class="mr-2 bg-danger" style="width: 50px; height: 50px">

                    </div>
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">Menu 1</span>
                            <div class="opacity-75 border border danger" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" class="text-center" placeholder="0" id="1"
                                style="width: 40px; height: 20px;">
                            <span>10000</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <div class="mr-2 bg-danger" style="width: 50px; height: 50px">

                    </div>
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">Menu 1</span>
                            <div class="opacity-75 border border danger" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" class="text-center" placeholder="0" id="1"
                                style="width: 40px; height: 20px;">
                            <span>10000</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <div class="mr-2 bg-danger" style="width: 50px; height: 50px">

                    </div>
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">Menu 1</span>
                            <div class="opacity-75 border border danger" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" class="text-center" placeholder="0" id="1"
                                style="width: 40px; height: 20px;">
                            <span>10000</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <div class="mr-2 bg-danger" style="width: 50px; height: 50px">

                    </div>
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">Menu 1</span>
                            <div class="opacity-75 border border danger" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" class="text-center" placeholder="0" id="1"
                                style="width: 40px; height: 20px;">
                            <span>10000</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <div class="mr-2 bg-danger" style="width: 50px; height: 50px">

                    </div>
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">Menu 1</span>
                            <div class="opacity-75 border border danger" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" class="text-center" placeholder="0" id="1"
                                style="width: 40px; height: 20px;">
                            <span>10000</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-start justify-content-start w-100">
                    <div class="mr-2 bg-danger" style="width: 50px; height: 50px">

                    </div>
                    <div class="w-100">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <span class="mb-1 d-inline-block">Menu 1</span>
                            <div class="opacity-75 border border danger" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items center justify-content-between w-100">
                            <input type="text" class="text-center" placeholder="0" id="1"
                                style="width: 40px; height: 20px;">
                            <span>10000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <span class="font-weight-bold">Total</span>
                <span id="total">Rp. 900000</span>
            </div>
            <h5>Payment Method</h5>
            <div class="overflow-scroll d-flex flex-wrap mb-3" style="width: 270px">
                <div class="rounded rounded-3 border border-primary text-center mr-2 mb-2"
                    style="width: 70px; height: 70px;">
                    <div class="bg-danger mb-1" style="height: 30px; width: 30px;"></div>
                    <span style="font-size: 12px">method 1</span>
                </div>
            </div>
            <button class="btn btn-primary w-100">Cetak Nota</button>
        </div>
    </div>
@endsection
