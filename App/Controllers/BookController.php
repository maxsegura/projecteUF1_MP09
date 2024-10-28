<?php

namespace App\Controllers; // Defineix el namespace 'App\Controllers' per organitzar el codi

use App\Models\Book; // Importa el model 'Book' per poder-lo utilitzar en aquesta classe

class BookController // Declara la classe 'BookController' que conté mètodes per gestionar llibres
{
    // Mètode per llistar tots els llibres
    public function index()
    {
        $books = Book::getAll(); // Obté tots els llibres mitjançant el mètode 'getAll' del model 'Book'
        return view('books/index', ['books' => $books]); // Retorna la vista 'books/index' amb els llibres com a paràmetre
    }

    // Mètode per mostrar el formulari de creació d'un nou llibre
    public function create()
    {
        return view('books/create'); // Retorna la vista 'books/create'
    }

    // Mètode per emmagatzemar un nou llibre a la base de dades
    public function store($data)
    {
        Book::create($data); // Crea un nou llibre amb les dades proporcionades
        header('location: /books'); // Redirigeix a la pàgina de llistat de llibres
        exit; // Atura l'execució del codi
    }

    // Mètode per mostrar un llibre específic segons l'ID
    public function show($id)
    {
        if ($id === null) { // Comprova si l'ID és nul
            header('location: /books'); // Redirigeix a la pàgina de llistat de llibres si no hi ha ID
            exit;
        }
        $book = Book::find($id); // Cerca el llibre amb l'ID especificat
        if (!$book) { // Comprova si el llibre no existeix
            require '../../resources/views/errors/404.blade.php'; // Carrega la vista d'error 404 si el llibre no es troba
            return;
        }
        return view('books/show', ['book' => $book]); // Retorna la vista 'books/show' amb el llibre
    }

    // Mètode per mostrar el formulari d'edició d'un llibre existent
    public function edit($id)
    {
        if ($id === null) { // Comprova si l'ID és nul
            header('location: /books'); // Redirigeix a la pàgina de llistat de llibres si no hi ha ID
            exit;
        }
        $book = Book::find($id); // Cerca el llibre amb l'ID especificat
        if (!$book) { // Comprova si el llibre no existeix
            require '../../resources/views/errors/404.blade.php'; // Carrega la vista d'error 404 si el llibre no es troba
            return;
        }
        return view('books/edit', ['book' => $book]); // Retorna la vista 'books/edit' amb el llibre
    }

    // Mètode per actualitzar un llibre existent a la base de dades
    public function update($id, $data)
    {
        Book::update($id, $data); // Actualitza el llibre amb les noves dades
        header('location: /books'); // Redirigeix a la pàgina de llistat de llibres
        exit; // Atura l'execució del codi
    }

    // Mètode per mostrar el formulari de confirmació d'eliminació d'un llibre
    public function delete($id)
    {
        if ($id === null) { // Comprova si l'ID és nul
            header('location: /books'); // Redirigeix a la pàgina de llistat de llibres si no hi ha ID
            exit;
        }
        $book = Book::find($id); // Cerca el llibre amb l'ID especificat
        return view('books/delete', ['book' => $book]); // Retorna la vista 'books/delete' amb el llibre
    }

    // Mètode per eliminar un llibre de la base de dades
    public function destroy($id)
    {
        Book::delete($id); // Elimina el llibre amb l'ID especificat
        header('location: /books'); // Redirigeix a la pàgina de llistat de llibres
    }
}