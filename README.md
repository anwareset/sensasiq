# SENSASIQ - Modul Web QR Code Generator
Modul QR Code Generator berbasis Web dari SENSASIQ


## Contents
- [APA]
- [REQUIREMENTS](#requirements)
- [PINOUT](#pinout)
  - [PINOUT FINAL](#pinout-final)
  - [PINOUT FLASHING ESP-01](#pinout-flashing-esp-01)
  - [PINOUT AT COMMAND MODE ESP-01](#pinout-at-command-mode-esp-01)
- [FLASHING ESP8266 (Optional)](#flashing-esp8266-optional)
  - [FLASH ESP-01 WITH ESPTOOL](#flash-esp-01-with-esptool)  
- [INSTALLATION](#installation)
  - [Setting up Blynk](#setting-up-blynk)
  - [Setting up IFTTT](#setting-up-ifttt)
  - [Upload Code and Test](#upload-code-and-test)
- [TROUBLESHOOT](#troubleshoot)
  - [SET ESP-01 BAUD RATE TO 9600 VIA AT COMMAND (Recommended)](#set-esp-01-baud-rate-to-9600-via-at-command-recommended)

# APA ITU SENSASIQ?

SENSASIQ atau Solusi Absensi Cerdas Anti Curang Bebasis QR Code merupakan sebuah perangkat lunak untuk mengatasi berbagai hal dalam sistem absensi. Penggunaan QR Code dan berbagai metode terkomputerisasi dilakukan untuk merubah segala usaha absensi tradisional agar mencapai sebuah sistem absensi yang lebih baik.

## Tentang Repositori

Repositori ini adalah salah satu bagian dari repositori pengembangan SENSASIQ. Pada repositori ini, dikhususkan untuk mengembangkan manajemen QR Code Generator, dan API Server berbasis Web yang dibangun menggunakan PHP Web Framework CodeIgniter.


# REQUIREMENTS:

PHP versi 7.x atau lebih tinggi.
MariaDB atau MySQL.
Web Server seperti Apache atau NGINX

# INSTALLATION:

Clone atau Download dan extract atau taruh pada direktori web (htdocs atau /var/www/html/)
Buat sebuah database dengan nama 'sensasiq' tanpa tanda petik, kemudian import file sensasiq.sql
Sesuaikan password user DBMS dengan konfigurasi CodeIgniter