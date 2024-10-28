<?php

namespace App\Controllers; // Defineix el namespace 'App\Controllers' per organitzar el codi

use App\Models\Film; // Importa el model 'Film' per poder-lo utilitzar en aquesta classe

class FilmController // Declara la classe 'FilmController' que conté mètodes per gestionar pel·lícules
{
    // Mètode per llistar totes les pel·lícules
    public function index()
    {
        $films = Film::getAll(); // Obté totes les pel·lícules mitjançant el mètode estàtic 'getAll' del model 'Film'
        return view('films/index', ['films' => $films]); // Retorna la vista 'films/index' amb les pel·lícules com a paràmetre
    }

    // Mètode per mostrar el formulari de creació d'una nova pel·lícula
    public function create()
    {
        return view('films/create'); // Retorna la vista 'films/create'
    }

    // Mètode per emmagatzemar una nova pel·lícula a la base de dades
    public function store($data)
    {
        Film::create($data); // Crea una nova pel·lícula amb les dades proporcionades
        header('Location: /films'); // Redirigeix a la pàgina de llistat de pel·lícules
        exit; // Atura l'execució del codi
    }

    // Mètode per mostrar una pel·lícula específica segons l'ID
    public function show($id)
    {
        $film = Film::find($id); // Cerca la pel·lícula amb l'ID especificat
        if (!$film) { // Comprova si la pel·lícula no existeix
            return view('errors/404'); // Retorna la vista d'error 404 si la pel·lícula no es troba
        }
        return view('films/show', ['film' => $film]); // Retorna la vista 'films/show' amb la pel·lícula
    }

    // Mètode per mostrar el formulari d'edició d'una pel·lícula existent
    public function edit($id)
    {
        $film = Film::find($id); // Cerca la pel·lícula amb l'ID especificat
        if (!$film) { // Comprova si la pel·lícula no existeix
            return view('errors/404'); // Retorna la vista d'error 404 si la pel·lícula no es troba
        }
        return view('films/edit', ['film' => $film]); // Retorna la vista 'films/edit' amb la pel·lícula
    }

    // Mètode per actualitzar una pel·lícula existent a la base de dades
    public function update($id, $data)
    {
        if (!Film::find($id)) { // Comprova si la pel·lícula amb l'ID especificat no existeix
            return view('errors/404'); // Retorna la vista d'error 404 si la pel·lícula no es troba
        }
        Film::update($id, $data); // Actualitza la pel·lícula amb les noves dades
        header('Location: /films'); // Redirigeix a la pàgina de llistat de pel·lícules
        exit; // Atura l'execució del codi
    }

    // Mètode per mostrar el formulari de confirmació d'eliminació d'una pel·lícula
    public function delete($id)
    {
        $film = Film::find($id); // Cerca la pel·lícula amb l'ID especificat
        if (!$film) { // Comprova si la pel·lícula no existeix
            return view('errors/404'); // Retorna la vista d'error 404 si la pel·lícula no es troba
        }
        return view('films/delete', ['film' => $film]); // Retorna la vista 'films/delete' amb la pel·lícula
    }

    // Mètode per eliminar una pel·lícula de la base de dades
    public function destroy($id)
    {
        if (!Film::find($id)) { // Comprova si la pel·lícula amb l'ID especificat no existeix
            return view('errors/404'); // Retorna la vista d'error 404 si la pel·lícula no es troba
        }
        Film::delete($id); // Elimina la pel·lícula amb l'ID especificat
        header('Location: /films'); // Redirigeix a la pàgina de llistat de pel·lícules
        exit; // Atura l'execució del codi
    }
}
