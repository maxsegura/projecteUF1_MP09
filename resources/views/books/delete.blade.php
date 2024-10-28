<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Defineix la codificació de caràcters com UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Permet que la pàgina sigui responsive -->
    <title>Delete Book</title> <!-- Títol de la pàgina per indicar que es tracta de la pàgina d'eliminació d'un llibre -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Enllaç a TailwindCSS per a estilitzar la pàgina -->
</head>
<body class="bg-gray-100 p-8"> <!-- Defineix el cos amb un fons gris clar i espaiat -->
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6"> <!-- Contenidor principal centrat amb ombra i cantonades arrodonides -->
    <h1 class="text-3xl font-bold mb-4">Delete Book</h1> <!-- Títol de la pàgina -->

    <!-- Missatge de confirmació d'eliminació -->
    <p>Are you sure you want to delete the book "<?= htmlspecialchars($book->name) ?>"?</p> <!-- Missatge de confirmació amb el nom del llibre escapat per seguretat -->

    <!-- Formulari per confirmar l'eliminació del llibre -->
    <form action="/books/destroy" method="POST" class="mt-4"> <!-- Formulari que envia la petició per eliminar el llibre -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($book->id) ?>"> <!-- Camp ocult amb l'id del llibre escapat per seguretat -->
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button> <!-- Botó per confirmar l'eliminació amb efecte de canvi de color en passar-hi el ratolí -->
    </form>

    <!-- Enllaç per cancel·lar l'acció i tornar a la llista de llibres -->
    <a href="/books" class="text-gray-500 hover:underline mt-4 block">Cancel</a> <!-- Enllaç per cancel·lar, amb estil de subratllat al passar-hi el ratolí -->
</div>
</body>
</html>


