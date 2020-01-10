<?php

/*Написать запросы на создание двух таблиц для будущего интернет-магазина. Нужно создать таблицы categories и products.
Сделать поле id первичным ключом и с автоинкрементом.
Таблица products должна содержать поле для связи с таблицей categories.
Написать запросы для вставки нескольких записей в обе таблицы. (Добавить записи в обе таблицы)
Написать запрос на выборку данных из таблицы categories (получить список категорий) с ограничением количества результатов.
Написать запрос на выборку данных из таблицы products (получить список продуктов) с фильтрацией по id категории и ограничением количества результатов.
Написать запрос на выборку products с присоединением таблицы categories. В результате должны быть поля из products и название категории, к которой принадлежит каждый товар
Написать запрос на выборку всех категорий с присоединением поля с подсчётом количества товаров в каждой категории.*/

1)
CREATE TABLE categories (
    `id` INT NOT NULL,
`name` VARCHAR (255)
)

CREATE TABLE products (
    `prod_id` INT NOT NULL,
`name` VARCHAR (255)
)

2)
ALTER TABLE `products`
ADD PRIMARY KEY(`prod_id`)

ALTER TABLE `products`
MODIFY COLUMN `prod_id` INT NOT NULL AUTO_INCREMENT

ALTER TABLE `categories`
ADD PRIMARY KEY(`id`)

ALTER TABLE `categories`
MODIFY COLUMN `id` INT NOT NULL AUTO_INCREMENT

3)
ALTER TABLE `products`
ADD `categories` INT NOT NULL

4)
INSERT INTO `categories`
VALUES(1,'Сад та город');
INSERT INTO `categories`
VALUES(2,'Інструменти');
INSERT INTO `categories`
VALUES(3,'Електротехніка');
INSERT INTO `categories`
VALUES(4,'Вироби з металу');
INSERT INTO `categories`
VALUES(5,'Декор');
INSERT INTO `categories`
VALUES(6,'Покриття для підлоги');
INSERT INTO `categories`
VALUES(7,'Сантехніка');
INSERT INTO `categories`
VALUES(8,'Вироби з дерева');
INSERT INTO `categories`
VALUES(9,'Будівельні матеріали');
INSERT INTO `categories`
VALUES(10,'Деко');

INSERT INTO `products`
VALUES(1,'Лампочка',3);
INSERT INTO `products`
VALUES(2,'Плитка для підлоги',6);
INSERT INTO `products`
VALUES(3,'Змішувач',7);
INSERT INTO `products`
VALUES(4,'Лопата',1);
INSERT INTO `products`
VALUES(5,'Молоток',2);
INSERT INTO `products`
VALUES(6,'Тарілка',10);
INSERT INTO `products`
VALUES(7,'Шуруп',4);
INSERT INTO `products`
VALUES(8,'Двері',8);
INSERT INTO `products`
VALUES(9,'Шпалери',5);
INSERT INTO `products`
VALUES(10,'Шпаклівка',9);

5)
SELECT * FROM `categories`
LIMIT 9

6)
SELECT * FROM `products`
WHERE `categories` = 1
LIMIT 3

7)
SELECT `products`.*,`categories`.`name`
FROM `products`
LEFT JOIN `categories`
ON `categories`.`id`=`products`.`categories`

8)
SELECT `categories`.*,COUNT(`products`.`prod_id`) AS products
FROM `categories`
LEFT JOIN `products`
ON `products`.`categories`=`categories`.`id`
GROUP BY `categories`.`id`