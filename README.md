# Todo managment API
Сервис для создания и редактирования задач


## Подготовка среды
Установите [Laravel](https://laravel.com/docs/12.x/installation#creating-a-laravel-project)

```bash
# MacOS/Linux
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```
или
```bash
# Windows
# Запускать как Администратор
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

Установите зависимости:
```bash
composer install
```

## Запуск приложения:
1. Продублируйте файл *.env.example* в корень проекта (Ctrl + C, Ctrl + V)
2. Переименуйте дубль в *.env*

Для старта приложения должен быть запущен [Docker](https://www.docker.com/)
```bash
docker compose up -d
```

<hr>

### (Дополнительно) Альтернативный способ
Можно работать с приложением из IDE, запустив в Docker только базу:
```bash
docker compose up mysql -d
```
и приложение через IDE:
```bash
php artisan serve
```
