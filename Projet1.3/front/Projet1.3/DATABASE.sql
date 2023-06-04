DROP DATABASE BDDagora;

CREATE DATABASE BDDagora;

USE BDDagora;

-- "catégorie"
CREATE TABLE IF NOT EXISTS categorie (
    id_categorie INT(11) NOT NULL AUTO_INCREMENT,
    categdescpt VARCHAR(255) NOT NULL,

    PRIMARY KEY (id_categorie)
);

-- "item"
CREATE TABLE IF NOT EXISTS item (
    id_item INT(11) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    photos VARCHAR(255) NOT NULL,
    descriptions VARCHAR(255) NOT NULL,
    video VARCHAR(255),
    prix DECIMAL(10, 2),
    id_categorie INT(11) NOT NULL,
    vendeur INT(11) NOT NULL,
    enchere VARCHAR(225) NOT NULL,
    prix_enchere DECIMAL (11),
    date_publi DATETIME(6) NOT NULL, 

    PRIMARY KEY (id_item),
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)
);

-- "adresse"
CREATE TABLE IF NOT EXISTS adresse (
    id_adr INT(11) NOT NULL AUTO_INCREMENT,
    adresse_ligne1 VARCHAR(255) NOT NULL,
    adresse_ligne2 VARCHAR(255),
    ville VARCHAR(255) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    pays VARCHAR(255) NOT NULL,

    PRIMARY KEY (id_adr)
);

-- "moy_paiement"
CREATE TABLE IF NOT EXISTS moy_paiement (
    id_moy_paiement INT(11) NOT NULL AUTO_INCREMENT,
    num_carte VARCHAR(16) NOT NULL,
    type_carte VARCHAR(50) NOT NULL,
    nom_carte VARCHAR(255) NOT NULL,
    date_exp VARCHAR(10) NOT NULL,
    securite VARCHAR(4) NOT NULL,

    PRIMARY KEY (id_moy_paiement)
);

-- "user"
CREATE TABLE IF NOT EXISTS user (
    id_user INT(11) NOT NULL AUTO_INCREMENT,
    status VARCHAR(50) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    id_adr INT(11) NOT NULL,
    photo VARCHAR(255),
    image_fond_pref VARCHAR(255),
    clause_acceptee TINYINT(1) NOT NULL,
    id_moy_paiement INT(11),

    PRIMARY KEY (id_user),
    FOREIGN KEY (id_adr) REFERENCES adresse(id_adr),
    FOREIGN KEY (id_moy_paiement) REFERENCES moy_paiement(id_moy_paiement)
);

-- "negociation"
CREATE TABLE IF NOT EXISTS nego (
    id_nego INT(11) NOT NULL AUTO_INCREMENT,
    id_item INT(11) NOT NULL,
    id_user INT(11) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,

    PRIMARY KEY (id_nego),
    FOREIGN KEY (id_item) REFERENCES item(id_item),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

-- "offre"
CREATE TABLE IF NOT EXISTS offre (
    id_offre INT(11) NOT NULL AUTO_INCREMENT,
    id_item INT(11) NOT NULL,
    id_user INT(11) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,

    PRIMARY KEY (id_offre),
    FOREIGN KEY (id_item) REFERENCES item(id_item),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE IF NOT EXISTS panier (
    id_panier INT(11) NOT NULL AUTO_INCREMENT,
    id_item INT(11) NOT NULL,
    id_user INT(11) NOT NULL,
    quantite INT(11) NOT NULL,

    PRIMARY KEY (id_panier),
    FOREIGN KEY (id_item) REFERENCES item(id_item),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);



INSERT INTO categorie (id_categorie, categdescpt)
VALUES
    (1, 'Meubles et objets d’art'),
    (2, 'Accessoire VIP'),
    (3, 'Matériels scolaires'),
    (4, 'Vêtements et accessoires'),
    (5, 'Électronique et informatique');

INSERT INTO item (id_item, nom, photos, descriptions, video, prix, id_categorie, vendeur, enchere, prix_enchere, date_publi)
VALUES
    (1, 'Table en bois', 'table1.jpg', 'Belle table en bois massif', NULL, NULL, 1, 5, "oui", 200, '2013-05-28 16:03:25'),
    (2, 'Collier en argent', 'collier2.jpg', 'Collier avec pendentif en argent', NULL, 150, 4, 1, "non", NULL, '2017-05-01 07:07:45'),
    (3, 'Cahier A4', 'cahier3.jpg', 'Cahier de format A4', NULL, 5, 3, 4,"non",NULL, '2017-05-01 07:07:45' ),
    (4, 'T-shirt noir', 'tshirt4.jpg', 'T-shirt noir de taille M', NULL, NULL, 5, 3, "oui", 20,'2017-05-01 07:07:45'),
    (5, 'Ordinateur portable', 'laptop5.jpg', 'Ordinateur portable avec processeur i7', NULL, 1000, 5, 7, "non", NULL, '2022-11-18 11:39:33');

INSERT INTO moy_paiement (id_moy_paiement, num_carte, type_carte, nom_carte, date_exp, securite)
VALUES
    (1, '1234567890123456', 'Visa', 'John Doe', '2025-12', '123'),
    (2, '9876543210987654', 'MasterCard', 'Jane Smith', '2024-06', '789'),
    (3, '5555444433332222', 'Visa', 'Mark Johnson', '2023-09', '456'),
    (4, '1111222233334444', 'American Express', 'Sarah Wilson', '2026-03', '789'),
    (5, '6666777788889999', 'Visa', 'Michael Brown', '2024-11', '234');


INSERT INTO user (id_user, status, pseudo, email, mdp, nom, prenom, id_adr, photo, image_fond_pref, clause_acceptee, id_moy_paiement)
VALUES
    (1, 'admin', 'john_doe', 'john@example.com', 'password123', 'Doe', 'John', 1, 'photo1.jpg', 'fond1.jpg', 1, 1),
    (2, 'vendeur', 'jane_smith', 'jane@example.com', 'password456', 'Smith', 'Jane', 2, 'photo2.jpg', 'fond2.jpg', 1, 2),
    (3, 'acheteur', 'mark_johnson', 'mark@example.com', 'password789', 'Johnson', 'Mark', 3, 'photo3.jpg', 'fond3.jpg', 1, 3),
    (4, 'acheteur', 'sarah_wilson', 'sarah@example.com', 'passwordabc', 'Wilson', 'Sarah', 4, 'photo4.jpg', 'fond4.jpg', 1, 4),
    (5, 'vendeur', 'michael_brown', 'michael@example.com', 'passworddef', 'Brown', 'Michael', 5, 'photo5.jpg', 'fond5.jpg', 1, 5);


INSERT INTO adresse (id_adr, adresse_ligne1, adresse_ligne2, ville, code_postal, pays)
VALUES
    (1, '123 Rue de la Ville', 'Appartement 5', 'Paris', '75001', 'France'),
    (2, '456 Avenue du Soleil', NULL, 'Nice', '06000', 'France'),
    (3, '789 Rue Principale', NULL, 'Montreal', 'H2X 1Y6', 'Canada'),
    (4, '321 Main Street', 'Apartment 10', 'New York', '10001', 'United States'),
    (5, '987 Piazza del Popolo', NULL, 'Rome', '00187', 'Italy');

