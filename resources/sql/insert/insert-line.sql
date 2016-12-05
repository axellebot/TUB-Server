# ************************************************************
# Base de données: tub
# Table: line
# ************************************************************

LOCK TABLES `line` WRITE;

INSERT INTO `line` (`id`, `label`, `number`, `color`, `order`,`kml_path`)
VALUES
  (1, 'Ligne 1 : Norelan <> Velaine', 1, '#006AA1', 1,'/download/kml/1'),
  (2, 'Ligne 2 : Norelan <> Ainterexpo', 2, '#E84539', 2,'/download/kml/2'),
  (3, 'Ligne 3 : Péronnas Blés d''Or <> Alagnier', 3, '#F7E907', 3,'/download/kml/3'),
  (4, 'Ligne 4 : St Denis Collège <> Clinique Convert/EREA La Chagne', 4, '#90C34C', 4,'/download/kml/4'),
  (5, 'Ligne 5 : St Denis Collège <> St Denis Collège', 5, '#27BDEB', 5,'/download/kml/5'),
  (6, 'Ligne 6 : Viriat Caronniers <> Ainterexpo', 6, '#B17BB1', 6,'/download/kml/6'),
  (7, 'Ligne 7 : Viriat Caronniers <> Carré Amiot', 7, '#F49429', 7,'/download/kml/7'),
  (8, 'Ligne 21 : Peloux Gare <> Sources', 21, '#91C87F', 8,'/download/kml/8');

UNLOCK TABLES;