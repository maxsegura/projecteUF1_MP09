<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Defineix la codificació de caràcters com UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Fa que la pàgina sigui responsive -->
    <title>Edit Book</title> <!-- Títol de la pàgina d'edició de llibres -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Enllaça TailwindCSS per aplicar estils -->
</head>
<body class="bg-gray-100 p-8"> <!-- Fons gris clar i espaiat per al cos de la pàgina -->
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6"> <!-- Contenidor principal centrat, amb ombra i cantonades arrodonides -->
    <h1 class="text-3xl font-bold mb-4">Edit Book</h1> <!-- Títol de la pàgina d'edició -->

    <!-- Formulari per editar les dades del llibre -->
    <form action="/books/update" method="POST"> <!-- El formulari envia les dades via POST a l’URL "/books/update" -->

        <!-- Camp ocult que conté l'id del llibre -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($book->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">

        <!-- Camp per editar el títol del llibre -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Title:</label> <!-- Etiqueta per al camp del títol -->
            <input type="text" name="name" value="<?= htmlspecialchars($book->name) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required> <!-- Camp per al títol, amb el valor actual del llibre -->
        </div>

        <!-- Camp per editar l'autor del llibre -->
        <div class="mb-4">
            <label for="author" class="block text-gray-700">Author:</label> <!-- Etiqueta per al camp de l'autor -->
            <input type="text" name="author" value="<?= htmlspecialchars($book->author) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required> <!-- Camp per a l'autor, amb el valor actual del llibre -->
        </div>

        <!-- Camp per editar l'any de publicació del llibre -->
        <div class="mb-4">
            <label for="year" class="block text-gray-700">Year:</label> <!-- Etiqueta per al camp de l'any -->
            <input type="number" name="year" value="<?= htmlspecialchars($book->year) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required> <!-- Camp per a l'any, amb el valor actual del llibre -->
        </div>

        <!-- Botó per enviar els canvis del llibre -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</button> <!-- Botó de color blau per enviar el formulari, amb efecte de canvi de color en passar-hi el ratolí -->
    </form>

    <!-- Enllaç per tornar a la llista de llibres sense fer canvis -->
    <a href="/books" class="text-gray-500 hover:underline mt-4 block">Return</a> <!-- Enllaç per cancel·lar i tornar a la pàgina dels llibres, amb subratllat al passar-hi el ratolí -->
</div>
</body>
</html>


