# 🔧 Guía de Instalación - Dependencias para Malkoni Proyecto

## 📋 Estado Actual de tu Sistema

✅ **Node.js**: v22.12.0 - INSTALADO  
✅ **NPM**: v10.9.0 - INSTALADO  
❌ **PHP**: NO INSTALADO  
❌ **Composer**: NO INSTALADO  

## 🚀 Pasos de Instalación Requeridos

### 1. Instalar PHP 8.2+

#### Opción A: Usar XAMPP (Recomendado para desarrollo)
1. Descargar XAMPP desde: https://www.apachefriends.org/download.html
2. Instalar la versión que incluye PHP 8.2+
3. Agregar PHP al PATH del sistema:
   - Abrir "Variables de entorno del sistema"
   - Editar la variable PATH
   - Agregar: `C:\xampp\php` (o la ruta donde instalaste XAMPP)

#### Opción B: PHP Standalone
1. Descargar PHP desde: https://windows.php.net/download/
2. Descomprimir en `C:\php`
3. Copiar `php.ini-development` como `php.ini`
4. Agregar `C:\php` al PATH del sistema

### 2. Instalar Composer

1. Descargar Composer desde: https://getcomposer.org/download/
2. Ejecutar el instalador de Windows
3. El instalador debería detectar PHP automáticamente
4. Reiniciar PowerShell/CMD después de la instalación

### 3. Verificar Instalación

Después de instalar, ejecutar estos comandos en PowerShell:

```powershell
php --version      # Debe mostrar PHP 8.2+
composer --version # Debe mostrar Composer 2.x
node --version     # Ya tienes: v22.12.0
npm --version      # Ya tienes: v10.9.0
```

## 🎯 Configuración del Proyecto (Después de instalar PHP/Composer)

### Paso 1: Instalar dependencias de PHP
```powershell
cd "c:\Users\Santi\Desktop\Malkoni\MalkoniProyecto"
composer install
```

### Paso 2: Instalar dependencias de Node.js
```powershell
npm install
```

### Paso 3: Configurar entorno
```powershell
# Copiar archivo de configuración
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### Paso 4: Configurar base de datos

Edita el archivo `.env` y configura la base de datos:

```env
# Para SQLite (más fácil para desarrollo)
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# O para MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=malkoni_proyecto
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### Paso 5: Ejecutar migraciones
```powershell
# Si usas SQLite, crear el archivo primero
New-Item -Path "database/database.sqlite" -ItemType File -Force

# Ejecutar migraciones
php artisan migrate
```

### Paso 6: Construir assets
```powershell
npm run build
```

### Paso 7: Iniciar servidor de desarrollo
```powershell
# Opción 1: Todo en uno (recomendado)
composer run dev

# Opción 2: Solo el servidor web
php artisan serve
```

## 🔍 Solución de Problemas Comunes

### Error: "composer no se reconoce"
- Reiniciar PowerShell después de instalar Composer
- Verificar que Composer esté en el PATH del sistema

### Error: "php no se reconoce"  
- Agregar la carpeta de PHP al PATH del sistema
- Reiniciar PowerShell

### Error de extensiones PHP
Si obtienes errores sobre extensiones faltantes, edita `php.ini` y descomenta:
```ini
extension=openssl
extension=pdo_mysql
extension=pdo_sqlite
extension=mbstring
extension=curl
```

### Error de permisos en storage/
```powershell
# En el directorio del proyecto
mkdir storage\logs -Force
mkdir storage\framework\cache\data -Force
mkdir storage\framework\sessions -Force
mkdir storage\framework\views -Force
```

## 📞 Próximos Pasos

Una vez completada la instalación:

1. **Verificar funcionamiento**: Visita `http://localhost:8000`
2. **Revisar logs**: `storage/logs/laravel.log`  
3. **Ejecutar tests**: `php artisan test`
4. **Consultar documentación**: Ver `README.md` y `AGENT_INSTRUCTIONS.md`

## 🆘 Si Necesitas Ayuda

Si encuentras problemas durante la instalación:
1. Verifica que todas las URLs de descarga estén actualizadas
2. Asegúrate de reiniciar PowerShell después de cada instalación
3. Verifica las variables de entorno del sistema
4. Consulta los logs de error específicos

---

**Nota**: Esta guía está optimizada para Windows con PowerShell. Los comandos pueden variar ligeramente en otros sistemas operativos.