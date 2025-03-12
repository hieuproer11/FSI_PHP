<?php
namespace DAO;

use BO\Realisation2;
use PDO;

class Realisation2DAO
{

private PDO $db;

public function __construct(PDO $db) {
$this->db = $db;
}
public function create(Realisation2 $realisation2){
$sql = "INSERT INTO Realiser2 (idUti, idBil2)
VALUES ( ?, ?)";
$stmt = $this->db->prepare($sql);
$stmt->execute([
$realisation2->getIdUti(),
$realisation2->getIdBil2(),
]);
}

}
