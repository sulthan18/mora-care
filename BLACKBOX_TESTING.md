# Blackbox Testing - Alur Pengguna (End-to-End)

Berikut adalah tabel pengujian blackbox untuk alur lengkap penggunaan aplikasi oleh **Pengguna Biasa**, mulai dari registrasi hingga logout.

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

<br>

# Blackbox Testing - Alur Admin (End-to-End)

Berikut adalah tabel pengujian blackbox untuk alur lengkap penggunaan aplikasi oleh **Administrator**, mulai dari login hingga monitoring dan logout.

| No | Pengujian | Test Case | Hasil yang Diharapkan | Hasil Pengujian | Kesimpulan |
|----|-----------|-----------|-----------------------|-----------------|------------|
| 1 | Login Admin | Memasukkan email dan password akun dengan role Admin pada halaman `/login` | Sistem mendeteksi role Admin dan mengarahkan ke Dashboard khusus Admin | Berhasil (Login sukses, masuk dashboard admin) | Valid |
| 2 | Dashboard & Monitoring | Mengakses halaman Dashboard Admin | Menampilkan statistik ringkasan (Total Laporan, Laporan Pending, Selesai) dan grafik monitoring | Berhasil (Statistik & grafik tampil) | Valid |
| 3 | Melihat Semua Laporan | Mengakses menu "Kelola Laporan" | Menampilkan daftar seluruh laporan dari semua pengguna dengan filter status | Berhasil (Semua laporan tampil) | Valid |
| 4 | Cek Detail Laporan Masuk | Mengklik salah satu laporan berstatus "Pending" | Halaman detail menampilkan isi laporan, bukti foto, dan identitas pelapor | Berhasil (Detail laporan tampil lengkap) | Valid |
| 5 | Verifikasi/Ubah Status (Proses) | Mengubah status laporan dari "Pending" menjadi "Sedang Diproses" | Status laporan terupdate di database dan notifikasi terkirim ke pelapor | Berhasil (Status berubah jadi Proses) | Valid |
| 6 | Menolak Laporan (Opsional) | Mengubah status laporan menjadi "Ditolak" dengan menyertakan alasan penolakan | Status terupdate menjadi Ditolak dan alasan tersimpan | Berhasil (Laporan ditolak dengan alasan) | Valid |
| 7 | Menyelesaikan Laporan | Mengubah status laporan dari "Sedang Diproses" menjadi "Selesai" dan menambahkan tanggapan/balasan | Laporan ditandai selesai, tanggapan admin tersimpan, dan status final terupdate | Berhasil (Status Done, tanggapan tersimpan) | Valid |
| 8 | Hapus Laporan (Admin) | Menghapus laporan yang melanggar aturan dari sistem | Data laporan dihapus permanen dari sistem | Berhasil (Laporan terhapus) | Valid |
| 9 | Kelola Pengguna (Monitoring) | Mengakses menu "Kelola Pengguna" untuk melihat daftar user terdaftar | Menampilkan daftar pengguna beserta status akun (Aktif/Banned) | Berhasil (List user tampil) | Valid |
| 10 | Logout Admin | Mengklik tombol "Logout" pada dashboard admin | Sesi admin berakhir dan diarahkan kembali ke halaman login | Berhasil (Sesi destroyed, redirect login) | Valid |
