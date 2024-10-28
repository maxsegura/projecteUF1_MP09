<?php

namespace Core; // Defineix el namespace 'Core' per organitzar el codi

use RuntimeException; // Importa l'excepció 'RuntimeException' per a la gestió d'errors

class Route // Defineix la classe 'Route' que gestiona les rutes de l'aplicació
{
    protected $routes = []; // Propietat protegida que emmagatzema les rutes registrades

    // Mètode per registrar una nova ruta
    public function register($route)
    {
        $this->routes[] = $route; // Afegeix la ruta a l'array de rutes
    }

    // Mètode per definir les rutes de l'aplicació
    public function define($route)
    {
        $this->routes = $route; // Assigna l'array de rutes
        return $this; // Retorna l'objecte actual per permetre cadenes de mètodes
    }

    // Mètode per redirigir a una ruta especificada
    public function redirect($uri)
    {
        $parts = explode('/', trim($uri, '/')); // Divideix la URI en parts

        if ($uri === '/') {
            // Si la URI és la pàgina d'inici, mostra la vista de benvinguda
            return require '../resources/views/landing.blade.php';
        }

        $filmController = 'App\Controllers\FilmController'; // Defineix la ruta del controlador de pel·lícules
        $bookController = 'App\Controllers\BookController'; // Defineix la ruta del controlador de llibres

        // Gestió de rutes per a les pel·lícules
        if ($parts[0] === 'films') {
            require '../App/Controllers/FilmController.php'; // Carrega el controlador de pel·lícules
            $controllerInstance = new $filmController(); // Crea una instància del controlador

            // Comprova i executa el mètode corresponent segons la ruta
            if (count($parts) == 1) {
                return $controllerInstance->index(); // Llista totes les pel·lícules
            } elseif ($parts[1] === 'create') {
                return $controllerInstance->create(); // Mostra el formulari per crear una nova pel·lícula
            } elseif ($parts[1] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST; // Recull les dades de la pel·lícula des de la sol·licitud POST
                return $controllerInstance->store($data); // Emmagatzema la nova pel·lícula
            } elseif ($parts[1] === 'delete' && isset($parts[2])) {
                return $controllerInstance->delete($parts[2]); // Mostra la vista de confirmació per eliminar la pel·lícula
            } elseif ($parts[1] === 'edit' && isset($parts[2])) {
                return $controllerInstance->edit($parts[2]); // Mostra el formulari d'edició per a una pel·lícula existent
            } elseif ($parts[1] === 'show' && isset($parts[2])) {
                return $controllerInstance->show($parts[2]); // Mostra els detalls d'una pel·lícula específica
            } elseif ($parts[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;
                if (!isset($_POST['id'])) {
                    throw new RuntimeException('No id provided'); // Llança una excepció si no es proporciona un ID
                }
                return $controllerInstance->update($_POST['id'], $data); // Actualitza la pel·lícula
            } elseif ($parts[1] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!isset($_POST['id'])) {
                    throw new RuntimeException('No id provided'); // Llança una excepció si no es proporciona un ID
                }
                return $controllerInstance->destroy($_POST['id']); // Elimina la pel·lícula
            }
        }

        // Gestió de rutes per als llibres
        if ($parts[0] === 'books') {
            require '../App/Controllers/BookController.php'; // Carrega el controlador de llibres
            $controllerInstance = new $bookController(); // Crea una instància del controlador

            // Comprova i executa el mètode corresponent segons la ruta
            if (count($parts) == 1) {
                return $controllerInstance->index(); // Llista tots els llibres
            } elseif ($parts[1] === 'create') {
                return $controllerInstance->create(); // Mostra el formulari per crear un nou llibre
            } elseif ($parts[1] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST; // Recull les dades del llibre des de la sol·licitud POST
                return $controllerInstance->store($data); // Emmagatzema el nou llibre
            } elseif ($parts[1] === 'delete' && isset($parts[2])) {
                return $controllerInstance->delete($parts[2]); // Mostra la vista de confirmació per eliminar el llibre
            } elseif ($parts[1] === 'edit' && isset($parts[2])) {
                return $controllerInstance->edit($parts[2]); // Mostra el formulari d'edició per a un llibre existent
            } elseif ($parts[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;
                if (!isset($_POST['id'])) {
                    throw new RuntimeException('No id provided'); // Llança una excepció si no es proporciona un ID
                }
                return $controllerInstance->update($_POST['id'], $data); // Actualitza el llibre
            } elseif ($parts[1] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!isset($_POST['id'])) {
                    throw new RuntimeException('No id provided'); // Llança una excepció si no es proporciona un ID
                }
                return $controllerInstance->destroy($_POST['id']); // Elimina el llibre
            } elseif ($parts[1] === 'show' && isset($parts[2])) {
                return $controllerInstance->show($parts[2]); // Mostra els detalls d'un llibre específic
            }
        }

        // Si la ruta no es troba, retorna la vista d'error 404
        return require '../resources/views/errors/404.blade.php';
    }
}

