# Laravel DevStagram

Clon de Instagram con Laravel 9, MySQL, Tailwind, JetStream

## 🚀 Quick start

### Levantar Docker e instalar jetstream

```bash
./vendor/bin/sail up
./vendor/bin/sail composer require laravel/jetstream
./vendor/bin/sail php artisan jetstream:install livewire   
```

### Compilar estaticos

```bash
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev     
```

### Link simbolico para las imagenes

```bash
./vendor/bin/sail php artisan storage:link 
```

### Run Migrations

```bash
./vendor/bin/sail php artisan migrate:fresh --seed
```

### Crear Posts con Tinker

```bash
./vendor/bin/sail artisan tinker
App\Models\Post::factory(200)->create();
```

#### Made with ❤️ by Leandro Arturi
