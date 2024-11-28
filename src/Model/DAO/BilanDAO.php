<?php

namespace DAO;

interface BilanDAO {
    public function create($bilan);
    public function read($idBil);
    public function update($bilan);
    public function delete($idBil);
    public function findAll();
}
