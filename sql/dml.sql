INSERT INTO Users (username, password) VALUES
('user1', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('user2', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('user3', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('user4', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('user5', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

INSERT INTO Posts (content, image_url, user_id) VALUES
('Contenuto del post 1', 'https://www.rossomotori.it/wp-content/uploads/2024/05/Ferrari-Miami.jpg', 1),
('Contenuto del post 2', NULL, 2),
('Contenuto del post 3', NULL, 3),
('Contenuto del post 4', NULL, 4),
('Contenuto del post 5', 'https://cdn-8.motorsport.com/images/amp/27vzzAR0/s1000/lando-norris-mclaren-mcl38.jpg', 5),
('Contenuto del post 6', NULL, 1),
('Contenuto del post 7', NULL, 2),
('Contenuto del post 8', NULL, 3),
('Contenuto del post 9', NULL, 4),
('Contenuto del post 10', NULL, 5);

INSERT INTO Comments (content, post_id, user_id) VALUES
('Commento 1 al post 1', 1, 2),
('Commento 2 al post 1', 1, 3),
('Commento 1 al post 3', 3, 4),
('Commento 1 al post 5', 5, 1),
('Commento 2 al post 5', 5, 3),
('Commento 1 al post 6', 6, 2),
('Commento 1 al post 8', 8, 1),
('Commento 2 al post 8', 8, 3),
('Commento 1 al post 10', 10, 4),
('Commento 2 al post 10', 10, 5);
