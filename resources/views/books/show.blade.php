<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Defineix la codificació de caràcters com UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Fà que la pàgina sigui adaptable a dispositius mòbils -->
    <title>Book Details</title> <!-- Títol de la pàgina -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Enllaça TailwindCSS -->
</head>
<body class="bg-gray-100 p-8"> <!-- Fons gris clar i espaiat per al cos de la pàgina -->

<!-- Menú de navegació -->
<nav class="bg-gray-800 p-4 mb-8">
    <div class="max-w-4xl mx-auto">
        <ul class="flex space-x-4 text-white">
            <li><a href="/" class="hover:underline">Home</a></li> <!-- Enllaç a la pàgina principal -->
            <li><a href="/films" class="hover:underline">Films</a></li> <!-- Enllaç a la pàgina de films -->
            <li><a href="/books" class="hover:underline">Books</a></li> <!-- Enllaç a la pàgina de llibres -->
        </ul>
    </div>
</nav>

<!-- Contenidor principal per a detalls del llibre -->
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Book Details</h1> <!-- Títol de la secció -->

    <?php if (!empty($book)): ?> <!-- Comprova si hi ha dades del llibre -->
    <div class="text-gray-700 mb-6">
        <p><span class="font-semibold">ID:</span> <?= htmlspecialchars($book->id) ?></p> <!-- Mostra l'ID del llibre -->
        <p><span class="font-semibold">Title:</span> <?= htmlspecialchars($book->name) ?></p> <!-- Mostra el títol del llibre -->
        <p><span class="font-semibold">Author:</span> <?= htmlspecialchars($book->author) ?></p> <!-- Mostra l'autor del llibre -->
        <p><span class="font-semibold">Year:</span> <?= htmlspecialchars($book->year) ?></p> <!-- Mostra l'any de publicació -->
    </div>
    <?php else: ?> <!-- Si no hi ha dades del llibre -->
    <p class="text-center text-gray-500">The information for this book is not available.</p> <!-- Missatge d'error -->
    <?php endif; ?>

            <!-- Botons per navegar -->
    <div class="flex space-x-4">
        <a href="/books" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Back to list</a> <!-- Botó per tornar a la llista -->
        <a href="/books/edit/<?= htmlspecialchars($book->id) ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a> <!-- Botó per editar -->
        <a href="/books/delete/<?= htmlspecialchars($book->id) ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</a> <!-- Botó per eliminar -->
    </div>
</div>

<!-- Peu de pàgina -->
<footer class="bg-gray-800 text-white text-center p-4 mt-8">
    <p>Projecte realitzat per Max Segura</p> <!-- Autor del projecte -->
</footer>
</body>
</html>

