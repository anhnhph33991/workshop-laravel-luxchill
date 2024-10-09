## WORKSHOP LARAVEL

## API AUTH SANCTUM:

```
1. Mở file: config/debugbar.php:

- Thêm : 'except' => [
            'api*'
        ]

Mô Tả: ignored api routes

2.Mở File: .env

- Thêm: DEBUGBAR_ENABLED=false

Mô Tả: Tắt bỏ debugbar

Khuyên dùng: Bước 1

Tác dụng: Tránh 1 số lỗi conflict khi dùng api

```
