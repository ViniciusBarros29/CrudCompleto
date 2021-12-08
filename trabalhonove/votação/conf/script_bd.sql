create schema votação
CREATE TABLE candidato (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(45),
  equipe varchar(45),
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `votação`.`candidato` (`nome`, `equipe`) VALUES ('Maria', 'Vermelha');
INSERT INTO `votação`.`candidato` (`nome`, `equipe`) VALUES ('Lucia', 'Azul');
INSERT INTO `votação`.`candidato` (`nome`, `equipe`) VALUES ('Julia', 'Verde');
INSERT INTO `votação`.`candidato` (`nome`, `equipe`) VALUES ('Pedro', 'Amarela');
