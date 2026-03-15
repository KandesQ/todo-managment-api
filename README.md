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

## Запуск приложения:
1. установите зависимости:
    ```bash
    composer install
    ```

2. Продублируйте файл *.env.example* в корень проекта (Ctrl + C, Ctrl + V)
3. Переименуйте дубль в *.env*

<br>

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

После поднятия базы, вручную запустите миграции:
```bash
php artisan migrate
```

и приложение через IDE:
```bash
php artisan serve
```
