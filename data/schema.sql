CREATE TABLE hospitais (
    id INTEGER PRIMARY KEY AUTOINCREMENT, 
    nome varchar(40) NOT NULL, 
    endereco varchar(60) NOT NULL,
    bairro varchar(20) NOT NULL,
    cep numeric(10) NOT NULL,
    telefone numeric(10) NOT NULL,
    PRIMARY KEY(id)
);


INSERT INTO hospitais (nome, endereco, bairro, cep, telefone) VALUES ('THospital dos Passaros', 'Rua das Frutas', 'Verao', 32424242, 435345345);
INSERT INTO hospitais (nome, endereco, bairro, cep, telefone) VALUES ('Hospital dos Cães', 'Rua das Maças', 'Outono', 423424);
INSERT INTO hospitais (nome, endereco, bairro, cep, telefone) VALUES ('Hospital dos Rinocerontes', 'Rua das Peras', 'Inverno', 4234242, 3545345);
INSERT INTO hospitais (nome, endereco, bairro, cep, telefone) VALUES ('Hospital dos Gatos', 'Rua dos Limões', 'Outono', 234242, 43534534);
INSERT INTO hospitais (nome, endereco, bairro, cep, telefone) VALUES ('Hospital dos Elefantes', 'Rua das Bananas', 'Inverno', 4453453, 34534534);
```

sqlite data/hospitais.db < data/schema.sql