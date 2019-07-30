-- // create category quiz pivot table
-- Migration SQL that makes the change goes here.
CREATE TABLE IF NOT EXISTS t_category_quiz_pivot
(
    `category_id` INT unsigned,
    `quiz_id`     INT unsigned,
    unique key `category_quiz_unique` (`category_id`, `quiz_id`),
    foreign key `t_category_quiz_pivot_category_id_foreign` (`category_id`)
        references `t_categories` (`id`)
        on update cascade
        on delete cascade,

    foreign key `category_quiz_pivot_quiz_id_foreign` (`quiz_id`)
        references `t_quizes` (`id`)
        on update cascade
        on delete cascade
);
-- @UNDO
-- SQL to undo the change goes here.
DROP TABLE IF EXISTS t_category_quiz_pivot