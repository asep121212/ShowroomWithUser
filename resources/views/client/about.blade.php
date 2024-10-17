@extends('client.layouts.applogin')

@section('title', 'Tentang Kami')

@section('content')
  <section class="about-section py-5">
    <div class="container my-5 py-5">
      <h4 class="text-light mb-5 text-center animate__animated animate__fadeIn">Tentang Kami</h4>
      <div class="row align-items-center">
        <div class="col-md-6 animate__animated animate__fadeIn animate__delay-1s">
          <div class="info-box p-4 mb-4 rounded shadow-lg">
            <h5 class="text-white mb-3">{{ $profile[0]->company_name }}</h5>
          </div>
          <div class="info-box p-4 mb-4 rounded shadow-lg">
            <p class="text-white mb-2"><strong>Alamat:</strong> {{ $profile[0]->address }}</p>
          </div>
          <div class="info-box p-4 mb-4 rounded shadow-lg">
            <p class="text-white mb-2"><strong>Telepon:</strong> {{ $profile[0]->number }}</p>
          </div>
          <div class="info-box p-4 rounded shadow-lg">
            <p class="text-white mb-2"><strong>Email:</strong> {{ $profile[0]->email }}</p>
          </div>
        </div>
        <div class="col-md-6 animate__animated animate__fadeIn animate__delay-2s">
          <h4 class="text-light mb-4">Lokasi Kami</h4>
          <div class="map-container" style="overflow:hidden; padding-top: 56.25%; position:relative;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.0879398535544!2d105.28797777362665!3d-5.403573453984603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dba998f87fcb%3A0x5901f0d7789d6a12!2sJl.%20Soekarno%20Hatta%2C%20Lampung!5e0!3m2!1sid!2sid!4v1726650711133!5m2!1sid!2sid"
              width="100%" height="100%" style="position:absolute; top:0; left:0; border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('styles')
<style>
  .about-section {
    background-color: #343a40;
    color: #fff;
  }

  .info-box {
    background-color: #495057;
    border: 1px solid #6c757d;
  }

  .map-container {
    position: relative;
    height: 300px; /* Adjust as needed */
  }

  .animate__animated {
    animation-duration: 1.5s;
  }

  .animate__fadeIn {
    animation-name: fadeIn;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
</style>
@endpush
