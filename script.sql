SHOW DATABASES;
CREATE DATABASE Trafego_Aéreo;
USE Trafego_Aéreo;
SHOW TABLES;
drop database trafego_aéreo;

SELECT * FROM admin;
SELECT * FROM aeronave;
SELECT * FROM aeroporto;
SELECT * FROM piloto;
SELECT * FROM voo;
SELECT * FROM controle_trafego;

CREATE TABLE admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE aeronave(
	id int auto_increment primary key,
    modelo varchar(100) not null,
    capacidade int not null,
    status enum('em voo', 'em solo', 'em manutenção') not null
    );

CREATE TABLE aeroporto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    codigo VARCHAR(10) NOT NULL,
    localizacao VARCHAR(255) NOT NULL
);
    
CREATE TABLE piloto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    licenca VARCHAR(50) NOT NULL,
    horas_voo INT NOT NULL
);
    
CREATE TABLE voo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_aeronave INT NOT NULL,
    id_origem INT NOT NULL,
    id_destino INT NOT NULL,
    horario_partida DATETIME NOT NULL,
    horario_chegada DATETIME NOT NULL,
    id_piloto INT NOT NULL,
    FOREIGN KEY (id_aeronave) REFERENCES aeronave(id),
    FOREIGN KEY (id_origem) REFERENCES aeroporto(id),
    FOREIGN KEY (id_destino) REFERENCES aeroporto(id),
    FOREIGN KEY (id_piloto) REFERENCES piloto(id)
);

CREATE TABLE controle_trafego (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_voo INT NOT NULL,
    id_aeronave INT NOT NULL,
    status ENUM('autorizado', 'não autorizado', 'em espera') NOT NULL,
    data_hora_autorizacao DATETIME NOT NULL,
    FOREIGN KEY (id_voo) REFERENCES voo(id),
    FOREIGN KEY (id_aeronave) REFERENCES aeronave(id)
);



INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto Internacional de São Paulo', 'GRU', 'São Paulo, SP');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Brasília', 'BSB', 'Brasília, DF');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto do Rio de Janeiro', 'GIG', 'Rio de Janeiro, RJ');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Recife', 'REC', 'Recife, PE');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Fortaleza', 'FOR', 'Fortaleza, CE');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Porto Alegre', 'POA', 'Porto Alegre, RS');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Salvador', 'SSA', 'Salvador, BA');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Curitiba', 'CWB', 'Curitiba, PR');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Belo Horizonte', 'CNF', 'Belo Horizonte, MG');
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto de Campinas', 'VCP', 'Campinas, SP');


INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Boeing 737', 150, 'em voo');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Airbus A320', 180, 'em manutenção');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Embraer 190', 100, 'em solo');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Boeing 787', 250, 'em voo');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Airbus A350', 300, 'em manutenção');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Boeing 767', 220, 'em solo');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Airbus A321', 200, 'em voo');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Embraer 175', 80, 'em manutenção');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Boeing 747', 400, 'em solo');
INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Airbus A330', 250, 'em voo');


INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Carlos Silva', 'ABC123', 2500);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Ana Oliveira', 'DEF456', 1800);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('João Souza', 'GHI789', 3500);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Maria Santos', 'JKL012', 2200);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Pedro Lima', 'MNO345', 1200);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Luciana Costa', 'PQR678', 4000);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Felipe Pereira', 'STU901', 1500);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Juliana Almeida', 'VWX234', 2700);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Ricardo Rocha', 'YZA567', 3200);
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Mariana Costa', 'BCD890', 2300);



INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (1, 1, 2, '2025-02-01 09:00:00', '2025-02-01 11:00:00', 1);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (2, 2, 3, '2025-02-01 10:00:00', '2025-02-01 12:00:00', 2);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (3, 3, 4, '2025-02-02 14:00:00', '2025-02-02 16:00:00', 3);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (4, 4, 5, '2025-02-02 15:00:00', '2025-02-02 17:00:00', 4);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (5, 5, 6, '2025-02-03 08:30:00', '2025-02-03 10:30:00', 5);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (6, 6, 7, '2025-02-03 12:00:00', '2025-02-03 14:00:00', 6);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (7, 7, 8, '2025-02-04 16:00:00', '2025-02-04 18:00:00', 7);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (8, 8, 9, '2025-02-04 10:30:00', '2025-02-04 12:30:00', 8);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (9, 9, 10, '2025-02-05 06:00:00', '2025-02-05 08:00:00', 9);
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (10, 10, 1, '2025-02-05 19:30:00', '2025-02-05 21:30:00', 10);



-- Inserir uma aeronave
INSERT INTO aeroporto (nome, codigo, localizacao) VALUES ('Aeroporto Internacional', 'GRU', 'São Paulo, SP');

INSERT INTO aeronave (modelo, capacidade, status) VALUES ('Boeing 737', 150, 'em voo');

-- Inserir um piloto
INSERT INTO piloto (nome, licenca, horas_voo) VALUES ('Carlos Silva', 'ABC123', 2500);

-- Inserir um voo
INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
VALUES (1, 1, 1, '2025-01-25 10:00:00', '2025-01-25 12:00:00', 1);

-- Inserir um controle de tráfego
INSERT INTO controle_trafego (id_voo, id_aeronave, status, data_hora_autorizacao) 
VALUES (1, 1, 'autorizado', '2025-01-25 09:45:00');
