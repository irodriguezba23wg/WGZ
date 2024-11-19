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

-- Insertar datos
INSERT INTO jabeak (DNI, izena) VALUES 
('12345678A', 'Jon'),
('23456789B', 'Amaia');

INSERT INTO kotxeak (matrikula, matrikulazio_data, itv) VALUES 
('ABC1234', '2022-01-10', true),
('DEF5678', '2023-06-15', false);
