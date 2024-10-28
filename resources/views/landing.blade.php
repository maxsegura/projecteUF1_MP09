<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Defineix la codificació de caràcters com UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Assegura que el disseny és responsive -->
    <title>Home</title> <!-- Títol de la pàgina que es mostrarà a la pestanya del navegador -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Inclou el CSS de Tailwind per donar estil a la pàgina -->
</head>
<body class="bg-gray-100 p-8"> <!-- Cos de la pàgina amb fons gris clar i espaiat -->

<!-- Barra de navegació -->
<nav class="bg-gray-800 p-4 mb-8"> <!-- Fons gris fosc i espaiat de la barra de navegació -->
    <div class="max-w-4xl mx-auto"> <!-- Contenidor centralitzat -->
        <ul class="flex space-x-4 text-white"> <!-- Llista d'enllaços amb espai entre ells -->
            <li><a href="/" class="hover:underline">Home</a></li> <!-- Enllaç a la pàgina d'inici amb subratllat al passar-hi el ratolí -->
            <li><a href="/films" class="hover:underline">Films</a></li> <!-- Enllaç a la secció de films -->
            <li><a href="/books" class="hover:underline">Books</a></li> <!-- Enllaç a la secció de llibres -->
        </ul>
    </div>
</nav>

<!-- Contingut principal de la pàgina -->
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6"> <!-- Contenidor centralitzat amb ombra i cantonades arrodonides -->
    <h1 class="text-3xl font-bold mb-4">MP09 Programació de serveis i processos</h1> <!-- Títol principal de la pàgina -->
    <p class="text-gray-700 mb-4">Projecte MVC en PHP i base de dades</p> <!-- Descripció del projecte -->

    <!-- Secció d'inici -->
    <section id="home" class="mb-6"> <!-- Identificador per a la secció d'inici -->
        <h2 class="text-2xl font-semibold mb-2">Home</h2> <!-- Títol de la secció -->
        <p>Presentació del projecte</p> <!-- Text descriptiu de la secció -->
    </section>

    <!-- Secció de pel·lícules -->
    <section id="films" class="mb-6"> <!-- Identificador per a la secció de films -->
        <h2 class="text-2xl font-semibold mb-2">Films</h2> <!-- Títol de la secció de films -->
        <p>CRUD de Films</p> <!-- Descripció del contingut de la secció -->
    </section>

    <!-- Secció de llibres -->
    <section id="books"> <!-- Identificador per a la secció de llibres -->
        <h2 class="text-2xl font-semibold mb-2">Books</h2> <!-- Títol de la secció de llibres -->
        <p>CRUD de Books</p> <!-- Descripció del contingut de la secció -->
    </section>
</div>

<!-- Peu de pàgina -->
<footer class="bg-gray-800 text-white text-center p-4 mt-8"> <!-- Peu amb fons gris fosc i text centrat -->
    <p>Projecte realitzat per Max Segura</p> <!-- Crèdit de l'autor del projecte -->
</footer>
</body>
</html>
