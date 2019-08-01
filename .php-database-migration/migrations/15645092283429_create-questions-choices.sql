-- // create questions choices
-- Migration SQL that makes the change goes here.
CREATE TABLE IF NOT EXISTS `t_question_choices`
(
    `id`          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `question_id` INT UNSIGNED NOT NULL,
    `choice`      varchar(191) not null,
    `right`       tinyint(1)   not null default '0',

    foreign key `question_choices_question_id_foreign` (`question_id`)
        references `t_questions` (`id`)
        on update cascade
        on delete cascade
);
-- @UNDO
-- SQL to undo the change goes here.
DROP TABLE IF EXISTS `t_question_choices`
