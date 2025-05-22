@extends('layouts.app')

@section('title', 'Booking Berhasil - Bengkel Mobil Beteng Betawi')

@section('content')
    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success fa-5x"></i>
                        </div>
                        <h1 class="h2 fw-bold mb-4">Booking Berhasil!</h1>
                        <p class="lead mb-4">Terima kasih telah memilih Bengkel Mobil Beteng Betawi. Booking Anda telah kami terima dan sedang dalam proses konfirmasi.</p>
                        <p class="mb-4">Tim kami akan menghubungi Anda melalui email atau telepon dalam waktu 24 jam untuk mengkonfirmasi janji temu Anda. Silakan periksa email Anda secara berkala.</p>
                        
                        <div class="alert alert-info" role="alert">
                            <h5 class="alert-heading fw-bold">Catatan Penting</h5>
                            <p class="mb-0">Jika Anda memiliki pertanyaan lebih lanjut atau perlu mengubah jadwal, silakan hubungi kami di (021) 1234-5678 atau kirim email ke info@bengkelbetengbetawi.com</p>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary me-2">Kembali ke Beranda</a>
                            <a href="{{ route('services') }}" class="btn btn-outline-primary">Lihat Layanan Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection