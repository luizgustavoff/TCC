create database tcc_lgr default character set utf8 collate utf8_general_ci;
use tcc_lgr;
/*drop database tcc_lgr;*/

create table usuarios(
cod bigint(11) not null auto_increment primary key,
nome varchar(100) not null,
email varchar(60) not null,
telefone bigint(11) not null,
senha varchar(60) not null,
tipo varchar(10) not null default 'cliente',
cpf bigint(11) not null
) engine=InnoDB default charset=utf8;

create table pedidos(
codpedido bigint(11) not null auto_increment primary key,
codusuario bigint(11) not null,
foreign key(codusuario) references usuarios(cod),
dataped datetime,
valorfinal decimal(6,2)
) engine=InnoDB default charset=utf8;

create table categorias(
codcategoria bigint(11) not null auto_increment primary key,
nomecategoria varchar(100) not null
) engine=InnoDB default charset=utf8;

create table marcas(
codmarca bigint(11) not null auto_increment primary key,
nomemarca varchar(100) not null
) engine=InnoDB default charset=utf8;

create table produtos(
codproduto bigint(11) not null auto_increment primary key,
categoria bigint(11) not null,
foreign key(categoria) references categorias(codcategoria),
marca bigint(11) not null,
foreign key(marca) references marcas(codmarca),
nomeproduto varchar(100) not null,
descricao text,
img varchar(40) default null,
valor decimal(6,2),
carrinho bool default(false),
ativo bool default(true),
promocao bool default(false)
) engine=InnoDB default charset=utf8;

create table agendamentos(
codagendamento bigint(11) not null auto_increment primary key,
nomepet varchar(60) not null,
dataagendamento datetime not null
) engine=InnoDB default charset=utf8;

create table itens(
coditem bigint(11) not null auto_increment primary key,
codped bigint(11) not null,
foreign key(codped) references pedidos(codpedido),
codpdt bigint(11) not null,
foreign key(codpdt) references produtos(codproduto),
qtde bigint(11),
subvalor decimal(8,2)
) engine=InnoDB default charset=utf8;


select*from usuarios;

select*from pedidos;
select*from itens;









insert into usuarios (nome, email, telefone, senha, tipo, cpf) values 
('Luix', 'luix@gmail.com', 16988695407, '$2y$10$TpKeVFI4s2ShWuats3CXoOyjenot0OXfm2UebJN5L4xD6CGJv4ERC', 'admin', 12345678910),
('Gonas', 'gonas@gmail.com', 16997246589, '$2y$10$fInlraOg/aIrC6138VFeuuySBHOEtUuFX0yDVWEfx.NibKglDMbhW', 'admin', 10987654321),
('Torres', 'torres@gmail.com', 16988695407, '$2y$10$TpKeVFI4s2ShWuats3CXoOyjenot0OXfm2UebJN5L4xD6CGJv4ERC', 'admin', 12398754601);

insert into categorias (nomecategoria) values 
('Alimentos'),
('Brinquedos'),
('Acessórios');

insert into marcas (nomemarca) values 
('Golden'),
('Flicks'),
('Doco');

insert into produtos (marca, categoria, nomeproduto, descricao, img, valor) values 
(1, 1, 'Ração Golden Special para Cães Adultos Frango e Carne', 'A Ração Golden Special sabor carne e frango para cães é um alimento da categoria Premium Especial. Ideal para cachorros adultos de todas as raças, ele se destaca por garantir uma dieta rica e balanceada, já que sua fórmula é livre de ingredientes artificiais.', 'racao-golden-special.png', 134.91),
(2, 2, 'Brinquedo Pelúcia Cobra com Catnip Flicks', 'O Brinquedo Pelúcia Cobra com Catnip Flicks é desenvolvido com erva dos gatos e penas para que atraia a atenção dos gatos e auxilie a distrair e diminuir o estresse e ansiedade dos felinos. Gatos são caçadores natos. Disponibilizar brinquedos é super indicado para um desenvolvimento saudável, desenvolvendo sua musculatura e evitando doenças. Com os brinquedos de pelúcia com catnip seu gato ficará relaxado, além de se divertir e estimular o raciocínio lógico.', 'Pelucia-Cobra-com-Catnip-Flicksc.png', 16.90),
(3, 3, 'Peitoral Cães Athletic Fit Doco Preto PP', 'O Peitoral Cães Athletic Fit Doco é feito de malha telada com acabamento refletivo. Fechamento rápido e seguro através da fivela e conta ainda com regulagem em velcro para um ajuste perfeito. Muito confortável, pois não pressiona o pescoço como as coleiras comuns. Suas tiras são de nylon com costura cruzada para distribuição ideal da tensão e proteção contra lesões no pescoço. É um produto de ótima qualidade e exclusivo da Cobasi. Só aqui você encontra Peitorais Doco com ótimos preços.', 'Peitoral-Caes-Athletic-Fit-Doco.png', 71.00),
(2, 2, 'Brinquedo Bola Linha Color Flicks Único', 'O Brinquedo Bola Linha Color Flicks oferece ao seu pet momentos de brincadeiras e descontração. Macio, resistente e de ótima qualidade, ele é feito em TPR, material flexível e durável, perfeito para estimular a mastigação. Com cores vibrantes, o Brinquedo Bola Color chama a atenção do seu pet e proporciona momentos de alegria, diminuindo o estresse e a ansiedade, melhorando a saúde física e mental dos cães.', 'bola-linha-color-flicks.png', 22.90),
(2, 2, 'Brinquedo Pelúcia Girafa Flicks Único', 'O Brinquedo Pelúcia Girafa Flicks é uma ótima distração para o seu pet, ajuda o seu amigo a se livrar do estresse e ansiedade. O exercício regular mantém os cães felizes e saudáveis, perfeito para busca interativa, puxão e mastigação suave. Evita a fadiga proporcionando bem-estar físico e mental.', 'Brinquedo-Pelucia-Girafa.png', 34.90);

insert into agendamentos (nomepet, dataagendamento) values
('Nina', '2024-04-04 14:30:00'),
('Zeri', '2024-04-04 16:30:00'),
('Jake', '2024-04-05 12:30:00');