# Bless – Sistema de Inventario y Ventas

Aplicativo web desarrollado en **Laravel 9** para la gestión de inventario, clientes y pedidos, incluyendo control de stock por tallas y reporte de ventas.

Este proyecto fue desarrollado como **prueba técnica**, cubriendo el flujo completo desde la administración de productos y clientes hasta la generación de pedidos y reportes.

---

## 🚀 Tecnologías utilizadas

- PHP 8.x
- Laravel 9
- MySQL
- Blade (Laravel Views)
- Bootstrap 5
- XAMPP (entorno local)

---

## 📦 Funcionalidades principales

### 👤 Clientes
- Crear clientes
- Editar clientes
- Eliminar clientes
- Listado en interfaz gráfica

### 📦 Productos
- Crear productos
- Editar productos
- Eliminar productos
- Manejo de stock por tallas (S, M, L)

### 🛒 Pedidos
- Crear pedidos asociados a clientes
- Agregar múltiples productos por pedido
- Selección de talla y cantidad
- Cálculo automático del total
- Actualización automática del stock
- Edición de cliente del pedido
- Eliminación de pedidos devolviendo stock

### 📊 Reportes
- Listado de pedidos realizados
- Total vendido destacado
- Acciones de edición y eliminación

---

## 🧠 Arquitectura y decisiones técnicas

- Arquitectura **MVC** (Model – View – Controller)
- Uso de **migraciones** para control de base de datos
- Uso de **transacciones** (`DB::transaction`) para garantizar consistencia
- Bloqueo de filas (`lockForUpdate`) para evitar errores de stock
- Separación clara entre lógica backend y vistas frontend
- Interfaz basada en **cards** con diseño tipo dashboard

---

## 🛠️ Requisitos del sistema

- PHP >= 8.0
- Composer
- MySQL
- XAMPP o entorno similar
- Navegador web moderno

---
## ⚙️ Instalación y configuración

## Instalar Dependencias

- composer install


---
## Configurar Entorno

- cp .env.example .env

---

## Editar el archivo .env y configurar la base de datos 

- DB_DATABASE=bless_db
- DB_USERNAME=root
- DB_PASSWORD=

---

## Generar la clave de la aplicación

- php artisan key:generate

---

## Ejecutar Migraciones

- php artisan migrate

---

## Levantar el Servidor de Desarrollo

- php artisan serve

---

## Abrir en el navegador

- http://127.0.0.1:8000

---

## Uso del Sistema

- /clients → Gestión de clientes

- /products → Gestión de productos

- /orders/create → Crear pedidos

- /reports/sales/view → Reporte de ventas

---

### Notas Importantes

- el stock se controla automáticamente al crear y eliminar pedidos.

- las transacciones garantizan integridad de datos.

- el sistema está preparado para escalar con autenticación y roles.

---

## Autor

- Desarrollado por Sergio Alejandro Cañas
Prueba Técnica 2026

---

### 1️⃣ Clonar el repositorio 
```bash
git clone https://github.com/tu-usuario/bless-inventario.git
cd bless-inventario



