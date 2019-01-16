CREATE TABLE `comment` (

  `id` int(11) NOT NULL,

  `pseudo` varchar(100) NOT NULL,

  `content` text NOT NULL,

  `date_added` date NOT NULL,

  `article_id` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `comment` (`id`, `pseudo`, `content`, `date_added`, `article_id`) VALUES

(1, 'Jean', 'Génial, hâte de voir ce que ça donne !', '2018-01-10', 1),

(2, 'Nina', 'Trop cool ! depuis le temps', '2018-01-11', 1),

(3, 'Rodrigo', 'Great ! ', '2018-01-12', 1),

(4, 'Hélène', 'je suis heureuse de découvrir un super site ! Continuez comme ça ', '2018-01-06', 2),

(5, 'Moussa', 'Un peu déçu par le contenu pour le moment...', '2018-01-07', 2),

(6, 'Barbara', 'pressée de voir la suite', '2018-01-08', 2),

(7, 'Guillaume', 'Je viens ici pour troller !', '2018-01-11', 3),

(8, 'Aurore', 'Enfin un blog tranquille, où on ne nous casse pas les pieds !', '2018-01-12', 3),

(9, 'Jordane', 'Je suis vendéen ! Amateur de mojettes !', '2018-01-13', 3);


ALTER TABLE `comment`

ADD PRIMARY KEY (`id`),

ADD KEY `fk_article_id` (`article_id`);


ALTER TABLE `comment`

MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `comment`

ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);