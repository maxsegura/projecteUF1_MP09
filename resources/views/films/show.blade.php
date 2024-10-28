<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

<!-- Menú de navegació -->
<nav class="bg-gray-800 p-4 mb-8">
    <div class="max-w-4xl mx-auto">
        <ul class="flex space-x-4 text-white">
            <li><a href="/" class="hover:underline">Home</a></li>
            <li><a href="/films" class="hover:underline">Films</a></li>
            <li><a href="/books" class="hover:underline">Books</a></li>
        </ul>
    </div>
</nav>

<!-- Contenidor per mostrar els detalls de la pel·lícula -->
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Film Details</h1>

    <?php if (!empty($film)): ?>
    <div class="text-gray-700 mb-6">
        <p><span class="font-semibold">ID:</span> <?= htmlspecialchars($film->id) ?></p>
        <p><span class="font-semibold">Title:</span> <?= htmlspecialchars($film->name) ?></p>
        <p><span class="font-semibold">Director:</span> <?= htmlspecialchars($film->director) ?></p>
        <p><span class="font-semibold">Year:</span> <?= htmlspecialchars($film->year) ?></p>
    </div>
    <?php else: ?>
    <p class="text-center text-gray-500">The information for this film is not available.</p>
    <?php endif; ?>

            <!-- Enllaços d'acció -->
    <div class="flex space-x-4">
        <a href="/films" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Back to list</a>
        <a href="/films/edit/<?= htmlspecialchars($film->id) ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="/films/delete/<?= htmlspecialchars($film->id) ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</a>
    </div>
</div>

<!-- Peu de pàgina -->
<footer class="bg-gray-800 text-white text-center p-4 mt-8">
    <p>Projecte realitzat per Max Segura</p>
</footer>
</body>
</html>




