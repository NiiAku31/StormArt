-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 12:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StormArt`
-- 

-- --------------------------------------------------------

create table admin(
    id int(10) NOT NULL,
    username varchar(10) NOT NULL,
    password varchar(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO admin(id,username,password) values
(1,'admin','admin');

-- --------------------------------------------------------

create table art_pieces(
    id int(10) NOT NULL,
    pic_no int(10) NOT NULL,
    title varchar(100) NOT NULL,
    artistname varchar(500)  NOT NULL,
    galleryname varchar(500) NOT NULL,
    yearofartpiece varchar(10) NOT NULL,
    description varchar(500) NOT NULL,
    price varchar(50) NOT NULL,
    image text NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;

INSERT INTO art_pieces(id,pic_no,title,artistname,galleryname,yearofartpiece,description,price,image) values
(12,1,'The Rennosance','Leonardo Da Vinci','Isaac Juliens Studio','1883','This was an artpiece created by Leonardo Da Vinci to depict the uprising of the french','275','photo4.jpeg'),
(13,2,'The Scream','Edvard Munch','Hollis Targatt Studio','1923','This was an artpiece created by Jean Piere to depict the problems and fear through art','445','the-scream-by-edvard-munch.jpg'),
(14,3,'Kid See Ghosts','Takashi Murakami','Murakami Institute','2019','This was an artpiece created by Takashi Murakami for an album cover for Kid Cudi','400','photo11.jpg'),
(15,4,'Baby X Pluto','Van Gogh','Van Gogh Museum','1913','Van Gogh created this piece to depict the psychadelic color way of astronauts in the void oflife and space','775','photo12.jpg');

-- --------------------------------------------------------

create table customer(
    id int(10) NOT NULL,
    name varchar(200) NOT NULL,
    mobile varchar(200) NOT NULL,
    address varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    password varchar(200) NOT NULL,
    cpassword varchar(200) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;

INSERT INTO customer(id,name,mobile,address,email,password,cpassword) values
(16,'Nii Kwaku','0244149506','Ben Avenue 220','niikwakuadjei@gmail.com','12345','12345'),
(17,'Bradley Deku','0245549506','Villagio Avenue 220','bradley.deku@ashesi.edu.gh','brad123','brad123'),
(18,'Kwame','02444145048','Trasco Hse.223','kwame123@gmail.com','kwa123','kwa123');

-- --------------------------------------------------------

create table order_to_purchase(
    Id int(10) NOT NULL,
    orderid int(10) NOT NULL,
    userid int(10) NOT NULL,
    title varchar(100) NOT NULL,
    price varchar(50) NOT NULL,
    name  varchar(200) NOT NULL,
    address varchar(200) NOT NULL,
    email varchar(200) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;

INSERT INTO order_to_purchase(Id,orderid,userid,title,price,name,address,email)values
(50,1,16,'Kid See Ghosts','400','Nii Kwaku','Ben Avenue 220','niikwakuadjei@gmail.com'),
(51,2,17, 'The Scream', '445','Bradley Deku','Villagio Avenue 220','bradley.deku@ashesi.edu.gh');

-- --------------------------------------------------------

--
-- Indexes for table `admin`
--
ALTER TABLE admin
  ADD PRIMARY KEY (id);

--
-- Indexes for table `art_pieces`
--

ALTER TABLE art_pieces
    ADD PRIMARY KEY(id),
    ADD UNIQUE KEY pic_no (pic_no);

--
-- Indexes for table `customer`
--
ALTER TABLE customer
  ADD PRIMARY KEY (id);


--
-- Indexes for table `order_to_purchase`
--
ALTER TABLE order_to_purchase
  ADD PRIMARY KEY (Id);


ALTER TABLE admin
    MODIFY id int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT =2;

ALTER TABLE art_pieces
    MODIFY id int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;

ALTER TABLE order_to_purchase
    MODIFY Id int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 50;

ALTER TABLE customer
    MODIFY id int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT =16;

