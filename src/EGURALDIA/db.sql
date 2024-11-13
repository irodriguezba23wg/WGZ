




CREATE TABLE herria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    izena VARCHAR(50) NOT NULL
);


CREATE TABLE iragarpena (
    id INT AUTO_INCREMENT PRIMARY KEY,
    herria_id INT NOT NULL,
    eguna DATE NOT NULL,
    iragarpena_testua TEXT,
    eguraldia ENUM('oskarbi', 'hodei-gutxi', 'hodeitsu', 'euritsu', 'lainotuta', 'elur') NOT NULL,
    tenperatura_minimoa DECIMAL(4, 1),
    tenperatura_maximoa DECIMAL(4, 1),
    FOREIGN KEY (herria_id) REFERENCES herria(id) ON DELETE CASCADE
);


CREATE TABLE iragarpena_orduko (
    id INT AUTO_INCREMENT PRIMARY KEY,
    iragarpena_id INT NOT NULL,
    ordua TIME NOT NULL,
    eguraldia ENUM('oskarbi', 'hodei-gutxi', 'hodeitsu', 'euritsu', 'lainotuta', 'elur') NOT NULL,
    tenperatura DECIMAL(4, 1),
    prezipitazioa DECIMAL(4, 1),
    haizea_nondik VARCHAR(10),
    haizea_kmh DECIMAL(4, 1),
    FOREIGN KEY (iragarpena_id) REFERENCES iragarpena(id) ON DELETE CASCADE
);
