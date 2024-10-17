@extends('client.layouts.app')

@section('title', 'Soetta Motor')

@section('content')
<section class="carousel-section border-bottom" style="background-image: url('{{ asset('client/img/mercedes.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <div class="container py-5">
    <div class="row">
      <!-- Logo and Text Overlay on the Left -->
      <div class="col-md-6 d-flex flex-column justify-content-center align-items-start text-white bg-dark bg-opacity-75 p-4 rounded">
        <div class="carousel-header text-start">
          <h2 class="carousel-text display-4 fw-bold">Soetta Motor Terbaik</h2>
          <p class="lead">Temukan Soetta Motor impian Anda dengan harga terbaik</p>
          <a href="#cars" class="btn btn-warning btn-lg mt-3">Lihat Mobil</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Icon Section with Dark Background -->
  <div class="container d-flex justify-content-between mt-5">
    <!-- Box Kiri -->
    <div class="half-screen-box p-4 bg-dark text-white shadow-lg animate-slideInLeft rounded">
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-car-front-fill fs-1 text-warning me-3"></i> <!-- Car icon -->
        <div>
          <h3 class="fw-bold text-white mb-2">Kualitas Mobil Terjamin</h3>
          <p class="text-light mb-4">Semua mobil bekas kami telah melewati inspeksi ketat untuk memastikan kualitas terbaik.</p>
        </div>
      </div>
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-currency-dollar fs-1 text-success me-3"></i> <!-- Price icon -->
        <div>
          <h3 class="fw-bold text-white mb-2">Harga Terjangkau</h3>
          <p class="text-light">Dapatkan penawaran harga terbaik dengan berbagai opsi pembiayaan yang fleksibel.</p>
        </div>
      </div>
    </div>

    <!-- Box Kanan -->
    <div class="half-screen-box p-4 bg-dark text-white shadow-lg animate-slideInRight rounded">
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-speedometer2 fs-1 text-danger me-3"></i> <!-- Speedometer icon -->
        <div>
          <h3 class="fw-bold text-white mb-2">Performa Tinggi</h3>
          <p class="text-light mb-4">Nikmati pengalaman berkendara yang optimal dengan performa mesin yang masih prima.</p>
        </div>
      </div>
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-shield-check fs-1 text-primary me-3"></i> <!-- Safety icon -->
        <div>
          <h3 class="fw-bold text-white mb-2">Keamanan Terjamin</h3>
          <p class="text-light">Mobil bekas kami dilengkapi dengan fitur keamanan terbaik untuk kenyamanan Anda.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section>
  <div class="container my-5 py-5">
    <h4 class="text-light">Produk Terbaru</h4>
    <div class="row mt-5 justify-content-center align-items-center">
      @foreach ($products as $product)
      <div class="col-md-4 mb-4">
        <div class="card bg-dark text-light product-card">
          <img src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}" class="card-img-top img-fluid product-img" alt="Produk">
          <div class="card-body">
            <h5 class="card-title fw-bold text-success">{{ $product->product_name }} - {{ optional($product->category)->category_name }}</h5>
            <p class="card-text card-desc">Rp {{ number_format($product->price_discount, 0, ',', '.') }}</p>
            <div class="d-flex gap-2">
              <a class="btn btn-secondary" href="{{ route('client.product.show', $product->id) }}">Lihat Produk</a>
              <form action="{{ route('client.product.add_to_cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-secondary"><i class="bi bi-cart3"></i></button>
              </form>
              <form action="{{ route('client.product.add_to_cart_and_redirect', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">DP</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<a href="https://api.whatsapp.com/send?phone={{ $profile[0]->number }}" target="_blank" class="whatsapp-float">
    <i class="bi bi-whatsapp"></i>
    <span>Chat Kami</span>
</a>
<style>
  /* WhatsApp Floating Button */
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #25D366;
    color: white;
    padding: 10px 15px;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s;
    z-index: 1000;
}

.whatsapp-float:hover {
    background-color: #128C7E;
}

.whatsapp-float i {
    font-size: 1.5rem;
    margin-right: 10px;
}

.whatsapp-float span {
    font-size: 1rem;
    display: none;
}

@media (min-width: 768px) {
    .whatsapp-float span {
        display: inline;
    }
}
   .image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 75%; /* Adjust this percentage to control the aspect ratio */
    overflow: hidden;
    background-color: #f7f7f7; /* Background color for the box */
    display: flex;
    align-items: center;
    justify-content: center;
  }
  section.border-bottom {
    border-bottom: 2px solid #ccc; /* Adjust the color and thickness as needed */
    padding-bottom: 1rem; /* Adds some space between content and border */
}
/* CSS Animations for Carousel */
.carousel-inner .carousel-item img {
  object-fit: cover;
  height: 400px; /* Adjust height as needed */
  transition: transform 0.5s ease-in-out;
}
.carousel-inner .carousel-item {
  transition: transform 1s ease-in-out;
  display: flex;
  align-items: center;
}
.carousel-section {
  background-color: #ffffff; /* Background color for the section */
  padding-top: 2rem; /* Adjust top padding as needed */
}
.carousel-header {
  margin-bottom: 1rem; /* Space between the header and carousel */
}

.carousel-logo {
  max-width: 150px; /* Adjust size as needed */
  margin-bottom: 10px;
}

.carousel-text {
  font-size: 2rem; /* Adjust font size as needed */
  font-weight: bold;
  color: #333; /* Dark text color */
}

.carousel-image {
  max-height: 400px; /* Adjust height as needed */
  object-fit: cover; /* Ensure the image covers the area without distortion */
  width: 100%;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-color: rgba(0,0,0,0.5);
  border-radius: 50%;
}

/* Product Card Hover Animation */
.product-card {
  border-radius: 8px; /* Rounded corners */
  overflow: hidden; /* Hide overflow for rounded corners */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: flex;

}

.product-card:hover {
  transform: translateY(-10px); /* Slight lift effect */
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

/* Product Image Animation */
.product-image {
  position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: contain; /* Ensures the image maintains its aspect ratio */
    transform: translate(-50%, -50%);
}

.product-card:hover .product-image {
  opacity: 0.8;
}

/* Map Container Styling */
.map-container {
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.map-container iframe {
  border: 0;
  width: 100%;
  height: 100%;
  border-radius: 8px;
}
.card-title {
  font-size: 1.25rem; /* Adjust font size */
}
.card-text {
  font-size: 1rem; /* Adjust font size */
}

/* Optional: Add some padding and margin adjustments */
.mb-4 {
  margin-bottom: 1.5rem;
}

.text-dark {
  color: #333;
}
.card-body {
  padding: 1.25rem;
  background-color: #ffffff; /* White background */
  color: #000000; /* Black text */
}
h4 {
  color: #000000; /* Black text */
}
/* Add subtle hover effect on product image */
.product-image:hover {
  transform: scale(1.1);
  transition: transform 0.3s ease;
}
@media (max-width: 768px) {
  .map-container iframe {
    height: 250px;
  }
}

@media (min-width: 768px) {
  .map-container iframe {
    height: 300px;
  }
}

@media (min-width: 992px) {
  .map-container iframe {
    height: 450px;
  }
}

/* Address Styling */
.address {
  text-align: center;
}

.address h5 {
  font-size: 1.25rem;
}

.icon-section {
    margin-bottom: 20px;
  }
.icon-section i {
  transition: transform 0.3s ease-in-out;
}

.icon-section i:hover {
    transform: scale(1.2);
  }
  .icon-section i.text-primary {
    color: #007bff;
  }

  .icon-section i.text-success {
    color: #28a745;
  }

  .icon-section i.text-danger {
    color: #dc3545;
  }

  /* Adjust text styling */
  .text-muted {
    color: #6c757d !important;
  }

  h3 {
    font-size: 1.75rem; /* Adjust heading size */
  }

  p {
    font-size: 1rem; /* Adjust paragraph size */
  }
.address p {
  font-size: 1rem;
}

/* FAQ Section Styling */
.accordion-button {
  background-color: #f8f9fa;
  color: #000;
  border: 1px solid #dee2e6;
  border-radius: 0.375rem;
}

.accordion-button:not(.collapsed) {
  color: #000;
  background-color: #e9ecef;
}

.accordion-body {
  background-color: #ffffff;
}


.row {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.animate-fadeIn {
    animation: fadeIn 1.5s ease-in-out;
}
.half-screen-box {

  width: 50%;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .animate-slideInLeft {
    animation: slideInLeft 1s ease-in-out;
  }
  .animate-slideInRight {
    animation: slideInRight 1s ease-in-out;
  }
  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(-100%);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  @keyframes slideInRight {
    from {
      opacity: 0;
      transform: translateX(100%);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  @media (max-width: 768px) {
    .half-screen-box {
      width: 100%;
      margin-bottom: 20px;    }
      .container {
      flex-direction: column;
    }
    .icon-section i {
      margin: 0 1rem;
    }
  }
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
<script>
  function sendToWhatsApp(event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;

    var whatsappNumber = {{ $profile[0]->number }}; // Replace with your WhatsApp number
    var url = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=Halo, nama saya ${name}. Nomor saya ${phone}. Pesan saya: ${message}`;

    window.open(url, '_blank');
  }
</script>
@endsection