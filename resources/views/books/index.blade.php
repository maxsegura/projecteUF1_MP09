<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Defineix la codificació de caràcters com UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Fà que la pàgina sigui adaptable a dispositius mòbils -->
    <title>Books</title> <!-- Títol de la pàgina -->
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

<!-- Contenidor principal de la pàgina de llibres -->
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Books</h1> <!-- Títol de la secció -->
    <a href="/books/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Book</a> <!-- Botó per afegir un nou llibre -->

    <!-- Taula de llibres -->
    <table class="min-w-full mt-4 bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">ID</th> <!-- Columna d'ID -->
            <th class="py-3 px-6 text-left">Title</th> <!-- Columna del títol -->
            <th class="py-3 px-6 text-left">Author</th> <!-- Columna de l'autor -->
            <th class="py-3 px-6 text-left">Year</th> <!-- Columna de l'any -->
            <th class="py-3 px-6 text-center">Actions</th> <!-- Columna d'accions -->
        </tr>
        </thead>

        <tbody class="text-gray-600 text-sm font-light">
        <?php if (empty($books)): ?> <!-- Mostra un missatge si no hi ha llibres -->
        <tr>
            <td colspan="5" class="py-3 px-6 text-center">No hi ha llibres disponibles.</td>
        </tr>
        <?php else: ?>
            <?php foreach ($books as $book): ?> <!-- Itera sobre cada llibre per mostrar-lo a la taula -->
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6"><?= $book['id'] ?></td> <!-- Mostra l'ID del llibre -->
            <td class="py-3 px-6"><?= htmlspecialchars($book['name']) ?></td> <!-- Mostra el títol del llibre, escapant HTML -->
            <td class="py-3 px-6"><?= htmlspecialchars($book['author']) ?></td> <!-- Mostra l'autor del llibre, escapant HTML -->
            <td class="py-3 px-6"><?= htmlspecialchars($book['year']) ?></td> <!-- Mostra l'any de publicació, escapant HTML -->

            <!-- Opcions d'acció per a cada llibre -->
            <td class="py-3 px-6 text-center">
                <a href="/books/show/<?= $book['id'] ?>" class="text-green-500 hover:text-green-700 mr-4">View</a> <!-- Botó per veure -->
                <a href="/books/edit/<?= $book['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a> <!-- Botó per editar -->
                <a href="/books/delete/<?= $book['id'] ?>" class="text-red-500 hover:text-red-700">Delete</a> <!-- Botó per eliminar -->
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Peu de pàgina -->
<footer class="bg-gray-800 text-white text-center p-4 mt-8">
    <p>Projecte realitzat per Max Segura</p> <!-- Autor del projecte -->
</footer>
</body>
</html>





