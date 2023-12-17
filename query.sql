CREATE SCHEMA IF NOT EXISTS quizzfun_demo;

USE quizzfun_demo;

CREATE TABLE question_banks (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL
);

CREATE TABLE questions (
id INT PRIMARY KEY AUTO_INCREMENT,
question_bank_id INT NOT NULL,
question TEXT NOT NULL,
option1 TEXT NOT NULL,
option2 TEXT NOT NULL,
option3 TEXT NOT NULL,
option4 TEXT NOT NULL,
option1_image_path VARCHAR(255) DEFAULT NULL,
option2_image_path VARCHAR(255) DEFAULT NULL,
option3_image_path VARCHAR(255) DEFAULT NULL,
option4_image_path VARCHAR(255) DEFAULT NULL,
correct_option INT NOT NULL,
FOREIGN KEY (question_bank_id) REFERENCES question_banks(id)
);

INSERT INTO question_banks (name) VALUES
('AnimeComprehensive'),
('AnimeCharacters');

INSERT INTO questions (question_bank_id, question, option1, option1_image_path, option2, option2_image_path, option3, option3_image_path, option4, option4_image_path, correct_option)
VALUES
    (1, 'What is Anime?', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?2', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?3', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?4', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?5', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?6', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?7', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?8', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?9', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?10', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?11', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?12', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?13', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?14', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (1, 'What is Anime?15', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2);


INSERT INTO questions (question_bank_id, question, option1, option1_image_path, option2, option2_image_path, option3, option3_image_path, option4, option4_image_path, correct_option)
VALUES
    (2, '2What is Anime?', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?2', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?3', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?4', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?5', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?6', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?7', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?8', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?9', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?10', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?11', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?12', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?13', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?14', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2),
    (2, '2What is Anime?15', '1QQ', '', '2QQ', '', '3QQ', '', '4QQ', '', 2);

