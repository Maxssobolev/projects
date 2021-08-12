
-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Ноя 30 2020 г., 11:19
-- Версия сервера: 5.7.32-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `0384_group`
--

-- --------------------------------------------------------

--
-- Структура таблицы `main_posts`
--

CREATE TABLE `main_posts` (
  `id` int(10) NOT NULL,
  `category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main_posts',
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `author` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(12) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `author`) VALUES
(1, 'Инфа про физику', 'В эту пятницу никакой контрольной не будет, но через (примерно) две недели, около 11-го декабря, уже стоит быть готовым.\nФормат такой - каждому будет вариант с парочкой задач и теоретическим вопросом. На работу полтора-два часа, потом отправить в pdf (куда, пока еще не решила препод)', '2020-11-26 02:30:20', 'Максим'),
(2, 'Разбор КР от Коточигова', 'в 12:45 во вторник 1-го декабря, будет разбор кр от Коточигова', '2020-11-26 02:43:20', 'Максим'),
(3, 'КР по Доп. физике', '\"Маленькая контрольная работа по механике\" на следующем доп. занятии по физике\r\n3-го декабря', '2020-11-26 19:47:00', 'Максим'),
(4, 'Итоги теста по МА', 'https://vk.com/doc247398975_580431959?hash=ae1de241548b67fd82&dl=09e4741673fdca165e\n\nДля тех, кто не нашел себя или стоит \"ЛК\" актуально ДЗ по МА, сочувствую ', '2020-11-27 00:01:00', 'Максим');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `new`) VALUES
(1, 'Программирование', 0),
(2, 'Информатика', 0),
(3, 'Физика', 0),
(4, 'Мат. анализ', 0),
(5, 'АиГ', 0),
(6, 'Философия', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_homework`
--

CREATE TABLE `subjects_homework` (
  `id` int(11) NOT NULL,
  `subject_id` int(12) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects_homework`
--

INSERT INTO `subjects_homework` (`id`, `subject_id`, `title`, `content`, `date`, `deadline`) VALUES
(3, 5, 'Матрицы', 'Вариант в зависимости от порядкового номера\nhttps://drive.google.com/file/d/1dZwQReEJtesrl3qQXEwi01kj8WXOGp33/view?usp=sharing', '2020-11-23 10:00:00', '2020-11-30 10:00:00'),
(4, 5, 'Системы', 'Вариант в зависимости от порядкового номера\r\nhttps://drive.google.com/file/d/1c_HRb1BGDBLMp_pC8-EKKXZxDa-AAXN_/view?usp=sharing', '2020-11-23 10:00:00', '2020-12-07 10:00:00'),
(5, 6, 'Семинар 11', 'М. Сэндел. Сппаведливость. Как поступать правильно. Глава 2. Глава 3. Глава 6.', '2020-11-23 19:15:00', '2020-11-30 15:40:00'),
(6, 4, 'Допсдача теста', 'Файл содержит индивидуальное задание теста 20_11 для каждого студента потока.\r\n\r\nНа почту групп высланы файлы с оценками работ, которые я смог прочесть.\r\n\r\nПометка \"лк\" означает, что я не смог вытащить работу из личного кабинета.\r\n\r\nВсем, кто не получил оценку я предлагаю, оформить (очень кратко) и \r\n\r\nприслать  мне ответ  ( в мудл)  до 5 декабря.\r\n\r\nРабота должна быть оформлена одним ПДФ файлом.\r\n\r\nВ начале файла должны  быть написаны Ваша фамилия, группа, вариант.\r\n\r\nОтветы на каждый вопрос или  задачу должен быть четко отделен. \r\n\r\nhttps://vec.etu.ru/moodle/pluginfile.php/159826/mod_assign/introattachment/0/%D1%83%D1%81%D0%BB%D0%BE%D0%B2%D0%B8%D1%8F%2020_11_20.pdf?forcedownload=1', '2020-11-25 11:00:00', '2020-12-05 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_lectories`
--

CREATE TABLE `subjects_lectories` (
  `id` int(11) NOT NULL,
  `subject_id` int(12) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects_lectories`
--

INSERT INTO `subjects_lectories` (`id`, `subject_id`, `title`, `content`, `type`, `date`) VALUES
(6, 6, 'презентация \"Познание\"', 'https://mega.nz/file/ir5EVYaI#EwRn9-vdMNH4f1dpNEeuYd9v1EsuAfod6aA5FVjDJPU', 'link', '2020-11-26 16:00:00'),
(7, 1, 'лекция №1', 'n_0tuaAnboM', 'youtube', '2020-09-28 09:00:00'),
(8, 1, 'Введение в Linux', 'fVQyEtBnRvs', 'youtube', '2020-10-06 00:00:00'),
(9, 1, 'О заголовочных файлах', 'https://drive.google.com/file/d/1Yyu2eaGCjRHRQVu8rS2GMo-82mE1GUpg/preview', 'frame', '2020-10-29 10:00:00'),
(10, 6, 'презентация \"Сознание\"', 'https://mega.nz/file/Dn5SgCiZ#8azpFlOHeWZncaTqteU57Im1FDSmVTgxQWYFtbqRg88', 'link', '2020-11-12 16:00:00'),
(11, 2, 'Мастер класс №1', 'vrCtWGPnqjo', 'youtube', '2020-09-23 09:00:00'),
(12, 2, 'Введение в Python (продолжение)', 'C5bEeODiBg4', 'youtube', '2020-09-29 07:00:00'),
(13, 2, 'Мастер класс №2', 'AKBJfw3PtMs', 'youtube', '2020-09-30 00:00:00'),
(14, 2, 'Интерактив по Python от Т.А. Берленко', 'JEi59GuxFXk', 'youtube', '2020-10-07 00:00:00'),
(15, 2, 'Лекция №3. Введение в Python (завершение) ', 'oNXEc4TH-3s', 'youtube', '2020-10-09 00:00:00'),
(16, 2, 'Лекция №5. Использование PyCharm, отладка', '2wFestfpm08', 'youtube', '2020-10-14 00:00:00'),
(17, 2, 'Лекция №2. Введение в Python (продолжение)', 'C5bEeODiBg4', 'youtube', '2020-09-29 00:00:00'),
(18, 2, 'Лекция №6. Введение в Архитектуру ЭВМ (начало) ', 'lcOaTB3fwF8', 'youtube', '2020-10-21 00:00:00'),
(19, 2, 'Лекция №9. Пример для Машины Тьюринга. Введение в ООП ', 'vDTEm1lrv38', 'youtube', '2020-11-11 00:00:00'),
(20, 2, 'Дополнтиельное занятие по форматам представления данных в памяти компьютера ', 'kjID0RzYbuE', 'youtube', '2020-11-13 00:00:00'),
(21, 2, 'Дополнтиельное занятие по форматам представления данных в памяти компьютера ', 'KuEhmo4Re2A', 'youtube', '2020-11-14 00:00:00'),
(26, 3, 'Криволинейное движение доп.', 'lTwTM4_XONc', 'youtube', '2020-11-26 03:00:00'),
(27, 3, 'Криволинейное движение', '8z90rr9QsxQ', 'youtube', '2020-11-26 00:00:00'),
(28, 5, 'Комлпексные числа', '91MyDR9gzus', 'youtube', '2020-10-21 00:00:00'),
(29, 4, 'Производные сложных функций', 'w9JERzG8CgM', 'youtube', '2020-10-20 00:00:00'),
(30, 1, 'Как же сделать pull  request', 'D4mW-86-Tp0', 'youtube', '1900-01-01 00:00:00'),
(31, 2, 'Как же сделать pull  request', 'D4mW-86-Tp0', 'youtube', '1900-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_links`
--

CREATE TABLE `subjects_links` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects_links`
--

INSERT INTO `subjects_links` (`id`, `subject_id`, `title`, `href`) VALUES
(1, 1, 'MOEVM WIKI', 'http://se.moevm.info/doku.php');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `subject_id` int(12) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `subject_id`, `name`, `contact`) VALUES
(3, 2, 'Шевская Наталья Владимировна', 'natalya.razmochaeva@moevm.info'),
(4, 1, 'Чайка Константин Владимирович', 'konstantin.chaika@moevm.info'),
(5, 1, 'Жангиров Тимур Рафаилович', 'ksenox94@gmail.com'),
(6, 5, 'Чирина Анна Владимировна', 'annatchirina@yandex.ru'),
(7, 4, 'Коточигов Александр Михайлович', 'amkotochigov@gmail.com'),
(8, 4, 'Коптелов Ярослав Юрьевич', 'kopya239@yandex.ru'),
(9, 3, 'Кузьмина Наталья Николаевна', 'nnkuzmina@etu.ru'),
(10, 3, 'Шишкина Марина Николаевна', 'mnshishkina@etu.ru'),
(11, 3, 'Шаталова Александра Борисовна', 'ashatalova1@gmail.com'),
(12, 6, 'Пономарёв Андрей Игоревич', 'andre.ponomarov@gmail.com'),
(13, 6, 'Федоров Роман Валентинович ', 'rvfedorov@etu.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `weekday` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flags` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `weekday`, `start`, `name`, `link`, `flags`) VALUES
(1, 'Thu', '11:35', 'Философия (нч) / Аиг (ч)', 'https://zoom.us/j/91535868512?pwd=Sm41eXEzZlMwZjVqRGwzT1U1OUJVdz09#success', ''),
(2, 'Thu', '13:45', 'АиГ', 'https://vec.etu.ru/moodle/course/view.php?id=2448#section-4', ''),
(3, 'Thu', '17:20', 'Доп. Физика (Кузьмина)', 'https://zoom.us/j/97252996319?pwd=YTloQm1ETGlnbW16NlFuK2x4S2d6dz09', ''),
(5, 'Mon', '11:35', 'Программирование', 'https://zoom.us/j/99909419865?pwd=ZXFpWFVwUzlmbkxMWFU3RXE2ZEdqdz09', ''),
(6, 'Mon', '13:45', 'Физкультура', '', ''),
(7, 'Mon', '15:40', 'Философия семинар', '', ''),
(8, 'Mon', '17:20', 'Программирование лаб.', '', ''),
(9, 'Tue', '13:45', 'Ин. яз.', '', ''),
(10, 'Tue', '15:40', 'Информатика лаб.', '', ''),
(11, 'Tue', '17:20', 'Мат. Анализ пр.', 'https://us04web.zoom.us/j/5312301415?pwd=NmNGcHpoeG53Wldwb2xuSHVEY3lUUT09', ''),
(12, 'Wed', '13:45', 'Информатика', 'https://zoom.us/j/98397563419?pwd=ckVteUx5ZHRNcFB6NFlzeWg2REYrUT09', ''),
(13, 'Wed', '15:40', 'АиГ пр.', 'https://us04web.zoom.us/j/9927609261?pwd=Y2VBLyt4U3poR1E5L0ZQS0hyS1JSQT09', ''),
(14, 'Fri', '9:40', 'Доп. Мат. (Сучков)', 'https://vec.etu.ru/moodle/mod/bigbluebuttonbn/view.php?id=22167', ''),
(15, 'Fri', '11:35', 'Доп. Мат. (Сучков)', 'https://vec.etu.ru/moodle/mod/bigbluebuttonbn/view.php?id=22167', ''),
(18, 'Fri', '13:45', 'Физкультура', '', ''),
(19, 'Fri', '15:40', 'Мат. Анализ', 'https://us04web.zoom.us/j/5312301415?pwd=NmNGcHpoeG53Wldwb2xuSHVEY3lUUT09', ''),
(21, 'Fri', '17:20', 'ФизикаФиз. пр (нч) / Физ. лаб. (ч)', '', ''),
(22, 'Sat', '', '', '', 'weekend'),
(23, 'Sun', '', '', '', 'weekend'),
(27, 'Thu', '18:50', 'Доп-Доп Физика', 'https://zoom.us/j/97252996319?pwd=YTloQm1ETGlnbW16NlFuK2x4S2d6dz09#success', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `main_posts`
--
ALTER TABLE `main_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects_homework`
--
ALTER TABLE `subjects_homework`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects_lectories`
--
ALTER TABLE `subjects_lectories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects_links`
--
ALTER TABLE `subjects_links`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `main_posts`
--
ALTER TABLE `main_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `subjects_homework`
--
ALTER TABLE `subjects_homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `subjects_lectories`
--
ALTER TABLE `subjects_lectories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `subjects_links`
--
ALTER TABLE `subjects_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
