-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 nov. 2022 à 15:31
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_ws`
--

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `idBureau` int(11) NOT NULL AUTO_INCREMENT,
  `codeB` int(11) NOT NULL,
  `idLieuF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBureau`),
  KEY `idLieuF` (`idLieuF`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bureau`
--

INSERT INTO `bureau` (`idBureau`, `codeB`, `idLieuF`) VALUES
(1, 1, 16),
(2, 1, 15),
(3, 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `idCandidat` int(11) NOT NULL AUTO_INCREMENT,
  `nomParti` varchar(20) NOT NULL,
  `nombre_vote` int(11) NOT NULL DEFAULT '0',
  `idUserF` int(11) NOT NULL,
  PRIMARY KEY (`idCandidat`),
  KEY `idUserF` (`idUserF`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`idCandidat`, `nomParti`, `nombre_vote`, `idUserF`) VALUES
(1, 'seth_parti', 6, 7),
(3, 'seth_parti', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `idCommune` int(11) NOT NULL AUTO_INCREMENT,
  `nomC` varchar(20) NOT NULL,
  `idDepartF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommune`),
  KEY `idDepartF` (`idDepartF`)
) ENGINE=MyISAM AUTO_INCREMENT=552 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`idCommune`, `nomC`, `idDepartF`) VALUES
(1, 'biscuiterie', 1),
(2, 'camberene', 1),
(3, 'dieuppeul_derkle', 1),
(4, 'fann_pointE_amitie', 1),
(5, 'goree', 1),
(6, 'grand_dakar', 1),
(7, 'grand_yoff', 1),
(8, 'gueule_tapee_fass_co', 1),
(9, 'hlm', 1),
(10, 'hann_bel_air', 1),
(11, 'medina', 1),
(12, 'mermoz_sacre_coeur', 1),
(13, 'ngor', 1),
(14, 'ouakam', 1),
(15, 'parcelles_assainies', 1),
(16, 'patte_doie', 1),
(17, 'plateau', 1),
(18, 'sicap_liberte', 1),
(19, 'yoff', 1),
(20, 'golf_sud', 2),
(21, 'medina_gounass', 2),
(22, 'ndiareme', 2),
(23, 'sam', 2),
(24, 'wakhinane_nimzat', 2),
(25, 'dalifort', 3),
(26, 'diamaguene_sicap_mba', 3),
(27, 'djida_thiaroye_kao', 3),
(28, 'guinaw_rail_nord', 3),
(29, 'guinaw_rail_sud', 3),
(30, 'keur_massar', 3),
(31, 'malika', 3),
(32, 'mbao', 3),
(33, 'pikine_est', 3),
(34, 'pikine_nord', 3),
(35, 'pikine_ouest', 3),
(36, 'thiaroye_gare', 3),
(37, 'thiaroye_sur_mer', 3),
(38, 'tivaouane_diaksao', 3),
(39, 'yeumbeul_nord', 3),
(40, 'yeumbeul_sud', 3),
(41, 'bambylor', 4),
(42, 'bargny', 4),
(43, 'diamniadio', 4),
(44, 'jaxaay_plles_niakoul', 4),
(45, 'rufisque_est', 4),
(46, 'rufisque_nord', 4),
(47, 'rufisque_ouest', 4),
(48, 'sangalkam', 4),
(49, 'sebikotane', 4),
(50, 'sendou', 4),
(51, 'tivaouane_peulh_niag', 4),
(52, 'yene', 4),
(53, 'baba_garage', 5),
(54, 'bambey', 5),
(55, 'dangalma', 5),
(56, 'dinguiraye', 5),
(57, 'gawane', 5),
(58, 'keur_samba_kane', 5),
(59, 'lambaye', 5),
(60, 'ndondol', 5),
(61, 'ngogom', 5),
(62, 'ngoye', 5),
(63, 'refane', 5),
(64, 'thiakhar', 5),
(65, 'dankh_sene', 6),
(66, 'diourbel', 6),
(67, 'gade_escale', 6),
(68, 'keur_ngalgou', 6),
(69, 'ndindy', 6),
(70, 'ndoulo', 6),
(71, 'ngohe', 6),
(72, 'pattar', 6),
(73, 'taiba_moutoupha', 6),
(74, 'tocky_gare', 6),
(75, 'touba_lappe', 6),
(76, 'toure_mbonde', 6),
(77, 'dalla_ngabou', 7),
(78, 'dandeye_gouygui', 7),
(79, 'darou_nahim', 7),
(80, 'darou_salam_typ', 7),
(81, 'kael', 7),
(82, 'madina', 7),
(83, 'mbacke', 7),
(84, 'missirah', 7),
(85, 'ndioumane', 7),
(86, 'nghaye', 7),
(87, 'sadio', 7),
(88, 'taiba_thiekene', 7),
(89, 'taif', 7),
(90, 'touba_fall', 7),
(91, 'touba_mboul', 7),
(92, 'touba_mosquee', 7),
(93, 'diakhao', 8),
(94, 'diaoule', 8),
(95, 'diarrere', 8),
(96, 'diofior', 8),
(97, 'diouroup', 8),
(98, 'djilass', 8),
(99, 'fatick', 8),
(100, 'fimela', 8),
(101, 'loul_sessene', 8),
(102, 'mbellacadiao', 8),
(103, 'ndiob', 8),
(104, 'ngayokheme', 8),
(105, 'niakhar', 8),
(106, 'palmarin_facao', 8),
(107, 'patar', 8),
(108, 'tattaguine', 8),
(109, 'thiare_ndialgui', 8),
(110, 'bassoul', 9),
(111, 'diagane_barka', 9),
(112, 'dionewar', 9),
(113, 'diossong', 9),
(114, 'djilor', 9),
(115, 'djirnda', 9),
(116, 'foundiougne', 9),
(117, 'karang_poste', 9),
(118, 'keur_saloum_diane', 9),
(119, 'keur_samba_gueye', 9),
(120, 'mbam', 9),
(121, 'niassene', 9),
(122, 'nioro_alassane_tall', 9),
(123, 'passi', 9),
(124, 'sokone', 9),
(125, 'soum', 9),
(126, 'toubacouta', 9),
(127, 'colobane', 10),
(128, 'gossas', 10),
(129, 'mbar', 10),
(130, 'ndiene_lagane', 10),
(131, 'ouadiour', 10),
(132, 'patar_lia', 10),
(133, 'birkilane', 11),
(134, 'diamal', 11),
(135, 'keur_mboucki', 11),
(136, 'mabo', 11),
(137, 'mbeuleup', 11),
(138, 'ndiognick', 11),
(139, 'segre_gatta', 11),
(140, 'touba_mbella', 11),
(141, 'boulel', 12),
(142, 'diamagadio', 12),
(143, 'diokoul_mbelbouck', 12),
(144, 'gniby', 12),
(145, 'kaffrine', 12),
(146, 'kahi', 12),
(147, 'kathiote', 12),
(148, 'medinatoul_salam2', 12),
(149, 'nganda', 12),
(150, 'fass_thiekene', 13),
(151, 'ida_mouride', 13),
(152, 'koungheul', 13),
(153, 'lour_escale', 13),
(154, 'maka_yop', 13),
(155, 'missirah_wadene', 13),
(156, 'ngainthe_pate', 13),
(157, 'ribot_escale', 13),
(158, 'saly_escale', 13),
(159, 'darou_minam', 14),
(160, 'djanke_souf', 14),
(161, 'khelcom', 14),
(162, 'malem_hodar', 14),
(163, 'ndiobene_samba_lamo', 14),
(164, 'ndioum_ngainthe', 14),
(165, 'sagna', 14),
(166, 'dara_mboss', 15),
(167, 'fass', 15),
(168, 'guinguineo', 15),
(169, 'mbadakhoune', 15),
(170, 'mboss', 15),
(171, 'ndiago', 15),
(172, 'ngagnick', 15),
(173, 'ngathie_naoude', 15),
(174, 'ngellou', 15),
(175, 'ourour', 15),
(176, 'panal_wolof', 15),
(177, 'dya', 16),
(178, 'gandiaye', 16),
(179, 'kahone', 16),
(180, 'kaolack', 16),
(181, 'keur_baka', 16),
(182, 'keur_soce', 16),
(183, 'latmingue', 16),
(184, 'ndiaffate', 16),
(185, 'ndiebel', 16),
(186, 'ndiedieng', 16),
(187, 'ndoffane', 16),
(188, 'sibassor', 16),
(189, 'thiare', 16),
(190, 'thiomby', 16),
(191, 'dabaly', 17),
(192, 'darou_salam', 17),
(193, 'gainte_kaye', 17),
(194, 'kayemor', 17),
(195, 'keur_maba_diakhou', 17),
(196, 'keur_madiabel', 17),
(197, 'keur_madongo', 17),
(198, 'medina_sabakh', 17),
(199, 'ndrame_escale', 17),
(200, 'ngayene', 17),
(201, 'nioro_du_rip', 17),
(202, 'paoskoto', 17),
(203, 'porokhane', 17),
(204, 'taiba_niassene', 17),
(205, 'wack_ngouna', 17),
(206, 'bandafassi', 18),
(207, 'dimboli', 18),
(208, 'dindefelo', 18),
(209, 'fongolimbi', 18),
(210, 'kedougou', 18),
(211, 'ninefecha', 18),
(212, 'tomboronkoto', 18),
(213, 'dakately', 19),
(214, 'dar_salam', 19),
(215, 'ethiolo', 19),
(216, 'kevoye', 19),
(217, 'oubadji', 19),
(218, 'salemata', 19),
(219, 'bembou', 20),
(220, 'khossanto', 20),
(221, 'medina_baffe', 20),
(222, 'missirah_sirimana', 20),
(223, 'sabodola', 20),
(224, 'saraya', 20),
(225, 'bagadaji', 21),
(226, 'coumbacara', 21),
(227, 'dabo', 21),
(228, 'dialambere', 21),
(229, 'dioulacolon', 21),
(230, 'guiro_yero_bocar', 21),
(231, 'kolda', 21),
(232, 'mampatim', 21),
(233, 'medina_cherif', 21),
(234, 'medina_el_hadji', 21),
(235, 'salikegne', 21),
(236, 'sare_bidji', 21),
(237, 'sare_yoba_diega', 21),
(238, 'tankanto_escale', 21),
(239, 'thietty', 21),
(240, 'badion', 22),
(241, 'bignarabe', 22),
(242, 'bourouco', 22),
(243, 'm_y_f', 22),
(244, 'fafacourou', 22),
(245, 'kerewane', 22),
(246, 'koulinto', 22),
(247, 'medina_yoro_foulah', 22),
(248, 'ndorna', 22),
(249, 'niaming', 22),
(250, 'pata', 22),
(251, 'bonconto', 23),
(252, 'diaobe_kabendou', 23),
(253, 'kandia', 23),
(254, 'kandiaye', 23),
(255, 'kounkane', 23),
(256, 'linkering', 23),
(257, 'medina_gounasse', 23),
(258, 'nemataba', 23),
(259, 'ouassadou', 23),
(260, 'pakour', 23),
(261, 'paroumba', 23),
(262, 'sare_coli_salle', 23),
(263, 'sinthiang_koundara', 23),
(264, 'velingara', 23),
(265, 'bandegne_ouolof', 24),
(266, 'darou_marnane', 24),
(267, 'darou_mousti', 24),
(268, 'diokoul_ndiawrigne', 24),
(269, 'gueoul', 24),
(270, 'kab_gaye', 24),
(271, 'kanene_ndiob', 24),
(272, 'kebemer', 24),
(273, 'loro', 24),
(274, 'mbacke_cajor', 24),
(275, 'mbadiane', 24),
(276, 'ndande', 24),
(277, 'ndoyene', 24),
(278, 'ngourane_ouolof', 24),
(279, 'sagata_gueth', 24),
(280, 'sam_yabal', 24),
(281, 'thiep', 24),
(282, 'thiolom_fall', 24),
(283, 'touba_merina', 24),
(284, 'affe_djolof', 25),
(285, 'barkedji', 25),
(286, 'boulal', 25),
(287, 'dahra', 25),
(288, 'dealy', 25),
(289, 'dodji', 25),
(290, 'gassane', 25),
(291, 'kambe', 25),
(292, 'labgar', 25),
(293, 'linguere', 25),
(294, 'mbeuleukhe', 25),
(295, 'mboula', 25),
(296, 'ouarkhokh', 25),
(297, 'sagatta_djolof', 25),
(298, 'tessekere_forage', 25),
(299, 'thiamene_passe', 25),
(300, 'thiargny', 25),
(301, 'thiel', 25),
(302, 'yang_yang', 25),
(303, 'gande', 26),
(304, 'guet_ardo', 26),
(305, 'kelle_gueye', 26),
(306, 'keur_momar_sarr', 26),
(307, 'koki', 26),
(308, 'leona', 26),
(309, 'louga', 26),
(310, 'mbediene', 26),
(311, 'ndiagne', 26),
(312, 'nguer_malal', 26),
(313, 'ngueune_sarr', 26),
(314, 'nguidile', 26),
(315, 'niomre', 26),
(316, 'pete_ouarack', 26),
(317, 'sakal', 26),
(318, 'syer', 26),
(319, 'thiamene_cayor', 26),
(320, 'aoure', 27),
(321, 'bokiladji', 27),
(322, 'dembancane', 27),
(323, 'hamadi_hounare', 27),
(324, 'kanel', 27),
(325, 'ndendory', 27),
(326, 'odobere', 27),
(327, 'orkadiere', 27),
(328, 'ouaounde', 27),
(329, 'semme', 27),
(330, 'sinthiou_bamambe_ban', 27),
(331, 'wouro_sidy', 27),
(332, 'bokidiave', 28),
(333, 'dabia', 28),
(334, 'des_agnam', 28),
(335, 'matam', 28),
(336, 'nabadji_civol', 28),
(337, 'nguidjilone', 28),
(338, 'ogo', 28),
(339, 'orefonde', 28),
(340, 'ourossogui', 28),
(341, 'thilogne', 28),
(342, 'lougre_thioly', 29),
(343, 'oudalaye', 29),
(344, 'ranerou', 29),
(345, 'velingara_ranerou', 29),
(346, 'bokhol', 30),
(347, 'dagana', 30),
(348, 'diama', 30),
(349, 'gae', 30),
(350, 'gnith', 30),
(351, 'mbane', 30),
(352, 'ndombo_sandjiry', 30),
(353, 'richard_toll', 30),
(354, 'ronkh', 30),
(355, 'ross_bethio', 30),
(356, 'rosso_senegal', 30),
(357, 'aere_lao', 31),
(358, 'bode_lao', 31),
(359, 'boke_dialloube', 31),
(360, 'demette', 31),
(361, 'dodel', 31),
(362, 'doumga_lao', 31),
(363, 'fanaye', 31),
(364, 'galoya_toucouleur', 31),
(365, 'gamadji_sare', 31),
(366, 'gollere', 31),
(367, 'guede_chantier', 31),
(368, 'guede_village', 31),
(369, 'madina_ndiathbe', 31),
(370, 'mbolo_birane', 31),
(371, 'mboumba', 31),
(372, 'meri', 31),
(373, 'ndiayene_peindao', 31),
(374, 'ndioum', 31),
(375, 'niandane', 31),
(376, 'pete', 31),
(377, 'podor', 31),
(378, 'walalde', 31),
(379, 'fass_ngom', 32),
(380, 'gandon', 32),
(381, 'mpal', 32),
(382, 'ndiebene_gandiole', 32),
(383, 'saint_louis', 32),
(384, 'boghal', 33),
(385, 'bona', 33),
(386, 'bounkiling', 33),
(387, 'diacounda', 33),
(388, 'diambaty', 33),
(389, 'diaroume', 33),
(390, 'djinany', 33),
(391, 'faoune', 33),
(392, 'inor', 33),
(393, 'kandion_mangana', 33),
(394, 'madina_wandifa', 33),
(395, 'ndiamacouta', 33),
(396, 'ndiamalathiel', 33),
(397, 'tankon', 33),
(398, 'baghere', 34),
(399, 'diattacounda', 34),
(400, 'dioudoubou', 34),
(401, 'djibanar', 34),
(402, 'goudomp', 34),
(403, 'kaour', 34),
(404, 'karantaba', 34),
(405, 'kolibantang', 34),
(406, 'mangaroungou_santo', 34),
(407, 'niagha', 34),
(408, 'samine', 34),
(409, 'simbandi_balante', 34),
(410, 'simbandi_brassou', 34),
(411, 'tanaff', 34),
(412, 'yarang_balante', 34),
(413, 'bambali', 35),
(414, 'bemet_bidjini', 35),
(415, 'dianah_malary', 35),
(416, 'diannah_ba', 35),
(417, 'diende', 35),
(418, 'djibabouya', 35),
(419, 'djiredji', 35),
(420, 'koussy', 35),
(421, 'marssassoum', 35),
(422, 'oudoucar', 35),
(423, 'sakar', 35),
(424, 'same_kanta_peulh', 35),
(425, 'sansamba', 35),
(426, 'sedhiou', 35),
(427, 'bakel', 36),
(428, 'ballou', 36),
(429, 'bele', 36),
(430, 'diawara', 36),
(431, 'gabou', 36),
(432, 'gathiari', 36),
(433, 'kidira', 36),
(434, 'madina_foulbe', 36),
(435, 'mouderi', 36),
(436, 'sadatou', 36),
(437, 'sinthiou_fissa', 36),
(438, 'toumboura', 36),
(439, 'bala', 37),
(440, 'bani_israel', 37),
(441, 'boutoucoufara', 37),
(442, 'boynguel_bamba', 37),
(443, 'dianke_makha', 37),
(444, 'dougue', 37),
(445, 'goudiry', 37),
(446, 'goumbayel', 37),
(447, 'koar', 37),
(448, 'komoti', 37),
(449, 'kothiary', 37),
(450, 'koulor', 37),
(451, 'koussan', 37),
(452, 'sinthiou_bocar_aly', 37),
(453, 'sinthiou_mamadou_bou', 37),
(454, 'bamba_thialene', 38),
(455, 'kahene', 38),
(456, 'koumpentoum', 38),
(457, 'kouthia_gaydi', 38),
(458, 'kouthiaba_wolof', 38),
(459, 'maleme_niani', 38),
(460, 'mereto', 38),
(461, 'ndam', 38),
(462, 'pass_koto', 38),
(463, 'payar', 38),
(464, 'dialokoto', 39),
(465, 'koussanar', 39),
(466, 'makacolibantang', 39),
(467, 'missirah', 39),
(468, 'ndoga_babacar', 39),
(469, 'netteboulou', 39),
(470, 'niani_toucouleur', 39),
(471, 'sinthiou_maleme', 39),
(472, 'tambacounda', 39),
(473, 'diass', 40),
(474, 'fissel', 40),
(475, 'joal_fadiouth', 40),
(476, 'malicounda', 40),
(477, 'mbour', 40),
(478, 'ndiaganiao', 40),
(479, 'ngaparou', 40),
(480, 'nguekhokh', 40),
(481, 'ngueniene', 40),
(482, 'popenguine', 40),
(483, 'saly_portudal', 40),
(484, 'sandiara', 40),
(485, 'sessene', 40),
(486, 'sindia', 40),
(487, 'somone', 40),
(488, 'thiadiaye', 40),
(489, 'diender_guedji', 41),
(490, 'fandene', 41),
(491, 'kayar', 41),
(492, 'keur_moussa', 41),
(493, 'khombole', 41),
(494, 'ndieyene_sirakh', 41),
(495, 'ngoundiane', 41),
(496, 'notto', 41),
(497, 'pout', 41),
(498, 'tassette', 41),
(499, 'thienaba', 41),
(500, 'thies_est', 41),
(501, 'thies_nord', 41),
(502, 'thies_ouest', 41),
(503, 'touba_toul', 41),
(504, 'cherif_lo', 42),
(505, 'darou_khoudoss', 42),
(506, 'koul', 42),
(507, 'mbayene', 42),
(508, 'mboro', 42),
(509, 'meckhe', 42),
(510, 'meouane', 42),
(511, 'merina_dakhar', 42),
(512, 'mont_rolland', 42),
(513, 'ngandiouf', 42),
(514, 'niakhene', 42),
(515, 'notto_gouye_diama', 42),
(516, 'pambal', 42),
(517, 'pekesse', 42),
(518, 'pire_goureye', 42),
(519, 'taiba_ndiaye', 42),
(520, 'thilmakha', 42),
(521, 'tivaouane', 42),
(522, 'balingore', 43),
(523, 'bignona', 43),
(524, 'coubalan', 43),
(525, 'diegoune', 43),
(526, 'diouloulou', 43),
(527, 'djibidione', 43),
(528, 'djinaki', 43),
(529, 'kafountine', 43),
(530, 'kartiack', 43),
(531, 'kataba1', 43),
(532, 'mangagoulack', 43),
(533, 'mlomp', 43),
(534, 'niamone', 43),
(535, 'oulampane', 43),
(536, 'ouonck', 43),
(537, 'sindian', 43),
(538, 'suel', 43),
(539, 'tenghori', 43),
(540, 'thionck_essyl', 43),
(541, 'diembering', 44),
(542, 'mlomp_oussouye', 44),
(543, 'oukout', 44),
(544, 'oussouye', 44),
(545, 'santhiaba_manjaque', 44),
(546, 'adeane', 45),
(547, 'boutoupa_camaracound', 45),
(548, 'enampor', 45),
(549, 'niaguis', 45),
(550, 'niassia', 45),
(551, 'ziguinchor', 45);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `nomD` varchar(20) NOT NULL,
  `idRegionF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDepartement`),
  KEY `idRegionF` (`idRegionF`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `nomD`, `idRegionF`) VALUES
(1, 'dakar', 1),
(2, 'guediawaye', 1),
(3, 'pikine', 1),
(4, 'rufisque', 1),
(5, 'bambey', 2),
(6, 'diourbel', 2),
(7, 'mbacke', 2),
(8, 'fatick', 3),
(9, 'foundiougne', 3),
(10, 'gossas', 3),
(11, 'birkilane', 4),
(12, 'kaffrine', 4),
(13, 'koungheul', 4),
(14, 'malem_hodar', 4),
(15, 'guinguineo', 5),
(16, 'kaolack', 5),
(17, 'nioro_du_rip', 5),
(18, 'kedougou', 6),
(19, 'salemata', 6),
(20, 'saraya', 6),
(21, 'kolda', 7),
(22, 'medina_y_foulah', 7),
(23, 'velingara', 7),
(24, 'kebemer', 8),
(25, 'linguere', 8),
(26, 'louga', 8),
(27, 'kanel', 9),
(28, 'matam', 9),
(29, 'ranerou_ferlo', 9),
(30, 'dagana', 10),
(31, 'podor', 10),
(32, 'saint_louis', 10),
(33, 'bounkiling', 11),
(34, 'goudomp', 11),
(35, 'sedhiou', 11),
(36, 'bakel', 12),
(37, 'goudiry', 12),
(38, 'koumpentoum', 12),
(39, 'tambacounda', 12),
(40, 'mbour', 13),
(41, 'thies', 13),
(42, 'tivaouane', 13),
(43, 'bignona', 14),
(44, 'oussouye', 14),
(45, 'ziguinchor', 14);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `nomL` varchar(50) DEFAULT NULL,
  `idCommuneF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `idCommuneF` (`idCommuneF`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `nomL`, `idCommuneF`) VALUES
(15, 'rooum', 4),
(16, 'golf', 20),
(17, 'pikmbao', 32),
(18, 'sahm', 11);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `nomProfil` varchar(20) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `nomProfil`) VALUES
(1, 'administrateur'),
(2, 'electeur');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `idRegion` int(11) NOT NULL AUTO_INCREMENT,
  `nomR` varchar(20) NOT NULL,
  PRIMARY KEY (`idRegion`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`idRegion`, `nomR`) VALUES
(1, 'dakar'),
(2, 'diourbel'),
(3, 'fatick'),
(4, 'kaffrine'),
(5, 'kaolack'),
(6, 'kedougou'),
(7, 'kolda'),
(8, 'louga'),
(9, 'matam'),
(10, 'saint_louis'),
(11, 'sedhiou'),
(12, 'tambacounda'),
(13, 'thies'),
(14, 'ziguinchor');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `naissance` date NOT NULL,
  `adresse` varchar(20) DEFAULT NULL,
  `idProfilF` int(11) DEFAULT NULL,
  `mot_de_passe` varchar(25) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `etat` int(1) DEFAULT NULL,
  `a_vote` int(11) NOT NULL DEFAULT '0',
  `est_inscrit` int(11) DEFAULT '0',
  `numCNI` varchar(20) DEFAULT NULL,
  `idBureauF` int(11) DEFAULT NULL,
  `vote_pour` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idProfilF` (`idProfilF`),
  KEY `idBureauF` (`idBureauF`),
  KEY `vote_pour` (`vote_pour`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `naissance`, `adresse`, `idProfilF`, `mot_de_passe`, `mail`, `etat`, `a_vote`, `est_inscrit`, `numCNI`, `idBureauF`, `vote_pour`) VALUES
(1, 'HOUANSOU', 'seth', '1999-09-23', 'thies', 1, 'passer', 'hnsseth@gmail.com', 1, 0, 0, '1234567890324', 3, 0),
(9, 'houans', 'cedric', '1992-12-04', 'medina', 2, '0000', 'hnsced@gmail.com', 1, 1, 1, '1223445675432', 1, 7),
(5, 'gaston', 'prince', '2014-09-12', 'mbour', 2, 'test1', 'princegast@gmail.com', 1, 1, 0, '1134445654324', 1, 7),
(7, 'houansou', 'cedric', '1993-09-07', 'saly', 2, 'test123', 'mscoluwatogni.houansou@univ-thies.sn', 1, 1, 0, '1111123489076', 3, 7),
(10, 'KA', 'Aliou', '1997-09-05', 'thies', 2, 'aliou', 'aliou.ka@univ-thies.sn', 1, 1, 0, '1233456678543', 1, 10),
(12, 'ghjkjhgh', 'ghjvbn', '2005-05-10', 'ouakam', 2, 'boss', 'azerty@gmail.com', 1, 1, 1, '12345678888765', 1, 7),
(19, 'zannou', 'wens', '1991-12-03', 'ouakam', 2, 'test', 'non@gmail.com', 1, 0, 1, '11122434354346', 3, 0),
(22, 'aboubacar', 'chancell', '1997-12-08', 'pointe', 2, 'passer', 'chanc@gmail.com', 0, 0, 0, '111122233334565', 1, 0),
(35, 'hounkanrin', 'frejus', '2005-03-15', 'dakar', 2, 'test', 'hkr@gmail.com', 0, 0, 0, '11234332567898', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
