# Manual de Instrucciones para el Agente - Proyecto Malkoni Hermanos

## 📋 Información General del Proyecto

### Descripción
**Malkoni Proyecto** es una aplicación web de pedidos online desarrollada con Laravel 12 y Tailwind CSS. El proyecto está diseñado para manejar un sistema de pedidos para una empresa familiar (Malkoni Hermanos), incluyendo gestión de productos, cotizaciones, empleados y empresas clientes.

### Stack Tecnológico
- **Backend**: Laravel 12 (PHP ^8.2)
- **Frontend**: Blade Templates + Tailwind CSS 4.0
- **Build Tool**: Vite 7
- **Base de Datos**: MySQL/SQLite (configurable)
- **Testing**: PHPUnit 11.5.3

---

## 🏗️ Estructura de Base de Datos

### ✅ Estado Actual del Proyecto
**El proyecto está completamente configurado y funcionando:**
- Todas las dependencias instaladas (PHP, Composer, Node.js, npm)
- Base de datos SQLite creada y migrada
- 17 tablas creadas exitosamente
- Usuario de prueba disponible (test@example.com)
- Servidor corriendo en http://127.0.0.1:8000

### Tablas Implementadas (17 en total)
1. **roles** - Sistema de permisos y roles de usuario
2. **rubros** - Clasificación principal de servicios/productos
3. **subrubros** - Subclasificación de rubros
4. **estados** - Estados de pedidos/cotizaciones
5. **personas** - Datos personales de usuarios
6. **empresas** - Empresas clientes
7. **empleados** - Personal de Malkoni
8. **servicios** - Servicios ofrecidos
9. **grupos** - Agrupación de productos/servicios
10. **subdivisions** - Subdivisiones de servicios
11. **categorias** - Categorías de productos
12. **productos** - Catálogo de productos
13. **cotizaciones** - Cotizaciones generadas
14. **cambios** - Historial de cambios de cotizaciones
15. **items** - Items individuales de cotizaciones
16. **users** - Usuarios del sistema (con autenticación)
17. **sessions** - Manejo de sesiones de usuario

### Relaciones Importantes
- Productos → Categorías
- Empleados → Personas → Roles
- Cotizaciones → Empresas
- Items → Productos + Cotizaciones

---

## 🔧 Protocolo de Trabajo del Agente

### 1. Antes de Cualquier Modificación
```bash
# Siempre verificar el estado del proyecto
php artisan migrate:status
composer install --no-dev
npm install
```

### 2. Al Crear/Modificar Migraciones
- **NUNCA** modifiques migraciones ya ejecutadas
- Crea nuevas migraciones para cambios: `php artisan make:migration nombre_descriptivo`
- Verifica relaciones de clave foránea antes de crear
- Usa nombres descriptivos y comentarios en las migraciones

### 3. Al Trabajar con Modelos
- Ubicación: `app/Models/`
- Siempre definir `$fillable` o `$guarded`
- Definir relaciones Eloquent correctamente
- Usar nombres en singular para modelos (Producto, Empresa, etc.)

### 4. Al Crear Controladores
- Ubicación: `app/Http/Controllers/`
- Seguir convención RESTful: index, create, store, show, edit, update, destroy
- Validar datos de entrada siempre
- Usar Form Requests para validaciones complejas

### 5. Al Trabajar con Vistas
- Ubicación: `resources/views/`
- Usar Blade templates
- Implementar componentes reutilizables
- Seguir convenciones de Tailwind CSS

### 6. Al Modificar Rutas
- Web routes: `routes/web.php`
- API routes: `routes/api.php` (si es necesario)
- Agrupar rutas relacionadas
- Usar nombres descriptivos para las rutas

---

## 🚀 Comandos Esenciales

### Estado Actual del Entorno de Desarrollo
**✅ Todo está configurado y funcionando:**

```bash
# El proyecto ya tiene:
✅ Dependencias instaladas (composer install, npm install)
✅ Entorno configurado (.env creado, APP_KEY generada)
✅ Base de datos creada y migrada (17 tablas)
✅ Datos de prueba cargados (usuario test@example.com)
✅ Assets compilados (npm run build ejecutado)
✅ Servidor funcionando (http://127.0.0.1:8000)

# Para iniciar desarrollo (si el servidor no está corriendo):
php artisan serve  # Servidor web en puerto 8000
npm run dev       # Vite dev server (si necesitas cambios de assets)
```

### Comandos de Desarrollo
```bash
# Crear componentes
php artisan make:model NombreModelo -mcr
php artisan make:controller NombreController --resource
php artisan make:migration create_tabla_name --create=tabla_name

# Testing
php artisan test
composer run test

# Limpiar cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## 📋 Reglas de Código

### 1. Convenciones de Nomenclatura
- **Modelos**: PascalCase singular (Usuario, Producto)
- **Controladores**: PascalCase + "Controller" (ProductoController)
- **Migraciones**: snake_case descriptivo (create_productos_table)
- **Variables**: camelCase ($nombreUsuario)
- **Métodos**: camelCase (obtenerProductos())

### 2. Estructura de Archivos
```
app/
├── Http/Controllers/     # Controladores
├── Models/              # Modelos Eloquent
├── Services/            # Lógica de negocio
├── Requests/            # Form Requests
└── Providers/           # Service Providers

resources/
├── views/
│   ├── layouts/         # Layouts principales
│   ├── components/      # Componentes Blade
│   └── pages/          # Páginas específicas
├── css/                # Estilos CSS
└── js/                 # JavaScript

database/
├── migrations/         # Migraciones de DB
├── seeders/           # Seeders
└── factories/         # Model Factories
```

### 3. Seguridad
- Siempre validar inputs del usuario
- Usar middleware de autenticación cuando corresponda
- Implementar CSRF protection
- Sanitizar datos antes de mostrar en vistas

---

## 🔍 Debugging y Troubleshooting

### Problemas Comunes
1. **Error de migraciones**: Verificar orden de ejecución y dependencias
2. **Assets no cargan**: Ejecutar `npm run build` o verificar Vite
3. **Error 500**: Revisar logs en `storage/logs/laravel.log`
4. **Composer issues**: Ejecutar `composer dump-autoload`

### Logs Importantes
- Laravel: `storage/logs/laravel.log`
- Web Server: Logs del servidor web
- Vite: Console del navegador para assets

---

## ✅ Estado Actual del Proyecto (Octubre 2025)

- [x] **Todas las migraciones ejecutan correctamente** - 17 tablas creadas
- [x] **Dependencias instaladas** - PHP, Composer, Node.js, npm funcionando
- [x] **Código sigue convenciones de Laravel** - Estructura estándar implementada
- [x] **Assets construidos correctamente con Vite** - Build exitoso completado
- [x] **Base de datos configurada** - SQLite con datos de prueba
- [x] **Servidor funcionando** - Laravel server corriendo en puerto 8000
- [x] **Documentación actualizada** - README y AGENT_INSTRUCTIONS actualizados
- [x] **Archivo .env configurado** - Todas las variables necesarias establecidas

## 📝 Próximos Pasos para Desarrollo

- [ ] Implementar controladores para cada módulo
- [ ] Crear vistas con Blade templates
- [ ] Desarrollar sistema de autenticación
- [ ] Implementar API REST si es necesario
- [ ] Añadir tests unitarios y de feature
- [ ] Configurar sistema de roles y permisos

---

## 📞 Contacto y Recursos

### Documentación de Referencia
- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Vite Documentation](https://vitejs.dev/guide/)

### Comandos de Ayuda
```bash
php artisan list           # Lista todos los comandos disponibles
php artisan help comando   # Ayuda específica para un comando
php artisan route:list     # Lista todas las rutas definidas
php artisan tinker        # REPL de Laravel para testing rápido
```

---

## 🎯 Información de Acceso Actual

### Servidor de Desarrollo
- **URL**: http://127.0.0.1:8000
- **Estado**: ✅ Activo y funcionando

### Base de Datos
- **Tipo**: SQLite
- **Archivo**: `database/database.sqlite`
- **Estado**: ✅ Creada con 17 tablas y datos de prueba

### Usuario de Prueba
- **Email**: test@example.com
- **Contraseña**: Generada automáticamente por factory
- **Estado**: ✅ Creado y disponible

### Entorno
- **PHP**: 8.2.12 ✅
- **Composer**: 2.8.12 ✅  
- **Node.js**: v22.12.0 ✅
- **npm**: v10.9.0 ✅

---

**Nota**: Este documento refleja el estado actual del proyecto (Octubre 2025). El proyecto está completamente configurado y listo para desarrollo.