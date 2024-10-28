<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
<!-- Menú de navegación -->
<nav class="bg-gray-800 p-4 mb-8">
    <div class="max-w-4xl mx-auto">
        <ul class="flex space-x-4 text-white">
            <li><a href="/" class="hover:underline">Home</a></li> <!-- Redirige a / -->
            <li><a href="/films" class="hover:underline">Films</a></li> <!-- Redirige a /films -->
            <li><a href="/books" class="hover:underline">Books</a></li> <!-- Redirige a /books -->
        </ul>
    </div>
</nav>

<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Films</h1>
    <a href="/films/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Film</a> <!-- Cambié la ruta a /films/create -->
    <table class="min-w-full mt-4 bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Title</th>
            <th class="py-3 px-6 text-left">Director</th>
            <th class="py-3 px-6 text-left">Year</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        <?php if (empty($films)): ?>
        <tr>
            <td colspan="5" class="py-3 px-6 text-center">No hay pelis disponibles.</td>
        </tr>
        <?php else: ?>
            <?php foreach ($films as $film): ?>
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6"><?= $film['id'] ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['name']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['director']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['year']) ?></td>
            <td class="py-3 px-6 text-center">
                <a href="/films/show/<?= $film['id'] ?>" class="text-green-500 hover:text-green-700 mr-4">View</a> <!-- Enlace a /films/show -->
                <a href="/films/edit/<?= $film['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a> <!-- Cambié la ruta a /films/edit -->
                <a href="/films/delete/<?= $film['id'] ?>" class="text-red-500 hover:text-red-700">Delete</a> <!-- Cambié la ruta a /films/delete -->
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center p-4 mt-8">
    <p>Projecte realitzat per Max Segura</p>
</footer>
</body>
</html>



