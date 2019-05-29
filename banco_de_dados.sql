DROP TABLE IF EXISTS
    `valuexpc_test`.`aluno`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`aluno`(
    `id_usuario` INT(11) NOT NULL,
    `id_tipo_aluno` INT(11) NULL DEFAULT NULL,
    `flg_curso` CHAR(1) NULL DEFAULT NULL,
    `des_programa` VARCHAR(100) NULL DEFAULT NULL,
    `des_orientador` VARCHAR(45) NULL DEFAULT NULL,
    `des_nacionalidade` VARCHAR(45) NULL DEFAULT NULL,
    `dt_data_nas` DATE NULL DEFAULT NULL,
    `des_endereco` VARCHAR(350) NULL DEFAULT NULL,
    `des_nome_mae` VARCHAR(60) NULL DEFAULT NULL,
    `des_Instituicao` VARCHAR(60) NULL DEFAULT NULL,
    `des_curso` VARCHAR(60) NULL DEFAULT NULL,
    `num_matricula` INT(11) NULL DEFAULT NULL,
    `des_campus` VARCHAR(60) NULL DEFAULT NULL,
    `ano_conclusao` TINYINT(4) NULL DEFAULT NULL,
    `des_graduacao` VARCHAR(80) NULL DEFAULT NULL,
    PRIMARY KEY(`id_usuario`),
    INDEX `fk_id_tipo_aluno_idx`(`id_tipo_aluno` ASC),
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    `valuexpc_test`.`disciplina`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`disciplina`(
    `id_disciplina` INT(11) NOT NULL AUTO_INCREMENT,
    `des_disciplina` VARCHAR(60) NULL DEFAULT NULL,
    PRIMARY KEY(`id_disciplina`)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    `valuexpc_test`.`matricula`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`matricula`(
    `id_matricula` INT(11) NOT NULL AUTO_INCREMENT,
    `id_disciplina` INT(11) NULL DEFAULT NULL,
    `dt_data` DATE NULL DEFAULT NULL,
    `flg_outra_situacao` BIT(1) NOT NULL,
    `id_periodo` INT(11) NULL DEFAULT NULL,
    `id_usuario` INT(11) NULL DEFAULT NULL,
    PRIMARY KEY(`id_matricula`),
    INDEX `fk_id_disciplina_idx`(`id_disciplina` ASC),
    INDEX `fk_id_periodo_idx`(`id_periodo` ASC),
    INDEX `fk_id_usuario_idx`(`id_usuario` ASC),
    INDEX `fk_id_usuario_matricula_idx`(`id_usuario` ASC),    
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    `valuexpc_test`.`periodo`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`periodo`(
    `id_periodo` INT(11) NOT NULL AUTO_INCREMENT,
    `des_periodo` VARCHAR(45) NULL DEFAULT NULL,
    PRIMARY KEY(`id_periodo`),
    UNIQUE INDEX `des_periodo_UNIQUE`(`des_periodo` ASC)
) ENGINE = InnoDB AUTO_INCREMENT = 5; DROP TABLE IF EXISTS
    `valuexpc_test`.`tipo`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`tipo`(
    `id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
    `tipo` CHAR(1) NULL DEFAULT NULL,
    `des_tipo` VARCHAR(45) NULL DEFAULT NULL,
    PRIMARY KEY(`id_tipo`),
    UNIQUE INDEX `id_tipo_UNIQUE`(`id_tipo` ASC)
) ENGINE = InnoDB AUTO_INCREMENT = 4; DROP TABLE IF EXISTS
    `valuexpc_test`.`tipo_aluno`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`tipo_aluno`(
    `id_tipo_aluno` INT(11) NOT NULL AUTO_INCREMENT,
    `des_tipo_aluno` VARCHAR(200) NOT NULL,
    PRIMARY KEY(`id_tipo_aluno`),
    UNIQUE INDEX `des_tipo_aluno_UNIQUE`(`des_tipo_aluno` ASC),
    UNIQUE INDEX `id_tipo_aluno_UNIQUE`(`id_tipo_aluno` ASC)
) ENGINE = InnoDB AUTO_INCREMENT = 8; DROP TABLE IF EXISTS
    `valuexpc_test`.`tipo_usuario`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`tipo_usuario`(
    `id_tipo` INT(11) NULL DEFAULT NULL,
    `id_usuario` INT(11) NULL DEFAULT NULL,
    INDEX `fk_id_tipo_idx`(`id_tipo` ASC),
    INDEX `fk_id_usuario_idx`(`id_usuario` ASC),
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    `valuexpc_test`.`usuario`;
CREATE TABLE IF NOT EXISTS `valuexpc_test`.`usuario`(
    `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(200) NULL DEFAULT NULL,
    `cpf` INT(11) NULL DEFAULT NULL,
    `passaporte` INT(11) NULL DEFAULT NULL,
    `matricula` INT(11) NULL DEFAULT NULL,
    `des_email` VARCHAR(60) NULL DEFAULT NULL,
    `num_celular` INT(11) NULL DEFAULT NULL,
    PRIMARY KEY(`id_usuario`),
    UNIQUE INDEX `id_usuario_UNIQUE`(`id_usuario` ASC),
    UNIQUE INDEX `cpf_UNIQUE`(`cpf` ASC),
    UNIQUE INDEX `matricula_UNIQUE`(`matricula` ASC)
) ENGINE = InnoDB;