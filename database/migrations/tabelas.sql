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
    email varchar(255) NOT NULL,
    senha varchar(255) NOT NULL,
    data_criacao DATE,
    PRIMARY KEY (id)
);

----------TABELA CAIXA-ENTRADA----------
CREATE TABLE caixaEntrada (
    id int NOT NULL AUTO_INCREMENT,
    cpf_cnpj_id varchar(255) NOT NULL,
    cliente varchar(255) NOT NULL,
    solicitante varchar(255) NOT NULL,
    id_etapa int NOT NULL,
    data_solicitacao DATE,
    data_aprovacao DATE,
    tipo_solicitacao varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
----------CHAVE ESTRANGEIRA----------
ALTER TABLE
	caixaEntrada 
ADD FOREIGN KEY
	(id_etapa) 
REFERENCES 
	etapas(id);