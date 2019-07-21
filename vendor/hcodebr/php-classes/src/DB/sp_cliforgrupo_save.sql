USE `db_simplosis`;
DROP procedure IF EXISTS `sp_clifordados_save`;

DELIMITER $$
USE `db_simplosis`$$
CREATE PROCEDURE `sp_clifordados_save`
(
pidclifor int,
ptipo_pe char(1),
ptipo_cf char(1),
pnome_rs varchar(64),
papel_nome_f varchar(64),
pcpf_cnpj varchar(20),
prg_ie varchar(20),
pnasc_abert date,
presponsavel varchar(45),
pcelular varchar(15),
ptelefone varchar(14),
pemail varchar(45),
pgrupo int(11),
pcep varchar(11),
plogradouro varchar(45),
pnumero varchar (6),
pbairro varchar(45),
puf int(11),
pcidade int(11),
pobs text

)
BEGIN

    IF pidclifor > 0 THEN

    UPDATE tb_clifordados
        SET 
            idclifor = pidclifor,
			tipo_pe = ptipo_pe,
			tipo_cf = ptipo_cf,
			nome_rs = pnome_rs,
			apel_nome_f = papel_nome_f,
			cpf_cnpj = pcpf_cnpj,
			rg_ie = prg_ie,
			nasc_abert = pnasc_abert,
			responsavel = presponsavel,
			celular = pcelular,
			telefone = ptelefone,
			email = pemail,
			grupo = pgrupo,
			cep = pcep,
			logradouro = plogradouro,
			numero = pnumero,
			bairro = pbairro,
			uf = puf,
			cidade = pcidade,
			obs = pobs
            
        WHERE idclifor = pidclifor;

    ELSE

    INSERT INTO tb_clifordados
    (idclifor, tipo_pe, tipo_cf, nome_rs, apel_nome_f, cpf_cnpj, rg_ie, nasc_abert, responsavel, celular, telefone, email, grupo, cep, logradouro, numero, bairro, uf, cidade, obs )
    VALUES
    (pidclifor, ptipo_pe, ptipo_cf, pnome_rs, papel_nome_f, pcpf_cnpj, prg_ie, pnasc_abert, presponsavel, pcelular, ptelefone, pemail, pgrupo, pcep, plogradouro, pnumero, pbairro, puf, pcidade, pobs );

    SET pidclifor = LAST_INSERT_ID
    ();

END
IF;
    
SELECT *
FROM tb_clifordados
WHERE idclifor = pidclifor;

END$$

DELIMITER ;

