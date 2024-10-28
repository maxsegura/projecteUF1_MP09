<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Defineix la codificació de caràcters com UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Permet que la pàgina sigui responsive -->
    <title>Add New Book</title> <!-- Títol de la pàgina que es mostrarà a la pestanya del navegador -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Enllaça el CSS de Tailwind per aplicar estils -->
</head>
<body class="bg-gray-100 p-8"> <!-- Defineix el cos amb fons gris clar i espaiat -->
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6"> <!-- Contenidor principal centralitzat amb ombra i cantonades arrodonides -->
    <h1 class="text-2xl font-bold mb-4">Add New Book</h1> <!-- Títol de la pàgina -->

    <!-- Formulari per afegir un nou llibre -->
    <form action="/books/store" method="POST"> <!-- Especifica l'acció POST per enviar les dades a la ruta definida -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Title:</label> <!-- Etiqueta per al títol -->
            <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter book title"> <!-- Camp de text per al títol del llibre -->
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Author:</label> <!-- Etiqueta per a l'autor -->
            <input type="text" name="author" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter author's name"> <!-- Camp de text per al nom de l'autor -->
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-gray-700">Release Year:</label> <!-- Etiqueta per a l'any de publicació -->
            <input type="number" name="year" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter release year"> <!-- Camp de número per l'any de publicació -->
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Book</button> <!-- Botó d'enviament per afegir el llibre amb efecte de canvi de color al passar-hi el ratolí -->
    </form>
</div>
</body>
</html>


