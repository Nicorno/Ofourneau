-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Avril 2018 à 16:45
-- Version du serveur :  5.6.30-1
-- Version de PHP :  7.0.29-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ofourneau`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Entrées'),
(2, 'Pains'),
(3, 'Plâts'),
(4, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `difficulty`
--

CREATE TABLE `difficulty` (
  `id` tinyint(5) UNSIGNED NOT NULL,
  `difficulty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `difficulty`
--

INSERT INTO `difficulty` (`id`, `difficulty`) VALUES
(1, 'Très facile'),
(2, 'Facile'),
(3, 'Moyennne'),
(4, 'Difficile'),
(5, 'Très difficile');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_recette` int(11) NOT NULL,
  `num` smallint(2) UNSIGNED NOT NULL,
  `ingredient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `id_recette`, `num`, `ingredient`) VALUES
(1, 1, 1, '200 g de chocolat noir à 52% de cacao'),
(2, 1, 2, '125 g de beurre doux (ou demi-sel pour les gourmands)'),
(3, 1, 3, '100 g de farine de blé T65'),
(4, 1, 4, '1 sachet de levure chimique (10 g)'),
(5, 1, 5, '4 gros oeufs bio'),
(6, 1, 6, '200 g de sucre en poudre (ou plutôt 150 g d\'après les commentaires)'),
(7, 1, 7, '1 pincée de sel'),
(8, 2, 1, '3 gros oeufs (ou 4 petits)'),
(9, 2, 2, '30 cl de lait'),
(10, 2, 3, '60 g de farine'),
(11, 2, 4, '150 g de lardons'),
(12, 2, 5, '60 g de comté'),
(13, 3, 1, '1 gigot d’agneau 1,7 kg'),
(14, 3, 2, '6 gousses d’ail'),
(15, 3, 3, '2 c. à soupe d’huile d’olive'),
(16, 3, 4, '10 cl d’eau'),
(17, 3, 5, 'Sel, poivre'),
(18, 3, 6, '600 g de fèves pelées'),
(19, 3, 7, '1 oignon'),
(20, 3, 8, '1 carotte'),
(21, 3, 9, '½ citron confit'),
(22, 3, 10, '½ cuillerée à café de cumin en poudre'),
(23, 3, 11, 'Huile d’olive, sel, poivre');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `first_name`, `last_name`, `email`, `password`, `is_admin`) VALUES
(1, 'Nicolas', 'Caumont', 'n.caumont@gmail.com', '$2y$11$XKiaJghHo99fup4Dn8a.PeOS286AhZEqRww2W19sIsIVL0QsJopbC', 1),
(2, 'Frank', 'Zappa', 'f.zappa@rocks.com', '$2y$11$pLdH5fFKMdwAdbHMfKqJYOx8GOqGGRTzV1fYtwGM5Jnz85gD235Um', 0),
(3, 'Terry', 'Bozzio', 't.bozzio@drum.com', '$2y$11$.WOU/y3YiTKysB62uOI5MuhZ934P6g.Sdkiyoid0ErfwrGiEnY1su', 0);

-- --------------------------------------------------------

--
-- Structure de la table `preparation`
--

CREATE TABLE `preparation` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_recette` int(11) NOT NULL,
  `numero` tinyint(3) UNSIGNED NOT NULL,
  `instruction` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `preparation`
--

INSERT INTO `preparation` (`id`, `id_recette`, `numero`, `instruction`) VALUES
(1, 1, 1, 'Coupez le chocolat et le beurre en petits morceaux. Faites-les fondre en bain-marie jusqu’à avoir un mélange homogène. Retirez du feu.'),
(2, 1, 2, 'Ajoutez la farine et la levure tamisées dans le chocolat fondu.'),
(3, 1, 3, 'Dans un saladier, fouettez les jaunes avec le sucre. Puis ajoutez la préparation au chocolat.'),
(4, 1, 4, 'Dans un autre saladier, battez les blancs en neige avec une pincée de sel. Incorporez-les délicatement dans la préparation au chocolat.'),
(5, 1, 5, 'Versez ce mélange dans un moulé à manqué recouvert de papier sulfurisé (24 à 26 cm de diamètre).'),
(6, 1, 6, 'Faites cuire environ 20 à 25 min dans le four préchauffé à 180°C. Surveillez la fin de la cuisson en piquant le gâteau avec la lame d’un couteau : elle doit ressortir sèche. Laissez bien refroidir le gâteau au chocolat avant de démouler.'),
(7, 2, 1, 'Dans un saladier, fouettez les oeufs en omelette.'),
(8, 2, 2, 'Dans un bol, versez la farine. Diluez-la avec un peu de lait jusqu’à avoir un mélange bien homogène. Ajoutez-le aux oeufs avec le restant du lait et mélangez bien.'),
(9, 2, 3, 'Ajoutez les lardons dans la pâte.'),
(10, 2, 4, 'Posez un moule en silicone de 20 à 24 cm de diamètre sur une plaque du four. Versez la pâte dans le moule puis saupoudrez avec le comté râpé.'),
(11, 2, 5, 'Faites cuire 30 min dans le four préchauffé à 180°C.'),
(12, 3, 1, 'Pelez et coupez les gousses d’ail en deux pour ôter le germe.'),
(13, 3, 2, 'A l’aide d’un couteau office, incisez le gigot pour y insérer les demi gousses d’ail.'),
(14, 3, 3, 'Posez le gigot dans un grand plat allant au four. Badigeonnez-le d’huile, de sel et de poivre. Versez 10 cl d’eau dans le plat et faites cuire environ 55 min à 200°C. (Ajustez le temps de cuisson de plus ou moins 10 min en fonction de votre préférence (rosé ou bien cuit). En cours de cuisson, retournez et arrosez le gigot avec le jus de cuisson.'),
(17, 3, 4, 'Plongez les fèves dans une grande casserole d’eau bouillante salée. Faites cuire 5 min à partir de la reprise d’ébullition.'),
(18, 3, 5, 'Pelez l’oignon et la carotte. Coupez-les en petits dés et faites-les revenir dans une sauteuse avec filet d’huile d’olive. Laissez cuire 5 à 10 min sur feu moyen.'),
(19, 3, 6, 'Coupez le citron confit en lamelles.'),
(20, 3, 7, 'Ajoutez les fèves égouttées, le cumin et le citron. Réchauffez 5 min puis servez avec le gigot d’agneau.');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_categorie` int(11) UNSIGNED NOT NULL,
  `id_souscategorie` int(11) UNSIGNED NOT NULL,
  `id_soussouscategorie` int(11) UNSIGNED NOT NULL,
  `titre` varchar(100) NOT NULL,
  `id_difficulty` tinyint(1) UNSIGNED NOT NULL,
  `cout` tinyint(3) UNSIGNED NOT NULL,
  `preparation` tinyint(3) UNSIGNED NOT NULL,
  `cuisson` tinyint(3) UNSIGNED NOT NULL,
  `nb_personnes_min` tinyint(3) UNSIGNED NOT NULL,
  `nb_personnes_max` tinyint(3) UNSIGNED NOT NULL,
  `conseil` text NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`id`, `id_user`, `id_categorie`, `id_souscategorie`, `id_soussouscategorie`, `titre`, `id_difficulty`, `cout`, `preparation`, `cuisson`, `nb_personnes_min`, `nb_personnes_max`, `conseil`, `photo`) VALUES
(1, 1, 4, 16, 1, 'Gâteau au chocolat', 1, 12, 20, 30, 8, 10, '', '../Public/photos/1524094001gateau_au_chocolat1-970x1024.jpg'),
(2, 2, 1, 5, 11, 'Quiche lorraine sans pâte', 1, 10, 0, 30, 4, 4, 'Conseil : pour une version plus légère encore, optez pour du lait écrémé et remplacez les lardons par des dés de jambon.', '../Public/photos/1524093986quiche-lorraine-sans-pate-820x1163.jpg'),
(3, 3, 3, 5, 11, 'Gigot d’agneau à l’ail et fèves au citron confit', 2, 25, 20, 55, 6, 6, 'Un plat idéal pour recevoir vos invités à déjeuner, que ce soit pour le repas de Pâques ou juste pour le plaisir ! Le citron confit parfume à merveille la poêlée de fèves. Un accompagnement original et gourmand comme on les aime.', '../Public/photos/1524093971gigot_d_agneau_et_feves_au_citron_confit.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `souscategorie`
--

INSERT INTO `souscategorie` (`id`, `id_categorie`, `nom`) VALUES
(1, 1, 'Cakes'),
(2, 1, 'Entrées chaudes'),
(3, 1, 'Entrées froides'),
(4, 1, 'Pizzas'),
(5, 1, 'Quiches et tartes'),
(6, 1, 'Salades'),
(7, 1, 'Sandwichs'),
(8, 1, 'Soupes'),
(9, 2, 'Brioches et viennoiseries'),
(10, 2, 'Pains salés'),
(11, 3, 'Poissons'),
(12, 3, 'Viandes'),
(13, 4, 'Biscuits'),
(14, 4, 'Crèmes'),
(15, 4, 'Crêpes'),
(16, 4, 'Gâteaux'),
(17, 4, 'Pâtisseries');

-- --------------------------------------------------------

--
-- Structure de la table `soussouscategorie`
--

CREATE TABLE `soussouscategorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_souscategories` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `soussouscategorie`
--

INSERT INTO `soussouscategorie` (`id`, `id_souscategories`, `nom`) VALUES
(1, 1, 'Coquillages'),
(2, 1, 'Crevettes'),
(3, 1, 'Rougets'),
(4, 1, 'Saumon'),
(5, 2, 'Agneau'),
(6, 2, 'Boeuf'),
(7, 2, 'Canard'),
(8, 2, 'Porc'),
(9, 2, 'Veau'),
(10, 2, 'Volailles'),
(11, 0, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `preparation`
--
ALTER TABLE `preparation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_nom` (`id_user`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_souscategorie` (`id_souscategorie`),
  ADD KEY `id_soussouscategorie` (`id_soussouscategorie`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `soussouscategorie`
--
ALTER TABLE `soussouscategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_souscategories` (`id_souscategories`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `preparation`
--
ALTER TABLE `preparation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `soussouscategorie`
--
ALTER TABLE `soussouscategorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
