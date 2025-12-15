# Blackbox Testing - Laravel Welcome Page

Berikut adalah tabel pengujian blackbox untuk halaman utama aplikasi Laravel (Welcome Page).

| No | Pengujian | Test Case | Hasil yang Diharapkan | Hasil Pengujian | Kesimpulan |
|----|-----------|-----------|-----------------------|-----------------|------------|
| 1 | Akses Halaman Utama | Mengakses URL root (`/`) pada browser | Halaman dimuat dengan status kode 200 dan menampilkan judul "Laravel" serta teks "Let's get started" | Berhasil (Status 200, elemen tampil sesuai) | Valid |
| 2 | Link Dokumentasi | Mengklik link "Documentation" | Pengguna diarahkan ke halaman `https://laravel.com/docs` di tab baru | Berhasil (Redirect ke dokumentasi resmi) | Valid |
| 3 | Link Laracasts | Mengklik link "Laracasts" | Pengguna diarahkan ke halaman `https://laracasts.com` di tab baru | Berhasil (Redirect ke Laracasts) | Valid |
| 4 | Tombol Deploy | Mengklik tombol "Deploy now" | Pengguna diarahkan ke halaman `https://cloud.laravel.com` di tab baru | Berhasil (Redirect ke Laravel Cloud) | Valid |
| 5 | Responsivitas Mobile | Mengubah ukuran browser menjadi ukuran mobile (width < 64rem) | Layout berubah menjadi satu kolom (`flex-col`) dan elemen menyesuaikan lebar layar | Berhasil (Layout responsif) | Valid |
| 6 | Cek Fitur Autentikasi | Memeriksa keberadaan link "Log in" dan "Register" di pojok kanan atas | Link tidak muncul karena fitur autentikasi (Breeze/Jetstream) belum diinstall | Berhasil (Link tidak tampil) | Valid |
