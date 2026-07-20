DROP TABLE IF EXISTS prefixes;
DROP TABLE IF EXISTS types_operation;
DROP TABLE IF EXISTS bareme_frais;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS solde;
DROP TABLE IF EXISTS transactions;  
DROP TABLE IF EXISTS operateurs;
DROP TABLE IF EXISTS commissions_externes;


CREATE TABLE operateurs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT,
    is_local INTEGER
);
INSERT INTO operateurs(nom, is_local) VALUES
('LoVo', 1),
('Orange', 0),
('Airtel', 0),
('Yas', 0);

CREATE TABLE commissions_externes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    pourcentage INTEGER
);


CREATE TABLE prefixes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    operateur_id INTEGER,
    prefixes TEXT,
    statut INTEGER,
    FOREIGN KEY (operateur_id) REFERENCES operateurs(id)
);

CREATE TABLE types_operation (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT,
    type_operation TEXT
);

INSERT INTO types_operation(code, type_operation) VALUES
('depot', 'DEPOT'),
('retrait', 'RETRAIT'),
('transfert', 'TRANSFERT');

CREATE TABLE bareme_frais (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    type_operation_id INTEGER,
    montant_min REAL,
    montant_max REAL,
    frais REAL,
    FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
);

INSERT INTO bareme_frais (type_operation_id, montant_min, montant_max, frais) VALUES
-- Dépôt (gratuit)
(1, 100, 1000, 0),
(1, 1001, 5000, 0),
(1, 5001, 10000, 0),
(1, 10001, 25000, 0),
(1, 25001, 50000, 0),
(1, 50001, 100000, 0),
(1, 100001, 250000, 0),
(1, 250001, 500000, 0),
(1, 500001, 1000000, 0),
(1, 1000001, 2000000, 0),

-- Retrait
(2, 100, 1000, 50),
(2, 1001, 5000, 50),
(2, 5001, 10000, 100),
(2, 10001, 25000, 200),
(2, 25001, 50000, 400),
(2, 50001, 100000, 800),
(2, 100001, 250000, 1500),
(2, 250001, 500000, 1500),
(2, 500001, 1000000, 2500),
(2, 1000001, 2000000, 3000),

-- Transfert
(3, 100, 1000, 50),
(3, 1001, 5000, 50),
(3, 5001, 10000, 100),
(3, 10001, 25000, 200),
(3, 25001, 50000, 400),
(3, 50001, 100000, 800),
(3, 100001, 250000, 1500),
(3, 250001, 500000, 1500),
(3, 500001, 1000000, 2500),
(3, 1000001, 2000000, 3000);

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero_telephone TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users(numero_telephone) VALUES
('0340348384'),
('0321253840'),
('0340340340'),
('0381183803'),
('0344310340');

CREATE TABLE solde (
    user_id INTEGER,
    montant REAL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE transactions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    type_operation_id INTEGER,
    montant REAL,
    frais REAL,
    frais_externe REAL,
    operateur_destinataire_id INTEGER,
    date_transaction DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
);

