-- // create questions table
-- Migration SQL that makes the change goes here.
CREATE TABLE IF NOT EXISTS `t_questions` (
    `id` INTEGER unsigned AUTO_INCREMENT primary key,
    `quiz_id` int unsigned null,
    `question` TEXT not null,
    foreign key `questions_quiz_id_foreign` (`quiz_id`)
                                         REFERENCES `t_quizes` (`id`)
                                         on update cascade
                                         on delete set null
);
-- @UNDO
-- SQL to undo the change goes here.
DROP TABLE IF EXISTS `t_questions`
