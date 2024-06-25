@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendors/linericon/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/nouislider/nouislider.min.css')}}">

@endsection

@section('title')
    Kontak
@endsection

@section('kontak')
    active
@endsection

@section('main')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="contact">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Contact Us</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"></a></li>
          <!-- <li class="breadcrumb-item active" aria-current="page">Contact</li> -->
        </ol>
      </nav>
            </div>
        </div>
</div>
</section>
<!-- ================ end banner area ================= -->

<!-- ================ contact section start ================= -->

<section class="section-margin--small">
<div class="container">
  <div class="d-none d-sm-block mb-5 pb-4">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15780.508470759873!2d116.104605!3d-8.5837748!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc10046f93b2d%3A0x68ab703cc0d02b1d!2sMILLS%20STORE%20LOMBOK!5e0!3m2!1sid!2sid!4v1718973668000!5m2!1sid!2sid" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- <div id="map" style="height: 420px;"></div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var grayStyles = [
          {
            featureType: "all",
            stylers: [
              { saturation: -90 },
              { lightness: 50 }
            ]
          },
          {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
        ];
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -31.197, lng: 150.744},
          zoom: 9,
          styles: grayStyles,
          scrollwheel:  false
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script> -->
    
  </div>


  <div class="row">
    <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-home"></i></span>
        <div class="media-body">
          <h3>Mills Store Sport Lombok</h3>
          <p>Jl. Catur Warga No.9, Mataram</p>
        </div>
      </div>
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
        <div class="media-body">
          <h3><a href="tel:454545654">08 177 903 3231</a></h3>
          <p>Setiap Hari, 09.00 - 17.00 WITA </p>
        </div>
      </div>
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-email"></i></span>
        <div class="media-body">
          <h3><a href="mailto:support@colorlib.com">info@mills.co.id</a></h3>
          <p>Kirim Pertanyaanmu Kapan Pun</p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-8 col-lg-9">
      <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
            </div>
            <div class="form-group">
              <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
            </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group">
                <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
            </div>
          </div>
        </div>
        <div class="form-group text-center text-md-right mt-3">
          <button type="submit" class="button button--active button-contactForm">Send Message</button>
        </div>
      </form>
    </div> -->
  </div>
</div>
</section>
<!-- ================ contact section end ================= -->
@endsection

@section('js')
    <script src="{{asset('assets/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    {{-- <script type="text/javascript">
        $('#province_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){

                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })

        $('#courier').on('change', function() {
            $('#service').empty()
            $('#service').append('<option value="">Loading...</option>')
            $.ajax({
                url:"{{ route('home.cekongkir') }}",
                type: "POST",
                data: {
                        _token:              $("meta[name='csrf-token']").attr("content"),
                        city_origin:         $('input[name=city_origin]').val(),
                        city_destination:    $('select[name=city_destination]').val(),
                        courier:             $('select[name=courier]').val(),
                        weight:              $('#weight').val(),
                    },

                success: function(response){
                    $('#service').empty();
                    $('#service').append('<option value="">Pilih service</option>')
                    $.each(response[0]['costs'], function (key, value) {
                        $('#service').append('<option>'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong>, '+value.cost[0].value+', ('+value.cost[0].etd+' hari)</option>')
                    });
                }
            });
        })

        $('#service').on('change', function() {
            let split = $(this).val().split(',')
            $('#ongkir').text('Ongkir : Rp. ' + split[1])
            $('#resi').text('Perkiraan waktu sampai : ' + split[2])

            let subtotal = "{{ $subtotal }}"
            let total = parseInt(subtotal) + parseInt(split[1])
            $('#total').text('Rp. ' + total)
            $('#subtotal').append('<input type="text" name="subtotal" value="'+total+'" disabled required>')
        })

    </script>     --}}

@endsection

