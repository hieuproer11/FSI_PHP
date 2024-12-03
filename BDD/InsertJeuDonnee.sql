INSERT INTO Entreprise (nomEnt, adrEnt, vilEnt, cpEnt) VALUES
                                                           ('Entreprise_1', 'Adresse_1', 'Ville_1', '92747'),
                                                           ('Entreprise_2', 'Adresse_2', 'Ville_2', '54450'),
                                                           ('Entreprise_3', 'Adresse_3', 'Ville_3', '22950'),
                                                           ('Entreprise_4', 'Adresse_4', 'Ville_4', '18060'),
                                                           ('Entreprise_5', 'Adresse_5', 'Ville_5', '13068'),
                                                           ('Entreprise_6', 'Adresse_6', 'Ville_6', '58931'),
                                                           ('Entreprise_7', 'Adresse_7', 'Ville_7', '22343'),
                                                           ('Entreprise_8', 'Adresse_8', 'Ville_8', '91276'),
                                                           ('Entreprise_9', 'Adresse_9', 'Ville_9', '49549'),
                                                           ('Entreprise_10', 'Adresse_10', 'Ville_10', '57324'),
                                                           ('Entreprise_11', 'Adresse_11', 'Ville_11', '16542'),
                                                           ('Entreprise_12', 'Adresse_12', 'Ville_12', '99195'),
                                                           ('Entreprise_13', 'Adresse_13', 'Ville_13', '65591'),
                                                           ('Entreprise_14', 'Adresse_14', 'Ville_14', '23938'),
                                                           ('Entreprise_15', 'Adresse_15', 'Ville_15', '78335');

INSERT INTO Type_d_utilisateur (typeutiTypeuti) VALUES ('Etudiant'), ('Tuteur'), ('Administrateur');

INSERT INTO Bilan1 (notentBil1, notdossBil1, notorBil1, moyBil1, remarqueBil1, datevisiteBil1) VALUES
                                                                                                   (17.27, 16.81, 17.36, 14.59, 'Remarque_1', '2024-05-03'),
                                                                                                   (10.41, 15.86, 16.83, 18.92, 'Remarque_2', '2024-02-09'),
                                                                                                   (14.8, 10.68, 15.5, 16.03, 'Remarque_3', '2024-12-16'),
                                                                                                   (16.81, 10.32, 16.92, 10.75, 'Remarque_4', '2024-03-13'),
                                                                                                   (16.1, 15.72, 17.03, 17.39, 'Remarque_5', '2024-07-14'),
                                                                                                   (10.05, 12.58, 17.85, 17.42, 'Remarque_6', '2024-07-08'),
                                                                                                   (17.94, 12.69, 19.88, 12.17, 'Remarque_7', '2024-09-06'),
                                                                                                   (11.89, 15.45, 12.5, 19.89, 'Remarque_8', '2024-12-12'),
                                                                                                   (10.88, 17.54, 15.81, 11.94, 'Remarque_9', '2024-06-22'),
                                                                                                   (17.56, 15.8, 19.61, 14.82, 'Remarque_10', '2024-04-13'),
                                                                                                   (10.39, 15.58, 18.22, 18.34, 'Remarque_11', '2024-02-28'),
                                                                                                   (14.61, 10.19, 15.1, 19.87, 'Remarque_12', '2024-03-22'),
                                                                                                   (10.94, 16.4, 15.02, 11.37, 'Remarque_13', '2024-08-28'),
                                                                                                   (18.36, 10.29, 10.75, 13.14, 'Remarque_14', '2024-07-17'),
                                                                                                   (19.03, 15.48, 12.93, 19.73, 'Remarque_15', '2024-02-27');

INSERT INTO Bilan2 (notdossBil2, notorBil2, moyBil2, remarqueBil2, sujmemBil2, datevisiteBil2) VALUES
                                                                                                   (16.65, 14.49, 18.35, 'Remarque_1', 'Sujet_1', '2024-09-21'),
                                                                                                   (16.24, 10.81, 18.36, 'Remarque_2', 'Sujet_2', '2024-10-11'),
                                                                                                   (16.84, 10.86, 19.38, 'Remarque_3', 'Sujet_3', '2024-11-01'),
                                                                                                   (13.88, 10.3, 14.35, 'Remarque_4', 'Sujet_4', '2024-05-26'),
                                                                                                   (17.88, 19.41, 11.78, 'Remarque_5', 'Sujet_5', '2024-04-08'),
                                                                                                   (19.12, 18.31, 16.67, 'Remarque_6', 'Sujet_6', '2024-10-09'),
                                                                                                   (18.37, 10.12, 13.91, 'Remarque_7', 'Sujet_7', '2024-05-10'),
                                                                                                   (18.45, 11.84, 16.17, 'Remarque_8', 'Sujet_8', '2024-03-01'),
                                                                                                   (15.9, 13.13, 17.56, 'Remarque_9', 'Sujet_9', '2024-09-14'),
                                                                                                   (11.03, 19.8, 11.7, 'Remarque_10', 'Sujet_10', '2024-05-01'),
                                                                                                   (13.71, 12.79, 15.06, 'Remarque_11', 'Sujet_11', '2024-09-11'),
                                                                                                   (11.51, 13.59, 13.66, 'Remarque_12', 'Sujet_12', '2024-03-01'),
                                                                                                   (15.66, 15.39, 14.8, 'Remarque_13', 'Sujet_13', '2024-09-21'),
                                                                                                   (17.28, 14.44, 12.25, 'Remarque_14', 'Sujet_14', '2024-04-07'),
                                                                                                   (18.26, 11.29, 18.56, 'Remarque_15', 'Sujet_15', '2024-05-21');


INSERT INTO Specialite (nomSpe) VALUES
                                    ('Specialite_1'),
                                    ('Specialite_2'),
                                    ('Specialite_3'),
                                    ('Specialite_4'),
                                    ('Specialite_5'),
                                    ('Specialite_6'),
                                    ('Specialite_7'),
                                    ('Specialite_8'),
                                    ('Specialite_9'),
                                    ('Specialite_10'),
                                    ('Specialite_11'),
                                    ('Specialite_12'),
                                    ('Specialite_13'),
                                    ('Specialite_14'),
                                    ('Specialite_15');

INSERT INTO Maitre_d_apprentissage (nomMaitapp, preMaitapp, mailMaitapp, telMaitapp, idEnt) VALUES
                                                                                                ('Maitre_1', 'Prenom_1', 'maitre_1@example.com', '0642077974', 13),
                                                                                                ('Maitre_2', 'Prenom_2', 'maitre_2@example.com', '0612839586', 9),
                                                                                                ('Maitre_3', 'Prenom_3', 'maitre_3@example.com', '0619037335', 1),
                                                                                                ('Maitre_4', 'Prenom_4', 'maitre_4@example.com', '0666484194', 15),
                                                                                                ('Maitre_5', 'Prenom_5', 'maitre_5@example.com', '0658350783', 11),
                                                                                                ('Maitre_6', 'Prenom_6', 'maitre_6@example.com', '0653133779', 12),
                                                                                                ('Maitre_7', 'Prenom_7', 'maitre_7@example.com', '0654192565', 12),
                                                                                                ('Maitre_8', 'Prenom_8', 'maitre_8@example.com', '0660698937', 3),
                                                                                                ('Maitre_9', 'Prenom_9', 'maitre_9@example.com', '0624630467', 11),
                                                                                                ('Maitre_10', 'Prenom_10', 'maitre_10@example.com', '0671581232', 13),
                                                                                                ('Maitre_11', 'Prenom_11', 'maitre_11@example.com', '0676136303', 5),
                                                                                                ('Maitre_12', 'Prenom_12', 'maitre_12@example.com', '0644595311', 10),
                                                                                                ('Maitre_13', 'Prenom_13', 'maitre_13@example.com', '0694815171', 12),
                                                                                                ('Maitre_14', 'Prenom_14', 'maitre_14@example.com', '0687095040', 3),
                                                                                                ('Maitre_15', 'Prenom_15', 'maitre_15@example.com', '0647744148', 1);

INSERT INTO Classe (nomCla) VALUES
                                ('Classe_1'),
                                ('Classe_2'),
                                ('Classe_3'),
                                ('Classe_4'),
                                ('Classe_5'),
                                ('Classe_6'),
                                ('Classe_7'),
                                ('Classe_8'),
                                ('Classe_9'),
                                ('Classe_10'),
                                ('Classe_11'),
                                ('Classe_12'),
                                ('Classe_13'),
                                ('Classe_14'),
                                ('Classe_15');

INSERT INTO Tuteur (preTut, nomTut, telTut, mailTut) VALUES
                                                         ('TuteurPrenom_1', 'TuteurNom_1', '0655955545', 'tuteur_1@example.com'),
                                                         ('TuteurPrenom_2', 'TuteurNom_2', '0615970041', 'tuteur_2@example.com'),
                                                         ('TuteurPrenom_3', 'TuteurNom_3', '0656236102', 'tuteur_3@example.com'),
                                                         ('TuteurPrenom_4', 'TuteurNom_4', '0678218640', 'tuteur_4@example.com'),
                                                         ('TuteurPrenom_5', 'TuteurNom_5', '0687857407', 'tuteur_5@example.com'),
                                                         ('TuteurPrenom_6', 'TuteurNom_6', '0677849505', 'tuteur_6@example.com'),
                                                         ('TuteurPrenom_7', 'TuteurNom_7', '0629937117', 'tuteur_7@example.com'),
                                                         ('TuteurPrenom_8', 'TuteurNom_8', '0665919425', 'tuteur_8@example.com'),
                                                         ('TuteurPrenom_9', 'TuteurNom_9', '0674749787', 'tuteur_9@example.com'),
                                                         ('TuteurPrenom_10', 'TuteurNom_10', '0642216423', 'tuteur_10@example.com'),
                                                         ('TuteurPrenom_11', 'TuteurNom_11', '0681187911', 'tuteur_11@example.com'),
                                                         ('TuteurPrenom_12', 'TuteurNom_12', '0655986212', 'tuteur_12@example.com'),
                                                         ('TuteurPrenom_13', 'TuteurNom_13', '0673895193', 'tuteur_13@example.com'),
                                                         ('TuteurPrenom_14', 'TuteurNom_14', '0652245181', 'tuteur_14@example.com'),
                                                         ('TuteurPrenom_15', 'TuteurNom_15', '0627755774', 'tuteur_15@example.com');

INSERT INTO Utilisateur (nomUti, preUti, mailUti, altUti, telUti, adrUti, cpUti, vilUti, logUti, mdpUti, idTut, idSpe, idTypeuti, idMaitapp, idEnt, idCla) VALUES
                                                                                                                                                               ('UtilisateurNom_1', 'UtilisateurPrenom_1', 'user_1@example.com', False, '0656699843', 'AdresseUtilisateur_1', '10497', 'VilleUtilisateur_1', 'Login_1', 'Password_1', 5, 6, 1, 15, 2, 13),
                                                                                                                                                               ('UtilisateurNom_2', 'UtilisateurPrenom_2', 'user_2@example.com', True, '0622257182', 'AdresseUtilisateur_2', '52184', 'VilleUtilisateur_2', 'Login_2', 'Password_2', 6, 12, 3, 12, 10, 13),
                                                                                                                                                               ('UtilisateurNom_3', 'UtilisateurPrenom_3', 'user_3@example.com', False, '0672543846', 'AdresseUtilisateur_3', '95838', 'VilleUtilisateur_3', 'Login_3', 'Password_3', 5, 6, 2, 3, 14, 11),
                                                                                                                                                               ('UtilisateurNom_4', 'UtilisateurPrenom_4', 'user_4@example.com', True, '0620367009', 'AdresseUtilisateur_4', '25119', 'VilleUtilisateur_4', 'Login_4', 'Password_4', 14, 8, 1, 5, 3, 1),
                                                                                                                                                               ('UtilisateurNom_5', 'UtilisateurPrenom_5', 'user_5@example.com', False, '0639707976', 'AdresseUtilisateur_5', '11190', 'VilleUtilisateur_5', 'Login_5', 'Password_5', 2, 1, 3, 13, 2, 8),
                                                                                                                                                               ('UtilisateurNom_6', 'UtilisateurPrenom_6', 'user_6@example.com', True, '0642682521', 'AdresseUtilisateur_6', '26104', 'VilleUtilisateur_6', 'Login_6', 'Password_6', 13, 12, 3, 10, 2, 13),
                                                                                                                                                               ('UtilisateurNom_7', 'UtilisateurPrenom_7', 'user_7@example.com', False, '0671526952', 'AdresseUtilisateur_7', '43317', 'VilleUtilisateur_7', 'Login_7', 'Password_7', 5, 10, 2, 5, 15, 7),
                                                                                                                                                               ('UtilisateurNom_8', 'UtilisateurPrenom_8', 'user_8@example.com', False, '0620956092', 'AdresseUtilisateur_8', '88661', 'VilleUtilisateur_8', 'Login_8', 'Password_8', 1, 6, 1, 10, 10, 10),
                                                                                                                                                               ('UtilisateurNom_9', 'UtilisateurPrenom_9', 'user_9@example.com', False, '0691007678', 'AdresseUtilisateur_9', '54210', 'VilleUtilisateur_9', 'Login_9', 'Password_9', 11, 10, 1, 1, 13, 11),
                                                                                                                                                               ('UtilisateurNom_10', 'UtilisateurPrenom_10', 'user_10@example.com', False, '0660874784', 'AdresseUtilisateur_10', '32720', 'VilleUtilisateur_10', 'Login_10', 'Password_10', 15, 4, 2, 4, 11, 2),
                                                                                                                                                               ('UtilisateurNom_11', 'UtilisateurPrenom_11', 'user_11@example.com', True, '0626632341', 'AdresseUtilisateur_11', '61187', 'VilleUtilisateur_11', 'Login_11', 'Password_11', 8, 10, 3, 10, 1, 6),
                                                                                                                                                               ('UtilisateurNom_12', 'UtilisateurPrenom_12', 'user_12@example.com', False, '0679328901', 'AdresseUtilisateur_12', '56856', 'VilleUtilisateur_12', 'Login_12', 'Password_12', 9, 7, 3, 14, 1, 13),
                                                                                                                                                               ('UtilisateurNom_13', 'UtilisateurPrenom_13', 'user_13@example.com', True, '0668419923', 'AdresseUtilisateur_13', '44535', 'VilleUtilisateur_13', 'Login_13', 'Password_13', 12, 3, 1, 6, 11, 7),
                                                                                                                                                               ('UtilisateurNom_14', 'UtilisateurPrenom_14', 'user_14@example.com', False, '0662183573', 'AdresseUtilisateur_14', '18838', 'VilleUtilisateur_14', 'Login_14', 'Password_14', 8, 5, 2, 12, 15, 3),
                                                                                                                                                               ('UtilisateurNom_15', 'UtilisateurPrenom_15', 'user_15@example.com', True, '0639161619', 'AdresseUtilisateur_15', '77685', 'VilleUtilisateur_15', 'Login_15', 'Password_15', 5, 10, 2, 2, 3, 6);


INSERT INTO Alerte (datelimbil1Al, datelimbil2Al) VALUES
    ('2024-01-15', '2024-07-21');

INSERT INTO Realiser1 (idUti, idBil1) VALUES
                                          (2, 11),
                                          (15, 4),
                                          (8, 8),
                                          (8, 13),
                                          (14, 9),
                                          (11, 6),
                                          (11, 2),
                                          (2, 7),
                                          (1, 3),
                                          (13, 4),
                                          (3, 10),
                                          (9, 10),
                                          (4, 3),
                                          (10, 13),
                                          (10, 10);

INSERT INTO Realiser2 (idUti, idBil2) VALUES
                                          (5, 4),
                                          (13, 6),
                                          (8, 2),
                                          (4, 10),
                                          (6, 13),
                                          (9, 6),
                                          (2, 14),
                                          (14, 7),
                                          (10, 3),
                                          (13, 8),
                                          (2, 9),
                                          (7, 8),
                                          (11, 13),
                                          (2, 10),
                                          (3, 1);

INSERT INTO Gerer (idCla, idTut, nbmaxetuTut) VALUES
                                                  (11, 11, 19),
                                                  (6, 15, 20),
                                                  (5, 6, 28),
                                                  (3, 12, 30),
                                                  (1, 6, 20),
                                                  (4, 6, 13),
                                                  (15, 15, 28),
                                                  (12, 7, 22),
                                                  (13, 14, 26),
                                                  (14, 10, 28),
                                                  (10, 3, 16),
                                                  (14, 4, 16),
                                                  (2, 4, 10),
                                                  (5, 11, 28),
                                                  (3, 4, 19);
