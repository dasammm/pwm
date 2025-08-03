# Prepaid Water Meter (PWM) - Ling Water Solution

## Apa itu PWM

Prepaid Water Meter (PWM) merupakan sebuah website yang dibuat menggunakan bahasa PHP dengan memanfaatkan framework CodeIgniter 4. Penggunaan framework CodeIgniter ini karena pembuatan akan lebih terstruktur, cepat, ringan, aman, dan mudah untuk dilakukan perawatan.

Website ini dibuat untuk melakukan pemantauan penggunaan air Perusahaan Daerah Air Minum (PDAM), yang telah terintegrasi dengan perangkat Internet Of Thing (IOT) yang sudah disambungkan ke pipa-pipa pelanggan.
Dalam website ini akan menampilkan :

- Detail Pelanggan PDAM
- Detail Masalah yang Terjadi
- Detail Wilayah yang Telah Menggunakan perangkat IOT

## Instalasi dan Operasional

Anda bisa melakukan instalasi PWM Website ini dengan melakukan cloning dengan cara membuka terminal yang digunakan, kemudian tuliskan `https://github.com/whywidodo/pwm-website.git`. Setelah itu simpan pada folder yang biasa digunakan

Untuk melakukan import data, pastikan Anda telah membuat database terlebih dahulu. Kemudian atur nama database pada file .env kemudian buka terminal dan tuliskan `php spark migrate`.
Sampai ditahap ini Anda sudah memiliki sebuah data didalam server SQL.

Untuk menjalankan PWM Website, jalankan perintah `php spark serve` pada terminal yang Anda gunakan.

## Informasi Tambahan

Untuk menjalankan PWM Website ini, dibutuhkan PHP version 7.3 atau lebih tinggi.

## Copyright

Website ini dibuat oleh [Wahyu Widodo](https://id.karyane.com).
