CREATE DATABASE kotxe_jabe;

USE kotxe_jabe;

CREATE TABLE jabeak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(9) NOT NULL,
    izena VARCHAR(100) NOT NULL
);

CREATE TABLE kotxeak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jabea_id INT,
    matrikula VARCHAR(7) NOT NULL,
    matrikulazio_data DATE,
    itv BOOLEAN,
    FOREIGN KEY (jabea_id) REFERENCES jabeak(id) ON DELETE SET NULL
);


INSERT INTO jabeak (DNI, izena) 
VALUES 
('12345678A', 'Juan Pérez'),
('98765432B', 'Ana López'),
('11223344C', 'Luis Gómez');

INSERT INTO kotxeak (jabea_id, matrikula, matrikulazio_data, itv) 
VALUES 
(1, '1234ABC', '2023-05-12', TRUE),
(2, '5678XYZ', '2022-08-22', FALSE),
(3, '9876DEF', '2024-01-15', TRUE);