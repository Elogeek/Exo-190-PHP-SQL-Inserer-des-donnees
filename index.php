<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $dbname = "table_test_php";
    $server = "localhost";
    $password = "";
    $user = "root";

    $con = new PDO("mysql:host = $server;dbname=$dbname;charset=UTF8",$user,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $sql = " INSERT INTO utilisateur VALUES (NULL,'Doe', 'Jean', 'J@gmail.com', '123', 'Chemin des Cimes', '38000', 'France', NOW())";

    $tadaam = $con->exec($sql);


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $sql = "INSERT INTO produit VALUES (NULL, 'un article', '5.12', 'un peu de texte', 'un très long texte')";
    $tadaam = $con->exec($sql);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $sql = "INSERT INTO utilisateur 
            VALUES (NULL,'Doe', 'Tarzan', 'tarzan@gmail.com', '1234', 'Rue des Motos', ' 69000', 'France', NOW()), 
                   (NULL, 'Deo', 'Janine', 'Janine@yayoo.com', '456', 'Rue de Brin', '75000', 'France', NOW())";

    $tadaam = $con->exec($sql);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql = "INSERT INTO produit 
            VALUES   (NULL, 'bonbon', '3.00', 'bonbon à la violette', 'miammm un bonbon'),
                     (NULL, 'un pc', '1000', 'avec un clavier', 'et une batterie en plus')";
    $tadaam = $con->exec($sql);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
    $con->beginTransaction();

    $sql = "INSERT INTO utilisateur
            VALUES (NULL, 'Dido', 'Lola', 'lol@gmail.com', '789', 'Rue je sais pas', '75000', 'France', Now()),
                   (NULL, 'Dada', 'Lulu', 'dad@gmail.com', 'azerty', 'Rue quelque part', '38000', 'France', NOW()),
                   (NULL, 'Dodo', 'lison', 'lison@yahoo.fr', 'query', 'Rue Good place', '38000', 'France', NOW())";
    $tadaam= $con->exec($sql);
    $con->commit();
    $con->rollBack();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    $con->beginTransaction();

    $sql = "INSERT INTO produit
            VALUES  (NULL, 'souris', '1.00', 'souris sans fil', 'souris sans fil qui marche'),
                    (NULL, 'yoyo', '0.50', 'yoyo jeux', 'jeux pour enfants'),
                    (NULL, 'bic', '0.20', 'bic rouge', 'bic de couleur rouge')";

    $tadaam = $con->exec($sql);
    $con->commit();
    $con->rollBack();
}
catch(PDOException $exception) {
    echo " Une erreur est survenue ! " .$exception->getMessage();
    $con->rollBack();
}