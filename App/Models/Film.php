<?php

namespace App\Models; // Defineix el namespace 'App\Models' per organitzar el codi

use Core\App; // Importa la classe 'App' del namespace 'Core' per accedir a la connexió de base de dades

class Film // Defineix la classe 'Film' que representa el model per a les pel·lícules
{
    protected static $table = 'films'; // Defineix la propietat protegida amb el nom de la taula de la base de dades

    // Mètode per obtenir totes les pel·lícules de la taula
    public static function getAll()
    {
        $db = App::get('database'); // Obté l'objecte de base de dades a través de la classe 'App'
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table); // Prepara la consulta SQL per obtenir totes les pel·lícules
        $statement->execute(); // Executa la consulta
        return $statement->fetchAll(); // Retorna tots els resultats com a array
    }

    // Mètode per buscar una pel·lícula específica per ID
    public static function find($id)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id'); // Prepara la consulta per obtenir la pel·lícula amb un ID específic
        $statement->execute(array('id' => $id)); // Executa la consulta, vinculant l'ID proporcionat
        return $statement->fetch(\PDO::FETCH_OBJ); // Retorna el resultat com un objecte
    }

    // Mètode per crear una nova pel·lícula a la base de dades
    public static function create($data)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare('INSERT INTO ' . static::$table . "(name, director, year) VALUES (:name, :director, :year)"); // Prepara la consulta per inserir una nova pel·lícula
        $statement->bindValue(':name', $data['name']); // Vincula el valor del nom de la pel·lícula
        $statement->bindValue(':director', $data['director']); // Vincula el valor del director de la pel·lícula
        $statement->bindValue(':year', $data['year']); // Vincula el valor de l'any de la pel·lícula
        $statement->execute(); // Executa la consulta d'inserció
    }

    // Mètode per actualitzar una pel·lícula existent a la base de dades
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare("UPDATE " . static::$table . " SET name = :name, director = :director, year = :year WHERE id = :id"); // Prepara la consulta d'actualització per una pel·lícula específica
        $statement->bindValue(':id', $id); // Vincula l'ID de la pel·lícula
        $statement->bindValue(':name', $data['name']); // Vincula el nou valor del nom
        $statement->bindValue(':director', $data['director']); // Vincula el nou valor del director
        $statement->bindValue(':year', $data['year']); // Vincula el nou valor de l'any
        $statement->execute(); // Executa la consulta d'actualització
    }

    // Mètode per eliminar una pel·lícula de la base de dades per ID
    public static function delete($id)
    {
        $db = App::get('database')->getConnection(); // Obté la connexió de la base de dades
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id'); // Prepara la consulta per eliminar la pel·lícula amb un ID específic
        $statement->bindValue(':id', $id); // Vincula l'ID de la pel·lícula
        $statement->execute(); // Executa la consulta d'eliminació
    }
}
