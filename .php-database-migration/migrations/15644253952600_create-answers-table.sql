-- // create answers table
-- Migration SQL that makes the change goes here.
CREATE TABLE IF NOT EXISTS t_answers (
id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question_id INTEGER,
answer VARCHAR(191)
);
-- @UNDO
-- SQL to undo the change goes here.
DROP TABLE IF EXISTS t_answers;