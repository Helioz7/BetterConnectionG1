<?php


/**
 * getAllCategoriesBySlug
 *
 * @param  PDO $db
 * @return array|string
 */
function getAllCategoriesBySlug(PDO $db): array|string
{
    $sql = "SELECT title, slug FROM category ORDER BY slug ASC;";
    try{
        $query = $db->query($sql);

        if($query->rowCount()==0){
            return "Pas encore de category";
        }

        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;

    }catch(Exception $e){
        return $e->getMessage();
    }
}

<<<<<<< HEAD
function getCategoriesBySlug(PDO $connect, string $slug): array | bool 
{
    $sql=  "SELECT title, `description`
            From Catgory
            WHERE slug = ?";
    $result = $connect->prepare($sql);
} 
=======
/**
 * getCategoryBySlug
 *
 * @param  PDO $connect
 * @return array|string|bool
 */
function getCategoryBySlug(PDO $connect, string $slug): array|string|bool
{
    $sql = "SELECT `title`, `description` 
            FROM category  
            WHERE slug = ?";
    $request = $connect->prepare($sql);

    try{
        $request->execute([$slug]);

        if($request->rowCount()==0) return false;

        $response = $request->fetch();
        $request->closeCursor();
        return $response;

    }catch(Exception $e){
        return $e->getMessage();
    }
}
>>>>>>> 60119bb45a3cc3b0e8acdec1d982d1fe6f00fbc5
