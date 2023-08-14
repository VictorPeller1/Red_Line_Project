INSERT INTO category (id_category, category_name) VALUES (1, 'yokai'), (2, 'kami');
INSERT INTO validation (id_validation, validation_state, validation_date)
VALUES (1, false, NOW()), (2, true, NOW());


INSERT INTO article (article_title, article_content, article_date, article_img, id_category, id_validation)
VALUES ('Kappa', 'Description du Kappa', '', 'https://contactjeunespageslaw.files.wordpress.com/2020/11/kappa.png', 1, 2),
       ('Tengu', 'Description d un Tengu', '', 'https://www.pathfinder-fr.org/Wiki/GetFile.aspx?Page=Parties.P104%20Tengu&File=tengu.jpg', 1, 2),
       ('Nekomata', 'Description d un Nekomata', '', 'https://upload.wikimedia.org/wikipedia/commons/b/b7/Suuhi_Nekomata.jpg', 1, 2),
       ('Umi Bosu', 'Description d un Umi Bosu', '', 'https://upload.wikimedia.org/wikipedia/commons/6/69/Kuwana_-_The_sailor_Tokuso_and_the_sea_monster.jpg', 1, 2),
       ('Nukekubi', 'Description d un Nukekubi', '', 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Suushi_Nukekubi.jpg', 1, 2),
       ('Kasha', 'Description d un Kasha', '', 'https://upload.wikimedia.org/wikipedia/commons/0/00/SekienKasha.jpg', 1, 2),
       ('Tengu', 'Description d un Tengu', '', 'https://www.pathfinder-fr.org/Wiki/GetFile.aspx?Page=Parties.P104%20Tengu&File=tengu.jpg', 1, 2),
       ('Tengu', 'Description d un Tengu', '', 'https://www.pathfinder-fr.org/Wiki/GetFile.aspx?Page=Parties.P104%20Tengu&File=tengu.jpg', 1, 2),
       ('Tengu', 'Description d un Tengu', '', 'https://www.pathfinder-fr.org/Wiki/GetFile.aspx?Page=Parties.P104%20Tengu&File=tengu.jpg', 1, 2),
       ('Tengu', 'Description d un Tengu', '', 'https://www.pathfinder-fr.org/Wiki/GetFile.aspx?Page=Parties.P104%20Tengu&File=tengu.jpg', 1, 2),
       ('Amaterasu', 'Description d Amaterasu', '', 'https://www.lejapondemax.com/uploads/1/0/3/7/103751148/amaterasu_1_orig.jpg', 2, 2),
       ('Hachiman', 'Description d Hachiman', '', 'https://upload.wikimedia.org/wikipedia/commons/2/22/S%C5%8Dgy%C5%8D_Hachiman.jpg', 2, 2),
       ('Susanoo', 'Description de Susano', '','https://upload.wikimedia.org/wikipedia/commons/4/4b/11.36845-Utagawa_Kuniteru_I-Museum_of_Fine_Art_Boston.jpg', 2, 2),
       ('Tsukuyomi', 'Description de Tsukoyomi', '', 'https://upload.wikimedia.org/wikipedia/commons/8/88/Shinto-Tsukuyomi-no-Mikoto-Old-Artwork.png', 2, 2),
       ('Izanagi', 'Description d Izanagi', '', 'https://upload.wikimedia.org/wikipedia/commons/8/84/Kobayashi_Izanami_and_Izanagi.jpg', 2, 2),
       ('Izanami', 'Description d Izanami', '', 'https://i.servimg.com/u/f44/12/54/80/72/izana10.jpg', 2, 2),
       ('Hachiman', 'Description d Hachiman', '', 'https://upload.wikimedia.org/wikipedia/commons/2/22/S%C5%8Dgy%C5%8D_Hachiman.jpg', 2, 2),
       ('Hachiman', 'Description d Hachiman', '', 'https://upload.wikimedia.org/wikipedia/commons/2/22/S%C5%8Dgy%C5%8D_Hachiman.jpg', 2, 2),
       ('Hachiman', 'Description d Hachiman', '', 'https://upload.wikimedia.org/wikipedia/commons/2/22/S%C5%8Dgy%C5%8D_Hachiman.jpg', 2, 2),
       ('Hachiman', 'Description d Hachiman', '', 'https://upload.wikimedia.org/wikipedia/commons/2/22/S%C5%8Dgy%C5%8D_Hachiman.jpg', 2, 2);

