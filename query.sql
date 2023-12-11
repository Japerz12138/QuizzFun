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
    (1, 'Which anime has the highest super power level of Level 5?');
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
    (2, 'Yumeji no Tenshi', FALSE);
-- Add more selections as needed

INSERT INTO quizzes (quiz_name) VALUES ('animecharacters');
-- Insert data for Quiz 2
INSERT INTO questions (quiz_id, question_text) VALUES
    (2, 'Question 1 for Quiz 2'),
    (2, 'Question 2 for Quiz 2');
-- Add more questions as needed

INSERT INTO selections (question_id, selection_text, is_correct) VALUES
-- Question 1 selections for Quiz 2
    (3, 'Option A', TRUE),
    (3, 'Option B', FALSE),
    (3, 'Option C', FALSE),
    (3, 'Option D', FALSE),

-- Question 2 selections for Quiz 2
    (4, 'Option A', FALSE),
    (4, 'Option B', FALSE),
    (4, 'Option C', FALSE),
    (4, 'Option D', TRUE);
-- Add more selections as needed
