<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Intrucciones de instalación


### Clonar repo

Asegúrate de que Docker esté corriendo y de preferencia no haya contenedores cargados e ingresa el siguiente comando:

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

### Agregr al .env

```DB_HOST=mysql
DB_USERNAME=sail
DB_PASSWORD=password
```
### Correr Sail y migraciones

```
./vendor/bin/sail up
./vendor/bin/sail artisan migrate

```


## Documentación Postman para realizar pruebas

### GET - Obtener CSRF
- **Método**: GET
- **Endpoint**: `http://localhost/sanctum/csrf-cookie`

### POST - Registrar usuario
- **Método**: POST
- **Endpoint**: `http://localhost/api/register`
- **Cuerpo de la solicitud**:
  ```json
  {
      "name": "santiago",
      "email": "santiago@gmail.com",
      "password": "123456789",
      "password_confirmation": "123456789"
  }
  ```

  ### POST - Iniciar sesión de usuario
- **Método**: POST
- **Endpoint**: `http://localhost/api/login`
- **Cuerpo de la solicitud**:
  ```json
  {
      "email": "santiago@gmail.com",
      "password": "123456789"
  }
  ```

### POST - Crear tarea
- **Método**: POST
- **Endpoint**: `http://localhost/api/tasks`
- **Autorización**:
  - **Tipo**: Bearer Token
  - **Token**: `2|PV3eDdD3BWAs0Be4hFP1yxvtewrWoC2PptiIp4cF93d14445`
- **Cuerpo de la solicitud**:
  ```json
  {
      "title": "Nueva tarea",
      "description": "Esta es una nueva tarea",
      "user_id": 1
  }
  ```

### GET - Obtener tareas
- **Método**: GET
- **Endpoint**: `http://localhost/api/tasks`
- **Autorización**:
  - **Tipo**: Bearer Token
  - **Token**: `2|PV3eDdD3BWAs0Be4hFP1yxvtewrWoC2PptiIp4cF93d14445`


### GET - Obtener tarea
- **Método**: GET
- **Endpoint**: `http://localhost/api/tasks/1`

### PUT - Actualizar tarea
- **Método**: PUT
- **Endpoint**: `http://localhost/api/tasks/1`
- **Autorización**:
  - **Tipo**: Bearer Token
  - **Token**: `2|PV3eDdD3BWAs0Be4hFP1yxvtewrWoC2PptiIp4cF93d14445`
- **Cuerpo de la solicitud**:
  ```json
  {
      "title": "Tarea actualizada",
      "description": "Esta es una tarea actualizada",
      "user_id": 1
  }
  ```

### DELETE - Eliminar tarea
- **Método**: DELETE
- **Endpoint**: `http://localhost/api/tasks/1`
- **Autorización**:
  - **Tipo**: Bearer Token
  - **Token**: `2|PV3eDdD3BWAs0Be4hFP1yxvtewrWoC2PptiIp4cF93d14445`


