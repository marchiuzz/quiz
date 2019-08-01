-- // create quiz_results
-- Migration SQL that makes the change goes here.
CREATE TABLE IF NOT EXISTS `t_quiz_results` (
    `id` INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `quiz_slug` varchar(191) null,
    `first_name` varchar(191) not null ,
    `last_name` varchar(191) not null,
    `email` varchar(191) not null ,
    `result` text not null,
    foreign key `quiz_results_quiz_slug_foreign` (`quiz_slug`)
                                            references `t_quizes` (`slug`)
                                            on update cascade
                                            on delete set null
);
-- @UNDO
-- SQL to undo the change goes here.

DROP TABLE IF EXISTS `t_quiz_results`
