CREATE DATABASE IF NOT EXISTS dblocker;

ALTER DATABASE dblocker DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE dblocker;

CREATE TABLE armario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secao VARCHAR(3) NOT NULL,
    numero TINYINT(1) NOT NULL,
    local VARCHAR(40),
    andar VARCHAR(10),
    situacao VARCHAR(15) NOT NULL,

    CONSTRAINT uk_secao_numero UNIQUE (secao, numero)

);

CREATE TABLE curso (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_curso CHAR(2) NOT NULL UNIQUE,
    nome VARCHAR(50) NOT NULL,
    duracao TINYINT(1) NOT NULL

);

CREATE TABLE funcionario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(45) NOT NULL,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) NOT NULL,
    funcao VARCHAR(30) NOT NULL,
    privilegio VARCHAR(30) NOT NULL

);

CREATE TABLE aluno (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rm INT NOT NULL UNIQUE,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(45) NOT NULL,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) NOT NULL,
    purl VARCHAR(12) DEFAULT NULL,
    ativo TINYINT(1) NOT NULL DEFAULT 0

);

CREATE TABLE telefone_funcionario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(11) NOT NULL,
    id_funcionario INT NOT NULL,

    CONSTRAINT fk_telefone_funcionario_funcionario FOREIGN KEY (id_funcionario) REFERENCES funcionario(id)

);

CREATE TABLE telefone_aluno (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(11) NOT NULL,
    id_aluno INT NOT NULL,

    CONSTRAINT fk_telefone_aluno_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id)

);

CREATE TABLE cursando (

    id_aluno INT NOT NULL,
    id_curso INT NOT NULL,
    modulo TINYINT(1) NOT NULL,
    periodo VARCHAR(10),
    situacao_matricula TINYINT(1),

    CONSTRAINT pk_id_aluno_id_curso PRIMARY KEY (id_aluno, id_curso),

    CONSTRAINT fk_cursando_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_cursando_curso FOREIGN KEY (id_curso) REFERENCES curso(id)

);

CREATE TABLE plano (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    plano VARCHAR(30) NOT NULL,
    valor DECIMAL(6, 2) NOT NULL,
    status TINYINT(1) NOT NULL,
    duracao TINYINT(2) NOT NULL

);

CREATE TABLE aluguel (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    data DATETIME NOT NULL,
    situacao VARCHAR(15),
    id_aluno INT NOT NULL,
    id_armario INT NOT NULL,
    id_plano INT NOT NULL,

    CONSTRAINT fk_locacao_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_locacao_armario FOREIGN KEY (id_armario) REFERENCES armario(id),
    CONSTRAINT fk_locacao_plano FOREIGN KEY (id_plano) REFERENCES plano(id)

);



INSERT INTO plano (plano, valor, status, duracao) VALUES
('Semestral', 50.00, 1, 6),
('Anual', 100.00, 1, 12),
('Promocional', 40.00, 1, 4);


INSERT INTO curso (codigo_curso, nome, duracao) VALUES
('C', 'Administração Integral', 6),
('B', 'Nutrição e Dietética Integral', 6),
('D', 'Química Integral', 6),
('L', 'Administração', 3),
('N', 'Nutrição e Dietética', 3),
('Q', 'Química', 3),
('H', 'Desenvolvimento de Sistemas', 3);

INSERT INTO armario (secao, numero, local, andar, situacao) VALUES
('C', 1, 'corredor química', 'superior', 'disponível'),
('C', 2, 'corredor química', 'superior', 'disponível'),
('C', 3, 'corredor química', 'superior', 'disponível'),
('C', 4, 'corredor química', 'superior', 'disponível'),
('C', 5, 'corredor química', 'superior', 'disponível'),
('C', 6, 'corredor química', 'superior', 'disponível'),
('C', 7, 'corredor química', 'superior', 'disponível'),
('C', 8, 'corredor química', 'superior', 'disponível'),
('C', 9, 'corredor química', 'superior', 'disponível'),
('C', 10, 'corredor química', 'superior', 'disponível'),
('C', 11, 'corredor química', 'superior', 'disponível'),
('C', 12, 'corredor química', 'superior', 'disponível'),
('C', 13, 'corredor química', 'superior', 'disponível'),
('C', 14, 'corredor química', 'superior', 'disponível'),
('C', 15, 'corredor química', 'superior', 'disponível'),
('C', 16, 'corredor química', 'superior', 'disponível'),
('C', 17, 'corredor química', 'superior', 'disponível'),
('C', 18, 'corredor química', 'superior', 'disponível'),
('C', 19, 'corredor química', 'superior', 'disponível'),
('C', 20, 'corredor química', 'superior', 'disponível'),
('D', 1, 'corredor química', 'superior', 'alugado'),
('D', 2, 'corredor química', 'superior', 'alugado'),
('D', 3, 'corredor química', 'superior', 'alugado'),
('D', 4, 'corredor química', 'superior', 'alugado'),
('D', 5, 'corredor química', 'superior', 'alugado'),
('D', 6, 'corredor química', 'superior', 'alugado'),
('D', 7, 'corredor química', 'superior', 'alugado'),
('D', 8, 'corredor química', 'superior', 'alugado'),
('D', 9, 'corredor química', 'superior', 'alugado'),
('D', 10, 'corredor química', 'superior', 'alugado'),
('D', 11, 'corredor química', 'superior', 'alugado'),
('D', 12, 'corredor química', 'superior', 'alugado'),
('D', 13, 'corredor química', 'superior', 'alugado'),
('D', 14, 'corredor química', 'superior', 'alugado'),
('D', 15, 'corredor química', 'superior', 'alugado'),
('D', 16, 'corredor química', 'superior', 'alugado'),
('D', 17, 'corredor química', 'superior', 'alugado'),
('D', 18, 'corredor química', 'superior', 'alugado'),
('D', 19, 'corredor química', 'superior', 'alugado'),
('D', 20, 'corredor química', 'superior', 'alugado'),
('E', 1, 'corredor química', 'superior', 'disponível'),
('E', 2, 'corredor química', 'superior', 'disponível'),
('E', 3, 'corredor química', 'superior', 'disponível'),
('E', 4, 'corredor química', 'superior', 'disponível'),
('E', 5, 'corredor química', 'superior', 'disponível'),
('E', 6, 'corredor química', 'superior', 'disponível'),
('E', 7, 'corredor química', 'superior', 'disponível'),
('E', 8, 'corredor química', 'superior', 'disponível'),
('E', 9, 'corredor química', 'superior', 'disponível'),
('E', 10, 'corredor química', 'superior', 'disponível'),
('E', 11, 'corredor química', 'superior', 'disponível'),
('E', 12, 'corredor química', 'superior', 'disponível'),
('E', 13, 'corredor química', 'superior', 'disponível'),
('E', 14, 'corredor química', 'superior', 'disponível'),
('E', 15, 'corredor química', 'superior', 'disponível'),
('E', 16, 'corredor química', 'superior', 'disponível'),
('E', 17, 'corredor química', 'superior', 'disponível'),
('E', 18, 'corredor química', 'superior', 'disponível'),
('E', 19, 'corredor química', 'superior', 'disponível'),
('E', 20, 'corredor química', 'superior', 'disponível'),
('F', 1, 'corredor química', 'superior', 'indisponível'),
('F', 2, 'corredor química', 'superior', 'indisponível'),
('F', 3, 'corredor química', 'superior', 'indisponível'),
('F', 4, 'corredor química', 'superior', 'indisponível'),
('F', 5, 'corredor química', 'superior', 'indisponível'),
('F', 6, 'corredor química', 'superior', 'indisponível'),
('F', 7, 'corredor química', 'superior', 'indisponível'),
('F', 8, 'corredor química', 'superior', 'indisponível'),
('F', 9, 'corredor química', 'superior', 'indisponível'),
('F', 10, 'corredor química', 'superior', 'indisponível'),
('F', 11, 'corredor química', 'superior', 'indisponível'),
('F', 12, 'corredor química', 'superior', 'indisponível'),
('F', 13, 'corredor química', 'superior', 'indisponível'),
('F', 14, 'corredor química', 'superior', 'indisponível'),
('F', 15, 'corredor química', 'superior', 'indisponível'),
('F', 16, 'corredor química', 'superior', 'indisponível'),
('F', 17, 'corredor química', 'superior', 'indisponível'),
('F', 18, 'corredor química', 'superior', 'indisponível'),
('F', 19, 'corredor química', 'superior', 'indisponível'),
('F', 20, 'corredor química', 'superior', 'indisponível'),
('G', 1, 'corredor nutrição', 'superior', 'disponível'),
('G', 2, 'corredor nutrição', 'superior', 'disponível'),
('G', 3, 'corredor nutrição', 'superior', 'disponível'),
('G', 4, 'corredor nutrição', 'superior', 'disponível'),
('G', 5, 'corredor nutrição', 'superior', 'disponível'),
('G', 6, 'corredor nutrição', 'superior', 'disponível'),
('G', 7, 'corredor nutrição', 'superior', 'disponível'),
('G', 8, 'corredor nutrição', 'superior', 'disponível'),
('G', 9, 'corredor nutrição', 'superior', 'disponível'),
('G', 10, 'corredor nutrição', 'superior', 'disponível'),
('G', 11, 'corredor nutrição', 'superior', 'disponível'),
('G', 12, 'corredor nutrição', 'superior', 'disponível'),
('G', 13, 'corredor nutrição', 'superior', 'disponível'),
('G', 14, 'corredor nutrição', 'superior', 'disponível'),
('G', 15, 'corredor nutrição', 'superior', 'disponível'),
('G', 16, 'corredor nutrição', 'superior', 'disponível'),
('G', 17, 'corredor nutrição', 'superior', 'disponível'),
('G', 18, 'corredor nutrição', 'superior', 'disponível'),
('G', 19, 'corredor nutrição', 'superior', 'disponível'),
('G', 20, 'corredor nutrição', 'superior', 'disponível'),
('H', 1, 'corredor nutrição', 'superior', 'disponível'),
('H', 2, 'corredor nutrição', 'superior', 'disponível'),
('H', 3, 'corredor nutrição', 'superior', 'disponível'),
('H', 4, 'corredor nutrição', 'superior', 'disponível'),
('H', 5, 'corredor nutrição', 'superior', 'disponível'),
('H', 6, 'corredor nutrição', 'superior', 'disponível'),
('H', 7, 'corredor nutrição', 'superior', 'disponível'),
('H', 8, 'corredor nutrição', 'superior', 'disponível'),
('H', 9, 'corredor nutrição', 'superior', 'disponível'),
('H', 10, 'corredor nutrição', 'superior', 'disponível'),
('H', 11, 'corredor nutrição', 'superior', 'disponível'),
('H', 12, 'corredor nutrição', 'superior', 'disponível'),
('H', 13, 'corredor nutrição', 'superior', 'disponível'),
('H', 14, 'corredor nutrição', 'superior', 'disponível'),
('H', 15, 'corredor nutrição', 'superior', 'disponível'),
('H', 16, 'corredor nutrição', 'superior', 'disponível'),
('H', 17, 'corredor nutrição', 'superior', 'disponível'),
('H', 18, 'corredor nutrição', 'superior', 'disponível'),
('H', 19, 'corredor nutrição', 'superior', 'disponível'),
('H', 20, 'corredor nutrição', 'superior', 'disponível'),
('I', 1, 'corredor nutrição', 'superior', 'indisponível'),
('I', 2, 'corredor nutrição', 'superior', 'indisponível'),
('I', 3, 'corredor nutrição', 'superior', 'indisponível'),
('I', 4, 'corredor nutrição', 'superior', 'indisponível'),
('I', 5, 'corredor nutrição', 'superior', 'indisponível'),
('I', 6, 'corredor nutrição', 'superior', 'indisponível'),
('I', 7, 'corredor nutrição', 'superior', 'indisponível'),
('I', 8, 'corredor nutrição', 'superior', 'indisponível'),
('I', 9, 'corredor nutrição', 'superior', 'indisponível'),
('I', 10, 'corredor nutrição', 'superior', 'indisponível'),
('I', 11, 'corredor nutrição', 'superior', 'indisponível'),
('I', 12, 'corredor nutrição', 'superior', 'indisponível'),
('I', 13, 'corredor nutrição', 'superior', 'indisponível'),
('I', 14, 'corredor nutrição', 'superior', 'indisponível'),
('I', 15, 'corredor nutrição', 'superior', 'indisponível'),
('I', 16, 'corredor nutrição', 'superior', 'indisponível'),
('I', 17, 'corredor nutrição', 'superior', 'indisponível'),
('I', 18, 'corredor nutrição', 'superior', 'indisponível'),
('I', 19, 'corredor nutrição', 'superior', 'indisponível'),
('I', 20, 'corredor nutrição', 'superior', 'indisponível'),
('J', 1, 'corredor nutrição', 'superior', 'alugado'),
('J', 2, 'corredor nutrição', 'superior', 'alugado'),
('J', 3, 'corredor nutrição', 'superior', 'alugado'),
('J', 4, 'corredor nutrição', 'superior', 'alugado'),
('J', 5, 'corredor nutrição', 'superior', 'alugado'),
('J', 6, 'corredor nutrição', 'superior', 'alugado'),
('J', 7, 'corredor nutrição', 'superior', 'alugado'),
('J', 8, 'corredor nutrição', 'superior', 'alugado'),
('J', 9, 'corredor nutrição', 'superior', 'alugado'),
('J', 10, 'corredor nutrição', 'superior', 'alugado'),
('J', 11, 'corredor nutrição', 'superior', 'alugado'),
('J', 12, 'corredor nutrição', 'superior', 'alugado'),
('J', 13, 'corredor nutrição', 'superior', 'alugado'),
('J', 14, 'corredor nutrição', 'superior', 'alugado'),
('J', 15, 'corredor nutrição', 'superior', 'alugado'),
('J', 16, 'corredor nutrição', 'superior', 'alugado'),
('J', 17, 'corredor nutrição', 'superior', 'alugado'),
('J', 18, 'corredor nutrição', 'superior', 'alugado'),
('J', 19, 'corredor nutrição', 'superior', 'alugado'),
('J', 20, 'corredor nutrição', 'superior', 'alugado'),
('L', 1, 'corredor administração', 'inferior', 'disponível'),
('L', 2, 'corredor administração', 'inferior', 'disponível'),
('L', 3, 'corredor administração', 'inferior', 'disponível'),
('L', 4, 'corredor administração', 'inferior', 'disponível'),
('L', 5, 'corredor administração', 'inferior', 'disponível'),
('L', 6, 'corredor administração', 'inferior', 'disponível'),
('L', 7, 'corredor administração', 'inferior', 'disponível'),
('L', 8, 'corredor administração', 'inferior', 'disponível'),
('L', 9, 'corredor administração', 'inferior', 'disponível'),
('L', 10, 'corredor administração', 'inferior', 'disponível'),
('L', 11, 'corredor administração', 'inferior', 'disponível'),
('L', 12, 'corredor administração', 'inferior', 'disponível'),
('L', 13, 'corredor administração', 'inferior', 'disponível'),
('L', 14, 'corredor administração', 'inferior', 'disponível'),
('L', 15, 'corredor administração', 'inferior', 'disponível'),
('L', 16, 'corredor administração', 'inferior', 'disponível'),
('L', 17, 'corredor administração', 'inferior', 'disponível'),
('L', 18, 'corredor administração', 'inferior', 'disponível'),
('L', 19, 'corredor administração', 'inferior', 'disponível'),
('L', 20, 'corredor administração', 'inferior', 'disponível'),
('M', 1, 'corredor administração', 'inferior', 'disponível'),
('M', 2, 'corredor administração', 'inferior', 'disponível'),
('M', 3, 'corredor administração', 'inferior', 'disponível'),
('M', 4, 'corredor administração', 'inferior', 'disponível'),
('M', 5, 'corredor administração', 'inferior', 'disponível'),
('M', 6, 'corredor administração', 'inferior', 'disponível'),
('M', 7, 'corredor administração', 'inferior', 'disponível'),
('M', 8, 'corredor administração', 'inferior', 'disponível'),
('M', 9, 'corredor administração', 'inferior', 'disponível'),
('M', 10, 'corredor administração', 'inferior', 'disponível'),
('M', 11, 'corredor administração', 'inferior', 'disponível'),
('M', 12, 'corredor administração', 'inferior', 'disponível'),
('M', 13, 'corredor administração', 'inferior', 'disponível'),
('M', 14, 'corredor administração', 'inferior', 'disponível'),
('M', 15, 'corredor administração', 'inferior', 'disponível'),
('M', 16, 'corredor administração', 'inferior', 'disponível'),
('M', 17, 'corredor administração', 'inferior', 'disponível'),
('M', 18, 'corredor administração', 'inferior', 'disponível'),
('M', 19, 'corredor administração', 'inferior', 'disponível'),
('M', 20, 'corredor administração', 'inferior', 'disponível'),
('N', 1, 'corredor administração', 'inferior', 'alugado'),
('N', 2, 'corredor administração', 'inferior', 'alugado'),
('N', 3, 'corredor administração', 'inferior', 'alugado'),
('N', 4, 'corredor administração', 'inferior', 'alugado'),
('N', 5, 'corredor administração', 'inferior', 'alugado'),
('N', 6, 'corredor administração', 'inferior', 'alugado'),
('N', 7, 'corredor administração', 'inferior', 'alugado'),
('N', 8, 'corredor administração', 'inferior', 'alugado'),
('N', 9, 'corredor administração', 'inferior', 'alugado'),
('N', 10, 'corredor administração', 'inferior', 'alugado'),
('N', 11, 'corredor administração', 'inferior', 'alugado'),
('N', 12, 'corredor administração', 'inferior', 'alugado'),
('N', 13, 'corredor administração', 'inferior', 'alugado'),
('N', 14, 'corredor administração', 'inferior', 'alugado'),
('N', 15, 'corredor administração', 'inferior', 'alugado'),
('N', 16, 'corredor administração', 'inferior', 'alugado'),
('N', 17, 'corredor administração', 'inferior', 'alugado'),
('N', 18, 'corredor administração', 'inferior', 'alugado'),
('N', 19, 'corredor administração', 'inferior', 'alugado'),
('N', 20, 'corredor administração', 'inferior', 'alugado'),
('O', 1, 'corredor administração', 'inferior', 'indisponível'),
('O', 2, 'corredor administração', 'inferior', 'indisponível'),
('O', 3, 'corredor administração', 'inferior', 'indisponível'),
('O', 4, 'corredor administração', 'inferior', 'indisponível'),
('O', 5, 'corredor administração', 'inferior', 'indisponível'),
('O', 6, 'corredor administração', 'inferior', 'indisponível'),
('O', 7, 'corredor administração', 'inferior', 'indisponível'),
('O', 8, 'corredor administração', 'inferior', 'indisponível'),
('O', 9, 'corredor administração', 'inferior', 'indisponível'),
('O', 10, 'corredor administração', 'inferior', 'indisponível'),
('O', 11, 'corredor administração', 'inferior', 'indisponível'),
('O', 12, 'corredor administração', 'inferior', 'indisponível'),
('O', 13, 'corredor administração', 'inferior', 'indisponível'),
('O', 14, 'corredor administração', 'inferior', 'indisponível'),
('O', 15, 'corredor administração', 'inferior', 'indisponível'),
('O', 16, 'corredor administração', 'inferior', 'indisponível'),
('O', 17, 'corredor administração', 'inferior', 'indisponível'),
('O', 18, 'corredor administração', 'inferior', 'indisponível'),
('O', 19, 'corredor administração', 'inferior', 'indisponível'),
('O', 20, 'corredor administração', 'inferior', 'indisponível'),
('B', 1, 'corredor química', 'inferior', 'indisponível'),
('B', 2, 'corredor química', 'inferior', 'indisponível'),
('B', 3, 'corredor química', 'inferior', 'indisponível'),
('B', 4, 'corredor química', 'inferior', 'indisponível'),
('B', 5, 'corredor química', 'inferior', 'indisponível'),
('B', 6, 'corredor química', 'inferior', 'indisponível'),
('B', 7, 'corredor química', 'inferior', 'indisponível'),
('B', 8, 'corredor química', 'inferior', 'indisponível'),
('B', 9, 'corredor química', 'inferior', 'indisponível'),
('B', 10, 'corredor química', 'inferior', 'indisponível'),
('B', 11, 'corredor química', 'inferior', 'indisponível'),
('B', 12, 'corredor química', 'inferior', 'indisponível'),
('B', 13, 'corredor química', 'inferior', 'indisponível'),
('B', 14, 'corredor química', 'inferior', 'indisponível'),
('B', 15, 'corredor química', 'inferior', 'indisponível'),
('B', 16, 'corredor química', 'inferior', 'indisponível'),
('B', 17, 'corredor química', 'inferior', 'indisponível'),
('B', 18, 'corredor química', 'inferior', 'indisponível'),
('B', 19, 'corredor química', 'inferior', 'indisponível'),
('B', 20, 'corredor química', 'inferior', 'indisponível');

INSERT INTO `funcionario` (`id`, `cpf`, `email`, `senha`, `nome`, `sobrenome`, `funcao`, `privilegio`) VALUES (NULL, '12345678900', 'teste1@gmail.com', '12345678', 'Admin', 'teste', 'Administrador', 'Todos');
