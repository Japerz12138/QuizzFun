-- Create the 'quiz_bank' schema
CREATE SCHEMA IF NOT EXISTS quiz_bank;

-- Use the 'quiz_bank' schema
USE quiz_bank;

CREATE TABLE IF NOT EXISTS quizzes (
    quiz_id INT PRIMARY KEY AUTO_INCREMENT,
    quiz_name VARCHAR(255) NOT NULL
);

-- Create the 'questions' table
CREATE TABLE IF NOT EXISTS questions (
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    quiz_id INT,
    question_text VARCHAR(255),
    CONSTRAINT fk_quiz
    FOREIGN KEY (quiz_id)
    REFERENCES quizzes(quiz_id)
);

-- Create the 'selections' table
CREATE TABLE IF NOT EXISTS selections (
    selection_id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT,
    selection_text VARCHAR(255),
    is_correct BOOLEAN,
    CONSTRAINT fk_question
    FOREIGN KEY (question_id)
    REFERENCES questions(question_id)
);

INSERT INTO quizzes (quiz_name) VALUES ('animecomprehensive');
-- Insert data for Quiz 1
INSERT INTO questions (quiz_id, question_text) VALUES
    (1, 'What is the right definition of Anime?'),
    (1, 'Which anime has the highest super power level of Level 5?'),
    (1, 'Anime Comprehensive Question 3'),
    (1, 'Anime Comprehensive Question 4'),
    (1, 'Anime Comprehensive Question 5'),
    (1, 'Anime Comprehensive Question 6'),
    (1, 'Anime Comprehensive Question 7'),
    (1, 'Anime Comprehensive Question 8'),
    (1, 'Anime Comprehensive Question 9'),
    (1, 'Anime Comprehensive Question 10'),
    (1, 'Anime Comprehensive Question 11'),
    (1, 'Anime Comprehensive Question 12'),
    (1, 'Anime Comprehensive Question 13'),
    (1, 'Anime Comprehensive Question 14'),
    (1, 'Anime Comprehensive Question 15');
-- Add more questions as needed

INSERT INTO selections (question_id, selection_text, is_correct) VALUES
-- Question 1 selections for Quiz 1
    (1, 'Anime is a type of vegetable commonly used in Japanese cuisine.', FALSE),
    (1, 'Anime is a form of ancient Japanese poetry.', FALSE),
    (1, 'Anime refers to a style of animation that originated in Japan and has become popular worldwide.', TRUE),
    (1, 'Anime is a type of computer programming language.', FALSE),

-- Question 2 selections for Quiz 1
    (2, 'Hikari no Tsuki', FALSE),
    (2, 'A Certain Scientific Railgun', TRUE),
    (2, 'Kaze no Shiro', FALSE),
    (2, 'Yumeji no Tenshi', FALSE),

    (3, 'Selection 1', TRUE),
    (3, 'Selection 2', FALSE),
    (3, 'Selection 3', FALSE),
    (3, 'Selection 4', FALSE),

    (4, 'Selection 1', TRUE),
    (4, 'Selection 2', FALSE),
    (4, 'Selection 3', FALSE),
    (4, 'Selection 4', FALSE),

    (5, 'Selection 1', TRUE),
    (5, 'Selection 2', FALSE),
    (5, 'Selection 3', FALSE),
    (5, 'Selection 4', FALSE),

    (6, 'Selection 1', TRUE),
    (6, 'Selection 2', FALSE),
    (6, 'Selection 3', FALSE),
    (6, 'Selection 4', FALSE),

    (7, 'Selection 1', TRUE),
    (7, 'Selection 2', FALSE),
    (7, 'Selection 3', FALSE),
    (7, 'Selection 4', FALSE),

    (8, 'Selection 1', TRUE),
    (8, 'Selection 2', FALSE),
    (8, 'Selection 3', FALSE),
    (8, 'Selection 4', FALSE),

    (9, 'Selection 1', TRUE),
    (9, 'Selection 2', FALSE),
    (9, 'Selection 3', FALSE),
    (9, 'Selection 4', FALSE),

    (10, 'Selection 1', TRUE),
    (10, 'Selection 2', FALSE),
    (10, 'Selection 3', FALSE),
    (10, 'Selection 4', FALSE),

    (11, 'Selection 1', TRUE),
    (11, 'Selection 2', FALSE),
    (11, 'Selection 3', FALSE),
    (11, 'Selection 4', FALSE),

    (12, 'Selection 1', TRUE),
    (12, 'Selection 2', FALSE),
    (12, 'Selection 3', FALSE),
    (12, 'Selection 4', FALSE),

    (14, 'Selection 1', TRUE),
    (14, 'Selection 2', FALSE),
    (14, 'Selection 3', FALSE),
    (14, 'Selection 4', FALSE),

    (15, 'Selection 1', TRUE),
    (15, 'Selection 2', FALSE),
    (15, 'Selection 3', FALSE),
    (15, 'Selection 4', FALSE);


INSERT INTO quizzes (quiz_name) VALUES ('animecharacters');
-- Insert data for Quiz 2
INSERT INTO questions (quiz_id, question_text) VALUES
    (2, 'Question 1 for Quiz 2'),
    (2, 'Question 2 for Quiz 2'),
    (2, 'Anime Characters Question 3'),
    (2, 'Anime Characters Question 4'),
    (2, 'Anime Characters Question 5'),
    (2, 'Anime Characters Question 6'),
    (2, 'Anime Characters Question 7'),
    (2, 'Anime Characters Question 8'),
    (2, 'Anime Characters Question 9'),
    (2, 'Anime Characters Question 10'),
    (2, 'Anime Characters Question 11'),
    (2, 'Anime Characters Question 12'),
    (2, 'Anime Characters Question 13'),
    (2, 'Anime Characters Question 14'),
    (2, 'Anime Characters Question 15');
-- Add more questions as needed

INSERT INTO selections (question_id, selection_text, is_correct) VALUES
-- Question 1 selections for Quiz 2
    (16, 'Option A', TRUE),
    (16, 'Option B', FALSE),
    (16, 'Option C', FALSE),
    (16, 'Option D', FALSE),

-- Question 2 selections for Quiz 2
    (17, 'Option A', FALSE),
    (17, 'Option B', FALSE),
    (17, 'Option C', FALSE),
    (17, 'Option D', TRUE),

    (18, 'Option A', FALSE),
    (18, 'Option B', FALSE),
    (18, 'Option C', FALSE),
    (18, 'Option D', TRUE),

    (19, 'Option A', FALSE),
    (19, 'Option B', FALSE),
    (19, 'Option C', FALSE),
    (19, 'Option D', TRUE),

    (20, 'Option A', FALSE),
    (20, 'Option B', FALSE),
    (20, 'Option C', FALSE),
    (20, 'Option D', TRUE),

    (21, 'Option A', FALSE),
    (21, 'Option B', FALSE),
    (21, 'Option C', FALSE),
    (21, 'Option D', TRUE),

    (22, 'Option A', FALSE),
    (22, 'Option B', FALSE),
    (22, 'Option C', FALSE),
    (22, 'Option D', TRUE),

    (23, 'Option A', FALSE),
    (23, 'Option B', FALSE),
    (23, 'Option C', FALSE),
    (23, 'Option D', TRUE),

    (24, 'Option A', FALSE),
    (24, 'Option B', FALSE),
    (24, 'Option C', FALSE),
    (24, 'Option D', TRUE),

    (25, 'Option A', FALSE),
    (25, 'Option B', FALSE),
    (25, 'Option C', FALSE),
    (25, 'Option D', TRUE),

    (26, 'Option A', FALSE),
    (26, 'Option B', FALSE),
    (26, 'Option C', FALSE),
    (26, 'Option D', TRUE),

    (27, 'Option A', FALSE),
    (27, 'Option B', FALSE),
    (27, 'Option C', FALSE),
    (27, 'Option D', TRUE),

    (28, 'Option A', FALSE),
    (28, 'Option B', FALSE),
    (28, 'Option C', FALSE),
    (28, 'Option D', TRUE),

    (29, 'Option A', FALSE),
    (29, 'Option B', FALSE),
    (29, 'Option C', FALSE),
    (29, 'Option D', TRUE),

    (30, 'Option A', FALSE),
    (30, 'Option B', FALSE),
    (30, 'Option C', FALSE),
    (30, 'Option D', TRUE);
-- Add more selections as needed
