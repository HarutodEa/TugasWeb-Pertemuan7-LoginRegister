
# Tugas 7 - Sistem Login & Register PHP Native

Repository ini berisi Tugas Rutin 7 untuk mata kuliah Pemrograman Web. Aplikasi ini adalah sistem login dan registrasi sederhana yang dibangun menggunakan PHP Native dan `users.json` sebagai tempat penyimpanan data pengganti database.

---

## 🚀 Cara Memakai PHP

Bagi kamu yang baru belajar PHP, kode PHP tidak bisa langsung dijalankan dengan cara di-klik dua kali (double click) seperti file HTML biasa. PHP membutuhkan **Web Server** untuk memproses kodenya.

Berikut adalah panduan dasar untuk mulai menjalankan kode PHP di komputermu:

### 1. Persiapan Alat (Tools)

* **Web Server Lokal:** Unduh dan instal aplikasi **XAMPP** atau **Laragon**. Aplikasi ini menyediakan server Apache dan PHP di komputermu.
* **Code Editor:** Gunakan **Visual Studio Code (VS Code)** untuk menulis dan mengedit kode.

### 2. Dimana Menyimpan File PHP?

* Jika memakai **XAMPP**: Simpan folder proyekmu (misal folder `loginregister`) di dalam folder `C:\xampp\htdocs\`.
* Jika memakai **Laragon**: Simpan folder proyekmu di dalam folder `C:\laragon\www\`.

### 3. Cara Menjalankan File PHP

1. Buka aplikasi XAMPP/Laragon.
2. Klik tombol **Start** pada tulisan **Apache** (ini akan menyalakan web server).
3. Buka web browser (Chrome, Edge, Firefox, dll).
4. Ketik di kolom pencarian URL paling atas: `http://localhost/loginregister/` lalu tekan Enter.
5. Halaman web kamu akan otomatis terbuka!

### 4. Aturan Dasar Penulisan PHP

* Kode PHP **selalu** diawali dengan tag `<?php` dan ditutup dengan `?>`.
* Kamu bisa menulis kode PHP di dalam kerangka HTML.
* Setiap satu baris perintah/instruksi **wajib** diakhiri dengan titik koma `;`.
* Untuk menampilkan teks ke layar browser, gunakan perintah `echo`.
* Variabel (tempat menyimpan data) selalu diawali dengan tanda dolar `$`.

**Contoh Kode Sederhana:**

```php
<?php
  // Ini adalah variabel
  $nama = "Budi"; 
  
  // Ini cara menampilkan teks ke layar
  echo "Halo, selamat datang " . $nama . "!"; 
?>
```
