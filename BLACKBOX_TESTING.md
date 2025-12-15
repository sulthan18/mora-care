# Blackbox Testing - Alur Pengguna (End-to-End)

Berikut adalah tabel pengujian blackbox untuk alur lengkap penggunaan aplikasi, mulai dari registrasi hingga logout.

| No | Pengujian | Test Case | Hasil yang Diharapkan | Hasil Pengujian | Kesimpulan |
|----|-----------|-----------|-----------------------|-----------------|------------|
| 1 | Registrasi Akun Baru | Memasukkan nama, email, password, dan konfirmasi password yang valid pada halaman `/register` lalu klik tombol "Register" | Akun berhasil dibuat, data tersimpan di database, dan pengguna diarahkan ke halaman Dashboard | Berhasil (User terdaftar dan redirect sukses) | Valid |
| 2 | Login (Valid) | Memasukkan email dan password yang baru saja didaftarkan pada halaman `/login` | Sistem memvalidasi kredensial dan mengarahkan pengguna ke halaman Dashboard | Berhasil (Login sukses, masuk dashboard) | Valid |
| 3 | Login (Invalid) | Memasukkan email yang benar tetapi password salah | Sistem menolak akses dan menampilkan pesan error "The provided credentials do not match our records." | Berhasil (Pesan error muncul, tidak login) | Valid |
| 4 | Akses Dashboard | Mengakses halaman `/dashboard` setelah login | Halaman Dashboard tampil dengan menyapa nama pengguna yang sedang login | Berhasil (Nama user tampil sesuai) | Valid |
| 5 | Membuat Laporan Baru | Mengklik menu "Buat Laporan", mengisi judul dan isi laporan, lalu klik "Simpan" | Laporan tersimpan di database, sistem menampilkan pesan sukses, dan pengguna diarahkan kembali ke daftar laporan | Berhasil (Data laporan tersimpan) | Valid |
| 6 | Validasi Form Laporan | Mencoba mengirim form laporan kosong | Sistem menolak input dan menampilkan pesan validasi "Field ini wajib diisi" pada input yang kosong | Berhasil (Validasi form berjalan) | Valid |
| 7 | Melihat Daftar Laporan | Mengakses halaman daftar laporan (Index) | Laporan yang baru saja dibuat muncul dalam tabel/list laporan | Berhasil (Laporan baru tampil di list) | Valid |
| 8 | Detail Laporan | Mengklik salah satu judul laporan dari daftar | Halaman detail terbuka menampilkan informasi lengkap laporan tersebut | Berhasil (Detail sesuai data input) | Valid |
| 9 | Edit Laporan | Mengubah isi laporan yang sudah ada dan menyimpannya | Perubahan tersimpan di database dan tampilan laporan terupdate | Berhasil (Update data sukses) | Valid |
| 10 | Hapus Laporan | Menekan tombol "Hapus" pada salah satu laporan dan mengonfirmasi alert konfirmasi | Laporan terhapus dari database dan hilang dari daftar tampilan | Berhasil (Data terhapus) | Valid |
| 11 | Logout | Mengklik tombol/link "Logout" pada navigasi | Sesi pengguna berakhir dan diarahkan kembali ke halaman depan atau login | Berhasil (Sesi destroyed, redirect ke home) | Valid |
