# TODO Laravel API APP

## 1. Разворачивание проекта
### Клонирование проекта
> git clone git@github.com:NaggaDIM/todo-laravel.git && cd todo-laravel

### Установка зависимостей
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs

### Копирование конфигурационного файла
> cp .env.example .env

### Запуск сервиса
> ./vendor/bin/sail up -d

### Генерация ключа Laravel
> ./vendor/bin/sail artisan key:generate

### Применение миграций
> ./vendor/bin/sail artisan migrate

### Кэширование конфигурации и списка маршрутов
> ./vendor/bin/sail artisan optimize

### Добавление 20-ти тестовых задач (опционально)
> ./vendor/bin/sail artisan db:seed --seeder=TaskSeeder

Сайт будет доступен по адресу [http://127.0.0.1:8090](http://127.0.0.1:8090)

## 2. Доступные маршруты

### Список задач
    GET|HEAD /api/tasks
    
    Параметры:
    * all - Логический (Необязательно) - При передачи истины отобразятся все задачи, иначе только невыполненые

    Ответ: Список задач

    Пример ответа:
    [
        {
            "id": 1,
            "status": "NEW",
            "description": "Fugiat architecto numquam ab odio velit et. Repudiandae enim iusto quo eius perspiciatis assumenda. Quisquam et nihil vel repellat dolorem voluptatem autem. Ipsa earum eum ex pariatur nam eaque sunt. Rerum est placeat quasi enim. Reiciendis aut nesciunt porro ducimus distinctio. Accusamus numquam minus vitae nemo doloribus minima. Eligendi iusto cupiditate eos aut. Doloribus cupiditate nulla non. Omnis aperiam in cumque et consectetur enim. Facere veritatis et recusandae atque. Est quae corporis excepturi eos laboriosam qui cupiditate et. Voluptas est et dolor et saepe. Et accusamus velit voluptas fugiat doloremque vero. Itaque qui doloremque sit quia. Aut fuga excepturi ducimus est magnam rem itaque. Dicta voluptatibus nobis omnis sit. Qui deleniti velit eum optio nulla doloremque suscipit. Quia occaecati ipsam nulla id."
        }
    ]

### Просмотр задачи
    GET|HEAD /api/tasks/{id}

    Ответ: Задача

    Пример ответа:
    {
        "id": 1,
        "status": "NEW",
        "description": "Fugiat architecto numquam ab odio velit et. Repudiandae enim iusto quo eius perspiciatis assumenda. Quisquam et nihil vel repellat dolorem voluptatem autem. Ipsa earum eum ex pariatur nam eaque sunt. Rerum est placeat quasi enim. Reiciendis aut nesciunt porro ducimus distinctio. Accusamus numquam minus vitae nemo doloribus minima. Eligendi iusto cupiditate eos aut. Doloribus cupiditate nulla non. Omnis aperiam in cumque et consectetur enim. Facere veritatis et recusandae atque. Est quae corporis excepturi eos laboriosam qui cupiditate et. Voluptas est et dolor et saepe. Et accusamus velit voluptas fugiat doloremque vero. Itaque qui doloremque sit quia. Aut fuga excepturi ducimus est magnam rem itaque. Dicta voluptatibus nobis omnis sit. Qui deleniti velit eum optio nulla doloremque suscipit. Quia occaecati ipsam nulla id."
    }

### Создание задачи
    POST /api/tasks

    Параметры:
    * description - обязательный, строковы, максимум 1000 символов

    Ответ: Задача

    Пример ответа:
    {
        "id": 1,
        "status": "NEW",
        "description": "Fugiat architecto numquam ab odio velit et. Repudiandae enim iusto quo eius perspiciatis assumenda. Quisquam et nihil vel repellat dolorem voluptatem autem. Ipsa earum eum ex pariatur nam eaque sunt. Rerum est placeat quasi enim. Reiciendis aut nesciunt porro ducimus distinctio. Accusamus numquam minus vitae nemo doloribus minima. Eligendi iusto cupiditate eos aut. Doloribus cupiditate nulla non. Omnis aperiam in cumque et consectetur enim. Facere veritatis et recusandae atque. Est quae corporis excepturi eos laboriosam qui cupiditate et. Voluptas est et dolor et saepe. Et accusamus velit voluptas fugiat doloremque vero. Itaque qui doloremque sit quia. Aut fuga excepturi ducimus est magnam rem itaque. Dicta voluptatibus nobis omnis sit. Qui deleniti velit eum optio nulla doloremque suscipit. Quia occaecati ipsam nulla id."
    }

### Редактирование задачи
    PUT|PATCH /api/tasks/{id}

    Параметры:
    * description - обязательный, строковы, максимум 1000 символов

    Ответ: Задача

    Пример ответа:
    {
        "id": 1,
        "status": "NEW",
        "description": "Fugiat architecto numquam ab odio velit et. Repudiandae enim iusto quo eius perspiciatis assumenda. Quisquam et nihil vel repellat dolorem voluptatem autem. Ipsa earum eum ex pariatur nam eaque sunt. Rerum est placeat quasi enim. Reiciendis aut nesciunt porro ducimus distinctio. Accusamus numquam minus vitae nemo doloribus minima. Eligendi iusto cupiditate eos aut. Doloribus cupiditate nulla non. Omnis aperiam in cumque et consectetur enim. Facere veritatis et recusandae atque. Est quae corporis excepturi eos laboriosam qui cupiditate et. Voluptas est et dolor et saepe. Et accusamus velit voluptas fugiat doloremque vero. Itaque qui doloremque sit quia. Aut fuga excepturi ducimus est magnam rem itaque. Dicta voluptatibus nobis omnis sit. Qui deleniti velit eum optio nulla doloremque suscipit. Quia occaecati ipsam nulla id."
    }

### Пометить задачу выполненной
    PUT|PATCH /api/tasks/{id}/done

    Ответ: Задача

    Пример ответа:
    {
        "id": 1,
        "status": "DONE",
        "description": "Fugiat architecto numquam ab odio velit et. Repudiandae enim iusto quo eius perspiciatis assumenda. Quisquam et nihil vel repellat dolorem voluptatem autem. Ipsa earum eum ex pariatur nam eaque sunt. Rerum est placeat quasi enim. Reiciendis aut nesciunt porro ducimus distinctio. Accusamus numquam minus vitae nemo doloribus minima. Eligendi iusto cupiditate eos aut. Doloribus cupiditate nulla non. Omnis aperiam in cumque et consectetur enim. Facere veritatis et recusandae atque. Est quae corporis excepturi eos laboriosam qui cupiditate et. Voluptas est et dolor et saepe. Et accusamus velit voluptas fugiat doloremque vero. Itaque qui doloremque sit quia. Aut fuga excepturi ducimus est magnam rem itaque. Dicta voluptatibus nobis omnis sit. Qui deleniti velit eum optio nulla doloremque suscipit. Quia occaecati ipsam nulla id."
    }

### Удаление задачи
    DELETE /api/tasks/{id}

    Ответ: Задача

    Пример ответа:
    {
        "id": 1,
        "status": "DONE",
        "description": "Fugiat architecto numquam ab odio velit et. Repudiandae enim iusto quo eius perspiciatis assumenda. Quisquam et nihil vel repellat dolorem voluptatem autem. Ipsa earum eum ex pariatur nam eaque sunt. Rerum est placeat quasi enim. Reiciendis aut nesciunt porro ducimus distinctio. Accusamus numquam minus vitae nemo doloribus minima. Eligendi iusto cupiditate eos aut. Doloribus cupiditate nulla non. Omnis aperiam in cumque et consectetur enim. Facere veritatis et recusandae atque. Est quae corporis excepturi eos laboriosam qui cupiditate et. Voluptas est et dolor et saepe. Et accusamus velit voluptas fugiat doloremque vero. Itaque qui doloremque sit quia. Aut fuga excepturi ducimus est magnam rem itaque. Dicta voluptatibus nobis omnis sit. Qui deleniti velit eum optio nulla doloremque suscipit. Quia occaecati ipsam nulla id."
    }
