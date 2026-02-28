<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bless | Dashboard</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
    :root {
        --primary: #2563eb;
        --primary-soft: #e0e7ff;
        --bg: #f4f6f9;
        --card: #ffffff;
        --text: #111827;
        --muted: #6b7280;
        --border: #e5e7eb;
    }

    body {
        background-color: var(--bg);
        color: var(--text);
        font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont;
    }

    .sidebar {
        width: 240px;
        min-height: 100vh;
        background-color: var(--card);
        border-right: 1px solid var(--border);
    }

    .sidebar h4 {
        color: var(--primary);
    }

    .sidebar a {
        color: var(--text);
        text-decoration: none;
        padding: 10px 14px;
        border-radius: 10px;
        font-weight: 500;
    }

    .sidebar a:hover {
        background-color: var(--primary-soft);
        color: var(--primary);
    }

    .content {
        padding: 30px;
    }

    .card {
        background-color: var(--card);
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
    }

    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        border-radius: 10px;
        font-weight: 500;
    }

    .btn-warning {
        border-radius: 10px;
        font-weight: 500;
    }

    .btn-danger {
        border-radius: 10px;
        font-weight: 500;
    }

    table th {
        color: var(--muted);
        font-weight: 600;
        border-top: none;
    }

    table td {
        vertical-align: middle;
    }
</style>
</head>
<body>

<div class="d-flex">

    {{-- SIDEBAR --}}
    <aside class="sidebar p-3">
        <h4 class="mb-4 fw-bold">Bless</h4>

        <nav class="d-flex flex-column gap-1">
            <a href="/clients">👤 Clientes</a>
            <a href="/products">📦 Productos</a>
            <a href="/orders/create">🛒 Crear pedido</a>
            <a href="/reports/sales/view">📊 Reportes</a>
        </nav>
    </aside>

    {{-- CONTENIDO --}}
    <main class="flex-grow-1 content">
        @yield('content')
    </main>

</div>

</body>
</html>