CREATE TABLE Entreprise(
   idEnt INT NOT NULL AUTO_INCREMENT,
   nomEnt VARCHAR(50),
   adrEnt VARCHAR(50),
   vilEnt VARCHAR(50),
   cpEnt VARCHAR(5),
   CONSTRAINT entreprise_PK PRIMARY KEY(idEnt))
   ENGINE=INNODB;

CREATE TABLE Bilan1(
   idBil1 INT NOT NULL AUTO_INCREMENT,
   notentBil1 DECIMAL(5,2),
   notdossBil1 DECIMAL(5,2),
   notorBil1 DECIMAL(5,2),
   moyBil1 DECIMAL(5,2),
   remarqueBil1 VARCHAR(500),
   datevisiteBil1 DATE,
   CONSTRAINT bilan1_PK PRIMARY KEY(idBil1))
   ENGINE=INNODB;

CREATE TABLE Bilan2(
   idBil2 INT NOT NULL AUTO_INCREMENT,
   notdossBil2 DECIMAL(5,2),
   notorBil2 DECIMAL(5,2),
   moyBil2 DECIMAL(5,2),
   remarqueBil2 VARCHAR(500),
   sujmemBil2 VARCHAR(50),
   datevisiteBil2 DATE,
   CONSTRAINT bilan2_PK PRIMARY KEY(idBil2))
   ENGINE=INNODB;

CREATE TABLE Type_d_utilisateur(
   idTypeuti INT NOT NULL AUTO_INCREMENT,
   typeutiTypeuti VARCHAR(50),
   CONSTRAINT type_d_utilisateur_PK PRIMARY KEY(idTypeuti))
   ENGINE=INNODB;

CREATE TABLE Maitre_d_apprentissage(
   idMaitapp INT NOT NULL AUTO_INCREMENT,
   nomMaitapp VARCHAR(50),
   preMaitapp VARCHAR(50),
   mailMaitapp VARCHAR(50),
   telMaitapp VARCHAR(12),
   idEnt INT NOT NULL,
   CONSTRAINT maitre_d_apprentissage_PK PRIMARY KEY(idMaitapp),
   CONSTRAINT maitre_d_apprentissage_Entreprise_FK FOREIGN KEY(idEnt) REFERENCES Entreprise(idEnt))
   ENGINE=INNODB;

CREATE TABLE Specialite(
   idSpe INT NOT NULL AUTO_INCREMENT,
   nomSpe VARCHAR(50),
   CONSTRAINT specialite_PK PRIMARY KEY(idSpe))
   ENGINE=INNODB;

CREATE TABLE Classe(
   idCla INT NOT NULL AUTO_INCREMENT,
   nomCla VARCHAR(50),
   CONSTRAINT classe_PK PRIMARY KEY(idCla))
   ENGINE=INNODB;

CREATE TABLE Alerte(
   idAl INT NOT NULL AUTO_INCREMENT,
   datelimbil1Al DATE,
   datelimbil2Al DATE,
   CONSTRAINT alerte_PK PRIMARY KEY(idAl))
   ENGINE=INNODB;

CREATE TABLE Tuteur(
   idTut INT NOT NULL AUTO_INCREMENT,
   preTut VARCHAR(50),
   nomTut VARCHAR(50),
   telTut VARCHAR(15),
   mailTut VARCHAR(50),
   CONSTRAINT tuteur_PK PRIMARY KEY(idTut))
   ENGINE=INNODB;

CREATE TABLE Utilisateur(
   idUti INT NOT NULL AUTO_INCREMENT,
   nomUti VARCHAR(50),
   preUti VARCHAR(50),
   mailUti VARCHAR(50),
   altUti BOOLEAN,
   telUti VARCHAR(15),
   adrUti VARCHAR(100),
   cpUti VARCHAR(5),
   vilUti VARCHAR(100),
   logUti VARCHAR(50),
   mdpUti VARCHAR(50),
   idTut INT,
   idSpe INT,
   idTypeuti INT NOT NULL,
   idMaitapp INT,
   idEnt INT,
   idCla INT,
   CONSTRAINT utilisateur_PK PRIMARY KEY(idUti),
   CONSTRAINT utilisateur_Tuteur_FK FOREIGN KEY(idTut) REFERENCES Tuteur(idTut),
   CONSTRAINT Utilisateur_Specialite_FK FOREIGN KEY(idSpe) REFERENCES Specialite(idSpe),
   CONSTRAINT Utilisateur_Type_d_utilisateur_FK FOREIGN KEY(idTypeuti) REFERENCES Type_d_utilisateur(idTypeuti),
   CONSTRAINT Utilisateur_Maitre_d_apprentissage_FK FOREIGN KEY(idMaitapp) REFERENCES Maitre_d_apprentissage(idMaitapp),
   CONSTRAINT Utilisateur_Entreprise_FK FOREIGN KEY(idEnt) REFERENCES Entreprise(idEnt),
   CONSTRAINT Utilisateur_Classe_FK FOREIGN KEY(idCla) REFERENCES Classe(idCla))
   ENGINE=INNODB;

CREATE TABLE Realiser2(
   idUti INT,
   idBil2 INT,
   CONSTRAINT realiser2_PK PRIMARY KEY(idUti, idBil2),
   CONSTRAINT realiser2_Utilisateur_FK FOREIGN KEY(idUti) REFERENCES Utilisateur(idUti),
   CONSTRAINT realiser2_Bilan2_FK FOREIGN KEY(idBil2) REFERENCES Bilan2(idBil2))
   ENGINE=INNODB;

CREATE TABLE Realiser1(
   idUti INT,
   idBil1 INT,
   CONSTRAINT realiser1_PK PRIMARY KEY(idUti, idBil1),
   CONSTRAINT realiser1_Utilisteur_FK FOREIGN KEY(idUti) REFERENCES Utilisateur(idUti),
   CONSTRAINT realiser1_Bilan1_FK FOREIGN KEY(idBil1) REFERENCES Bilan1(idBil1))
   ENGINE=INNODB;

CREATE TABLE Gerer(
   idCla INT,
   idTut INT,
   nbmaxetuTut INT,
   CONSTRAINT gerer_PK PRIMARY KEY(idCla, idTut),
   CONSTRAINT gerer_Classe_FK FOREIGN KEY(idCla) REFERENCES Classe(idCla),
   CONSTRAINT gerer_Tuteur_FK FOREIGN KEY(idTut) REFERENCES Tuteur(idTut))
   ENGINE=INNODB;
