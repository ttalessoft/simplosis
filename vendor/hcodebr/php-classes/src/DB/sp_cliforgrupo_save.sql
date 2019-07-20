USE `db_simplosis`;
DROP procedure IF EXISTS `sp_cliforgrupo_save`;

DELIMITER $$
USE `db_simplosis`$$
CREATE PROCEDURE `sp_cliforgrupo_save`
(
pidcliforgru int,
pgrupo varchar
)
BEGIN

    IF pidcliforgru > 0 THEN

    UPDATE tb_cliforgrupo
        SET 
			grupo = pgrupo
            
        WHERE idcliforgru = pidcliforgru;

    ELSE

    INSERT INTO tb_cliforgrupo
        (grupo)
    VALUES(pgrupo);

    SET pidcliforgru
    = LAST_INSERT_ID
    ();

END
IF;
    
SELECT *
FROM tb_cliforgrupo
WHERE idcliforgru = pidcliforgru;

END$$

DELIMITER ;

