# 🛒 Malkoni Proyecto - Sistema de Pedidos Online

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
    <img src="https://img.shields.io/badge/TailwindCSS-4.0-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
    <img src="https://img.shields.io/badge/Vite-7.0-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
</p>

## 📖 Descripción del Proyecto

**Malkoni Proyecto** es una aplicación web moderna desarrollada para **Malkoni Hermanos**, diseñada para gestionar un sistema integral de pedidos online. La plataforma permite a empresas clientes realizar cotizaciones, gestionar productos y servicios, y mantener un flujo organizado de pedidos.

### 🎯 Características Principales

- **Sistema de Cotizaciones**: Generación y gestión de cotizaciones para empresas clientes
- **Catálogo de Productos**: Gestión completa de productos con categorías, precios y promociones
- **Gestión de Empresas**: Administración de empresas clientes y sus datos
- **Sistema de Roles**: Control de acceso basado en roles y permisos
- **Historial de Cambios**: Seguimiento completo de modificaciones en cotizaciones
- **Interfaz Moderna**: UI/UX desarrollada con Tailwind CSS 4.0

## 🏗️ Arquitectura del Sistema

### Stack Tecnológico
- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templates + Tailwind CSS 4.0  
- **Build Tool**: Vite 7.0
- **Base de Datos**: MySQL/PostgreSQL/SQLite
- **Testing**: PHPUnit 11.5.3
- **Package Manager**: Composer + NPM

### Estructura de Base de Datos

El sistema cuenta con **17 tablas** principales organizadas en los siguientes módulos:

#### 👥 Gestión de Usuarios y Roles
- `roles` - Definición de roles del sistema
- `personas` - Datos personales de usuarios  
- `empleados` - Personal de Malkoni Hermanos

#### 🏢 Gestión de Empresas y Servicios
- `empresas` - Empresas clientes
- `rubros` / `subrubros` - Clasificación de servicios
- `servicios` - Servicios ofrecidos
- `estados` - Estados de procesos

#### 📦 Catálogo de Productos  
- `grupos` - Agrupación de productos
- `categorias` - Categorías de productos
- `subdivisions` - Subdivisiones de servicios
- `productos` - Catálogo principal de productos

#### 💰 Sistema de Cotizaciones
- `cotizaciones` - Cotizaciones generadas
- `items` - Items individuales de cotizaciones  
- `cambios` - Historial de modificaciones

#### 👤 Autenticación y Sesiones
- `users` - Usuarios del sistema
- `sessions` - Sesiones de usuario

## 🚀 Instalación y Configuración

### ✅ Estado Actual del Proyecto
El proyecto está **completamente configurado y funcionando**. Todas las dependencias están instaladas y la base de datos está creada con datos de prueba.

### Requisitos Previos
- PHP 8.2 o superior ✅ **(Instalado: PHP 8.2.12)**
- Composer ✅ **(Instalado: Composer 2.8.12)**
- Node.js y NPM ✅ **(Instalado: Node.js v22.12.0, npm v10.9.0)**
- Base de datos SQLite ✅ **(Configurado y funcionando)**

### Estado de Instalación Actual

**✅ Dependencias instaladas:**
- Dependencias de PHP instaladas con `composer install`
- Dependencias de Node.js instaladas con `npm install`

**✅ Configuración completada:**
- Archivo `.env` creado y configurado
- Clave de aplicación generada (`APP_KEY`)
- Assets compilados con `npm run build`

**✅ Base de datos configurada:**
- Base de datos SQLite creada en `database/database.sqlite`
- 17 migraciones ejecutadas exitosamente
- Usuario de prueba creado (email: test@example.com)

**✅ Servidor funcionando:**
- Servidor Laravel disponible en http://127.0.0.1:8000

### Instalación desde Cero (Solo si es necesario)

```bash
# Clonar el repositorio
git clone https://github.com/ConradoPerez/MalkoniProyecto.git
cd MalkoniProyecto

# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install

# Configurar variables de entorno
Copy-Item .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Crear base de datos SQLite y ejecutar migraciones
php artisan migrate

# Poblar con datos de prueba
php artisan db:seed

# Construir assets
npm run build

# Iniciar servidor
php artisan serve
```

### Desarrollo Local

Para iniciar el entorno de desarrollo completo:

```bash
# Opción 1: Comando único (inicia servidor, queue, logs y vite)
composer run dev

# Opción 2: Comandos individuales
php artisan serve          # Servidor web (puerto 8000)
npm run dev                # Vite dev server
php artisan queue:work     # Procesador de colas
php artisan pail           # Logs en tiempo real
```

## 📁 Estructura del Proyecto

```
MalkoniProyecto/
├── app/
│   ├── Http/Controllers/   # Controladores
│   ├── Models/            # Modelos Eloquent  
│   └── Providers/         # Service Providers
├── database/
│   ├── migrations/        # 15 migraciones del sistema
│   ├── seeders/          # Seeders de datos
│   └── factories/        # Model Factories
├── resources/
│   ├── views/            # Plantillas Blade
│   ├── css/              # Estilos (Tailwind CSS)
│   └── js/               # JavaScript
├── routes/
│   ├── web.php           # Rutas web
│   └── console.php       # Comandos Artisan
└── public/               # Assets públicos
```

## 🔧 Comandos Útiles

### Desarrollo
```bash
# Testing
php artisan test
composer run test

# Limpiar cache
php artisan optimize:clear

# Ver rutas
php artisan route:list

# Tinker (REPL)
php artisan tinker
```

### Base de Datos
```bash
# Estado de migraciones
php artisan migrate:status

# Rollback
php artisan migrate:rollback

# Refresh con seeders
php artisan migrate:refresh --seed
```

## 🗄️ Modelo de Datos

### Relaciones Principales
- **Productos** → **Categorías**: Cada producto pertenece a una categoría
- **Empleados** → **Personas** → **Roles**: Sistema de permisos jerárquico
- **Cotizaciones** → **Empresas**: Las cotizaciones se asocian a empresas clientes
- **Items** → **Productos** + **Cotizaciones**: Items individuales dentro de cotizaciones

### Flujo de Cotizaciones
1. **Empresa** solicita cotización
2. **Empleado** crea cotización con múltiples **Items**
3. Cada **Item** referencia un **Producto** específico
4. **Cambios** se registran automáticamente
5. **Estados** controlan el flujo de aprobación

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Tests específicos
php artisan test --filter=ExampleTest

# Coverage (si está configurado)
php artisan test --coverage
```

## 🚀 Despliegue

### Producción
```bash
# Optimizaciones
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Assets
npm run build
```

## 📚 Documentación Adicional

- 📋 [Manual de Instrucciones del Agente](AGENT_INSTRUCTIONS.md)
- 🔗 [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- 🎨 [Tailwind CSS Docs](https://tailwindcss.com/docs)

## 👥 Contribución

Para contribuir al proyecto:
1. Fork el repositorio
2. Crea una rama feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

## 📞 Contacto

**Malkoni Hermanos** - Sistema de Pedidos Online  
Desarrollado con ❤️ usando Laravel 12

---

## 📊 Estado del Proyecto

**✅ Proyecto completamente configurado y funcionando**

- **Servidor**: http://127.0.0.1:8000 (Activo)
- **Base de datos**: SQLite con 17 tablas creadas
- **Usuario de prueba**: test@example.com
- **Entorno**: PHP 8.2.12, Composer 2.8.12, Node.js v22.12.0

*Última actualización: 28 de Octubre, 2025*
