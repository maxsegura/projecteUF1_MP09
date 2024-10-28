<?php

namespace App\Models; // Defineix el namespace 'App\Models' per organitzar el codi

use Core\App; // Importa la classe 'App' del namespace 'Core' per accedir a la connexió de base de dades

class Book // Defineix la classe 'Book' que representa el model per als llibres
{
    protected static $table = 'books'; // Declara una propietat protegida amb el nom de la taula de la base de dades

    // Mètode per obtenir tots els registres de llibres de la taula
    public static function getAll()
    {
        $db = App::get('database'); // Obté l'objecte de base de dades a través de la classe 'App'
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table); // Prepara la consulta SQL per obtenir tots els llibres
        $statement->execute(); // Executa la consulta
        return $statement->fetchAll(); // Retorna tots els resultats com a array
    }

    // Mètode per buscar un llibre específic per ID
    public static function find($id)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id'); // Prepara la consulta per obtenir el llibre amb un ID específic
        $statement->execute(array('id' => $id)); // Executa la consulta, vinculant l'ID proporcionat
        return $statement->fetch(\PDO::FETCH_OBJ); // Retorna el resultat com un objecte
    }

    // Mètode per crear un nou llibre a la base de dades
    public static function create($data)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare('INSERT INTO ' . static::$table . " (name, author, year) VALUES (:name, :author, :year)"); // Prepara la consulta per inserir un nou llibre
        $statement->bindValue(':name', $data['name']); // Vincula el valor del nom del llibre
        $statement->bindValue(':author', $data['author']); // Vincula el valor de l'autor del llibre
        $statement->bindValue(':year', $data['year']); // Vincula el valor de l'any del llibre
        $statement->execute(); // Executa la consulta d'inserció
    }

    // Mètode per actualitzar un llibre existent a la base de dades
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare("UPDATE " . static::$table . " SET name = :name, author = :author, year = :year WHERE id = :id"); // Prepara la consulta d'actualització per un llibre específic
        $statement->bindValue(':id', $id); // Vincula l'ID del llibre
        $statement->bindValue(':name', $data['name']); // Vincula el nou valor del nom
        $statement->bindValue(':author', $data['author']); // Vincula el nou valor de l'autor
        $statement->bindValue(':year', $data['year']); // Vincula el nou valor de l'any
        $statement->execute(); // Executa la consulta d'actualització
    }

    // Mètode per eliminar un llibre de la base de dades per ID
    public static function delete($id)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id'); // Prepara la consulta per eliminar el llibre amb un ID específic
        $statement->bindValue(':id', $id); // Vincula l'ID del llibre
        $statement->execute(); // Executa la consulta d'eliminació
    }
}
