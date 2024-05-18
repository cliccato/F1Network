INSERT INTO Users (email, password, username, birth_date, cell) VALUES
('mario.rossi@example.com', 'hashed_password_1', 'MarioRossi', '1985-06-15', '3331234567'),
('giulia.bianchi@example.com', 'hashed_password_2', 'GiuliaBianchi', '1990-03-24', '3332345678'),
('andrea.verdi@example.com', 'hashed_password_3', 'AndreaVerdi', '1988-11-10', NULL),
('laura.gallo@example.com', 'hashed_password_4', 'LauraGallo', '1992-09-02', '3333456789'),
('marco.moretti@example.com', 'hashed_password_5', 'MarcoMoretti', '1987-04-18', '3334567890');

INSERT INTO Posts (content, image_url, user_id) VALUES
('Ferrari annuncia un aggiornamento importante per la prossima gara!', 'https://www.rossomotori.it/wp-content/uploads/2024/05/Ferrari-Miami.jpg', 1),
('Lewis Hamilton vince il Gran Premio di Monaco!', NULL, 2),
('Max Verstappen domina le qualifiche a Silverstone.', NULL, 3),
('Mercedes introduce una nuova ala posteriore innovativa.', NULL, 4),
('McLaren svela la livrea speciale per il Gran Premio di casa.', 'https://cdn-8.motorsport.com/images/amp/27vzzAR0/s1000/lando-norris-mclaren-mcl38.jpg', 5),
('Charles Leclerc segna il giro più veloce durante le prove libere.', NULL, 1),
('Red Bull pronta a introdurre un nuovo motore per la seconda metà della stagione.', NULL, 2),
('Aston Martin conferma Sebastian Vettel per un altro anno.', NULL, 3),
('Alpine presenta il nuovo pacchetto aerodinamico per migliorare le prestazioni.', NULL, 4),
('Williams celebra il suo 50° anniversario con una serie di eventi speciali.', NULL, 5);


INSERT INTO Comments (content, post_id, user_id) VALUES
('Non vedo l\'ora di vedere come si comporterà Ferrari con gli aggiornamenti.', 1, 2),
('Grande vittoria di Hamilton! Monaco è sempre spettacolare.', 2, 3),
('Verstappen è inarrestabile quest\'anno!', 3, 4),
('Curioso di vedere come la nuova ala influenzerà le prestazioni di Mercedes.', 4, 1),
('La nuova livrea di McLaren è fantastica, molto meglio della precedente.', 5, 3),
('Forza Leclerc! Continuate così!', 6, 2),
('Un nuovo motore potrebbe davvero fare la differenza per Red Bull.', 7, 1),
('Contento di vedere Vettel restare con Aston Martin.', 8, 3),
('Alpine ha bisogno di miglioramenti, speriamo che questo pacchetto funzioni.', 9, 4),
('Williams ha una grande storia, auguri per il loro anniversario.', 10, 5);

