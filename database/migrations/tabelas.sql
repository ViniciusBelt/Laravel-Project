----------TABELA ETAPAS----------

CREATE TABLE etapas (
    id int NOT NULL AUTO_INCREMENT,
    descricao varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

----------CARGA ETAPAS----------

INSERT
	INTO
	laravel.etapas
(descricao)
VALUES ('Em Andamento'),
('Em Analise'),
('Concluida'),
('Reprovada'),
('Finalizada');

----------TABELA USERS----------

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    usuario varchar(255) NOT NULL,
    nome varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    id_acesso int NOT NULL,
    senha varchar(255) NOT NULL,
    data_criacao DATE,
    PRIMARY KEY (id)
);

----------TABELA CAIXA-ENTRADA----------

CREATE TABLE caixaEntrada (
    id int NOT NULL AUTO_INCREMENT,
    cpf_cnpj_id varchar(255) NOT NULL,
    cliente varchar(255) NOT NULL,
    id_solicitante int NOT NULL,
    id_etapa int NOT NULL,
    data_solicitacao DATE,
    data_aprovacao DATE,
    tipo_solicitacao varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

----------TABELA ACESSO----------

CREATE TABLE acesso (
    id int NOT NULL AUTO_INCREMENT,
    descricao varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

----------CARGA ACESSO----------

INSERT
	INTO
	laravel.acesso
(descricao)
VALUES ('TI'),
('Analista'),
('Solicitante'),
('INATIVO');

----------CHAVE ESTRANGEIRA----------

--caixaEntrada--

ALTER TABLE
	caixaEntrada 
ADD FOREIGN KEY
	(id_etapa) 
REFERENCES 
	etapas(id);

--caixaEntrada--

ALTER TABLE
	caixaEntrada 
ADD FOREIGN KEY
	(id_solicitante) 
REFERENCES 
	users(id);

--users--

ALTER TABLE
	users 
ADD FOREIGN KEY
	(id_acesso) 
REFERENCES 
	acesso(id);