# Finesa app

Clonar el repositorio
```
git clone https://github.com/jotorres060/finesa-app-backend.git
```

Instalar las dependencias
```
composer install
```

Crear la siguiente base de datos (MariaDB)
```
finesa_app
```

Ejecutar migraciones y seeders
```
php artisan migrate --seed
```

Crear enlace simbólico (este paso es importante para poder subir las imágenes)
```
php artisan storage:link
```

Usuarios de prueba
```
email: jorge@example.com pass: torres
```

```
email: finesa@example.com pass: finapp
```
