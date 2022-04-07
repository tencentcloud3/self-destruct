CREATE DATABASE self_destruct;

USE self_destruct;

CREATE TABLE timer(
    last_ts timestamp
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

CREATE TABLE `message`(
    id int(11) NOT NULL AUTO_INCREMENT,
    `message` text,
    update_ts timestamp,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT INTO timer VALUES(CURRENT_TIMESTAMP());
-- SELECT * FROM timer;
-- SELECT UNIX_TIMESTAMP(last_ts) AS last_ts FROM timer;
-- UPDATE timer SET last_ts = CURRENT_TIMESTAMP() LIMIT 1;
-- DELETE FROM timer;
-- DROP TABLE timer;
-- DROP TABLE `message`;
