USE BOUTIQUE;

CREATE TABLE CLIENT (
    NCLI int primary key AUTO_INCREMENT,
    NOM VARCHAR(100) NOT NULL
);

CREATE TABLE FOURNISSEUR (
    NFOURN INT PRIMARY KEY AUTO_INCREMENT,
    NOMF VARCHAR(100) NOT NULL,
    VILLEF VARCHAR(100) NOT NULL
);

CREATE TABLE COMPTE (
    NCLI INT NOT NULL,
    NFOURN INT NOT NULL,
    DATE_OUV Date
);

CREATE TABLE ACHAT (
    NCLI INT NOT NULL,
    NFOURN INT NOT NULL,
    DATE_ACHAT date,
    MONTANT DECIMAL NOT NULL
);

ALTER TABLE COMPTE
ADD CONSTRAINT F1 FOREIGN KEY(NCLI) REFERENCES CLIENT (NCLI);

ALTER TABLE COMPTE
ADD CONSTRAINT F2 FOREIGN KEY(NFOURN) REFERENCES FOURNISSEUR (NFOURN);

ALTER TABLE ACHAT
ADD CONSTRAINT F3 FOREIGN KEY(NCLI) REFERENCES CLIENT (NCLI);

ALTER TABLE ACHAT
ADD CONSTRAINT F4 FOREIGN KEY(NFOURN) REFERENCES FOURNISSEUR (NFOURN)


INSERT INTO
    CLIENT (NOM)
VALUES ('Dupont'),
    ('Martin'),
    ('Bernard'),
    ('Dubois'),
    ('Thomas'),
    ('Robert'),
    ('Petit'),
    ('Richard'),
    ('Moreau'),
    ('Simon');

    -- Insertion des FOURNISSEURS
INSERT INTO
    FOURNISSEUR (NOMF, VILLEF)
VALUES ('TechWorld', 'Paris'),
    ('ElectroPlus', 'Lyon'),
    ('MegaStore', 'Marseille'),
    ('SuperShop', 'Toulouse'),
    ('ProMarket', 'Nice'),
    ('DistribPro', 'Nantes'),
    ('CommerceNet', 'Strasbourg'),
    ('VenteMax', 'Bordeaux');


    NSERT INTO COMPTE (NCLI, NFOURN, DATE_OUV)
VALUES (1, 1, '2023-01-15'),
    (1, 2, '2023-02-20'),
    (2, 1, '2023-01-10'),
    (2, 3, '2023-03-05'),
    (3, 2, '2023-02-15'),
    (3, 4, '2023-04-10'),
    (4, 1, '2023-01-20'),
    (4, 5, '2023-05-15'),
    (5, 3, '2023-03-25'),
    (5, 6, '2023-06-10'),
    (6, 2, '2023-02-28'),
    (7, 4, '2023-04-05'),
    (8, 5, '2023-05-20'),
    (9, 6, '2023-06-15'),
    (10, 7, '2023-07-01');


    INSERT INTO
    ACHAT (
        NCLI,
        NFOURN,
        DATE_ACHAT,
        MONTANT
    )
VALUES
    -- Achats de Dupont (NCLI=1)
    (1, 1, '2023-01-20', 150.50),
    (1, 1, '2023-02-15', 230.00),
    (1, 2, '2023-03-10', 89.99),
    (1, 2, '2023-04-05', 450.00),

-- Achats de Martin (NCLI=2)
(2, 1, '2023-01-25', 320.00),
(2, 3, '2023-03-15', 175.50),
(2, 3, '2023-05-20', 890.00),

-- Achats de Bernard (NCLI=3)
(3, 2, '2023-02-20', 540.00),
(3, 4, '2023-04-18', 210.75),
(3, 2, '2023-06-10', 125.00),

-- Achats de Dubois (NCLI=4)
(4, 1, '2023-01-30', 670.00),
(4, 5, '2023-05-25', 380.50),
(4, 1, '2023-07-15', 290.00),

-- Achats de Thomas (NCLI=5)
(5, 3, '2023-04-01', 155.00),
(5, 6, '2023-06-20', 425.75),
(5, 3, '2023-08-05', 310.00),

-- Achats de Robert (NCLI=6)
(6, 2, '2023-03-05', 780.00), (6, 2, '2023-05-10', 190.50),

-- Achats de Petit (NCLI=7)
(7, 4, '2023-04-12', 520.00), (7, 4, '2023-06-25', 340.25),

-- Achats de Richard (NCLI=8)
(8, 5, '2023-05-28', 615.00), (8, 5, '2023-07-20', 275.50),

-- Achats de Moreau (NCLI=9)
(9, 6, '2023-06-22', 890.00), (9, 6, '2023-08-10', 420.75),

-- Achats de Simon (NCLI=10)
(10, 7, '2023-07-05', 560.00), (10, 7, '2023-08-15', 310.50);