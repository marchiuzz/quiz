-- // create questions table
-- Migration SQL that makes the change goes here.
CREATE TABLE IF NOT EXISTS t_questions (
id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(191) UNIQUE,
);
-- @UNDO
-- SQL to undo the change goes here.
DROP TABLE IF EXISTS t_questions;