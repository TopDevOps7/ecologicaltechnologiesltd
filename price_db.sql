/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : price_db

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 05/04/2022 23:30:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `de` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 254 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'DE', 'Deutschland', 'Germany');
INSERT INTO `country` VALUES (2, 'AT', 'Österreich', 'Austria');
INSERT INTO `country` VALUES (3, 'CH', 'Schweiz', 'Switzerland');
INSERT INTO `country` VALUES (5, 'AD', 'Andorra', 'Andorra');
INSERT INTO `country` VALUES (6, 'AE', 'Vereinigte Arabische Emirate', 'United Arab Emirates');
INSERT INTO `country` VALUES (7, 'AF', 'Afghanistan', 'Afghanistan');
INSERT INTO `country` VALUES (8, 'AG', 'Antigua und Barbuda', 'Antigua and Barbuda');
INSERT INTO `country` VALUES (9, 'AI', 'Anguilla', 'Anguilla');
INSERT INTO `country` VALUES (10, 'AL', 'Albanien', 'Albania');
INSERT INTO `country` VALUES (11, 'AM', 'Armenien', 'Armenia');
INSERT INTO `country` VALUES (12, 'AO', 'Angola', 'Angola');
INSERT INTO `country` VALUES (13, 'AQ', 'Antarktis', 'Antarctica');
INSERT INTO `country` VALUES (14, 'AR', 'Argentinien', 'Argentina');
INSERT INTO `country` VALUES (15, 'AS', 'Amerikanisch-Samoa', 'American Samoa');
INSERT INTO `country` VALUES (16, 'AT', 'Österreich', 'Austria');
INSERT INTO `country` VALUES (17, 'AU', 'Australien', 'Australia');
INSERT INTO `country` VALUES (18, 'AW', 'Aruba', 'Aruba');
INSERT INTO `country` VALUES (19, 'AX', 'Ålandinseln', 'Åland Islands');
INSERT INTO `country` VALUES (20, 'AZ', 'Aserbaidschan', 'Azerbaijan');
INSERT INTO `country` VALUES (21, 'BA', 'Bosnien und Herzegowina', 'Bosnia and Herzegovina');
INSERT INTO `country` VALUES (22, 'BB', 'Barbados', 'Barbados');
INSERT INTO `country` VALUES (23, 'BD', 'Bangladesch', 'Bangladesh');
INSERT INTO `country` VALUES (24, 'BE', 'Belgien', 'Belgium');
INSERT INTO `country` VALUES (25, 'BF', 'Burkina Faso', 'Burkina Faso');
INSERT INTO `country` VALUES (26, 'BG', 'Bulgarien', 'Bulgaria');
INSERT INTO `country` VALUES (27, 'BH', 'Bahrain', 'Bahrain');
INSERT INTO `country` VALUES (28, 'BI', 'Burundi', 'Burundi');
INSERT INTO `country` VALUES (29, 'BJ', 'Benin', 'Benin');
INSERT INTO `country` VALUES (30, 'BL', 'St. Barthélemy', 'St. Barthélemy');
INSERT INTO `country` VALUES (31, 'BM', 'Bermuda', 'Bermuda');
INSERT INTO `country` VALUES (32, 'BN', 'Brunei Darussalam', 'Brunei');
INSERT INTO `country` VALUES (33, 'BO', 'Bolivien', 'Bolivia');
INSERT INTO `country` VALUES (34, 'BQ', 'Karibische Niederlande', 'Caribbean Netherlands');
INSERT INTO `country` VALUES (35, 'BR', 'Brasilien', 'Brazil');
INSERT INTO `country` VALUES (36, 'BS', 'Bahamas', 'Bahamas');
INSERT INTO `country` VALUES (37, 'BT', 'Bhutan', 'Bhutan');
INSERT INTO `country` VALUES (38, 'BV', 'Bouvetinsel', 'Bouvet Island');
INSERT INTO `country` VALUES (39, 'BW', 'Botsuana', 'Botswana');
INSERT INTO `country` VALUES (40, 'BY', 'Belarus', 'Belarus');
INSERT INTO `country` VALUES (41, 'BZ', 'Belize', 'Belize');
INSERT INTO `country` VALUES (42, 'CA', 'Kanada', 'Canada');
INSERT INTO `country` VALUES (43, 'CC', 'Kokosinseln', 'Cocos (Keeling) Islands');
INSERT INTO `country` VALUES (44, 'CD', 'Kongo-Kinshasa', 'Congo - Kinshasa');
INSERT INTO `country` VALUES (45, 'CF', 'Zentralafrikanische Republik', 'Central African Republic');
INSERT INTO `country` VALUES (46, 'CG', 'Kongo-Brazzaville', 'Congo - Brazzaville');
INSERT INTO `country` VALUES (48, 'CI', 'Côte d’Ivoire', 'Côte d’Ivoire');
INSERT INTO `country` VALUES (49, 'CK', 'Cookinseln', 'Cook Islands');
INSERT INTO `country` VALUES (50, 'CL', 'Chile', 'Chile');
INSERT INTO `country` VALUES (51, 'CM', 'Kamerun', 'Cameroon');
INSERT INTO `country` VALUES (52, 'CN', 'China', 'China');
INSERT INTO `country` VALUES (53, 'CO', 'Kolumbien', 'Colombia');
INSERT INTO `country` VALUES (54, 'CR', 'Costa Rica', 'Costa Rica');
INSERT INTO `country` VALUES (55, 'CU', 'Kuba', 'Cuba');
INSERT INTO `country` VALUES (56, 'CV', 'Cabo Verde', 'Cape Verde');
INSERT INTO `country` VALUES (57, 'CW', 'Curaçao', 'Curaçao');
INSERT INTO `country` VALUES (58, 'CX', 'Weihnachtsinsel', 'Christmas Island');
INSERT INTO `country` VALUES (59, 'CY', 'Zypern', 'Cyprus');
INSERT INTO `country` VALUES (60, 'CZ', 'Tschechien', 'Czechia');
INSERT INTO `country` VALUES (61, 'DE', 'Deutschland', 'Germany');
INSERT INTO `country` VALUES (62, 'DJ', 'Dschibuti', 'Djibouti');
INSERT INTO `country` VALUES (63, 'DK', 'Dänemark', 'Denmark');
INSERT INTO `country` VALUES (64, 'DM', 'Dominica', 'Dominica');
INSERT INTO `country` VALUES (65, 'DO', 'Dominikanische Republik', 'Dominican Republic');
INSERT INTO `country` VALUES (66, 'DZ', 'Algerien', 'Algeria');
INSERT INTO `country` VALUES (67, 'EC', 'Ecuador', 'Ecuador');
INSERT INTO `country` VALUES (68, 'EE', 'Estland', 'Estonia');
INSERT INTO `country` VALUES (69, 'EG', 'Ägypten', 'Egypt');
INSERT INTO `country` VALUES (70, 'EH', 'Westsahara', 'Western Sahara');
INSERT INTO `country` VALUES (71, 'ER', 'Eritrea', 'Eritrea');
INSERT INTO `country` VALUES (72, 'ES', 'Spanien', 'Spain');
INSERT INTO `country` VALUES (73, 'ET', 'Äthiopien', 'Ethiopia');
INSERT INTO `country` VALUES (74, 'FI', 'Finnland', 'Finland');
INSERT INTO `country` VALUES (75, 'FJ', 'Fidschi', 'Fiji');
INSERT INTO `country` VALUES (76, 'FK', 'Falklandinseln', 'Falkland Islands');
INSERT INTO `country` VALUES (77, 'FM', 'Mikronesien', 'Micronesia');
INSERT INTO `country` VALUES (78, 'FO', 'Färöer', 'Faroe Islands');
INSERT INTO `country` VALUES (79, 'FR', 'Frankreich', 'France');
INSERT INTO `country` VALUES (80, 'GA', 'Gabun', 'Gabon');
INSERT INTO `country` VALUES (81, 'GB', 'Vereinigtes Königreich', 'United Kingdom');
INSERT INTO `country` VALUES (82, 'GD', 'Grenada', 'Grenada');
INSERT INTO `country` VALUES (83, 'GE', 'Georgien', 'Georgia');
INSERT INTO `country` VALUES (84, 'GF', 'Französisch-Guayana', 'French Guiana');
INSERT INTO `country` VALUES (85, 'GG', 'Guernsey', 'Guernsey');
INSERT INTO `country` VALUES (86, 'GH', 'Ghana', 'Ghana');
INSERT INTO `country` VALUES (87, 'GI', 'Gibraltar', 'Gibraltar');
INSERT INTO `country` VALUES (88, 'GL', 'Grönland', 'Greenland');
INSERT INTO `country` VALUES (89, 'GM', 'Gambia', 'Gambia');
INSERT INTO `country` VALUES (90, 'GN', 'Guinea', 'Guinea');
INSERT INTO `country` VALUES (91, 'GP', 'Guadeloupe', 'Guadeloupe');
INSERT INTO `country` VALUES (92, 'GQ', 'Äquatorialguinea', 'Equatorial Guinea');
INSERT INTO `country` VALUES (93, 'GR', 'Griechenland', 'Greece');
INSERT INTO `country` VALUES (94, 'GS', 'Südgeorgien und die Südlichen Sandwichinseln', 'South Georgia and South Sandwich Islands');
INSERT INTO `country` VALUES (95, 'GT', 'Guatemala', 'Guatemala');
INSERT INTO `country` VALUES (96, 'GU', 'Guam', 'Guam');
INSERT INTO `country` VALUES (97, 'GW', 'Guinea-Bissau', 'Guinea-Bissau');
INSERT INTO `country` VALUES (98, 'GY', 'Guyana', 'Guyana');
INSERT INTO `country` VALUES (99, 'HK', 'Sonderverwaltungsregion Hongkong', 'Hong Kong SAR China');
INSERT INTO `country` VALUES (100, 'HM', 'Heard und McDonaldinseln', 'Heard and McDonald Islands');
INSERT INTO `country` VALUES (101, 'HN', 'Honduras', 'Honduras');
INSERT INTO `country` VALUES (102, 'HR', 'Kroatien', 'Croatia');
INSERT INTO `country` VALUES (103, 'HT', 'Haiti', 'Haiti');
INSERT INTO `country` VALUES (104, 'HU', 'Ungarn', 'Hungary');
INSERT INTO `country` VALUES (105, 'ID', 'Indonesien', 'Indonesia');
INSERT INTO `country` VALUES (106, 'IE', 'Irland', 'Ireland');
INSERT INTO `country` VALUES (107, 'IL', 'Israel', 'Israel');
INSERT INTO `country` VALUES (108, 'IM', 'Isle of Man', 'Isle of Man');
INSERT INTO `country` VALUES (109, 'IN', 'Indien', 'India');
INSERT INTO `country` VALUES (110, 'IO', 'Britisches Territorium im Indischen Ozean', 'British Indian Ocean Territory');
INSERT INTO `country` VALUES (111, 'IQ', 'Irak', 'Iraq');
INSERT INTO `country` VALUES (112, 'IR', 'Iran', 'Iran');
INSERT INTO `country` VALUES (113, 'IS', 'Island', 'Iceland');
INSERT INTO `country` VALUES (114, 'IT', 'Italien', 'Italy');
INSERT INTO `country` VALUES (115, 'JE', 'Jersey', 'Jersey');
INSERT INTO `country` VALUES (116, 'JM', 'Jamaika', 'Jamaica');
INSERT INTO `country` VALUES (117, 'JO', 'Jordanien', 'Jordan');
INSERT INTO `country` VALUES (118, 'JP', 'Japan', 'Japan');
INSERT INTO `country` VALUES (119, 'KE', 'Kenia', 'Kenya');
INSERT INTO `country` VALUES (120, 'KG', 'Kirgisistan', 'Kyrgyzstan');
INSERT INTO `country` VALUES (121, 'KH', 'Kambodscha', 'Cambodia');
INSERT INTO `country` VALUES (122, 'KI', 'Kiribati', 'Kiribati');
INSERT INTO `country` VALUES (123, 'KM', 'Komoren', 'Comoros');
INSERT INTO `country` VALUES (124, 'KN', 'St. Kitts und Nevis', 'St. Kitts and Nevis');
INSERT INTO `country` VALUES (125, 'KP', 'Nordkorea', 'North Korea');
INSERT INTO `country` VALUES (126, 'KR', 'Südkorea', 'South Korea');
INSERT INTO `country` VALUES (127, 'KW', 'Kuwait', 'Kuwait');
INSERT INTO `country` VALUES (128, 'KY', 'Kaimaninseln', 'Cayman Islands');
INSERT INTO `country` VALUES (129, 'KZ', 'Kasachstan', 'Kazakhstan');
INSERT INTO `country` VALUES (130, 'LA', 'Laos', 'Laos');
INSERT INTO `country` VALUES (131, 'LB', 'Libanon', 'Lebanon');
INSERT INTO `country` VALUES (132, 'LC', 'St. Lucia', 'St. Lucia');
INSERT INTO `country` VALUES (133, 'LI', 'Liechtenstein', 'Liechtenstein');
INSERT INTO `country` VALUES (134, 'LK', 'Sri Lanka', 'Sri Lanka');
INSERT INTO `country` VALUES (135, 'LR', 'Liberia', 'Liberia');
INSERT INTO `country` VALUES (136, 'LS', 'Lesotho', 'Lesotho');
INSERT INTO `country` VALUES (137, 'LT', 'Litauen', 'Lithuania');
INSERT INTO `country` VALUES (138, 'LU', 'Luxemburg', 'Luxembourg');
INSERT INTO `country` VALUES (139, 'LV', 'Lettland', 'Latvia');
INSERT INTO `country` VALUES (140, 'LY', 'Libyen', 'Libya');
INSERT INTO `country` VALUES (141, 'MA', 'Marokko', 'Morocco');
INSERT INTO `country` VALUES (142, 'MC', 'Monaco', 'Monaco');
INSERT INTO `country` VALUES (143, 'MD', 'Republik Moldau', 'Moldova');
INSERT INTO `country` VALUES (144, 'ME', 'Montenegro', 'Montenegro');
INSERT INTO `country` VALUES (145, 'MF', 'St. Martin', 'St. Martin');
INSERT INTO `country` VALUES (146, 'MG', 'Madagaskar', 'Madagascar');
INSERT INTO `country` VALUES (147, 'MH', 'Marshallinseln', 'Marshall Islands');
INSERT INTO `country` VALUES (148, 'MK', 'Nordmazedonien', 'North Macedonia');
INSERT INTO `country` VALUES (149, 'ML', 'Mali', 'Mali');
INSERT INTO `country` VALUES (150, 'MM', 'Myanmar', 'Myanmar (Burma)');
INSERT INTO `country` VALUES (151, 'MN', 'Mongolei', 'Mongolia');
INSERT INTO `country` VALUES (152, 'MO', 'Sonderverwaltungsregion Macau', 'Macao SAR China');
INSERT INTO `country` VALUES (153, 'MP', 'Nördliche Marianen', 'Northern Mariana Islands');
INSERT INTO `country` VALUES (154, 'MQ', 'Martinique', 'Martinique');
INSERT INTO `country` VALUES (155, 'MR', 'Mauretanien', 'Mauritania');
INSERT INTO `country` VALUES (156, 'MS', 'Montserrat', 'Montserrat');
INSERT INTO `country` VALUES (157, 'MT', 'Malta', 'Malta');
INSERT INTO `country` VALUES (158, 'MU', 'Mauritius', 'Mauritius');
INSERT INTO `country` VALUES (159, 'MV', 'Malediven', 'Maldives');
INSERT INTO `country` VALUES (160, 'MW', 'Malawi', 'Malawi');
INSERT INTO `country` VALUES (161, 'MX', 'Mexiko', 'Mexico');
INSERT INTO `country` VALUES (162, 'MY', 'Malaysia', 'Malaysia');
INSERT INTO `country` VALUES (163, 'MZ', 'Mosambik', 'Mozambique');
INSERT INTO `country` VALUES (164, 'NA', 'Namibia', 'Namibia');
INSERT INTO `country` VALUES (165, 'NC', 'Neukaledonien', 'New Caledonia');
INSERT INTO `country` VALUES (166, 'NE', 'Niger', 'Niger');
INSERT INTO `country` VALUES (167, 'NF', 'Norfolkinsel', 'Norfolk Island');
INSERT INTO `country` VALUES (168, 'NG', 'Nigeria', 'Nigeria');
INSERT INTO `country` VALUES (169, 'NI', 'Nicaragua', 'Nicaragua');
INSERT INTO `country` VALUES (170, 'NL', 'Niederlande', 'Netherlands');
INSERT INTO `country` VALUES (171, 'NO', 'Norwegen', 'Norway');
INSERT INTO `country` VALUES (172, 'NP', 'Nepal', 'Nepal');
INSERT INTO `country` VALUES (173, 'NR', 'Nauru', 'Nauru');
INSERT INTO `country` VALUES (174, 'NU', 'Niue', 'Niue');
INSERT INTO `country` VALUES (175, 'NZ', 'Neuseeland', 'New Zealand');
INSERT INTO `country` VALUES (176, 'OM', 'Oman', 'Oman');
INSERT INTO `country` VALUES (177, 'PA', 'Panama', 'Panama');
INSERT INTO `country` VALUES (178, 'PE', 'Peru', 'Peru');
INSERT INTO `country` VALUES (179, 'PF', 'Französisch-Polynesien', 'French Polynesia');
INSERT INTO `country` VALUES (180, 'PG', 'Papua-Neuguinea', 'Papua New Guinea');
INSERT INTO `country` VALUES (181, 'PH', 'Philippinen', 'Philippines');
INSERT INTO `country` VALUES (182, 'PK', 'Pakistan', 'Pakistan');
INSERT INTO `country` VALUES (183, 'PL', 'Polen', 'Poland');
INSERT INTO `country` VALUES (184, 'PM', 'St. Pierre und Miquelon', 'St. Pierre and Miquelon');
INSERT INTO `country` VALUES (185, 'PN', 'Pitcairninseln', 'Pitcairn Islands');
INSERT INTO `country` VALUES (186, 'PR', 'Puerto Rico', 'Puerto Rico');
INSERT INTO `country` VALUES (187, 'PS', 'Palästinensische Autonomiegebiete', 'Palestinian Territories');
INSERT INTO `country` VALUES (188, 'PT', 'Portugal', 'Portugal');
INSERT INTO `country` VALUES (189, 'PW', 'Palau', 'Palau');
INSERT INTO `country` VALUES (190, 'PY', 'Paraguay', 'Paraguay');
INSERT INTO `country` VALUES (191, 'QA', 'Katar', 'Qatar');
INSERT INTO `country` VALUES (192, 'RE', 'Réunion', 'Réunion');
INSERT INTO `country` VALUES (193, 'RO', 'Rumänien', 'Romania');
INSERT INTO `country` VALUES (194, 'RS', 'Serbien', 'Serbia');
INSERT INTO `country` VALUES (195, 'RU', 'Russland', 'Russia');
INSERT INTO `country` VALUES (196, 'RW', 'Ruanda', 'Rwanda');
INSERT INTO `country` VALUES (197, 'SA', 'Saudi-Arabien', 'Saudi Arabia');
INSERT INTO `country` VALUES (198, 'SB', 'Salomonen', 'Solomon Islands');
INSERT INTO `country` VALUES (199, 'SC', 'Seychellen', 'Seychelles');
INSERT INTO `country` VALUES (200, 'SD', 'Sudan', 'Sudan');
INSERT INTO `country` VALUES (201, 'SE', 'Schweden', 'Sweden');
INSERT INTO `country` VALUES (202, 'SG', 'Singapur', 'Singapore');
INSERT INTO `country` VALUES (203, 'SH', 'St. Helena', 'St. Helena');
INSERT INTO `country` VALUES (204, 'SI', 'Slowenien', 'Slovenia');
INSERT INTO `country` VALUES (205, 'SJ', 'Spitzbergen und Jan Mayen', 'Svalbard and Jan Mayen');
INSERT INTO `country` VALUES (206, 'SK', 'Slowakei', 'Slovakia');
INSERT INTO `country` VALUES (207, 'SL', 'Sierra Leone', 'Sierra Leone');
INSERT INTO `country` VALUES (208, 'SM', 'San Marino', 'San Marino');
INSERT INTO `country` VALUES (209, 'SN', 'Senegal', 'Senegal');
INSERT INTO `country` VALUES (210, 'SO', 'Somalia', 'Somalia');
INSERT INTO `country` VALUES (211, 'SR', 'Suriname', 'Suriname');
INSERT INTO `country` VALUES (212, 'SS', 'Südsudan', 'South Sudan');
INSERT INTO `country` VALUES (213, 'ST', 'São Tomé und Príncipe', 'São Tomé and Príncipe');
INSERT INTO `country` VALUES (214, 'SV', 'El Salvador', 'El Salvador');
INSERT INTO `country` VALUES (215, 'SX', 'Sint Maarten', 'Sint Maarten');
INSERT INTO `country` VALUES (216, 'SY', 'Syrien', 'Syria');
INSERT INTO `country` VALUES (217, 'SZ', 'Eswatini', 'Eswatini');
INSERT INTO `country` VALUES (218, 'TC', 'Turks- und Caicosinseln', 'Turks and Caicos Islands');
INSERT INTO `country` VALUES (219, 'TD', 'Tschad', 'Chad');
INSERT INTO `country` VALUES (220, 'TF', 'Französische Süd- und Antarktisgebiete', 'French Southern Territories');
INSERT INTO `country` VALUES (221, 'TG', 'Togo', 'Togo');
INSERT INTO `country` VALUES (222, 'TH', 'Thailand', 'Thailand');
INSERT INTO `country` VALUES (223, 'TJ', 'Tadschikistan', 'Tajikistan');
INSERT INTO `country` VALUES (224, 'TK', 'Tokelau', 'Tokelau');
INSERT INTO `country` VALUES (225, 'TL', 'Timor-Leste', 'Timor-Leste');
INSERT INTO `country` VALUES (226, 'TM', 'Turkmenistan', 'Turkmenistan');
INSERT INTO `country` VALUES (227, 'TN', 'Tunesien', 'Tunisia');
INSERT INTO `country` VALUES (228, 'TO', 'Tonga', 'Tonga');
INSERT INTO `country` VALUES (229, 'TR', 'Türkei', 'Turkey');
INSERT INTO `country` VALUES (230, 'TT', 'Trinidad und Tobago', 'Trinidad and Tobago');
INSERT INTO `country` VALUES (231, 'TV', 'Tuvalu', 'Tuvalu');
INSERT INTO `country` VALUES (232, 'TW', 'Taiwan', 'Taiwan');
INSERT INTO `country` VALUES (233, 'TZ', 'Tansania', 'Tanzania');
INSERT INTO `country` VALUES (234, 'UA', 'Ukraine', 'Ukraine');
INSERT INTO `country` VALUES (235, 'UG', 'Uganda', 'Uganda');
INSERT INTO `country` VALUES (236, 'UM', 'Amerikanische Überseeinseln', 'U.S. Outlying Islands');
INSERT INTO `country` VALUES (237, 'US', 'Vereinigte Staaten', 'United States');
INSERT INTO `country` VALUES (238, 'UY', 'Uruguay', 'Uruguay');
INSERT INTO `country` VALUES (239, 'UZ', 'Usbekistan', 'Uzbekistan');
INSERT INTO `country` VALUES (240, 'VA', 'Vatikanstadt', 'Vatican City');
INSERT INTO `country` VALUES (241, 'VC', 'St. Vincent und die Grenadinen', 'St. Vincent and Grenadines');
INSERT INTO `country` VALUES (242, 'VE', 'Venezuela', 'Venezuela');
INSERT INTO `country` VALUES (243, 'VG', 'Britische Jungferninseln', 'British Virgin Islands');
INSERT INTO `country` VALUES (244, 'VI', 'Amerikanische Jungferninseln', 'U.S. Virgin Islands');
INSERT INTO `country` VALUES (245, 'VN', 'Vietnam', 'Vietnam');
INSERT INTO `country` VALUES (246, 'VU', 'Vanuatu', 'Vanuatu');
INSERT INTO `country` VALUES (247, 'WF', 'Wallis und Futuna', 'Wallis and Futuna');
INSERT INTO `country` VALUES (248, 'WS', 'Samoa', 'Samoa');
INSERT INTO `country` VALUES (249, 'YE', 'Jemen', 'Yemen');
INSERT INTO `country` VALUES (250, 'YT', 'Mayotte', 'Mayotte');
INSERT INTO `country` VALUES (251, 'ZA', 'Südafrika', 'South Africa');
INSERT INTO `country` VALUES (252, 'ZM', 'Sambia', 'Zambia');
INSERT INTO `country` VALUES (253, 'ZW', 'Simbabwe', 'Zimbabwe');

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `public` tinyint NULL DEFAULT 0,
  `upload_date` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (9, 'Bankinformationen_GWG.docx', 1, '2022-01-07 13:08:19');
INSERT INTO `files` VALUES (11, 'Agreement_GWG.docx', 1, '2022-01-10 17:50:16');
INSERT INTO `files` VALUES (12, 'Whitepaper_GWG.pdf', 0, '2021-12-14 15:29:26');
INSERT INTO `files` VALUES (16, 'NDAv1.0.sql', 0, '2022-01-29 04:58:36');

-- ----------------------------
-- Table structure for investment
-- ----------------------------
DROP TABLE IF EXISTS `investment`;
CREATE TABLE `investment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `investment` double NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  `size` double NULL DEFAULT NULL,
  `payment_method` int NULL DEFAULT NULL,
  `wallet` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payed` int NULL DEFAULT NULL,
  `payed_email` int NULL DEFAULT 0,
  `payed_date` date NULL DEFAULT NULL,
  `status` int NULL DEFAULT 1,
  `shipping` tinyint NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `tracking_service` tinyint NULL DEFAULT 1,
  `tracking_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tracking_date` date NULL DEFAULT NULL,
  `cashed` int NULL DEFAULT NULL,
  `cashed_date` date NULL DEFAULT NULL,
  `re_payed` int NULL DEFAULT 0,
  `re_payed_date` date NULL DEFAULT NULL,
  `re_cashed` int NULL DEFAULT 0,
  `re_cashed_date` date NULL DEFAULT NULL,
  `cert_num` bigint NULL DEFAULT NULL,
  `bank_loc` tinyint NULL DEFAULT 0,
  `z_id` int NULL DEFAULT NULL,
  `_agreement` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of investment
-- ----------------------------
INSERT INTO `investment` VALUES (2, '1', 2500, 2.5, 10000, 1, '', NULL, NULL, NULL, 1, 1, '2021-11-21 09:11:36', 7, 0, '', '2022-03-02', NULL, NULL, 0, NULL, 0, NULL, 5645, 0, NULL, NULL);
INSERT INTO `investment` VALUES (3, '1', 5750, 0.25, 20000, 1, NULL, 1, NULL, NULL, 1, 1, '2021-11-22 00:23:50', 7, NULL, '', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (4, '1', 25000, 0.23, 108695, NULL, '1312313asdfasdfasdf', 1, NULL, NULL, 1, 1, '2021-11-22 03:18:57', 7, 1, 'test', '2022-03-02', NULL, NULL, 0, NULL, 0, NULL, 4, 0, NULL, NULL);
INSERT INTO `investment` VALUES (5, '1', 5000, 1.23, 4500, 1, '', NULL, NULL, NULL, 0, 1, '2021-12-16 11:53:55', 23, 1, 'test', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (6, '1', 1500, 0.25, 6000, NULL, '', NULL, NULL, NULL, 1, 1, '2021-12-22 10:55:01', 26, 1, '123523fs32442', '2022-03-15', NULL, NULL, 0, NULL, 0, NULL, 6, 0, NULL, NULL);
INSERT INTO `investment` VALUES (9, '1', 2222, 2.4, 925.83, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-01-18 01:43:31', 37, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (10, '1', 1200, 0.5, 600, 0, NULL, NULL, NULL, NULL, NULL, 1, '2022-02-06 12:59:13', 46, 0, '', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (11, '1', 900, 0.5, 450, 0, NULL, NULL, NULL, NULL, NULL, 1, '2022-02-06 13:29:45', 19, 0, '', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (12, '1', 100, 0.5, 50, 0, NULL, NULL, NULL, NULL, NULL, 1, '2022-02-07 10:13:47', 37, 0, '', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (13, '1', 100, 0.5, 50, 1, '', 1, NULL, '2022-03-09', 1, 1, '2022-02-07 10:23:21', 37, 0, '', NULL, NULL, NULL, 1, '2022-03-27', 0, NULL, 13, 0, NULL, NULL);
INSERT INTO `investment` VALUES (14, '1', 6000, 0.5, 3000, 0, NULL, 1, NULL, NULL, NULL, 1, '2022-02-08 00:16:20', 7, 0, '', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (15, '1', 200, 120, 2, 1, '', 1, NULL, '2022-03-20', 1, 1, '2022-02-09 22:02:55', 37, NULL, NULL, NULL, NULL, NULL, 1, '2022-03-25', 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `investment` VALUES (16, '1', 12, 2.4, 5, 2, '', 1, NULL, '2022-03-16', 1, 1, '2022-02-18 19:33:34', 51, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 16, 0, NULL, NULL);
INSERT INTO `investment` VALUES (17, '1', 1200, 12, 100, 1, '', 1, NULL, NULL, 1, 1, '2022-02-21 00:11:21', 51, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 17, 0, NULL, NULL);
INSERT INTO `investment` VALUES (18, '1', 1000, 2, 500, 1, '', 1, NULL, '2022-03-16', 1, 1, '2022-02-21 01:22:53', 51, NULL, NULL, NULL, 1, '2022-03-16', 0, NULL, 0, NULL, 18, 0, NULL, NULL);
INSERT INTO `investment` VALUES (19, '1', 12, 12, 1, 1, '', 1, NULL, '2022-03-16', 1, 1, '2022-02-21 15:01:17', 53, NULL, NULL, NULL, 1, '2022-03-16', 0, NULL, 0, NULL, 19, 0, 1234, NULL);
INSERT INTO `investment` VALUES (20, '1', 12000, 1.2, 10000, 1, '', 1, NULL, '2022-03-16', 1, 1, '2022-02-22 18:59:00', 54, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 20, 0, NULL, NULL);
INSERT INTO `investment` VALUES (21, '1', 900, 9, 100, 1, '', 1, 0, '2022-03-26', 1, 1, '2022-03-17 16:41:54', 61, NULL, NULL, NULL, 1, '2022-03-27', 1, '2022-03-19', 1, '2022-03-27', NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for office
-- ----------------------------
DROP TABLE IF EXISTS `office`;
CREATE TABLE `office`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of office
-- ----------------------------
INSERT INTO `office` VALUES (1, 'GWM 1', 'Istanbul');
INSERT INTO `office` VALUES (2, 'GWM 2', 'Izmir');
INSERT INTO `office` VALUES (3, 'GWM 3', 'Antalya');

-- ----------------------------
-- Table structure for phase
-- ----------------------------
DROP TABLE IF EXISTS `phase`;
CREATE TABLE `phase`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `phase` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `token` double NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  `status` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of phase
-- ----------------------------
INSERT INTO `phase` VALUES (1, 'Family/Friends', '01.28 - 01.28.2022', 50, 0.4, 2);
INSERT INTO `phase` VALUES (2, 'Phase 1', '01.30 - 01.31.2022', 50, 0.8, 2);
INSERT INTO `phase` VALUES (3, 'Phase 2', NULL, 100, 1.5, 1);
INSERT INTO `phase` VALUES (4, 'Phase 3', NULL, 150, 2.5, 0);

-- ----------------------------
-- Table structure for price
-- ----------------------------
DROP TABLE IF EXISTS `price`;
CREATE TABLE `price`  (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `project_id` tinyint NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of price
-- ----------------------------
INSERT INTO `price` VALUES (19, 1, '2021-11-01', 0.25);
INSERT INTO `price` VALUES (20, 1, '2021-11-15', 0.5);

-- ----------------------------
-- Table structure for price_clients
-- ----------------------------
DROP TABLE IF EXISTS `price_clients`;
CREATE TABLE `price_clients`  (
  `id` tinyint NOT NULL,
  `user_id` int NULL DEFAULT NULL,
  `project_id` tinyint NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of price_clients
-- ----------------------------
INSERT INTO `price_clients` VALUES (0, 7, 1, '2022-04-01', 2.5);

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `note` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES (1, 'GWG', 'test');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'file_pass', '123456');

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (1, 'Team 1');
INSERT INTO `teams` VALUES (2, 'Team 2');
INSERT INTO `teams` VALUES (3, 'Team 3');
INSERT INTO `teams` VALUES (4, 'Team X');

-- ----------------------------
-- Table structure for ticker
-- ----------------------------
DROP TABLE IF EXISTS `ticker`;
CREATE TABLE `ticker`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  `perc` double NULL DEFAULT NULL,
  `status` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ticker
-- ----------------------------
INSERT INTO `ticker` VALUES (1, 'GWG', '1', 0.5, 100, 1);
INSERT INTO `ticker` VALUES (10, 'BTC', 'BTC-USD', 43393.613, -5.3025346, -1);
INSERT INTO `ticker` VALUES (11, 'DAX', '%5EGDAXI', 16052.03, -1.350314, -1);
INSERT INTO `ticker` VALUES (12, 'ETH', 'ETH-USD', 3444.2703, -7.5088835, -1);
INSERT INTO `ticker` VALUES (13, 'EURUSD', 'EURUSD%3DX', 1.129433, -0.1807056, -1);
INSERT INTO `ticker` VALUES (14, 'GOLD', 'GC%3DF', 1788.1, -2.0272863, -1);
INSERT INTO `ticker` VALUES (15, 'US30', '%5EDJI', 36249.16, -0.43384168, -1);
INSERT INTO `ticker` VALUES (16, 'STWI', 'DE000SLA9709.SG', 323.89, -2.33981, -1);
INSERT INTO `ticker` VALUES (17, 'TSLA', 'TSLA', 1066.1287, -2.0210392, -1);

-- ----------------------------
-- Table structure for titles
-- ----------------------------
DROP TABLE IF EXISTS `titles`;
CREATE TABLE `titles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of titles
-- ----------------------------
INSERT INTO `titles` VALUES (1, 'Dr.');
INSERT INTO `titles` VALUES (2, 'Prof.');

-- ----------------------------
-- Table structure for tracking_service
-- ----------------------------
DROP TABLE IF EXISTS `tracking_service`;
CREATE TABLE `tracking_service`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tracking_service
-- ----------------------------
INSERT INTO `tracking_service` VALUES (1, 'Post CH', 'https://www.post.ch/swisspost-tracking?formattedParcelCodes=');

-- ----------------------------
-- Table structure for uploads
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `file_type` int NULL DEFAULT 1,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `upload_date` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `valid` tinyint NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES (48, 60, 3, '2022-03-24_19-13-22_60_GWM_newspage.jpg', '2022-03-25 02:13:24', 0);
INSERT INTO `uploads` VALUES (49, 52, 1, '2022-03-24_21-58-28_52_image_2022-03-24_21-29-25.png', '2022-03-25 04:58:40', 0);
INSERT INTO `uploads` VALUES (50, 52, 2, '2022-03-24_21-58-31_52_image_2022-03-24_21-40-20.png', '2022-03-25 04:58:40', 0);
INSERT INTO `uploads` VALUES (51, 52, 3, '2022-03-24_21-58-34_52_image_2022-03-24_21-42-35.png', '2022-03-25 04:58:40', 0);
INSERT INTO `uploads` VALUES (52, 26, 1, '2022-03-24_22-00-51_26_GWM_newspage.jpg', '2022-03-25 05:01:00', 0);
INSERT INTO `uploads` VALUES (53, 26, 2, '2022-03-24_22-00-55_26_image_2022-03-24_00-59-21.png', '2022-03-25 05:01:01', 0);
INSERT INTO `uploads` VALUES (54, 26, 3, '2022-03-24_22-00-59_26_image_2022-03-24_01-02-58.png', '2022-03-25 05:01:01', 0);
INSERT INTO `uploads` VALUES (56, 57, 2, '2022-03-24_23-00-11_57_image_2022-03-24_21-40-20.png', '2022-03-25 06:00:13', 0);
INSERT INTO `uploads` VALUES (57, 57, 3, '2022-03-24_23-00-11_57_image_2022-03-24_21-29-25.png', '2022-03-25 06:00:16', 0);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` int NULL DEFAULT NULL,
  `team` int NULL DEFAULT NULL,
  `team_2` int NULL DEFAULT NULL,
  `creator` int NULL DEFAULT NULL,
  `fname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Herr',
  `birthday` date NULL DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` tinyint NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `zip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel_1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel_2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kyc` tinyint NOT NULL,
  `notes` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `spec_price` decimal(10, 2) NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `office` tinyint NULL DEFAULT 1,
  `passhash` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `self_registered` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin@gmail.com', 'admin@gmail.com', 1, 0, NULL, NULL, 'admin', 'admin', 'Herr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, '8caf23bead1e0cf7e2287a768682c204', '2021-11-17 12:55:41', '2022-04-04 09:54:45', 0);
INSERT INTO `user` VALUES (2, 'Yumashou@gmail.com', '3?e3(@4D7)Bn', 1, 0, NULL, NULL, NULL, NULL, 'Herr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, '4dca5507df9900b8fa3bbe2784e900ea', '2021-12-21 17:48:17', NULL, 0);
INSERT INTO `user` VALUES (3, 'eposhauver@gmail.com', 'Yp@U124%@@c1', 2, 0, NULL, NULL, 'Nesli1', 'Nesli1', '', '0000-00-00', '', 0, '', '', '', '', '', '', 0, '', 0.00, 1, 0, '2bd7930e2eadacdc36fc609796c59db7', '2021-11-17 12:55:41', '2022-03-01 08:02:36', 0);
INSERT INTO `user` VALUES (4, 'paymaster@gmail.com', 'paymaster@gmail.com', 20, 0, NULL, NULL, 'paymaster', 'paymaster', 'Herr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, '290c4df69afe71c87f74d45f5c238ab0', '2022-01-19 22:58:57', '2022-03-27 03:59:10', 0);
INSERT INTO `user` VALUES (5, 'printer@gmail.com', 'printer@gmail.com', 21, 0, NULL, NULL, 'printer', 'printer', 'Herr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 'a0b3bfd3958bdd67727694d9f2580598', '2022-01-19 23:00:13', '2022-04-05 05:20:22', 0);
INSERT INTO `user` VALUES (6, 'loader@greenwavematerials.com', 'loader@gmail.com', 3, 4, 0, NULL, 'Loader First Name1', 'Last Name', '', '0000-00-00', '', 0, '', '', '', '', '', '', 0, '', 0.00, 1, 0, 'c9850342d92e740db61442f05d582f22', '2021-11-18 12:37:37', '2022-02-04 01:00:37', 0);
INSERT INTO `user` VALUES (7, 'user@gmail.com', '123123', 4, 1, NULL, 6, 'Otto 4', 'Müller', 'Herr', NULL, NULL, NULL, 'Teichstraße 5', NULL, '39220 Berlin', 'Germany', '017124140246', '', 0, 'blabla', NULL, 1, 1, 'a55abff6d7b0d3cc3519d7c999c995a7', '2021-11-20 02:41:48', '2022-04-05 02:32:12', 0);
INSERT INTO `user` VALUES (16, 'loader2@gmail.com', 'nRgQASNc', 3, 2, 3, 1, 'Loader 2 First Name', 'Last Name', '', '0000-00-00', '', 0, '', '', '', '', '', '', 0, '', 0.00, 1, 0, 'fdd0ff388ff347bbbd7e28baba235b6d', '2021-12-13 00:42:19', '2022-03-01 07:06:58', 0);
INSERT INTO `user` VALUES (19, 'user2@gmail.com', '123123123', 4, 2, NULL, 6, 'Test', 'Last Name', 'Herr', NULL, NULL, NULL, 'asfljskafd', NULL, '23024 Teich', 'Germany', '564646464', '', 0, '', NULL, 0, 1, 'b8d6752826a90e962868d47e32ad521c', '2022-01-21 23:23:56', '2022-02-09 10:06:55', 0);
INSERT INTO `user` VALUES (20, 's9@fxattack.com', 'cI1@2L_@1E@1', 4, 2, NULL, 1, 'Torsten', 'Krüger', 'Herr', NULL, NULL, NULL, 'Berliner Ring 14', NULL, '23234 Berlin', 'Germany', '+491326464', '', 0, '', 2.00, 1, 1, '8bcd90669cf093c561539b9ae07ba78f', '2021-12-14 12:41:05', '2022-02-03 11:21:52', 0);
INSERT INTO `user` VALUES (21, 'user3@gmail.com', 'sADBhrXuWgZn', 4, 1, NULL, 1, 'Usert 3', 'Nachname', 'Herr', NULL, NULL, NULL, 'asdfsf', NULL, '23932 Cottbus', 'Germany', '23423424', '', 0, '', NULL, 1, 1, '5a3296691f5417488b69ca3eefc68ee2', '2021-12-15 00:32:47', '2022-02-01 05:42:23', 0);
INSERT INTO `user` VALUES (22, 'user4@gmail.com', '$FGk7NtjMwb!', 4, 1, NULL, 6, 'user4', 'Nachname', 'Herr', NULL, NULL, NULL, 'asfdjafdjkl', NULL, '2424 asf', 'Germany', '234234', '', 0, '', NULL, 1, 1, 'de934b5a66b34c72636d2e34ad075e8d', '2021-12-15 00:35:07', NULL, 0);
INSERT INTO `user` VALUES (23, 'sdfgsdg@adfasdf.dc', 'PdHW3skg%#GD', 4, 2, NULL, 1, 'fgsfdgsdg', 'sdfgsdfg', 'Herr', '2022-02-03', NULL, NULL, 'wtwertwert', NULL, 'asdfasdf', 'Germany', '54646534534', '', 0, '', NULL, 1, 1, 'c41e6f51192d0b6d847e7318d73c7491', '2021-12-16 11:51:20', '2022-02-13 09:43:35', 0);
INSERT INTO `user` VALUES (25, 'loader5@gmail.com', 'X}1^4b@9*Q1b', 3, 1, NULL, 1, 'Loader 5', 'Müller', 'Herr', NULL, NULL, NULL, '', NULL, '', '', '', '', 0, '', NULL, 1, 1, '67cad8ef43fbe8baaadac6d96df4ef03', '2021-12-20 22:54:13', NULL, 0);
INSERT INTO `user` VALUES (26, 'fischer007thomas@gmail.com', 'xkAaw%T6#nGb', 4, 1, NULL, 2, 'Thomas', 'Fischer', 'Frau', '2022-01-29', NULL, 1, 'Berlin', 'Hello', '01234', 'Germany', '0123456', '', 1, '0071', 15.00, 1, 1, '62cccbd4f916bb3824e4e552afbdb9d5', '2021-12-22 10:53:33', '2022-03-12 10:55:11', 0);
INSERT INTO `user` VALUES (37, 'jacob.gavrilov716@gmail.com', 'e9FP3kRBmy*G', 4, NULL, NULL, 1, '1231', 'test1', 'Herr', '2022-02-03', '', 0, 'test', '1', '123', 'Germany', '0123456', '', 0, 'self_registered', 0.00, 1, 1, 'ab84d56c3eaa370831f5348be5602428', '2022-01-17 22:58:33', '2022-02-02 01:05:28', 1);
INSERT INTO `user` VALUES (38, 'test@test.com', 'z6Acr9*bXxF!', 5, 0, NULL, 1, 'test', 'test1', '', '2022-02-03', '', 0, '', '', '', '', '', '', 0, '', 0.00, 1, 0, 'ef7b32abe932ab9c41d9e73ca46aa198', '2022-01-17 23:14:06', '2022-02-08 12:09:40', 0);
INSERT INTO `user` VALUES (46, 'testest@tr.as', '123123', 4, 4, NULL, 0, '123', '123', 'Frau', '2022-02-03', '', 0, '123', '123', '123', '3', '123', '123', 0, 'self_registered', 0.00, 0, 1, '65ccaa61a0ca34ae76ba7ac70b352ea2', '2022-01-30 19:06:56', '2022-02-14 12:54:13', 0);
INSERT INTO `user` VALUES (48, 'jacob.gavrilov71611@gmail.com', '!stQdw3FgHyc', 6, 0, NULL, 1, '123', '123123', '', '2022-02-03', '', 0, '', '', '', '', '', '', 0, '', NULL, 1, 0, '6e6636145cdd087856a8758a325f6118', '2022-01-31 15:14:58', '2022-01-31 03:16:54', 0);
INSERT INTO `user` VALUES (49, 'tres@sef.com', 'W3B29M#$cyTh', 3, 1, 0, 1, 'qweqwe', 'qweqwe', '', '0000-00-00', '', 0, '', '', '', '', '', '', 0, '', 0.00, 1, 0, NULL, '2022-02-03 22:02:13', NULL, 0);
INSERT INTO `user` VALUES (50, 'test@gmail.com', 'fMX2w*WED8j6', 6, 0, NULL, 1, 'asdf', 'asdfadf', '', '0000-00-00', '', 0, '', '', '', '', '', '', 0, '', NULL, 1, 0, '36987467f565562954496354d34994c3', '2022-02-08 01:17:52', '2022-02-08 01:44:28', 0);
INSERT INTO `user` VALUES (51, 'max@gamil.com', 'pfQH#UDLbu$M', 4, 1, NULL, 1, 'Dev', 'Tester', 'Herr', '2022-02-08', '', 1, 'test', '1', '123', '1', '123456', '', 0, '', 0.00, 1, 2, '455844fe839a3f1084b09502c00461a3', '2022-02-08 12:00:08', '2022-03-12 12:52:15', 0);
INSERT INTO `user` VALUES (52, 'test@green.com', 'jzn3U7fyrhEa', 4, 1, NULL, 1, 'rtes', 'test', 'Herr', '2022-02-21', 'fesd', 1, 'affa', '23332', '332', '2', '123123', '', 1, '', 0.00, 1, 2, '6bf352c15b675ed39861470b529dbedb', '2022-02-21 14:58:56', '2022-02-21 02:58:57', 0);
INSERT INTO `user` VALUES (53, 'dfs@gmailc.o1', 'RdbwaPkW!fQB', 4, 2, NULL, 1, 'Thomas', 'Last Name', 'Herr', '2022-02-03', '123', 1, '123123', '123123', '123123', '2', '123123', '', 0, '', 0.00, 1, 2, 'f3dd092515c4148eecc8851ec29d1016', '2022-02-21 15:00:53', '2022-02-21 03:00:53', 0);
INSERT INTO `user` VALUES (54, 'tester@gamil.com', '7hbWTeLP#Fku', 4, 2, NULL, 1, 'Thomas', 'Last Name', 'Herr', '2022-02-23', '123', 1, '123', '123', '123', '1', '123123', '', 0, '', 0.00, 1, 1, '50e597381ff6a2fa9a048f27236f7c69', '2022-02-22 18:58:42', '2022-03-14 01:26:30', 0);
INSERT INTO `user` VALUES (55, 'dev@greenwavematerials.com', 'test123123', 4, 0, NULL, 0, '123', '123', 'Frau', '2022-02-26', '', 0, '123', '123', '123', '1', '123', '123', 0, '', 0.00, 0, 2, '3b3f0922e52478aa2edff75d291542de', '2022-02-25 23:06:33', '2022-03-17 07:23:45', 1);
INSERT INTO `user` VALUES (56, 'dev@tester.com', 'bX@E3atn%d7!', 4, 0, NULL, 1, 'a', 'ff', 'Herr', '0000-00-00', '', 0, 'f', 'r', '66', '1', '123', '', 0, '', 0.00, 1, 1, '1bb4f9c3c4f230620bdec8abd620cebb', '2022-03-17 14:47:09', '2022-03-17 02:47:09', 0);
INSERT INTO `user` VALUES (57, 'aaa@test.com', 'XNujUBtYwADk', 4, 0, NULL, 1, 'gg', 'hg', 'Herr', '0000-00-00', '', 0, 'hg', 'gh', 'hg', '1', '1021', '', 0, '', 0.00, 1, 1, '2f347813fb4a5e40b0f27ec3f95f7856', '2022-03-17 14:48:02', '2022-03-24 10:59:50', 0);
INSERT INTO `user` VALUES (58, 'hello@test.com', 'YwgMXE@fQzC7', 4, 0, NULL, 1, 'u', 'yu', 'Herr', '0000-00-00', '', 0, 'u', 'u', 'y', '1', '123123123', '', 0, '', 0.00, 1, 1, '35146a19f2b555c4a46cdef8ef6b5622', '2022-03-17 14:48:58', '2022-03-17 02:48:58', 0);
INSERT INTO `user` VALUES (59, 'firefox@test.com', 's*PmRgF2BAXr', 4, 0, NULL, 1, 'a', 'a', 'Herr', '0000-00-00', '', 0, 'j', 'k', 'k', '1', '90', '', 0, '', 0.00, 1, 1, 'b916f9b8399aded38d1382ce79b27ff0', '2022-03-17 14:54:35', '2022-03-17 02:54:35', 0);
INSERT INTO `user` VALUES (60, 'test@tester.com', 'CeZFWHM3nKyN', 4, 0, NULL, 1, 'hello', 'as', 'Herr', '1982-03-24', '', 0, 'Nifk', '123kfi', '302', '1', '998909', '', 0, '', 0.00, 1, 1, '29b5fe88a23cac7476bb75e1002fe6ee', '2022-03-17 14:57:33', '2022-03-17 02:57:33', 0);
INSERT INTO `user` VALUES (61, 'aaaa@test.com', 'nXQFEpyg$A%M', 4, 0, NULL, 1, 'a', 'b', 'Herr', '0000-00-00', '', 0, 'a', 'a', 's', '1', '12344', '', 0, '', 0.00, 1, 1, 'cf2e5eff7a518f9e49b02e9a51c7ef40', '2022-03-17 16:41:38', '2022-03-17 04:41:38', 0);
INSERT INTO `user` VALUES (63, 'kkk@test.com', 'aW$EGHA%n!P6', 4, 0, NULL, 1, 'aaa', 'aaaa', 'Herr', '0000-00-00', '', 0, 'kkk', 'k', 'kkk', '1', '12312321', '', 0, '', 0.00, 1, 1, '175f23be5ca3b9d1628553b0d87d2356', '2022-03-17 18:30:23', '2022-03-17 06:30:23', 0);

-- ----------------------------
-- Table structure for z_logs
-- ----------------------------
DROP TABLE IF EXISTS `z_logs`;
CREATE TABLE `z_logs`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login_date` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 243 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of z_logs
-- ----------------------------
INSERT INTO `z_logs` VALUES (4, 7, 'user@gmail.com', 'Müller ', '2021-12-21 22:26:49');
INSERT INTO `z_logs` VALUES (5, 1, 'admin@gmail.com', 'admin ', '2021-12-21 22:28:16');
INSERT INTO `z_logs` VALUES (6, 1, 'admin@gmail.com', 'admin ', '2021-12-21 22:33:39');
INSERT INTO `z_logs` VALUES (7, 7, 'user@gmail.com', 'Müller ', '2021-12-21 22:34:09');
INSERT INTO `z_logs` VALUES (8, 1, 'admin@gmail.com', 'admin ', '2021-12-21 22:34:39');
INSERT INTO `z_logs` VALUES (9, 7, 'user@gmail.com', 'Müller ', '2021-12-21 23:02:38');
INSERT INTO `z_logs` VALUES (10, 7, 'user@gmail.com', 'Müller ', '2021-12-21 23:07:47');
INSERT INTO `z_logs` VALUES (11, 1, 'admin@gmail.com', 'admin ', '2021-12-21 23:57:47');
INSERT INTO `z_logs` VALUES (12, 1, 'admin@gmail.com', 'admin ', '2021-12-21 23:57:47');
INSERT INTO `z_logs` VALUES (13, 2, 'Yumashou@gmail.com', ' ', '2021-12-22 00:51:07');
INSERT INTO `z_logs` VALUES (14, 2, 'yumashou@gmail.com', ' ', '2021-12-22 17:22:57');
INSERT INTO `z_logs` VALUES (15, 3, 'eposhauver@gmail.com', 'Nesli ', '2021-12-22 17:30:49');
INSERT INTO `z_logs` VALUES (16, 2, 'yumashou@gmail.com', ' ', '2021-12-22 17:51:02');
INSERT INTO `z_logs` VALUES (17, 26, 'fischer007thomas@gmail.com', 'Fischer ', '2021-12-22 17:57:23');
INSERT INTO `z_logs` VALUES (18, 1, 'admin@gmail.com', 'admin ', '2021-12-25 17:19:19');
INSERT INTO `z_logs` VALUES (19, 1, 'admin@gmail.com', 'admin ', '2022-01-01 20:27:46');
INSERT INTO `z_logs` VALUES (20, 7, 'user@gmail.com', 'Müller ', '2022-01-03 03:04:20');
INSERT INTO `z_logs` VALUES (21, 1, 'admin@gmail.com', 'admin ', '2022-01-03 03:14:14');
INSERT INTO `z_logs` VALUES (22, 1, 'admin@gmail.com', 'admin ', '2022-01-03 03:50:06');
INSERT INTO `z_logs` VALUES (23, 1, 'admin@gmail.com', 'admin ', '2022-01-03 04:35:41');
INSERT INTO `z_logs` VALUES (24, 7, 'user@gmail.com', 'Müller ', '2022-01-03 15:45:41');
INSERT INTO `z_logs` VALUES (25, 7, 'user@gmail.com', 'Müller ', '2022-01-03 15:46:33');
INSERT INTO `z_logs` VALUES (26, 1, 'admin@gmail.com', 'admin ', '2022-01-05 00:51:13');
INSERT INTO `z_logs` VALUES (27, 7, 'user@gmail.com', 'Müller ', '2022-01-06 07:56:00');
INSERT INTO `z_logs` VALUES (28, 1, 'admin@gmail.com', 'admin ', '2022-01-09 21:05:19');
INSERT INTO `z_logs` VALUES (29, 1, 'admin@gmail.com', 'admin ', '2022-01-09 21:05:53');
INSERT INTO `z_logs` VALUES (30, 1, 'admin@gmail.com', 'admin ', '2022-01-09 21:09:44');
INSERT INTO `z_logs` VALUES (31, 1, 'admin@gmail.com', 'admin ', '2022-01-10 06:26:24');
INSERT INTO `z_logs` VALUES (32, 1, 'admin@gmail.com', 'admin ', '2022-01-10 17:17:44');
INSERT INTO `z_logs` VALUES (33, 1, 'admin@gmail.com', 'admin ', '2022-01-10 17:49:59');
INSERT INTO `z_logs` VALUES (34, 6, 'loader@gmail.com', 'Last Name ', '2022-01-10 21:52:41');
INSERT INTO `z_logs` VALUES (35, 6, 'loader@gmail.com', 'Last Name ', '2022-01-10 21:53:54');
INSERT INTO `z_logs` VALUES (36, 3, 'eposhauver@gmail.com', 'Nesli ', '2022-01-10 21:56:30');
INSERT INTO `z_logs` VALUES (37, 7, 'user@gmail.com', 'Müller ', '2022-01-10 22:02:15');
INSERT INTO `z_logs` VALUES (38, 1, 'admin@gmail.com', 'admin ', '2022-01-10 23:04:57');
INSERT INTO `z_logs` VALUES (39, 7, 'user@gmail.com', 'Müller ', '2022-01-12 00:15:42');
INSERT INTO `z_logs` VALUES (40, 7, 'user@gmail.com', 'Müller ', '2022-01-12 01:53:03');
INSERT INTO `z_logs` VALUES (41, 7, 'user@gmail.com', 'Müller ', '2022-01-13 00:07:06');
INSERT INTO `z_logs` VALUES (42, 1, 'admin@gmail.com', 'admin ', '2022-01-13 00:27:09');
INSERT INTO `z_logs` VALUES (43, 1, 'admin@gmail.com', 'admin ', '2022-01-13 06:43:12');
INSERT INTO `z_logs` VALUES (44, 7, 'user@gmail.com', 'Müller ', '2022-01-13 06:44:13');
INSERT INTO `z_logs` VALUES (45, 1, 'admin@gmail.com', 'admin ', '2022-01-13 06:46:30');
INSERT INTO `z_logs` VALUES (46, 1, 'admin@gmail.com', 'admin ', '2022-01-13 19:56:29');
INSERT INTO `z_logs` VALUES (47, 6, 'loader@gmail.com', 'Last Name ', '2022-01-13 20:14:22');
INSERT INTO `z_logs` VALUES (48, 7, 'user@gmail.com', 'Müller ', '2022-01-13 20:55:58');
INSERT INTO `z_logs` VALUES (49, 1, 'admin@gmail.com', 'admin ', '2022-01-13 21:12:16');
INSERT INTO `z_logs` VALUES (50, 7, 'user@gmail.com', 'Müller ', '2022-01-13 21:13:52');
INSERT INTO `z_logs` VALUES (51, 7, 'user@gmail.com', 'Müller ', '2022-01-13 21:43:13');
INSERT INTO `z_logs` VALUES (52, 1, 'admin@gmail.com', 'admin ', '2022-01-13 22:22:13');
INSERT INTO `z_logs` VALUES (53, 22, 'user4@gmail.com', 'Nachname ', '2022-01-14 01:36:30');
INSERT INTO `z_logs` VALUES (54, 7, 'user@gmail.com', 'Müller ', '2022-01-14 01:44:21');
INSERT INTO `z_logs` VALUES (55, 22, 'user4@gmail.com', 'Nachname ', '2022-01-14 01:44:47');
INSERT INTO `z_logs` VALUES (56, 1, 'admin@gmail.com', 'admin ', '2022-01-14 02:19:47');
INSERT INTO `z_logs` VALUES (57, 6, 'loader@gmail.com', 'Last Name ', '2022-01-14 02:30:04');
INSERT INTO `z_logs` VALUES (58, 1, 'admin@gmail.com', 'admin ', '2022-01-14 02:31:26');
INSERT INTO `z_logs` VALUES (59, 6, 'loader@gmail.com', 'Last Name ', '2022-01-14 04:37:21');
INSERT INTO `z_logs` VALUES (60, 1, 'admin@gmail.com', 'admin ', '2022-01-14 04:41:48');
INSERT INTO `z_logs` VALUES (61, 30, 'jacob.gavrilov716@gmail.com', 'Test1 ', '2022-01-14 04:44:59');
INSERT INTO `z_logs` VALUES (62, 1, 'admin@gmail.com', 'admin ', '2022-01-14 06:14:37');
INSERT INTO `z_logs` VALUES (63, 7, 'user@gmail.com', 'Müller ', '2022-01-14 08:43:04');
INSERT INTO `z_logs` VALUES (64, 30, 'jacob.gavrilov716@gmail.com', 'Test1 ', '2022-01-14 11:13:34');
INSERT INTO `z_logs` VALUES (65, 7, 'user@gmail.com', 'Müller ', '2022-01-14 11:19:49');
INSERT INTO `z_logs` VALUES (66, 1, 'admin@gmail.com', 'admin ', '2022-01-14 11:25:36');
INSERT INTO `z_logs` VALUES (67, 1, 'admin@gmail.com', 'admin ', '2022-01-14 11:28:30');
INSERT INTO `z_logs` VALUES (68, 32, 'jacob.gavrilov716@gmail.com', 'test1 ', '2022-01-14 11:34:10');
INSERT INTO `z_logs` VALUES (69, 1, 'admin@gmail.com', 'admin ', '2022-01-14 11:35:01');
INSERT INTO `z_logs` VALUES (70, 32, 'jacob.gavrilov716@gmail.com', 'test1 ', '2022-01-14 11:36:22');
INSERT INTO `z_logs` VALUES (71, 7, 'user@gmail.com', 'Müller ', '2022-01-14 11:52:14');
INSERT INTO `z_logs` VALUES (72, 32, 'jacob.gavrilov716@gmail.com', 'test1 ', '2022-01-14 17:40:45');
INSERT INTO `z_logs` VALUES (73, 7, 'user@gmail.com', 'Müller ', '2022-01-14 17:46:42');
INSERT INTO `z_logs` VALUES (74, 6, 'loader@gmail.com', 'Last Name ', '2022-01-14 17:51:34');
INSERT INTO `z_logs` VALUES (75, 1, 'admin@gmail.com', 'admin ', '2022-01-14 17:52:34');
INSERT INTO `z_logs` VALUES (76, 6, 'loader@gmail.com', 'Last Name ', '2022-01-14 19:42:00');
INSERT INTO `z_logs` VALUES (77, 1, 'admin@gmail.com', 'admin ', '2022-01-14 19:42:09');
INSERT INTO `z_logs` VALUES (78, 7, 'user@gmail.com', 'Müller ', '2022-01-14 19:43:11');
INSERT INTO `z_logs` VALUES (79, 1, 'admin@gmail.com', 'admin ', '2022-01-14 20:03:16');
INSERT INTO `z_logs` VALUES (80, 7, 'user@gmail.com', 'Müller ', '2022-01-14 20:04:11');
INSERT INTO `z_logs` VALUES (81, 1, 'admin@gmail.com', 'admin ', '2022-01-14 20:07:35');
INSERT INTO `z_logs` VALUES (82, 1, 'admin@gmail.com', 'admin ', '2022-01-17 17:58:11');
INSERT INTO `z_logs` VALUES (83, 38, 'test@test.com', 'test1 ', '2022-01-18 06:58:33');
INSERT INTO `z_logs` VALUES (84, 6, 'loader@gmail.com', 'Last Name ', '2022-01-18 07:13:17');
INSERT INTO `z_logs` VALUES (85, 38, 'test@test.com', 'test1 ', '2022-01-18 07:14:55');
INSERT INTO `z_logs` VALUES (86, 1, 'admin@gmail.com', 'admin ', '2022-01-18 08:30:23');
INSERT INTO `z_logs` VALUES (87, 38, 'test@test.com', 'test1 ', '2022-01-18 08:42:45');
INSERT INTO `z_logs` VALUES (88, 1, 'admin@gmail.com', 'admin ', '2022-01-18 19:49:26');
INSERT INTO `z_logs` VALUES (89, 38, 'test@test.com', 'test1 ', '2022-01-18 19:52:05');
INSERT INTO `z_logs` VALUES (90, 7, 'user@gmail.com', 'Müller ', '2022-01-18 21:28:21');
INSERT INTO `z_logs` VALUES (91, 1, 'admin@gmail.com', 'admin ', '2022-01-18 22:53:00');
INSERT INTO `z_logs` VALUES (92, 7, 'user@gmail.com', 'Müller ', '2022-01-19 02:34:39');
INSERT INTO `z_logs` VALUES (93, 1, 'admin@gmail.com', 'admin ', '2022-01-19 22:15:53');
INSERT INTO `z_logs` VALUES (94, 4, 'paymaster@gmail.com', 'paymaster ', '2022-01-19 23:07:58');
INSERT INTO `z_logs` VALUES (95, 5, 'printer@gmail.com', 'printer ', '2022-01-19 23:26:12');
INSERT INTO `z_logs` VALUES (96, 1, 'admin@gmail.com', 'admin ', '2022-01-20 05:09:17');
INSERT INTO `z_logs` VALUES (97, 4, 'paymaster@gmail.com', 'paymaster ', '2022-01-20 05:09:47');
INSERT INTO `z_logs` VALUES (98, 7, 'user@gmail.com', 'Müller ', '2022-01-20 20:15:42');
INSERT INTO `z_logs` VALUES (99, 1, 'admin@gmail.com', 'admin ', '2022-01-21 06:56:53');
INSERT INTO `z_logs` VALUES (100, 1, 'admin@gmail.com', 'admin ', '2022-01-23 22:29:30');
INSERT INTO `z_logs` VALUES (101, 1, 'admin@gmail.com', 'admin ', '2022-01-25 03:05:20');
INSERT INTO `z_logs` VALUES (102, 1, 'admin@gmail.com', 'admin ', '2022-01-25 03:55:29');
INSERT INTO `z_logs` VALUES (103, 4, 'paymaster@gmail.com', 'paymaster ', '2022-01-25 04:02:21');
INSERT INTO `z_logs` VALUES (104, 1, 'admin@gmail.com', 'admin ', '2022-01-25 04:07:49');
INSERT INTO `z_logs` VALUES (105, 1, 'admin@gmail.com', 'admin ', '2022-01-29 01:56:16');
INSERT INTO `z_logs` VALUES (106, 7, 'user@gmail.com', 'Müller ', '2022-01-29 04:58:55');
INSERT INTO `z_logs` VALUES (107, 1, 'admin@gmail.com', 'admin ', '2022-01-29 09:41:29');
INSERT INTO `z_logs` VALUES (108, 1, 'admin@gmail.com', 'admin ', '2022-01-29 10:32:56');
INSERT INTO `z_logs` VALUES (109, 1, 'admin@gmail.com', 'admin ', '2022-01-29 10:35:50');
INSERT INTO `z_logs` VALUES (110, 1, 'admin@gmail.com', 'admin ', '2022-01-29 21:17:25');
INSERT INTO `z_logs` VALUES (111, 1, 'admin@gmail.com', 'admin ', '2022-01-30 04:43:20');
INSERT INTO `z_logs` VALUES (112, 1, 'admin@gmail.com', 'admin ', '2022-01-30 17:51:10');
INSERT INTO `z_logs` VALUES (113, 6, 'loader@gmail.com', 'Last Name ', '2022-01-30 17:51:27');
INSERT INTO `z_logs` VALUES (114, 1, 'admin@gmail.com', 'admin ', '2022-01-30 17:56:11');
INSERT INTO `z_logs` VALUES (115, 1, 'admin@gmail.com', 'admin ', '2022-01-30 21:57:16');
INSERT INTO `z_logs` VALUES (116, 1, 'admin@gmail.com', 'admin ', '2022-01-31 02:00:10');
INSERT INTO `z_logs` VALUES (117, 1, 'admin@gmail.com', 'admin ', '2022-01-31 02:11:05');
INSERT INTO `z_logs` VALUES (118, 7, 'user@gmail.com', 'Müller ', '2022-01-31 03:07:17');
INSERT INTO `z_logs` VALUES (119, 1, 'admin@gmail.com', 'admin ', '2022-01-31 03:20:35');
INSERT INTO `z_logs` VALUES (120, 1, 'admin@gmail.com', 'admin ', '2022-01-31 08:23:29');
INSERT INTO `z_logs` VALUES (121, 1, 'admin@gmail.com', 'admin ', '2022-01-31 17:45:53');
INSERT INTO `z_logs` VALUES (122, 48, 'jacob.gavrilov71611@gmail.com', '123123 ', '2022-01-31 22:16:54');
INSERT INTO `z_logs` VALUES (123, 1, 'admin@gmail.com', 'admin ', '2022-01-31 22:27:43');
INSERT INTO `z_logs` VALUES (124, 7, 'user@gmail.com', 'Müller ', '2022-02-01 01:28:49');
INSERT INTO `z_logs` VALUES (125, 1, 'admin@gmail.com', 'admin ', '2022-02-01 01:31:30');
INSERT INTO `z_logs` VALUES (126, 1, 'admin@gmail.com', 'admin ', '2022-02-01 23:10:55');
INSERT INTO `z_logs` VALUES (127, 6, 'loader@greenwavematerils.com', 'Last Name ', '2022-02-04 05:42:24');
INSERT INTO `z_logs` VALUES (128, 1, 'admin@gmail.com', 'admin ', '2022-02-04 06:22:08');
INSERT INTO `z_logs` VALUES (129, 6, 'loader@greenwavematerils.com', 'Last Name ', '2022-02-04 06:23:04');
INSERT INTO `z_logs` VALUES (130, 1, 'admin@gmail.com', 'admin ', '2022-02-04 07:59:29');
INSERT INTO `z_logs` VALUES (131, 6, 'loader@greenwavematerials.com', 'Last Name ', '2022-02-04 08:00:37');
INSERT INTO `z_logs` VALUES (132, 1, 'admin@gmail.com', 'admin ', '2022-02-05 21:05:36');
INSERT INTO `z_logs` VALUES (133, 1, 'admin@gmail.com', 'admin ', '2022-02-07 18:10:08');
INSERT INTO `z_logs` VALUES (134, 7, 'user@gmail.com', 'Müller ', '2022-02-07 20:00:37');
INSERT INTO `z_logs` VALUES (135, 7, 'user@gmail.com', 'Müller ', '2022-02-07 20:03:46');
INSERT INTO `z_logs` VALUES (136, 7, 'user@gmail.com', 'Müller ', '2022-02-07 20:31:44');
INSERT INTO `z_logs` VALUES (137, 7, 'user@gmail.com', 'Müller ', '2022-02-07 20:32:17');
INSERT INTO `z_logs` VALUES (138, 7, 'user@gmail.com', 'Müller ', '2022-02-07 21:47:55');
INSERT INTO `z_logs` VALUES (139, 38, 'test@test.com', 'test1 ', '2022-02-08 08:09:35');
INSERT INTO `z_logs` VALUES (140, 1, 'admin@gmail.com', 'admin ', '2022-02-08 08:16:03');
INSERT INTO `z_logs` VALUES (141, 7, 'user@gmail.com', 'Müller ', '2022-02-08 08:21:38');
INSERT INTO `z_logs` VALUES (142, 1, 'admin@gmail.com', 'admin ', '2022-02-08 18:56:19');
INSERT INTO `z_logs` VALUES (143, 38, 'test@test.com', 'test1 ', '2022-02-08 19:08:34');
INSERT INTO `z_logs` VALUES (144, 1, 'admin@gmail.com', 'admin ', '2022-02-08 19:09:11');
INSERT INTO `z_logs` VALUES (145, 38, 'test@test.com', 'test1 ', '2022-02-08 19:09:40');
INSERT INTO `z_logs` VALUES (146, 50, 'test@gmail.com', 'asdfadf ', '2022-02-08 20:44:28');
INSERT INTO `z_logs` VALUES (147, 1, 'admin@gmail.com', 'admin ', '2022-02-09 07:05:14');
INSERT INTO `z_logs` VALUES (148, 5, 'printer@gmail.com', 'printer ', '2022-02-10 17:12:31');
INSERT INTO `z_logs` VALUES (149, 1, 'admin@gmail.com', 'admin ', '2022-02-10 17:23:23');
INSERT INTO `z_logs` VALUES (150, 5, 'printer@gmail.com', 'printer ', '2022-02-10 17:25:51');
INSERT INTO `z_logs` VALUES (151, 1, 'admin@gmail.com', 'admin ', '2022-02-12 05:50:17');
INSERT INTO `z_logs` VALUES (152, 5, 'printer@gmail.com', 'printer ', '2022-02-13 07:46:42');
INSERT INTO `z_logs` VALUES (153, 1, 'admin@gmail.com', 'admin ', '2022-02-13 07:47:15');
INSERT INTO `z_logs` VALUES (154, 5, 'printer@gmail.com', 'printer ', '2022-02-18 04:09:28');
INSERT INTO `z_logs` VALUES (155, 4, 'paymaster@gmail.com', 'paymaster ', '2022-02-18 04:11:08');
INSERT INTO `z_logs` VALUES (156, 5, 'printer@gmail.com', 'printer ', '2022-02-18 04:13:45');
INSERT INTO `z_logs` VALUES (157, 5, 'printer@gmail.com', 'printer ', '2022-02-18 07:34:15');
INSERT INTO `z_logs` VALUES (158, 1, 'admin@gmail.com', 'admin ', '2022-02-19 02:33:00');
INSERT INTO `z_logs` VALUES (159, 7, 'user@gmail.com', 'Müller ', '2022-02-19 03:08:05');
INSERT INTO `z_logs` VALUES (160, 7, 'user@gmail.com', 'Müller ', '2022-02-19 04:41:27');
INSERT INTO `z_logs` VALUES (161, 5, 'printer@gmail.com', 'printer ', '2022-02-19 05:25:28');
INSERT INTO `z_logs` VALUES (162, 7, 'user@gmail.com', 'Müller ', '2022-02-19 05:26:24');
INSERT INTO `z_logs` VALUES (163, 1, 'admin@gmail.com', 'admin ', '2022-02-20 06:43:52');
INSERT INTO `z_logs` VALUES (164, 7, 'user@gmail.com', 'Müller ', '2022-02-21 07:34:57');
INSERT INTO `z_logs` VALUES (165, 4, 'paymaster@gmail.com', 'paymaster ', '2022-02-21 07:52:45');
INSERT INTO `z_logs` VALUES (166, 5, 'printer@gmail.com', 'printer ', '2022-02-21 08:05:06');
INSERT INTO `z_logs` VALUES (167, 3, 'eposhauver@gmail.com', 'Nesli1 ', '2022-02-21 08:22:14');
INSERT INTO `z_logs` VALUES (168, 1, 'admin@gmail.com', 'admin ', '2022-02-21 08:46:15');
INSERT INTO `z_logs` VALUES (169, 1, 'admin@gmail.com', 'admin ', '2022-02-21 10:21:25');
INSERT INTO `z_logs` VALUES (170, 7, 'user@gmail.com', 'Müller ', '2022-02-23 05:24:20');
INSERT INTO `z_logs` VALUES (171, 1, 'admin@gmail.com', 'admin ', '2022-02-28 21:49:00');
INSERT INTO `z_logs` VALUES (172, 1, 'admin@gmail.com', 'admin ', '2022-02-28 21:49:51');
INSERT INTO `z_logs` VALUES (173, 1, 'admin@gmail.com', 'admin ', '2022-02-28 22:09:35');
INSERT INTO `z_logs` VALUES (174, 3, 'eposhauver@gmail.com', 'Nesli1 ', '2022-02-28 22:10:30');
INSERT INTO `z_logs` VALUES (175, 1, 'admin@gmail.com', 'admin ', '2022-02-28 22:20:33');
INSERT INTO `z_logs` VALUES (176, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-01 20:44:33');
INSERT INTO `z_logs` VALUES (177, 1, 'admin@gmail.com', 'admin ', '2022-03-01 21:22:15');
INSERT INTO `z_logs` VALUES (178, 3, 'eposhauver@gmail.com', 'Nesli1 ', '2022-03-02 01:41:00');
INSERT INTO `z_logs` VALUES (179, 16, 'loader2@gmail.com', 'Last Name ', '2022-03-02 02:01:23');
INSERT INTO `z_logs` VALUES (180, 16, 'loader2@gmail.com', 'Last Name ', '2022-03-02 02:06:58');
INSERT INTO `z_logs` VALUES (181, 3, 'eposhauver@gmail.com', 'Nesli1 ', '2022-03-02 03:02:37');
INSERT INTO `z_logs` VALUES (182, 5, 'printer@gmail.com', 'printer ', '2022-03-03 18:57:26');
INSERT INTO `z_logs` VALUES (183, 5, 'printer@gmail.com', 'printer ', '2022-03-08 07:10:30');
INSERT INTO `z_logs` VALUES (184, 1, 'admin@gmail.com', 'admin ', '2022-03-09 13:40:39');
INSERT INTO `z_logs` VALUES (185, 5, 'printer@gmail.com', 'printer ', '2022-03-11 07:40:12');
INSERT INTO `z_logs` VALUES (186, 7, 'user@gmail.com', 'Müller ', '2022-03-11 22:35:40');
INSERT INTO `z_logs` VALUES (187, 5, 'printer@gmail.com', 'printer ', '2022-03-12 01:39:05');
INSERT INTO `z_logs` VALUES (188, 7, 'user@gmail.com', 'Müller ', '2022-03-12 01:42:15');
INSERT INTO `z_logs` VALUES (189, 5, 'printer@gmail.com', 'printer ', '2022-03-12 02:43:54');
INSERT INTO `z_logs` VALUES (190, 1, 'admin@gmail.com', 'admin ', '2022-03-12 03:23:20');
INSERT INTO `z_logs` VALUES (191, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-12 03:39:02');
INSERT INTO `z_logs` VALUES (192, 1, 'admin@gmail.com', 'admin ', '2022-03-12 07:41:46');
INSERT INTO `z_logs` VALUES (193, 5, 'printer@gmail.com', 'printer ', '2022-03-12 07:42:02');
INSERT INTO `z_logs` VALUES (194, 1, 'admin@gmail.com', 'admin ', '2022-03-12 07:48:14');
INSERT INTO `z_logs` VALUES (195, 5, 'printer@gmail.com', 'printer ', '2022-03-12 18:03:14');
INSERT INTO `z_logs` VALUES (196, 1, 'admin@gmail.com', 'admin ', '2022-03-12 18:08:50');
INSERT INTO `z_logs` VALUES (197, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-12 20:57:53');
INSERT INTO `z_logs` VALUES (198, 1, 'admin@gmail.com', 'admin ', '2022-03-12 20:58:37');
INSERT INTO `z_logs` VALUES (199, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-12 21:31:35');
INSERT INTO `z_logs` VALUES (200, 5, 'printer@gmail.com', 'printer ', '2022-03-13 03:02:19');
INSERT INTO `z_logs` VALUES (201, 1, 'admin@gmail.com', 'admin ', '2022-03-13 03:54:49');
INSERT INTO `z_logs` VALUES (202, 5, 'printer@gmail.com', 'printer ', '2022-03-13 17:19:01');
INSERT INTO `z_logs` VALUES (203, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-13 20:32:36');
INSERT INTO `z_logs` VALUES (204, 1, 'admin@gmail.com', 'admin ', '2022-03-14 04:31:47');
INSERT INTO `z_logs` VALUES (205, 1, 'admin@gmail.com', 'admin ', '2022-03-14 05:08:59');
INSERT INTO `z_logs` VALUES (206, 5, 'printer@gmail.com', 'printer ', '2022-03-14 08:00:25');
INSERT INTO `z_logs` VALUES (207, 1, 'admin@gmail.com', 'admin ', '2022-03-14 19:56:20');
INSERT INTO `z_logs` VALUES (208, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-14 20:11:42');
INSERT INTO `z_logs` VALUES (209, 1, 'admin@gmail.com', 'admin ', '2022-03-14 20:19:00');
INSERT INTO `z_logs` VALUES (210, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-14 20:21:48');
INSERT INTO `z_logs` VALUES (211, 1, 'admin@gmail.com', 'admin ', '2022-03-14 20:22:08');
INSERT INTO `z_logs` VALUES (212, 5, 'printer@gmail.com', 'printer ', '2022-03-14 20:35:10');
INSERT INTO `z_logs` VALUES (213, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-15 21:53:48');
INSERT INTO `z_logs` VALUES (214, 1, 'admin@gmail.com', 'admin ', '2022-03-15 23:51:43');
INSERT INTO `z_logs` VALUES (215, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-16 00:19:25');
INSERT INTO `z_logs` VALUES (216, 5, 'printer@gmail.com', 'printer ', '2022-03-16 01:04:57');
INSERT INTO `z_logs` VALUES (217, 1, 'admin@gmail.com', 'admin ', '2022-03-16 04:21:47');
INSERT INTO `z_logs` VALUES (218, 7, 'user@gmail.com', 'Müller ', '2022-03-16 18:15:21');
INSERT INTO `z_logs` VALUES (219, 7, 'user@gmail.com', 'Müller ', '2022-03-16 18:33:55');
INSERT INTO `z_logs` VALUES (220, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-16 19:55:09');
INSERT INTO `z_logs` VALUES (221, 1, 'admin@gmail.com', 'admin ', '2022-03-17 13:34:19');
INSERT INTO `z_logs` VALUES (222, 1, 'admin@gmail.com', 'admin ', '2022-03-17 21:53:44');
INSERT INTO `z_logs` VALUES (223, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-21 22:04:21');
INSERT INTO `z_logs` VALUES (224, 7, 'user@gmail.com', 'Müller ', '2022-03-24 03:27:01');
INSERT INTO `z_logs` VALUES (225, 1, 'admin@gmail.com', 'admin ', '2022-03-24 04:26:07');
INSERT INTO `z_logs` VALUES (226, 7, 'user@gmail.com', 'Müller ', '2022-03-24 04:27:59');
INSERT INTO `z_logs` VALUES (227, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-24 22:26:14');
INSERT INTO `z_logs` VALUES (228, 1, 'admin@gmail.com', 'admin ', '2022-03-24 23:18:35');
INSERT INTO `z_logs` VALUES (229, 57, 'aaa@test.com', 'hg ', '2022-03-25 05:59:50');
INSERT INTO `z_logs` VALUES (230, 1, 'admin@gmail.com', 'admin ', '2022-03-25 06:01:03');
INSERT INTO `z_logs` VALUES (231, 7, 'user@gmail.com', 'Müller ', '2022-03-25 21:21:43');
INSERT INTO `z_logs` VALUES (232, 1, 'admin@gmail.com', 'admin ', '2022-03-25 21:27:51');
INSERT INTO `z_logs` VALUES (233, 5, 'printer@gmail.com', 'printer ', '2022-03-27 01:26:07');
INSERT INTO `z_logs` VALUES (234, 1, 'admin@gmail.com', 'admin ', '2022-03-27 02:50:22');
INSERT INTO `z_logs` VALUES (235, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-27 03:28:30');
INSERT INTO `z_logs` VALUES (236, 5, 'printer@gmail.com', 'printer ', '2022-03-27 05:29:53');
INSERT INTO `z_logs` VALUES (237, 4, 'paymaster@gmail.com', 'paymaster ', '2022-03-27 21:59:10');
INSERT INTO `z_logs` VALUES (238, 7, 'user@gmail.com', 'Müller ', '2022-03-31 19:04:32');
INSERT INTO `z_logs` VALUES (239, 1, 'admin@gmail.com', 'admin ', '2022-04-05 03:54:45');
INSERT INTO `z_logs` VALUES (240, 5, 'printer@gmail.com', 'printer ', '2022-04-05 04:11:32');
INSERT INTO `z_logs` VALUES (241, 7, 'user@gmail.com', 'Müller ', '2022-04-05 20:32:12');
INSERT INTO `z_logs` VALUES (242, 5, 'printer@gmail.com', 'printer ', '2022-04-05 23:20:23');

-- ----------------------------
-- Table structure for z_tmp_investment
-- ----------------------------
DROP TABLE IF EXISTS `z_tmp_investment`;
CREATE TABLE `z_tmp_investment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project` int NULL DEFAULT NULL,
  `investment` double NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  `size` double NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of z_tmp_investment
-- ----------------------------
INSERT INTO `z_tmp_investment` VALUES (1, 1, 0, 0, 1000, 52, '2022-02-22 18:44:37');
INSERT INTO `z_tmp_investment` VALUES (2, 1, 0, 0, 10000, 52, '2022-02-22 18:45:08');
INSERT INTO `z_tmp_investment` VALUES (3, 1, 5000, 0.5, 10000, 52, '2022-02-22 18:54:12');

SET FOREIGN_KEY_CHECKS = 1;
