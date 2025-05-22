@extends('layouts.app')

@section('title', 'Tentang Kami - Bengkel Mobil Beteng Betawi')

@section('content')
    <!-- About Hero -->
    <section class="hero-section" style="background-image: url('https://images.pexels.com/photos/4489734/pexels-photo-4489734.jpeg?auto=compress&cs=tinysrgb&w=1600');">
        <div class="container">
            <div class="hero-content text-white">
                <h1 class="display-4 fw-bold">Tentang Kami</h1>
                <p class="lead">Kenali lebih dekat tentang bengkel mobil terpercaya di Jakarta</p>
            </div>
        </div>
    </section>

    <!-- About Main -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Bengkel Mobil Beteng Betawi</h2>
                        <p class="lead">Solusi terpercaya untuk perawatan dan perbaikan kendaraan Anda sejak 2005</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="fw-bold mb-3">Sejarah Kami</h3>
                        <p>Bengkel Mobil Beteng Betawi didirikan pada tahun 2005 oleh Bapak Joko Santoso, seorang mekanik berpengalaman yang memiliki visi untuk memberikan layanan perbaikan mobil berkualitas dengan harga terjangkau kepada masyarakat Jakarta.</p>
                        <p>Berawal dari bengkel kecil dengan 3 mekanik, kini Bengkel Beteng Betawi telah berkembang menjadi bengkel terkemuka dengan 15 mekanik berpengalaman dan peralatan modern. Selama lebih dari 15 tahun melayani pelanggan, kami telah menangani ribuan kendaraan dan membangun reputasi sebagai bengkel mobil yang terpercaya di Jakarta.</p>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6 mb-4">
                            <img src="https://images.pexels.com/photos/3807329/pexels-photo-3807329.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Bengkel Mobil Beteng Betawi" class="img-fluid rounded shadow-sm">
                        </div>
                        <div class="col-md-6 mb-4">
                            <img src="https://images.pexels.com/photos/3822843/pexels-photo-3822843.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Bengkel Mobil Beteng Betawi" class="img-fluid rounded shadow-sm">
                        </div>
                    </div>

                    <div class="mb-5">
                        <h3 class="fw-bold mb-3">Visi & Misi</h3>
                        <div class="mb-4">
                            <h5 class="fw-bold">Visi</h5>
                            <p>Menjadi bengkel mobil terbaik dan terpercaya di Jakarta dengan standar layanan yang profesional dan berkualitas.</p>
                        </div>
                        <div>
                            <h5 class="fw-bold">Misi</h5>
                            <ul>
                                <li>Memberikan pelayanan terbaik dengan mekanik yang terampil dan berpengalaman.</li>
                                <li>Menggunakan peralatan dan teknologi modern untuk diagnosa dan perbaikan yang akurat.</li>
                                <li>Menyediakan suku cadang berkualitas dengan harga yang kompetitif.</li>
                                <li>Mengedepankan kejujuran dan transparansi dalam setiap pekerjaan.</li>
                                <li>Terus berinovasi dan meningkatkan layanan sesuai dengan perkembangan teknologi otomotif.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h3 class="fw-bold mb-3">Mengapa Memilih Kami</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="about-card card h-100 p-4">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-tools text-primary fa-3x"></i>
                                    </div>
                                    <h4 class="text-center mb-3">Mekanik Berpengalaman</h4>
                                    <p class="mb-0">Tim mekanik kami telah berpengalaman lebih dari 10 tahun dalam industri otomotif dan mendapatkan pelatihan rutin untuk mengikuti perkembangan teknologi terbaru.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="about-card card h-100 p-4">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-cogs text-primary fa-3x"></i>
                                    </div>
                                    <h4 class="text-center mb-3">Peralatan Modern</h4>
                                    <p class="mb-0">Bengkel kami dilengkapi dengan peralatan diagnostik dan perbaikan modern yang dapat menangani berbagai jenis dan merek kendaraan.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="about-card card h-100 p-4">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-shield-alt text-primary fa-3x"></i>
                                    </div>
                                    <h4 class="text-center mb-3">Garansi Pekerjaan</h4>
                                    <p class="mb-0">Kami memberikan garansi untuk setiap pekerjaan yang kami lakukan, memberikan ketenangan pikiran kepada pelanggan kami.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="about-card card h-100 p-4">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-hand-holding-usd text-primary fa-3x"></i>
                                    </div>
                                    <h4 class="text-center mb-3">Harga Transparan</h4>
                                    <p class="mb-0">Kami menawarkan harga yang transparan dan kompetitif tanpa biaya tersembunyi, sehingga Anda tahu persis berapa biaya yang akan dikeluarkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="fw-bold mb-4 text-center">Tim Kami</h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="team-member">
                                    <img src="https://images.pexels.com/photos/3831645/pexels-photo-3831645.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Joko Santoso" class="team-img">
                                    <h5 class="mb-1">Joko Santoso</h5>
                                    <p class="text-muted small">Pendiri & Kepala Mekanik</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="team-member">
                                    <img src="https://images.pexels.com/photos/3760809/pexels-photo-3760809.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Andi Pratama" class="team-img">
                                    <h5 class="mb-1">Andi Pratama</h5>
                                    <p class="text-muted small">Manajer Operasional</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="team-member">
                                    <img src="https://images.pexels.com/photos/2381069/pexels-photo-2381069.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Siti Nurhaliza" class="team-img">
                                    <h5 class="mb-1">Siti Nurhaliza</h5>
                                    <p class="text-muted small">Layanan Pelanggan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="fw-bold">Siap untuk mencoba layanan kami?</h2>
                    <p class="lead mb-0">Jadwalkan janji temu dengan mekanik kami hari ini dan dapatkan pengalaman servis mobil terbaik</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('appointments') }}" class="btn btn-danger btn-lg">Booking Sekarang</a>
                </div>
            </div>
        </div>
    </section>
@endsection