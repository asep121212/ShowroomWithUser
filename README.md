<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cara Installasi

### Prerequisites

-   Instal [Git](https://git-scm.com/)
-   Instal [Composer versi 2.7](https://getcomposer.org/)
-   Instal [PHP versi 8.2](https://www.php.net/) atau [Laragon](https://laragon.org/) atau [Xampp](https://www.apachefriends.org/download.html)

### Installasi

-   buka terminal/cmd/git-bash
-   lalu jalankan perintah berikut

```bash
git clone https://github.com/asepyadi466
```


```bash
composer install
```

```bash
cp .env.example .env
```

-   buat database dengan nama laravel_crm

-   konfigurasi file .env dibagian

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_crm
DB_USERNAME=root
DB_PASSWORD=
```

```bash
php artisan key:generate
```

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan serve
```

```bash
npm run dev
```

akses

```bash
localhost:8000
```
