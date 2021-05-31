@extends('layouts.android.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Selamat Datang</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-user text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Dedi Kurniawan</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="card card-custom">
        <div class="card-header">
         <h3 class="card-title">
          Pengantaran Barang Bukti Tilang
         </h3>
         <div class="card-toolbar">
          <div class="example-tools justify-content-center">
           <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
           <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
          </div>
         </div>
        </div>
        <!--begin::Form-->
        <form>
         <div class="card-body">
          <div class="form-group mb-8">
           <div class="alert alert-custom alert-default" role="alert">
            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
            <div class="alert-text">
                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
            </div>
           </div>
          </div>
          <div class="form-group">
           <label>Nomor Tilang <span class="text-danger">*</span></label>
           <input type="text" class="form-control" required placeholder="Nomor Tilang"/>
           <span class="form-text text-muted">We'll never share your Nomor Tilang with anyone else.</span>
          </div>
          <div class="form-group">
            <label>Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required placeholder="Nama"/>
            <span class="form-text text-muted">We'll never share your Nama with anyone else.</span>
           </div>
           <div class="form-group">
            <label for="exampleTextarea">Alamat Antar <span class="text-danger">*</span></label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
           </div>
           <div class="form-group">
            <label>No TLP/HP <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required placeholder="No TLP/HP"/>
            <span class="form-text text-muted">We'll never share your Nama with anyone else.</span>
           </div>
           <div class="form-group">
            <label>Tanggal Antar<span class="text-danger">*</span></label>
            <input type="date" class="form-control" required placeholder="Nama"/>
            <span class="form-text text-muted">We'll never share your Nama with anyone else.</span>
           </div>
           <div class="form-group">
            <label>Upload Photo Surat tilang<span class="text-danger">*</span></label>
            <input type="file" class="form-control" required placeholder="Photo"/>
            <span class="form-text text-muted">We'll never share your Nama with anyone else.</span>
           </div>
           <div class="form-group">
            <label>Lokasi<span class="text-danger">*</span></label>
            <button class="btn btn-second btn-sm" type="button" onclick="showPeta()"><i class="flaticon-placeholder-1 text-success icon-2x"></i></button>
            <input type="text" name="lat" class="form-control" id="lang">
            <input type="text" name="long" class="form-control" id="long">
            
            <span class="form-text text-muted">Pastikan GPS aktif</span>
            <small class="text-danger" id="error-location"></small>
           </div>
           <div class="form-group">
            <div id="peta" style="height: 500px">
                        
            </div>
           </div>
         </div>
         <div class="card-footer">
          <button type="submit" class="btn btn-success btn-block"><i class="flaticon-paper-plane-1"></i> SIMPAN</button>
         </div>
        </form>
        <!--end::Form-->
       </div>
    <!--end::Entry-->
</div>  
@endsection
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" ></script>
@endpush
@push('script')

<script>
    var long = document.getElementById("long");
    var lang = document.getElementById("lang");
    var error = document.getElementById("error-location");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            error.innerHTML = "Aktifkan GPS ANDA!!!";
        }
    }
    function showPosition(position) {
        lang.value = position.coords.latitude;
        long.value = position.coords.longitude;
        // console.log(position.coords.latitude);
    }
    getLocation();

    function showPeta(){
        var long = $("#long").val();
        var lang = $("#lang").val();
        console.log(long);
        var mapOptions = {
            center: [lang,long],
            zoom: 13
        }
        var peta = new L.map('peta', mapOptions);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(peta);
        var marker = new L.Marker([lang,long]);
        marker.addTo(peta);
    }
</script>
@endpush
