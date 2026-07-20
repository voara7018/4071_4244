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

INSERT INTO bareme_frais(type_operation_id, montant_min, montant_max, frais) VALUES
(1, 0, 1000, 10),
(1, 1001, 5000, 20),
(1, 5001, 10000, 30),
(2, 0, 1000, 15),
(2, 1001, 5000, 25),
(2, 5001, 10000, 35),
(3, 0, 1000, 5),
(3, 1001, 5000, 10),
(3, 5001, 10000, 15);

INSERT INTO users(numero_telephone) VALUES
('0341234567');

INSERT INTO transactions(user_id, type_operation_id, montant, frais) VALUES
(1, 1, 500, 10);



SELECT * FROM transactions 
join types_operation on transactions.type_operation_id = types_operation.id group by types_operation.id; 