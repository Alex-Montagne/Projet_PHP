CREATE DATABASE IF NOT EXISTS `blog`;
USE `blog`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(255) NOT NULL,
    `mail` varchar(255) unique NOT NULL,
    `mdp` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `posts`(
    `id_post` int(11) NOT NULL AUTO_INCREMENT,
    `id_auteur` int(11) NOT NULL,
    `auteur` varchar(255) NOT NULL,
    `date_heure` datetime NOT NULL,
    PRIMARY KEY (`id_post`),
    FOREIGN KEY (`ìd_auteur`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;