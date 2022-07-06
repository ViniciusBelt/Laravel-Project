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

----------TABELA OBJETIVO----------

CREATE TABLE objetivo (
    id int NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    descricao varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

----------TABELA CHAT----------

CREATE TABLE chat (
    id int NOT NULL AUTO_INCREMENT,
    user_1 int NOT NULL,
    user_2 int NOT NULL,
    data_criacao DATE,
    PRIMARY KEY (id)
);

----------TABELA CHAT-MENSAGEM----------

CREATE TABLE chat_mensagem (
    id int NOT NULL AUTO_INCREMENT,
    id_chat int NOT NULL,
    id_remetente int NOT NULL,
    mensagem varchar(255) NOT NULL,
    data_criacao DATE,
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

--chat--

ALTER TABLE
	chat 
ADD FOREIGN KEY
	(user_1) 
REFERENCES 
	users(id);

ALTER TABLE
	chat 
ADD FOREIGN KEY
	(user_2) 
REFERENCES 
	users(id);

--chat_mensagem--

ALTER TABLE
	chat_mensagem 
ADD FOREIGN KEY
	(id_chat) 
REFERENCES 
	chat(id);

ALTER TABLE
	chat_mensagem 
ADD FOREIGN KEY
	(id_remetente) 
REFERENCES 
    users(id);