CREATE SCHEMA IF NOT EXISTS quizzfun_demo;

USE quizzfun_demo;

CREATE TABLE question_banks (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
counter INT DEFAULT 0
);

CREATE TABLE questions (
id INT PRIMARY KEY AUTO_INCREMENT,
question_bank_id INT NOT NULL,
question TEXT NOT NULL,
option1 TEXT NOT NULL,
option2 TEXT NOT NULL,
option3 TEXT NOT NULL,
option4 TEXT NOT NULL,
question_image_path VARCHAR(255) DEFAULT NULL,
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

INSERT INTO questions (question_bank_id, question, question_image_path, option1, option1_image_path, option2, option2_image_path, option3, option3_image_path, option4, option4_image_path, correct_option)
VALUES
    (1, 'In Demon Slayer, what is Tanjiro''s signature sword pattern?', '', 'Nezuko Kamado (竈門禰豆子)', '', 'Butterfly Dance (胡蝶の舞)', '', ' Hinokami Kagura (炎ノ神楽)', '', 'Tsuzumi (鼓)', '', 3),
    (1, ' In Sword Art Online, what is the name of Kirito''s unique dual-wielding sword skill?', '', 'Starburst Stream (星屑の剣閃)', '', 'Black Swordsmanship (二刀流)', '', 'Dual Wielding (二刀流)', '', 'Elucidator & Dark Repulsor (整合騎士 エリュシデータ & ダークレパルサー)', '', 1),
    (1, 'In Your Name, what is the name of the comet that crosses the Japanese sky on July 9th?', '', 'Halley', '', 'Tiamat', '', 'Hyakutake', '', 'NEOWISE', '', 2),
    (1, 'In That Time I Got Reincarnated as a Slime, what''s the name of the COUNTRY Rimuru founded in the Jura Forest?', '', 'Rimuru City (中央都市リムル)', '', 'Tempest Village (テンペスト村)', '', 'Dwargon Kingdom (ドワーフ王国)', '', 'Jura Tempest Federation (ジュラ・テンペスト連邦)', '', 4),
    (1, 'In Death Note, what is the name of the Shinigami(Personification of Death) who dropped the notebook?', '', 'Rem (レム)', '', 'Ryuk (リューク)', '', 'L (エル)', '', 'Light Yagami (夜神月)', '', 2),
    (1, 'In Jujutsu Kaisen, what is the name of the cursed technique used by Yuji Itadori?', '', 'Black Flash (黒閃)', '', 'Domain Expansion (領域展開)', '', 'Divergent Fist (反転術式)', '', 'Cursed Spirit Speech (呪霊会話)', '', 3),
    (1, 'Which studio produced the acclaimed anime series Violet Evergarden and Clannad?', '', 'Kyoto Animation (京都アニメーション)', '', 'Bones (ボンズ)', '', 'MAPPA', '', 'Madhouse (マッドハウス)', '', 1),
    (1, 'In Your Name, what is the name of the lake located in the town of Itomori?', '', 'Itomori (糸守)', '', 'Miyamizu Shrine (宮水神社)', '', 'Mitsuha (三葉)', '', ' Gizamomi (糸守湖)', '', 4),
    (1, 'In Demon Slayer, what is the name of the breathing style used by Tanjiro Kamado?', '', 'Moon Breathing (月の呼吸)', '', 'Thunder Breathing (雷の呼吸)', '', 'Wind Breathing (風の呼吸)', '', 'Water Breathing (水の呼吸)', '', 4),
    (1, 'In Naruto, what is the name of the Forbidden Jutsu used by Orochimaru that grants immense power at the cost of one''s life?', '', 'Edo Tensei (穢土転生)', '', 'Rasen Shuriken (螺旋手裏剣)', '', 'Chidori (千鳥)', '', 'Sharingan (写輪眼)', '', 1),
    (1, 'In A Certain Scientific Railgun, what is the highest esper super power level accomplished in Academy City?', '', 'Level6', '', 'Level3', '', 'Level5', '', 'Level1', '', 3),
    (1, 'Who is the main character in “Attack on Titan”?', '', 'Eren Yeager', '', 'Monkey D. Luffy', '', 'Ichigo Kurosaki', '', 'Naruto Uzumaki', '', 1),
    (1, 'In Frieren: Beyond Journey''s End, how many years has Frieren been adventuring in the team of heroes?', '', '5 Years', '', '15 Years', '', '100 Years', '', '10 Years', '', 4),
    (1, 'In Re:Zero − Starting Life in Another World, what is the name of the younger sister of the twin maid sisters?', '', 'Ram (ラム)', '', 'Rem (レム)', '', 'Frederica Baumann (フレデリカ・バウマン)', '', 'Beatrice (ベアトリス)', '', 2),
    (1, 'In Pokémon (TV series), who is Ash''s first pokemon', '', 'Riolu', '', 'Pidgeot', '', 'Pikachu', '', 'Charmander', '', 3),
    (1, 'In Puella Magi Madoka Magica, what is the color of Madoka Kaname (鹿目 まどか)''s soul gem?', '', 'Red', '', 'Pink', '', 'Yellow', '', 'Blue', '', 2),
    (1, 'In Fate/stay night: Unlimited Blade Works, what Rank is Shirou Emiya (衛宮 士郎)''s servant?', '', 'Saber', '', 'Archer', '', 'Assassin', '', 'Caster', '', 1),
    (1, 'In ReLife, how old does Arata Kaizaki(海崎 新太) return to?', '', '21', '', '20', '', '18', '', '17', '', 4),
    (1, 'In Beyond the Boundary, what are Mirai Kuriyama(栗山 未来)''s abilities?', '', 'Blood Control', '', 'Protection Shield', '', 'Puppeteer', '', 'Youmu Control', '', 3),
    (1, 'In Noragami, what is Yato(夜ト)''s first Shinki(artifact)?', '', 'Yuki (雪)', '', 'Tomo (伴)', '', 'Sakura (桜)', '', 'Hiiro (緋)', '', 4),
    (1, 'In JoJO''s Bizarre Adventure, what is the birth mark for Joestar''s bloodline?', '', 'Star', '', 'Hart', '', 'Hand', '', 'Square', '', 1),
    (1, 'What was μ''s debut song in Love Live! Season 1?', '', 'Susume→Tomorrow', '', 'START:DASH!!', '', 'Korekara no Someday', '', 'Bokura wa Ima no Naka de', '', 2),
    (1, 'In Summer Time Rendering, which of the following is Shadow''s ability?', '', 'Respawn', '', 'Teleport', '', 'Copy', '', 'Shadow Ball', '', 3),
    (1, 'In Made in Abyss, the abyss in the center of the island also known as?', '', 'Netherworld', '', 'Endworld', '', 'Hell', '', 'The Big Hole', '', 1),
    (1, 'In Sword Art Online, what is the name of the first-generation full-dive VR device?', '', 'Oculus 3', '', 'AmuSphere', '', 'Augma', '', 'NerveGear', '', 4),
    (1, 'In Macross Delta, which fighter jet was flown by Hayate Immelman(ハヤテ・インメルマン)?', '', 'Sv-262Hs Draken III', '', 'VF-31J Siegfried', '', 'VF-17 Nightmare', '', 'VF-31 A Kairos', '', 2),
    (1, 'In Baka and Test, how do Avatars(召喚獣) fight?', '', 'Subject Tests', '', 'Hacking', '', 'Emotional Damage', '', 'Magic', '', 1),
    (1, 'In New Game! Which game company did Aoba Suzukaze(涼風 青葉) join?', '', 'Yuzu Soft', '', 'Square Unix', '', 'Ubisoft', '', 'Eagle Jump', '', 4),
    (1, 'In Little Witch Academia, what is the name of the Academy?', '', 'Hogwarts School of Witchcraft and Wizardry', '', 'First High School', '', 'Luna Nova Magical Academy', '', 'Everdawn Spire Magical Academy', '', 3),
    (1, 'In Guilty Crown, what type of void weapon does Inori Yuzuriha(楪 いのり) can be?', '', 'Longsword', '', 'Gun', '', 'Large Shears', '', 'Dual Swords', '', 1);


INSERT INTO questions (question_bank_id, question, question_image_path, option1, option1_image_path, option2, option2_image_path, option3, option3_image_path, option4, option4_image_path, correct_option)
VALUES
    (2, 'This kind-hearted and optimistic young man possesses the unusual ability to talk to animals. Who is he?', '', 'Option1', './img/quiz2_selections_img/Question_1/Option_1.jpg', 'Option2', './img/quiz2_selections_img/Question_1/Option_2.jpg', 'Option3', './img/quiz2_selections_img/Question_1/Option_3.jpg', 'Option4', './img/quiz2_selections_img/Question_1/Option_4.jpg', 4),
    (2, 'In A Certain Scientific Railgun, who is the strongest "Electro Master"?', '', 'Option1', './img/quiz2_selections_img/Question_2/Option_1.jpg', 'Option2', './img/quiz2_selections_img/Question_2/Option_2.jpg', 'Option3', './img/quiz2_selections_img/Question_2/Option_3.jpg', 'Option4', './img/quiz2_selections_img/Question_2/Option_4.jpg', 2),
    (2, 'Who invented the time machine in Steins;Gate?', '', 'Option1', './img/quiz2_selections_img/Question_3/Option_1.jpg', 'Option2', './img/quiz2_selections_img/Question_3/Option_2.jpg', 'Option3', './img/quiz2_selections_img/Question_3/Option_3.jpg', 'Option4', './img/quiz2_selections_img/Question_3/Option_4.jpg', 3),
    (2, 'Name this anime character!', './img/quiz2_selections_img/Question_4/Question.jpg', 'Yor Forger', '', 'Anya Forger', '', 'Fiona Frost', '', 'Becky Blackbell', '', 1),
    (2, 'Name this anime character!', './img/quiz2_selections_img/Question_5/Question.jpg', 'Yukari Yuzuki (結城 ゆかり)', '', 'Yukinoshita Haruno (雪ノ下 陽乃)', '', 'Soma Yukihira (幸平 創真)', '', 'Yukinoshita Yukino (雪ノ下 雪乃)', '', 4),
    (2, 'Which anime does this character come from?', './img/quiz2_selections_img/Question_6/Question.jpg', 'Bocchi the Rock!', '', 'K-On!', '', 'Laid-Back Camp△', '', 'Slow Loop', '', 1),
    (2, 'Which anime does this character come from?', './img/quiz2_selections_img/Question_7/Question.jpg', 'Re:Zero − Starting Life in Another World', '', 'KonoSuba', '', 'OVERLORD', '', 'Princess Connect! Re: Dive', '', 2),
    (2, 'Name this anime character!', './img/quiz2_selections_img/Question_8/Question.jpg', 'Anri Sonohara(園山 安理)', '', 'Mika Harima (針原 未来)', '', 'Erika Karisawa (狩沢 円太)', '', 'Celty Sturluson (セルティ・ストゥルルソン)', '', 4),
    (2, 'Which anime does this character come from?', './img/quiz2_selections_img/Question_9/Question.jpg', 'Love, Chunibyo & Other Delusions!', '', 'Horimiya', '', 'Toradora!', '', 'Don''t Toy With Me, Miss Nagatoro', '', 3),
    (2, 'Which character named "Hori Kyouko (堀 京子)"?', '', 'Option1', './img/quiz2_selections_img/Question_10/Option_1.jpg', 'Option2', './img/quiz2_selections_img/Question_10/Option_2.jpg', 'Option3', './img/quiz2_selections_img/Question_10/Option_3.jpg', 'Option4', './img/quiz2_selections_img/Question_10/Option_4.jpg', 3),
    (2, 'In anime CLANNAD ~AFTER STORY~, who ends up marrying Tomoya Okazaki (岡崎 朋也)?', '', 'Option1', './img/quiz2_selections_img/Question_11/Option_1.jpg', 'Option2', './img/quiz2_selections_img/Question_11/Option_2.jpg', 'Option3', './img/quiz2_selections_img/Question_11/Option_3.jpg', 'Option4', './img/quiz2_selections_img/Question_11/Option_4.jpg', 2),
    (2, 'Which anime does this character come from?', './img/quiz2_selections_img/Question_12/Question.jpg', 'Saekano: How to Raise a Boring Girlfriend', '', 'Bakuman', '', '16bit Sensation: Another Layer', '', 'This Art Club Has a Problem!', '', 3),
    (2, 'Which anime does this character come from?', './img/quiz2_selections_img/Question_13/Question.jpg', 'The Promised Neverland', '', 'Code Geass', '', 'Black Clover', '', 'Goblin Slayer', '', 1),
    (2, 'In anime Chainsaw Man, who is the chainsaw devil?', '', 'Option1', './img/quiz2_selections_img/Question_14/Option_1.jpg', 'Option2', './img/quiz2_selections_img/Question_14/Option_2.jpg', 'Option3', './img/quiz2_selections_img/Question_14/Option_3.jpg', 'Option4', './img/quiz2_selections_img/Question_14/Option_4.jpg', 4),
    (2, 'Name this anime character!', './img/quiz2_selections_img/Question_15/Question.jpg', 'Rei Ayanami (綾波 レイ)', '', 'Misato Katsuragi (葛城 ミサト)', '', 'Asuka Langley Soryu (惣流・アスカ・ラングレー)', '', 'Makinami Mari Illustrious (真希波・マリ・イラストリアス)', '', 3);

