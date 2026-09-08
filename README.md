# Jurnalku

Aplikasi personal blog / journaling sederhana berbasis Laravel.

## Identitas

- **Nama**: Dzakiya Hakima Adila
- **NIM**: 24/542103/SV/25003
- **Mata Kuliah**: Evolusi Perangkat Lunak

## Tech Stack

- PHP 8.2+
- Laravel 11
- SQLite
- Blade + CSS (tanpa build tool)
- PHPUnit (testing)

## Fitur

- Tulis, lihat, edit, dan hapus catatan jurnal
- Tambah mood/perasaan pada tiap catatan
- Daftar catatan terurut dari yang terbaru

## Instalasi

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

## Struktur Branch

```
main
 └── dev
      └── feature/journal-crud
```

- `main`: kode stabil, hanya menerima merge lewat Pull Request
- `dev`: branch integrasi fitur
- `feature/*`: branch kerja per fitur

## CI/CD

Setiap push dan pull request ke `main`/`dev` menjalankan GitHub Actions (`.github/workflows/ci.yml`):

1. **lint** — cek code style dengan Laravel Pint
2. **test** — migrasi database & menjalankan PHPUnit
