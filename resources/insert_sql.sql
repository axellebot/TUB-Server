# noinspection SqlNoDataSourceInspectionForFile
/*
Lines
 */
INSERT INTO `Line` (`id`, `label`, `number`, `color`, `order`)
VALUES
  (1, 'Ligne 1 : Norelan <> Velaine', 1, '#124b9a', 1),
  (2, 'Ligne 2 : Norelan <> Ainterexpo', 2, '#8b2199', 2),
  (3, 'Ligne 3 : Péronnas Blés d''Or <> Alagnier', 3, '#F8EB21', 3),
  (4, 'Ligne 4 : St Denis Collège <> Clinique Convert/EREA La Chagne', 4, '#ff0000', 4),
  (5, 'Ligne 5 : St Denis Collège <> St Denis Collège', 5, '#00c9dd', 5),
  (6, 'Ligne 6 : Viriat Caronniers <> Ainterexpo', 6, '#f90080', 6),
  (7, 'Ligne 7 : Viriat Caronniers <> Carré Amiot', 7, '#fd8300', 7),
  (8, 'Ligne 21 : Peloux Gare <> Sources', 21, '#9bc774', 8);

/*
Stops
 */
INSERT INTO `Stop` (`id`, `label`, `latitude`, `longitude`)
VALUES
  (1, 'Baudin', 46.200648, 5.218698),
  (2, 'Abbé Gringoz', 46.20223054919, 5.2469158172607),
  (3, 'Aéroplanes', 46.190734534652, 5.2357578277588),
  (4, 'Alagnier', 46.194180620868, 5.2728796005249),
  (5, 'Alimentec', 46.215387117537, 5.2439975738525),
  (7, 'Mas', 46.204458180779, 5.2140855789185),
  (8, 'Arbelles', 46.194951, 5.234349),
  (9, 'Avant RP Fleyriat', 46.228017, 5.203613),
  (10, 'Mâcon', 46.2102792982, 5.2192354202271),
  (11, 'Bastion', 46.206448121945, 5.2233982086182),
  (12, 'Baudières', 46.204517583052, 5.2396202087402),
  (13, 'Beau Site', 46.211229626139, 5.2480745315552),
  (14, 'Bellevue', 46.182058947274, 5.2050733566284),
  (15, 'Berlioz', 46.222447, 5.230978),
  (16, 'Berthelot', 46.193645897515, 5.213828086853),
  (17, 'Bichat Hôtel de Ville', 46.206062019594, 5.2246427536011),
  (18, 'Blanchisseries', 46.211912664189, 5.2232265472412),
  (19, 'Bons Enfants', 46.205052200615, 5.229320526123),
  (20, 'Boule', 46.217228191746, 5.2200078964233),
  (21, 'Bourg Lycées', 46.198279993725, 5.2257961034774),
  (22, 'Bouvard', 46.191506952075, 5.2075624465942),
  (23, 'Bouvent Plage', 46.192219943138, 5.2564859390259),
  (24, 'Bouvreuils', 46.195903582947, 5.2035284042358),
  (25, 'Buidon', 46.22779832633, 5.2277326583862),
  (26, 'Câbles de Lyon', 46.206863921442, 5.2116823196411),
  (27, 'Cadalles', 46.213932031348, 5.1975202560425),
  (28, 'Calidon', 46.21390233531, 5.2061033248901),
  (29, 'Canal', 46.213694462595, 5.2274751663208),
  (30, 'Carré Amiot (Quai 4 Sept)', 46.207505, 5.228209),
  (31, 'Castel', 46.232013935851, 5.2295351028442),
  (32, 'Cédraie', 46.191001911142, 5.2390623092651),
  (33, 'Centre Commercial', 46.179384688819, 5.2030563354492),
  (34, 'Centre Nautique', 46.209447747765, 5.2380752563477),
  (35, 'Chalandré', 46.207725210387, 5.1978635787964),
  (36, 'Chambière Hôtels', 46.221711840057, 5.2051591873169),
  (37, 'Chambière Nord', 46.223226102138, 5.2045154571533),
  (38, 'Champ de Foire', 46.207012420499, 5.2304363250732),
  (39, 'Champagne', 46.242788987019, 5.2229690551758),
  (40, 'Charité', 46.207725210387, 5.220308303833),
  (41, 'Jarrin', 46.207517314292, 5.2164459228516),
  (42, 'Charles Robin', 46.206151120377, 5.2319383621216),
  (43, 'Charmettes', 46.193645897515, 5.2393627166748),
  (44, 'Charpine', 46.200715708115, 5.2025842666626),
  (45, 'Chartreuse', 46.185267885723, 5.2279472351074),
  (46, 'Château', 46.248606041348, 5.2188920974731),
  (47, 'Chênaie', 46.178196087754, 5.2070903778076),
  (48, 'Chevrier', 46.215535593552, 5.2343845367432),
  (49, 'Cimetière', 46.214347774193, 5.2348136901855),
  (50, 'Citadelle', 46.203151314532, 5.2149868011475),
  (51, 'Cité des Seniors', 46.256410609369, 5.2161455154419),
  (52, 'Clinique Convert', 46.211407, 5.254146),
  (53, 'Cordier', 46.204131467132, 5.2374744415283),
  (54, 'Côtes', 46.190764243215, 5.2068328857422),
  (55, 'CPA', 46.2281248992, 5.2304363250732),
  (56, 'Crépignat', 46.242318, 5.190293),
  (57, 'Croix Blanche', 46.203329525396, 5.2433967590332),
  (58, 'Crouy', 46.195517406488, 5.2232265472412),
  (59, 'Curtafray', 46.197656195844, 5.2616786956787),
  (60, 'Cuvier', 46.219037, 5.22784),
  (61, 'D\'Arsonval', 46.22147430496, 5.2200937271118),
  (62, 'Dépôt TUB', 46.22355270221, 5.2218961715698),
  (63, 'Dévorah', 46.207940530513, 5.258175730705),
  (64, 'Dîmes', 46.207517314292, 5.243353843689),
  (65, 'Ecluses', 46.218537, 5.214935),
  (66, 'Monastère de Brou', 46.197864129258, 5.2352857589722),
  (67, 'Emile Huchet', 46.195665936217, 5.2253723144531),
  (68, 'EREA La Chagne', 46.204803, 5.272024),
  (69, 'Europe', 46.207695510993, 5.2351140975952),
  (70, 'Feuilles Vertes', 46.238514839744, 5.2288055419922),
  (71, 'Flèches', 46.199884012903, 5.1904392242432),
  (72, 'Fleyriat RN', 46.22183060722, 5.2092361450195),
  (73, 'Fleyriat Tennis', 46.233818, 5.205471),
  (74, 'Fontanettes', 46.202586976314, 5.2314233779907),
  (75, 'Fort', 46.218663, 5.211855),
  (76, 'Arago', 46.227738949236, 5.2238273620605),
  (77, 'Mistral', 46.196319462252, 5.266056060791),
  (78, 'Fruitière', 46.200686004932, 5.1981210708618),
  (79, 'Voisin', 46.205765015938, 5.2133131027222),
  (80, 'Vicaire', 46.207903406414, 5.2244281768799),
  (81, 'Gare SNCF', 46.19982460562, 5.215630531311),
  (82, 'Gay-Lussac', 46.219254, 5.209567),
  (83, 'Gelière', 46.244925935798, 5.2189350128174),
  (84, 'Gendarmerie', 46.212387816083, 5.2410364151001),
  (85, 'Girod de l\'Ain', 46.191952572573, 5.2121543884277),
  (86, 'Girolles', 46.189605597354, 5.2482032775879),
  (87, 'Grand Challes', 46.218119011945, 5.2358436584473),
  (88, 'Granges Maman', 46.200270158674, 5.1942586898804),
  (89, 'Grange Rollet', 46.221533688831, 5.2338266372681),
  (90, 'Granges Bardes', 46.21642644121, 5.2391910552979),
  (91, 'Granges Bonnet', 46.187882437823, 5.209493637085),
  (92, 'Graves', 46.199260233231, 5.2341270446777),
  (93, 'Henri Dunant', 46.211882967059, 5.2301359176636),
  (94, 'Hôpital Fleyriat', 46.222602587516, 5.2094507217407),
  (95, 'Hortensias', 46.216307662357, 5.2100944519043),
  (96, 'Hôtel Dieu', 46.200715708115, 5.2329254150391),
  (97, 'Hôtel de Ville', 46.204903696258, 5.2264451980591),
  (98, 'Joliot Curie', 46.208794377877, 5.2337408065796),
  (99, 'Rousseau', 46.187763597244, 5.2258443832397),
  (100, 'Jayr', 46.251365958489, 5.2180337905884),
  (101, 'Jean Moulin', 46.209922920984, 5.2301359176636),
  (102, 'Jean-Marie Verne', 46.197834424533, 5.2257585525513),
  (103, 'Ferry', 46.19578475971, 5.2203941345215),
  (104, 'Jura', 46.205438310063, 5.2365303039551),
  (105, 'La Bruyère', 46.19019977777, 5.2262306213379),
  (106, 'Butte', 46.185119327892, 5.2396631240845),
  (107, 'Perrinche', 46.235962065206, 5.2284622192383),
  (108, 'Viriat Vernée', 46.240651955002, 5.2263593673706),
  (109, 'Laiterie', 46.214585340121, 5.2245998382568),
  (110, 'Lazaristes', 46.206062019594, 5.2067041397095),
  (111, 'Clos', 46.198844376183, 5.2105236053467),
  (112, 'Le Coteau', 46.214110207239, 5.2139568328857),
  (113, 'Plan', 46.219039510969, 5.2494049072266),
  (114, 'Leclanché', 46.215921629311, 5.2067899703979),
  (115, 'Sources', 46.196728, 5.247291),
  (116, 'Liavoles', 46.225512261836, 5.2171754837036),
  (117, 'Libération', 46.19991371652, 5.218505859375),
  (118, 'Lilas', 46.204279973576, 5.2093648910522),
  (119, 'Loëze', 46.198784967776, 5.2580738067627),
  (120, 'Lycée Agricole', 46.211615692167, 5.2569580078125),
  (121, 'Maginot', 46.208705281381, 5.2276468276978),
  (122, 'Mail', 46.202052334761, 5.2118539810181),
  (123, 'Majornas', 46.227293618982, 5.2190637588501),
  (124, 'Maquis', 46.206002618991, 5.2343416213989),
  (125, 'Seguin', 46.214615035789, 5.2210378646851),
  (126, 'Marcelle Pardé', 46.201755309428, 5.2214670181274),
  (127, 'Médiathèque', 46.201814714623, 5.2418518066406),
  (128, 'Miche', 46.220910154988, 5.2274322509766),
  (129, 'Molière', 46.190110651117, 5.2330112457275),
  (130, 'Montholon', 46.194685632591, 5.2100086212158),
  (131, 'Moulin de Rozières', 46.2116750867, 5.2275609970093),
  (132, 'Narcisses', 46.191298994606, 5.246057510376),
  (133, 'Neuve', 46.215684069165, 5.2145147323608),
  (134, 'Norelan', 46.221058616069, 5.2446842193604),
  (135, 'Observatoire', 46.202557274142, 5.2167892456055),
  (136, 'Ormeaux', 46.186486044787, 5.241551399231),
  (137, 'Oures', 46.213844, 5.199946),
  (138, 'Oyards', 46.223465, 5.23207),
  (139, 'Pagneux', 46.190229486622, 5.2099227905273),
  (140, 'Pâquerettes', 46.217139108931, 5.226788520813),
  (141, 'Parc', 46.213486589093, 5.2164888381958),
  (143, 'Parme', 46.216307662357, 5.2456283569336),
  (144, 'Pascal', 46.193527069397, 5.2041721343994),
  (145, 'Valéry', 46.195220345828, 5.2290201187134),
  (146, 'Peloux', 46.197032390881, 5.214729309082),
  (147, 'Peloux Gare', 46.199586975847, 5.2136564254761),
  (148, 'Pennessuy', 46.199943420121, 5.254340171814),
  (149, 'Péronas Blé d\'Or', 46.175343340367, 5.2001810073853),
  (150, 'Péronnas Mairie', 46.179718978239, 5.203179717063),
  (151, 'Labalme', 46.200418675556, 5.2253293991089),
  (152, 'Petit Challes', 46.20833404442, 5.2438607811927),
  (153, 'Petit Montholon', 46.201844417196, 5.2073907852173),
  (154, 'Petites Vennes', 46.188714314686, 5.2379465103149),
  (155, 'Picasso', 46.201458282489, 5.249490737915),
  (156, 'Place Carriat', 46.206477822013, 5.2273035049438),
  (157, 'Platanes', 46.19328941239, 5.2402639389038),
  (158, 'Plein Soleil', 46.195309464194, 5.2267026901245),
  (159, 'PN Chambière Sud', 46.211348415975, 5.2114677429199),
  (160, 'Pont des Chèvres', 46.212239331557, 5.2218103408813),
  (161, 'Pré Neuf', 46.208497388995, 5.2404356002808),
  (162, 'Préfecture', 46.202992, 5.222344),
  (163, 'Préfecture Ain', 46.20196322733, 5.2208662033081),
  (164, 'Prévert', 46.201755309428, 5.1947736740112),
  (165, 'Printemps', 46.201161253944, 5.2029705047607),
  (166, 'Providence', 46.197626491006, 5.2397060394287),
  (167, 'Quai Groboz', 46.205735315485, 5.2304363250732),
  (168, 'Revermont', 46.211229626139, 5.2438259124756),
  (169, 'Reyssouze', 46.215505898381, 5.2162742614746),
  (170, 'Schuman', 46.212714480625, 5.2320241928101),
  (171, 'Roland Garros', 46.19328941239, 5.2071332931519),
  (172, 'Saint-Denis Centre', 46.202705784842, 5.1918125152588),
  (173, 'Saint-Denis Collège', 46.203448332318, 5.1952028274536),
  (174, 'Saint-Denis Mairie', 46.201903822295, 5.1897954940796),
  (175, 'Saint-Nicolas', 46.204042363073, 5.2351999282837),
  (176, 'Saint-Roch', 46.193764725377, 5.2250719070435),
  (177, 'Sardières Clinique', 46.211407, 5.254146),
  (178, 'Schweitzer', 46.208586485829, 5.2206516265869),
  (179, 'Seillon CFA', 46.187169390492, 5.2301788330078),
  (180, 'Semailles', 46.210457485941, 5.1980781555176),
  (181, 'Sémard Gare', 46.199532, 5.2156766),
  (182, 'Semard Jaurès', 46.197002685706, 5.2164459228516),
  (183, 'Vennes Stade', 46.186991127214, 5.2369594573975),
  (184, 'Stade Deguin', 46.207814308473, 5.2654981613159),
  (185, 'Stand', 46.191804032809, 5.2324104309082),
  (186, 'Teyssonnière', 46.196378873324, 5.210394859314),
  (187, 'Collège Riboud', 46.193735018435, 5.2304792404175),
  (188, 'Tilleuls', 46.218356561558, 5.2339553833008),
  (189, 'Ferret', 46.196883864846, 5.2361869812012),
  (190, 'Tulipes', 46.204844294403, 5.211124420166),
  (191, 'Tyrandes', 46.185119327892, 5.2074337005615),
  (192, 'Valvert', 46.222068140775, 5.2160596847534),
  (193, 'Vareys', 46.221963, 5.209019),
  (194, 'Vennes', 46.188417217252, 5.2269172668457),
  (195, 'Vercherolles', 46.236476, 5.18608),
  (196, 'Verlaine', 46.18471821974, 5.227252542972),
  (197, 'Victoire Gare', 46.20169961699, 5.2149733901023),
  (198, 'Vieux Chêne', 46.177126324827, 5.2043437957764),
  (199, 'Viriat Carronniers', 46.252048497223, 5.2112531661987),
  (200, 'Viriat Écoles', 46.254719219314, 5.2152442932129),
  (201, 'Viriat mairie', 46.253469, 5.216672),
  (202, 'Viriat Salle des fêtes', 46.254333456382, 5.2179908752441),
  (203, 'Viriat Village', 46.252968427294, 5.2164459228516),
  (204, 'Vivaldi', 46.198279993725, 5.2033138275146),
  (205, 'Voltaire', 46.200656301732, 5.2205657958984),
  (206, 'ZA Les Bruyères', 46.17058843251, 5.1979923248291),
  (207, 'ZA Monternoz', 46.171569165907, 5.1970481872559),
  (208, 'Carré Amiot (Maginot)', 46.207682, 5.227612),
  (209, 'Ainterexpo', 46.188391, 5.245854),
  (210, ' Péronnas Blés d''Or', 46.182061, 5.209960);

/*
StopGroup
*/
INSERT INTO `join_line_stop` (`id`, `line_id`, `stop_id`, `way`, `order`)
VALUES
  (1, 1, 134, 'O', 1),
  (2, 1, 138, 'O', 2),
  (3, 1, 89, 'O', 3),
  (4, 1, 168, 'O', 4),
  (5, 1, 90, 'O', 5),
  (6, 1, 87, 'O', 6),
  (7, 1, 188, 'O', 7),
  (8, 1, 48, 'O', 8),
  (9, 1, 49, 'O', 9),
  (10, 1, 170, 'O', 10),
  (11, 1, 93, 'O', 11),
  (12, 1, 101, 'O', 12),
  (13, 1, 208, 'O', 13),
  (14, 1, 97, 'O', 14),
  (15, 1, 162, 'O', 15),
  (16, 1, 135, 'O', 16),
  (17, 1, 197, 'O', 17),
  (18, 1, 1, 'O', 18),
  (19, 1, 205, 'O', 19),
  (20, 1, 151, 'O', 20),
  (21, 1, 21, 'O', 21),
  (22, 1, 158, 'O', 22),
  (23, 1, 176, 'O', 23),
  (24, 1, 105, 'O', 24),
  (25, 1, 194, 'O', 25),
  (26, 1, 99, 'O', 26),
  (27, 1, 45, 'O', 27),
  (28, 1, 196, 'O', 28),
  (29, 1, 179, 'O', 29),
  (30, 1, 129, 'O', 30),
  (31, 1, 129, 'I', 1),
  (32, 1, 179, 'I', 2),
  (33, 1, 196, 'I', 3),
  (34, 1, 45, 'I', 4),
  (35, 1, 99, 'I', 5),
  (36, 1, 194, 'I', 6),
  (37, 1, 105, 'I', 7),
  (38, 1, 176, 'I', 8),
  (39, 1, 158, 'I', 9),
  (40, 1, 21, 'I', 10),
  (41, 1, 151, 'I', 11),
  (42, 1, 205, 'I', 12),
  (43, 1, 1, 'I', 13),
  (44, 1, 197, 'I', 14),
  (45, 1, 135, 'I', 15),
  (46, 1, 162, 'I', 16),
  (47, 1, 97, 'I', 17),
  (48, 1, 208, 'I', 18),
  (49, 1, 101, 'I', 19),
  (50, 1, 93, 'I', 20),
  (51, 1, 170, 'I', 21),
  (52, 1, 49, 'I', 22),
  (53, 1, 48, 'I', 23),
  (54, 1, 188, 'I', 24),
  (55, 1, 87, 'I', 25),
  (56, 1, 90, 'I', 26),
  (57, 1, 168, 'I', 27),
  (58, 1, 89, 'I', 28),
  (59, 1, 138, 'I', 29),
  (60, 1, 134, 'I', 30),
  (61, 2, 134, 'O', 1),
  (62, 2, 113, 'O', 2),
  (63, 2, 143, 'O', 3),
  (64, 2, 5, 'O', 4),
  (65, 2, 84, 'O', 5),
  (66, 2, 34, 'O', 6),
  (67, 2, 69, 'O', 7),
  (68, 2, 30, 'O', 8),
  (69, 2, 97, 'O', 9),
  (70, 2, 162, 'O', 10),
  (71, 2, 1, 'O', 11),
  (72, 2, 181, 'O', 12),
  (73, 2, 182, 'O', 13),
  (74, 2, 103, 'O', 14),
  (75, 2, 58, 'O', 15),
  (76, 2, 158, 'O', 16),
  (77, 2, 145, 'O', 17),
  (78, 2, 187, 'O', 18),
  (79, 2, 185, 'O', 19),
  (80, 2, 129, 'O', 20),
  (81, 2, 3, 'O', 21),
  (82, 2, 32, 'O', 22),
  (83, 2, 154, 'O', 23),
  (84, 2, 183, 'O', 24),
  (85, 2, 106, 'O', 25),
  (86, 2, 136, 'O', 26),
  (87, 2, 209, 'O', 27),
  (88, 2, 209, 'I', 1),
  (89, 2, 136, 'I', 2),
  (90, 2, 106, 'I', 3),
  (91, 2, 183, 'I', 4),
  (92, 2, 154, 'I', 5),
  (93, 2, 32, 'I', 6),
  (94, 2, 3, 'I', 7),
  (95, 2, 129, 'I', 8),
  (96, 2, 185, 'I', 9),
  (97, 2, 187, 'I', 10),
  (98, 2, 145, 'I', 11),
  (99, 2, 158, 'I', 12),
  (100, 2, 58, 'I', 13),
  (101, 2, 103, 'I', 14),
  (102, 2, 182, 'I', 15),
  (103, 2, 181, 'I', 16),
  (104, 2, 1, 'I', 17),
  (105, 2, 162, 'I', 18),
  (106, 2, 97, 'I', 19),
  (107, 2, 30, 'I', 20),
  (108, 2, 98, 'I', 21),
  (109, 2, 34, 'I', 22),
  (110, 2, 84, 'I', 23),
  (111, 2, 5, 'I', 24),
  (112, 2, 143, 'I', 25),
  (113, 2, 113, 'I', 26),
  (114, 2, 134, 'I', 27),
  (115, 3, 210, 'O', 1),
  (116, 3, 198, 'O', 2),
  (117, 3, 47, 'O', 3),
  (118, 3, 150, 'O', 4),
  (119, 3, 14, 'O', 5),
  (120, 3, 191, 'O', 6),
  (121, 3, 91, 'O', 7),
  (122, 3, 139, 'O', 8),
  (123, 3, 54, 'O', 9),
  (124, 3, 22, 'O', 10),
  (125, 3, 85, 'O', 11),
  (126, 3, 16, 'O', 12),
  (127, 3, 182, 'O', 13),
  (128, 3, 181, 'O', 14),
  (129, 3, 1, 'O', 15),
  (130, 3, 162, 'O', 16),
  (131, 3, 97, 'O', 17),
  (132, 3, 208, 'O', 18),
  (133, 3, 167, 'O', 19),
  (134, 3, 124, 'O', 20),
  (135, 3, 104, 'O', 21),
  (136, 3, 12, 'O', 22),
  (137, 3, 57, 'O', 23),
  (138, 3, 2, 'O', 24),
  (139, 3, 155, 'O', 25),
  (140, 3, 148, 'O', 26),
  (141, 3, 119, 'O', 27),
  (142, 3, 59, 'O', 28),
  (143, 3, 77, 'O', 29),
  (144, 3, 4, 'O', 30),
  (145, 3, 4, 'I', 1),
  (146, 3, 77, 'I', 2),
  (147, 3, 59, 'I', 3),
  (148, 3, 119, 'I', 4),
  (149, 3, 148, 'I', 5),
  (150, 3, 155, 'I', 6),
  (151, 3, 2, 'I', 7),
  (152, 3, 57, 'I', 8),
  (153, 3, 12, 'I', 9),
  (154, 3, 104, 'I', 10),
  (155, 3, 124, 'I', 11),
  (156, 3, 167, 'I', 12),
  (157, 3, 208, 'I', 13),
  (158, 3, 97, 'I', 14),
  (159, 3, 162, 'I', 15),
  (160, 3, 1, 'I', 16),
  (161, 3, 181, 'I', 17),
  (162, 3, 182, 'I', 18),
  (163, 3, 16, 'I', 19),
  (164, 3, 85, 'I', 20),
  (165, 3, 22, 'I', 21),
  (166, 3, 54, 'I', 22),
  (167, 3, 139, 'I', 23),
  (168, 3, 91, 'I', 24),
  (169, 3, 191, 'I', 25),
  (170, 3, 14, 'I', 26),
  (171, 3, 150, 'I', 27),
  (172, 3, 47, 'I', 28),
  (173, 3, 198, 'I', 29),
  (174, 3, 210, 'I', 30),
  (175, 4, 173, 'O', 1),
  (176, 4, 172, 'O', 2),
  (177, 4, 174, 'O', 3),
  (178, 4, 71, 'O', 4),
  (179, 4, 88, 'O', 5),
  (180, 4, 78, 'O', 6),
  (181, 4, 165, 'O', 7),
  (182, 4, 153, 'O', 8),
  (183, 4, 118, 'O', 9),
  (184, 4, 122, 'O', 10),
  (185, 4, 135, 'O', 11),
  (186, 4, 162, 'O', 12),
  (187, 4, 97, 'O', 13),
  (188, 4, 208, 'O', 14),
  (189, 4, 98, 'O', 15),
  (190, 4, 34, 'O', 16),
  (191, 4, 161, 'O', 17),
  (192, 4, 64, 'O', 18),
  (193, 4, 152, 'O', 19),
  (194, 4, 168, 'O', 20),
  (195, 4, 13, 'O', 21),
  (196, 4, 52, 'O', 22),
  (197, 4, 120, 'O', 23),
  (198, 4, 63, 'O', 24),
  (199, 4, 184, 'O', 25),
  (200, 4, 68, 'O', 26),
  (201, 4, 68, 'I', 1),
  (202, 4, 184, 'I', 2),
  (203, 4, 63, 'I', 3),
  (204, 4, 120, 'I', 4),
  (205, 4, 52, 'I', 5),
  (206, 4, 13, 'I', 6),
  (207, 4, 168, 'I', 7),
  (208, 4, 152, 'I', 8),
  (209, 4, 64, 'I', 9),
  (210, 4, 161, 'I', 10),
  (211, 4, 34, 'I', 11),
  (212, 4, 69, 'I', 12),
  (213, 4, 208, 'I', 13),
  (214, 4, 97, 'I', 14),
  (215, 4, 162, 'I', 15),
  (216, 4, 135, 'I', 16),
  (217, 4, 122, 'I', 17),
  (218, 4, 118, 'I', 18),
  (219, 4, 153, 'I', 19),
  (220, 4, 165, 'I', 20),
  (221, 4, 78, 'I', 21),
  (222, 4, 88, 'I', 22),
  (223, 4, 71, 'I', 23),
  (224, 4, 174, 'I', 24),
  (225, 4, 172, 'I', 25),
  (226, 4, 173, 'I', 26),
  (227, 5, 173, 'O', 1),
  (228, 5, 35, 'O', 2),
  (229, 5, 180, 'O', 3),
  (230, 5, 27, 'O', 4),
  (231, 5, 137, 'O', 5),
  (232, 5, 28, 'O', 6),
  (233, 5, 114, 'O', 7),
  (234, 5, 37, 'O', 8),
  (235, 5, 36, 'O', 9),
  (236, 5, 82, 'O', 10),
  (237, 5, 94, 'O', 11),
  (238, 5, 193, 'O', 12),
  (239, 5, 75, 'O', 13),
  (240, 5, 133, 'O', 14),
  (241, 5, 20, 'O', 15),
  (242, 5, 125, 'O', 16),
  (243, 5, 160, 'O', 17),
  (244, 5, 18, 'O', 18),
  (245, 5, 131, 'O', 19),
  (246, 5, 30, 'O', 20),
  (247, 5, 80, 'O', 21),
  (248, 5, 40, 'O', 22),
  (249, 5, 41, 'O', 23),
  (250, 5, 79, 'O', 24),
  (251, 5, 7, 'O', 25),
  (252, 5, 50, 'O', 26),
  (253, 5, 197, 'O', 27),
  (254, 5, 181, 'O', 28),
  (255, 5, 182, 'O', 29),
  (256, 5, 146, 'O', 30),
  (257, 5, 147, 'O', 31),
  (258, 5, 111, 'O', 32),
  (259, 5, 186, 'O', 33),
  (260, 5, 130, 'O', 34),
  (261, 5, 171, 'O', 35),
  (262, 5, 144, 'O', 36),
  (263, 5, 24, 'O', 37),
  (264, 5, 204, 'O', 38),
  (265, 5, 44, 'O', 39),
  (266, 5, 78, 'O', 40),
  (267, 5, 88, 'O', 41),
  (268, 5, 71, 'O', 42),
  (269, 5, 174, 'O', 43),
  (270, 5, 172, 'O', 44),
  (271, 5, 173, 'O', 45),
  (272, 5, 173, 'I', 1),
  (273, 5, 172, 'I', 2),
  (274, 5, 174, 'I', 3),
  (275, 5, 71, 'I', 4),
  (276, 5, 88, 'I', 5),
  (277, 5, 78, 'I', 6),
  (278, 5, 44, 'I', 7),
  (279, 5, 204, 'I', 8),
  (280, 5, 24, 'I', 9),
  (281, 5, 144, 'I', 10),
  (282, 5, 171, 'I', 11),
  (283, 5, 130, 'I', 12),
  (284, 5, 186, 'I', 13),
  (285, 5, 111, 'I', 14),
  (286, 5, 147, 'I', 15),
  (287, 5, 146, 'I', 16),
  (288, 5, 182, 'I', 17),
  (289, 5, 181, 'I', 18),
  (290, 5, 197, 'I', 19),
  (291, 5, 50, 'I', 20),
  (292, 5, 7, 'I', 21),
  (293, 5, 79, 'I', 22),
  (294, 5, 41, 'I', 23),
  (295, 5, 40, 'I', 24),
  (296, 5, 80, 'I', 25),
  (297, 5, 30, 'I', 26),
  (298, 5, 18, 'I', 27),
  (299, 5, 160, 'I', 28),
  (300, 5, 125, 'I', 29),
  (301, 5, 20, 'I', 30),
  (302, 5, 133, 'I', 31),
  (303, 5, 75, 'I', 32),
  (304, 5, 193, 'I', 33),
  (305, 5, 94, 'I', 34),
  (306, 5, 82, 'I', 35),
  (307, 5, 36, 'I', 36),
  (308, 5, 37, 'I', 37),
  (309, 5, 137, 'I', 38),
  (310, 5, 27, 'I', 39),
  (311, 5, 180, 'I', 40),
  (312, 5, 35, 'I', 41),
  (313, 5, 173, 'I', 42),
  (314, 6, 199, 'O', 1),
  (315, 6, 200, 'O', 2),
  (316, 6, 201, 'O', 3),
  (317, 6, 100, 'O', 4),
  (318, 6, 46, 'O', 5),
  (319, 6, 83, 'O', 6),
  (320, 6, 39, 'O', 7),
  (321, 6, 108, 'O', 8),
  (322, 6, 70, 'O', 9),
  (323, 6, 107, 'O', 10),
  (324, 6, 31, 'O', 11),
  (325, 6, 55, 'O', 12),
  (326, 6, 25, 'O', 13),
  (327, 6, 62, 'O', 14),
  (328, 6, 128, 'O', 15),
  (329, 6, 60, 'O', 16),
  (330, 6, 29, 'O', 17),
  (331, 6, 131, 'O', 18),
  (332, 6, 208, 'O', 19),
  (333, 6, 167, 'O', 20),
  (334, 6, 74, 'O', 21),
  (335, 6, 96, 'O', 22),
  (336, 6, 92, 'O', 23),
  (337, 6, 66, 'O', 24),
  (338, 6, 189, 'O', 25),
  (339, 6, 43, 'O', 26),
  (340, 6, 157, 'O', 27),
  (341, 6, 132, 'O', 28),
  (342, 6, 86, 'O', 29),
  (343, 6, 209, 'O', 30),
  (344, 6, 209, 'I', 1),
  (345, 6, 86, 'I', 2),
  (346, 6, 132, 'I', 3),
  (347, 6, 157, 'I', 4),
  (348, 6, 43, 'I', 5),
  (349, 6, 189, 'I', 6),
  (350, 6, 66, 'I', 7),
  (351, 6, 92, 'I', 8),
  (352, 6, 96, 'I', 9),
  (353, 6, 74, 'I', 10),
  (354, 6, 19, 'I', 11),
  (355, 6, 208, 'I', 12),
  (356, 6, 131, 'I', 13),
  (357, 6, 29, 'I', 14),
  (358, 6, 60, 'I', 15),
  (359, 6, 128, 'I', 16),
  (360, 6, 19, 'I', 17),
  (361, 6, 25, 'I', 18),
  (362, 6, 55, 'I', 19),
  (363, 6, 31, 'I', 20),
  (364, 6, 107, 'I', 21),
  (365, 6, 70, 'I', 25),
  (366, 6, 108, 'I', 23),
  (367, 6, 39, 'I', 24),
  (368, 6, 83, 'I', 25),
  (369, 6, 46, 'I', 26),
  (370, 6, 100, 'I', 27),
  (371, 6, 201, 'I', 28),
  (372, 6, 200, 'I', 29),
  (373, 6, 199, 'I', 30),
  (374, 7, 199, 'O', 1),
  (375, 7, 200, 'O', 2),
  (376, 7, 201, 'O', 3),
  (377, 7, 100, 'O', 4),
  (378, 7, 46, 'O', 5),
  (379, 7, 83, 'O', 6),
  (380, 7, 39, 'O', 7),
  (381, 7, 108, 'O', 8),
  (382, 7, 70, 'O', 9),
  (383, 7, 107, 'O', 10),
  (384, 7, 31, 'O', 11),
  (385, 7, 55, 'O', 12),
  (386, 7, 25, 'O', 13),
  (387, 7, 76, 'O', 14),
  (388, 7, 123, 'O', 15),
  (389, 7, 116, 'O', 16),
  (390, 7, 192, 'O', 17),
  (391, 7, 65, 'O', 18),
  (392, 7, 75, 'O', 19),
  (393, 7, 133, 'O', 20),
  (394, 7, 141, 'O', 21),
  (395, 7, 10, 'O', 22),
  (396, 7, 178, 'O', 23),
  (397, 7, 80, 'O', 24),
  (398, 7, 208, 'O', 25),
  (399, 7, 208, 'I', 1),
  (400, 7, 80, 'I', 2),
  (401, 7, 178, 'I', 3),
  (402, 7, 10, 'I', 4),
  (403, 7, 141, 'I', 5),
  (404, 7, 133, 'I', 6),
  (405, 7, 75, 'I', 7),
  (406, 7, 65, 'I', 8),
  (407, 7, 192, 'I', 9),
  (408, 7, 116, 'I', 10),
  (409, 7, 123, 'I', 11),
  (410, 7, 76, 'I', 12),
  (411, 7, 25, 'I', 13),
  (412, 7, 55, 'I', 14),
  (413, 7, 31, 'I', 15),
  (414, 7, 107, 'I', 16),
  (415, 7, 70, 'I', 17),
  (416, 7, 108, 'I', 18),
  (417, 7, 39, 'I', 19),
  (418, 7, 83, 'I', 20),
  (419, 7, 46, 'I', 21),
  (420, 7, 100, 'I', 22),
  (421, 7, 201, 'I', 23),
  (422, 7, 200, 'I', 24),
  (423, 7, 199, 'I', 25),
  (424, 8, 147, 'O', 1),
  (425, 8, 146, 'O', 2),
  (426, 8, 103, 'O', 3),
  (427, 8, 58, 'O', 4),
  (428, 8, 145, 'O', 5),
  (429, 8, 8, 'O', 6),
  (430, 8, 166, 'O', 7),
  (431, 8, 115, 'O', 8),
  (432, 8, 115, 'I', 1),
  (433, 8, 166, 'I', 2),
  (434, 8, 145, 'I', 3),
  (435, 8, 58, 'I', 4),
  (436, 8, 103, 'I', 5),
  (437, 8, 146, 'I', 6),
  (438, 8, 9, 'I', 10);

