DROP TABLE IF EXISTS prefixes;
DROP TABLE IF EXISTS types_operation;
DROP TABLE IF EXISTS bareme_frais;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS solde;
DROP TABLE IF EXISTS transactions;  

CREATE TABLE prefixes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    prefixes TEXT,
    statut INTEGER
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

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero_telephone TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users(numero_telephone) VALUES
('0340348384'),
('0321253840'),
('0340340340'),
('0381183803');


CREATE TABLE solde (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
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
    date_transaction DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
);