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
    (1, 'In Demon Slayer, what is Tanjiro''s signature sword pattern?', 'Nezuko Kamado (竈門禰豆子)', '', 'Butterfly Dance (胡蝶の舞)', '', ' Hinokami Kagura (炎ノ神楽)', '', 'Tsuzumi (鼓)', '', 3),
    (1, ' In Sword Art Online, what is the name of Kirito''s unique dual-wielding sword skill?', 'Starburst Stream (星屑の剣閃)', '', 'Black Swordsmanship (二刀流)', '', 'Dual Wielding (二刀流)', '', 'Elucidator & Dark Repulsor (整合騎士 エリュシデータ & ダークレパルサー)', '', 1),
    (1, 'In Your Name, what is the name of the comet that crosses the Japanese sky on July 9th?', 'Halley', '', 'Tiamat', '', 'Hyakutake', '', 'NEOWISE', '', 2),
    (1, 'In That Time I Got Reincarnated as a Slime, what''s the name of the COUNTRY Rimuru founded in the Jura Forest?', 'Rimuru City (中央都市リムル)', '', 'Tempest Village (テンペスト村)', '', 'Dwargon Kingdom (ドワーフ王国)', '', 'Jura Tempest Federation (ジュラ・テンペスト連邦)', '', 4),
    (1, 'In Death Note, what is the name of the Shinigam(Personification of Death) who dropped the notebook?', 'Rem (レム)', '', 'Ryuk (リューク)', '', 'L (エル)', '', 'Light Yagami (夜神月)', '', 2),
    (1, 'In Jujutsu Kaisen, what is the name of the cursed technique used by Yuji Itadori?', 'Black Flash (黒閃)', '', 'Domain Expansion (領域展開)', '', 'Divergent Fist (反転術式)', '', 'Cursed Spirit Speech (呪霊会話)', '', 3),
    (1, 'Which studio produced the acclaimed anime series Violet Evergarden and Clannad?', 'Kyoto Animation (京都アニメーション)', '', 'Bones (ボンズ)', '', 'MAPPA', '', 'Madhouse (マッドハウス)', '', 1),
    (1, 'In Your Name, what is the name of the lake located in the town of Itomori?', 'Itomori (糸守)', '', 'Miyamizu Shrine (宮水神社)', '', 'Mitsuha (三葉)', '', ' Gizamomi (糸守湖)', '', 4),
    (1, 'In Demon Slayer, what is the name of the breathing style used by Tanjiro Kamado?', 'Moon Breathing (月の呼吸)', '', 'Thunder Breathing (雷の呼吸)', '', 'Wind Breathing (風の呼吸)', '', 'Water Breathing (水の呼吸)', '', 4),
    (1, 'In Naruto, what is the name of the Forbidden Jutsu used by Orochimaru that grants immense power at the cost of one''s life?', 'Edo Tensei (穢土転生)', '', 'Rasen Shuriken (螺旋手裏剣)', '', 'Chidori (千鳥)', '', 'Sharingan (写輪眼)', '', 1),
    (1, 'In A Certain Scientific Railgun, what is the highest esper super power level accomplished in Academy City?', 'Level6', '', 'Level3', '', 'Level5', '', 'Level1', '', 3),
    (1, 'Who is the main character in “Attack on Titan”?', 'Eren Yeager', '', 'Monkey D. Luffy', '', 'Ichigo Kurosaki', '', 'Naruto Uzumaki', '', 1),
    (1, 'In Frieren: Beyond Journey''s End, how many years has Frieren been adventuring in the team of heroes?', '5 Years', '', '15 Years', '', '100 Years', '', '10 Years', '', 4),
    (1, 'In Re:Zero − Starting Life in Another World, what is the name of the younger sister of the twin maid sisters?', 'Ram (ラム)', '', 'Rem (レム)', '', 'Frederica Baumann (フレデリカ・バウマン)', '', 'Beatrice (ベアトリス)', '', 2),
    (1, 'In Pokémon (TV series), who is Ash''s first pokemon', 'Riolu', '', 'Pidgeot', '', 'Pikachu', '', 'Charmander', '', 3);


INSERT INTO questions (question_bank_id, question, option1, option1_image_path, option2, option2_image_path, option3, option3_image_path, option4, option4_image_path, correct_option)
VALUES
    (2, 'This kind-hearted and optimistic young man possesses the unusual ability to talk to animals. Who is he?', 'Option1', './img/quiz2_selections_img/Question 3/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 1/option 2.jpg', 'Option3', './img/quiz2_selections_img/Question 1/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 1/option 4.jpg', 4),
    (2, 'In A Certain Scientific Railgun, who is the strongest "Electro Master"?', 'Option1', './img/quiz2_selections_img/Question 2/option 1.jpg', 'Option2', '/img/quiz2_selections_img/Question 2/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 2/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 2/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 3/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 3/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 3/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 3/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 4/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 4/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 4/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 4/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 5/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 5/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 5/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 5/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 6/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 6/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 6/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 6/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 7/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 7/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 7/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 7/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 8/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 8/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 8/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 8/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 9/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 9/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 9/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 9/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 10/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 10/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 10/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 10/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 11/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 11/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 11/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 11/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 12/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 12/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 12/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 12/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 13/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 13/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 13/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 13/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 14/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 14/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 14/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 14/option 4.jpg', 2),
    (2, '2What is Anime?', 'Option1', './img/quiz2_selections_img/Question 15/option 1.jpg', 'Option2', './img/quiz2_selections_img/Question 15/option 2.jpg', 'Option3', '/img/quiz2_selections_img/Question 15/option 3.jpg', 'Option4', './img/quiz2_selections_img/Question 15/option 4.jpg', 2);

