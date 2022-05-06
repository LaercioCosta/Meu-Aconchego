CREATE DATABASE produto;

USE produto;

CREATE TABLE produto(
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
	valor NUMERIC(9,2) NOT NULL,
    quantidade INT NOT NULL DEFAULT 30,
    PRIMARY KEY(id)
    );
    
    INSERT INTO produto (id, nome, valor, quantidade)VALUES
		(111, 'Almofada crochê', 39.99, 5),
        (222,'Mascara preta', 15.30, 7);
        select * from produto;