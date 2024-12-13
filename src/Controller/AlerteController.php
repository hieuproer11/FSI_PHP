<?php


namespace Controller;


include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Alerte.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\AlerteDAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php'; // Connexion à la base de données
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';

use DAO\AlerteDAO;
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;


class AlerteController {
    public function afficherAlertes() {
        $conn = ConnexionBDD();
        $bilan1DAO = new Bilan1DAO($conn);
        $bilan2DAO = new Bilan2DAO($conn);
        $alerteDAO = new AlerteDAO($conn);

        $bilans1 = $bilan1DAO->getAll();
        $bilans2 = $bilan2DAO->getAll();
        $alertes = $alerteDAO->getAll();

        $alertesFinales = $this->verifierAlertes($bilans1, $bilans2, $alertes);

        include_once '../src/View/Alerte.php';
    }

    private function verifierAlertes($bilans1, $bilans2, $alertes) {
        $alertesResult = [];
        $dateCourante = date('Y-m-d');

        foreach ($bilans1 as $bilan1) {
            foreach ($alertes as $alerte) {
                if (strtotime($bilan1->getDatevisiteBil()) < strtotime($dateCourante)) {
                    $alertesResult[] = [
                        'date_visite_bilan_1' => $bilan1->getDatevisiteBil(),
                        'date_limite_bilan_1' => $alerte->getDatelimbil1Al(),
                        'alerte' => "La date de visite entreprise pour le Bilan 1 (ID : {$bilan1->getIdBil()}) est en retard."
                    ];
                }
                if ($bilan1->getNotentBil() === null && strtotime($alerte->getDatelimbil1Al()) < strtotime($dateCourante)) {
                    $alertesResult[] = [
                        'date_visite_bilan_1' => $bilan1->getDatevisiteBil(),
                        'date_limite_bilan_1' => $alerte->getDatelimbil1Al(),
                        'alerte' => "La note de Bilan 1 (ID : {$bilan1->getIdBil()}) est non renseignée."
                    ];
                }
            }
        }

        foreach ($bilans2 as $bilan2) {
            foreach ($alertes as $alerte) {
                if (empty($bilan2->getSujmemBil2())) {
                    $alertesResult[] = [
                        'date_visite_bilan_2' => $bilan2->getDatevisiteBil(),
                        'date_limite_bilan_2' => $alerte->getDatelimbil2Al(),
                        'alerte' => "Le sujet de mémoire est manquant pour le Bilan 2 (ID : {$bilan2->getIdBil()})."
                    ];
                }
                if ($bilan2->getNotdossBil() === null && strtotime($alerte->getDatelimbil2Al()) < strtotime($dateCourante)) {
                    $alertesResult[] = [
                        'date_visite_bilan_2' => $bilan2->getDatevisiteBil(),
                        'date_limite_bilan_2' => $alerte->getDatelimbil2Al(),
                        'alerte' => "La note de Bilan 2 (ID : {$bilan2->getIdBil()}) est non renseignée."
                    ];
                }
            }
        }
        return $alertesResult;
    }
}
