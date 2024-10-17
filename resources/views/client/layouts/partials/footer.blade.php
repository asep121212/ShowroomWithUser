<footer class="d-flex align-items-center text-white"
    style="background-image: url('{{ asset('client/img/cars.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container py-5 fade-in" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 15px;">
        <div class="row text-center">
            <div class="col-12 mb-4">
                <h2 class="fw-bold">Soetta Motor Terbaik</h2>
                <p class="lead">Temukan mobil bekas berkualitas hanya di sini</p>
                <a href="#menu" class="btn btn-warning btn-lg mt-3 scale-up">Selengkapnya</a>
            </div>
            <!-- Location Section -->
            <div class="col-md-4 mb-4">
                <i class="bi bi-geo-alt-fill fs-3"></i>
                <h5 class="mt-2">Lokasi</h5>
                <div class="map-container" style="overflow:hidden; padding-top: 56.25%; position:relative;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.0879398535544!2d105.28797777362665!3d-5.403573453984603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dba998f87fcb%3A0x5901f0d7789d6a12!2sJl.%20Soekarno%20Hatta%2C%20Lampung!5e0!3m2!1sid!2sid!4v1726650711133!5m2!1sid!2sid"
                        width="100%" height="100%" style="position:absolute; top:0; left:0; border:0;" allowfullscreen
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <p class="mt-3 mb-0">{{ $profile[0]->address }}</p>
            </div>
            <!-- Operational Hours Section -->
            <div class="col-md-4 mb-4">
                <i class="bi bi-clock-fill fs-3"></i>
                <h5 class="mt-2">Jam Operasi</h5>
                <p class="mb-0">Mon - Sat: 10 AM - 10 PM</p>
                <p class="mb-0">Sun: Closed</p>
            </div>
            <!-- Contact Section -->
            <div class="col-md-4 mb-4">
                <i class="bi bi-telephone-fill fs-3"></i>
                <h5 class="mt-2">Hubungi Kami</h5>
                <p class="mb-0">Phone: {{ $profile[0]->number }}</p>
                <p class="mb-0">Email: {{ $profile[0]->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <hr class="border-white">
                <span>&copy; Nebein 2024. All Rights Reserved.</span>
            </div>
        </div>
    </div>
</footer>