@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<!--end of page level css-->

<!-- begining of page level js -->

<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="ti-gift"></i> Donasi</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="text-justify">
                        Sebagai bentuk bantuan untuk mengembangkan aplikasi KnowIND, Anda dapat mendonasikan dengan menggunakan salah satu cara yang tersedia dibawah
                    </div>
                    <div class="tab-content faq-cat-content">
                        <div class="tab-pane active in fade" id="faq-cat-1">
                            <div class="panel-group" id="accordion-cat-1">
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion-cat-1"
                                           href="#faq-cat-1-sub-1">
                                            <h4 class="panel-title">
                                                Transfer Bank
                                                <span class="pull-right"></span>
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="faq-cat-1-sub-1" class="panel-collapse collapse">
                                        <div class="panel-body text-justify">
                                            <ul>
                                                <li><b>Via Mobile Banking (BCA):</b></li>
                                            </ul>
                                            <ol>
                                                <li>Buka aplikasi BCA mobile di smartphone anda.</li>
                                                <li>Pilih m-BCA lalu login dengan kode akses Anda.</li>
                                                <li>Pilih m-Transfer.</li>
                                                <li>Pilih Antar Rekening di pilihan Daftar Transfer.</li>
                                                <li>Masukkan nomor rekening berikut ke nomor rekening tujuan : 0123456789.</li>
                                                <li>Kembali ke m-Transfer lalu pilih Antar Rekening.</li>
                                                <li>Pilih rekening Admin KnowIND lalu masukkan nominal yang anda inginkan.</li>
                                            </ol>
                                            <br>
                                            <ul>
                                                <li><b>Via ATM:</b></li>
                                            </ul>
                                            <ol>
                                                <li>Masukkan PIN anda di ATM.</li>
                                                <li>Pilih menu Transfer dan Ke Rek BCA.</li>
                                                <li>Masukkan nomor rekening berikut ke nomor rekening tujuan : 0123456789.</li>
                                                <li>Masukkan nominal yang anda inginkan.</li>
                                                <li>Periksa data transaksi yang muncul, pastikan nama penerimanya adalah Admin KnowIND.</li>
                                                <li>Simpan struk sebagai bukti.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion-cat-1"
                                           href="#faq-cat-1-sub-2">
                                            <h4 class="panel-title">
                                                OVO
                                                <span class="pull-right"></span>
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="faq-cat-1-sub-2" class="panel-collapse collapse">
                                        <div class="panel-body text-justify">
                                            <ul>
                                                <li><b>Via Prosedur OVO:</b></li>
                                            </ul>
                                            <ol>
                                                <li>Buka aplikasi OVO di smartphone anda.</li>
                                                <li>Pilih menu Transfer.</li>
                                                <li>Pilih Ke Rekening Bank.</li>
                                                <li>Pilih Bank BCA pada pilihan bank.</li>
                                                <li>Masukkan nomor rekening berikut ke nomor rekening tujuan : 0123456789.</li>
                                                <li>Masukkan nominal yang anda inginkan.</li>
                                                <li>Periksa data transaksi yang muncul, pastikan nama penerimanya adalah Admin KnowIND.</li>
                                                <li>Pilih Transfer</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection