-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 05:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalcar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
                        `car_id` int(11) NOT NULL,
                        `category_id` int(4) NOT NULL,
                        `image` varchar(1000) NOT NULL,
                        `description` text NOT NULL,
                        `price` decimal(5,2) NOT NULL,
                        `make` varchar(100) NOT NULL,
                        `model` varchar(100) NOT NULL,
                        `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `category_id`, `image`, `description`, `price`, `make`, `model`, `year`) VALUES
                                                                                                           (1, 2, 'https://www.motortrend.com/uploads/sites/10/2018/10/2019-ford-fiesta-s-sedan-angular-front.png', 'The five-seat Fiesta is Ford\'s subcompact car, and it\'s available in sedan and four-door hatchback body styles. Power comes from a 120-horsepower, 1.6-liter four-cylinder engine that pairs with a five-speed manual or six-speed dual-clutch automatic transmission.', '54.99', 'Ford', 'Fiesta', 2019),
                                                                                                           (2, 2, 'https://di-uploads-pod16.dealerinspire.com/toyotaofnorthcharlotte/uploads/2018/02/2018-Toyota-Prius.png', 'This family-friendly 4-door hatchback is America’s best-selling hybrid. Now in its fourth generation, the 2018 Toyota Prius has a well-earned reputation for safety and reliability, plus it continues to deliver industry-leading fuel economy. The 2018 Prius offers radical futuristic styling, a refined interior with room for five and it has earned a Top Safety Pick+ rating from the Insurance Institute for Highway Safety. Seven trim levels are available, all powered by a 1.8-liter internal-combustion engine and a small electric motor, a potent combination that delivers 121 horsepower and over 50 mpg. Prices start around $24,000 and a fully loaded model can creep past $30,000. Built in Japan, the new Prius remains the gold standard in hybrid automobiles. ', '49.99', 'Toyota', 'Prius', 2018),
                                                                                                           (3, 14, 'https://mysterio.yahoo.com/mysterio/api/B0196DBC76CE5B3FE73E9F71C2438F7C7704FBB5E1D293C0D19321601B296195/autoblog/resizefill_w660_h372;quality_80;format_webp;cc_31536000;/https://s.aolcdn.com/commerce/autodata/images/USD00PRC161A021001.jpg', 'Track-ready performance, a driver-focused cabin, and timeless styling cues are only three of the most appealing characteristics of the exciting Porsche 718 Cayman. A true display of unbridled driving bliss, the 718 Cayman is assembled with a mid-engine layout along with rear-wheel drive for a perfected combination of agile handling and athletic acceleration. Featuring your choice of turbocharged 4-cylinders or naturally aspirated inline 6-cylinder engines — the 718 Cayman is perfectly suited to all types of driving styles. Thoroughly modern yet timeless at the same time, its upscale interior has been painstakingly designed to support every action of the driver. Advanced technology infused into the 718 Cayman provides exceptional connectivity and convenience functions to enhance your drive. From twisting canyon roads to smooth downtown boulevards, it’s undeniable that the Porsche 718 Cayman sets the standard for all other sports coupes in its class.', '264.99', 'Porsche', '718 Cayman', 2022),
                                                                                                           (4, 13, 'https://platform.cstatic-images.com/large/in/v2/stock_photos/9d67de52-032b-4a8b-b56c-aed8ce398395/d00ff271-0b10-4c47-823d-933a4f97e8e5.png', 'The 2018 Tesla Model X is an electric-powered SUV that has a need for speed. Trims like the range-topping P100D have the straight-line performance to rival the world’s fastest supercars. When equipped with the optional Ludicrous drive mode, this five-passenger EV needs less than 3.0 seconds to sprint from zero to 60 mph. Technically, there’s room for up to seven onboard with the optional third-row seats, but they’re small and best used only by kids. The cabin features a windshield that sweeps up and over the front seats, for a stunning view ahead. While the large central touchscreen looks futuristic, having every single vehicle function embedded within it can be distracting. The rear upward-swinging “Falcon” doors also make a big impression, though they soon feel gimmicky.', '199.99', 'Tesla', 'Model X', 2018),
                                                                                                           (5, 11, 'https://platform.cstatic-images.com/xlarge/in/v2/stock_photos/dd260bbc-ac46-48ac-94be-1ec7768c87d9/2c34a325-fee4-4db5-96b8-afcdf68e1f61.png', 'The Ford Ranger is a mid-size pickup truck that seats up to five and competes with the Toyota Tacoma, Nissan Frontier and Chevrolet Colorado. Unlike the majority of pickups, the Ranger is offered with only one engine: a 270-horsepower, turbocharged 2.3-liter four-cylinder that works with a 10-speed automatic transmission. Rear- and four-wheel-drive versions are available, and the Ranger is offered in extended-cab and crew-cab form. ', '74.99', 'Ford', 'Ranger XL', 2021),
                                                                                                           (6, 8, 'https://di-uploads-pod14.dealerinspire.com/antiochchryslerdodgejeepram/uploads/2020/10/SE-1.png', '..', '54.99', 'Dodge', 'Grand Caravan', 2020),
                                                                                                           (7, 9, 'https://di-uploads-pod12.dealerinspire.com/landerschryslerdodgejeepramofnorman/uploads/2021/05/2020-Jeep-Compass-MLP-Hero.png', 'Larger than the Jeep Renegade but smaller than the Cherokee, the Compass is sized to fit between the subcompact and compact SUV segments. The current second-generation Compass was introduced for the 2017 model year and wears styling inspired by classic Jeep models. Like other Jeeps the Compass is impressively capable off-road but sacrifices everyday drivability in pursuit of trail performance.', '69.99', 'Jeep', 'Compass', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `car_categories`
--

CREATE TABLE `car_categories` (
                                  `category_id` int(11) NOT NULL,
                                  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_categories`
--

INSERT INTO `car_categories` (`category_id`, `category`) VALUES
                                                             (1, 'Economy'),
                                                             (2, 'Compact'),
                                                             (3, 'Midsize'),
                                                             (4, 'Standard'),
                                                             (5, 'Full-size'),
                                                             (6, 'Premium'),
                                                             (7, 'Luxury'),
                                                             (8, 'Minivan'),
                                                             (9, 'SUV'),
                                                             (10, 'Van'),
                                                             (11, 'Pickup'),
                                                             (12, 'Roadster'),
                                                             (13, 'Electric'),
                                                             (14, 'Sports'),
                                                             (15, 'Convertible'),
                                                             (16, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
                             `customer_id` int(11) NOT NULL,
                             `username` varchar(45) NOT NULL,
                             `password` varchar(255) NOT NULL,
                             `fullname` varchar(45) NOT NULL,
                             `email` varchar(50) NOT NULL,
                             `car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `password`, `fullname`, `email`, `car_id`) VALUES
                                                                                                   (1, 'mcool', '111', 'Matt Cool', 'matt@gmail.com', 4),
                                                                                                   (2, 'scasada', '222', 'Steven Casada', 'steven@gmail.com', 6),
                                                                                                   (3, 'jwinbush', '333', 'Jawon Winbush', 'jawon@gmail.com', 5),
                                                                                                   (4, 'carguy', 'carguy2022', 'Peter Wayne', 'peter@gmaiil.com', 5),
                                                                                                   (5, 'blue', 'blue2022', 'Bruce Parker', 'bruce@gmail.com', 7),
                                                                                                   (6, 'jimmy', 'jimmy2022', 'Jimmy Neutron', 'jneutron@gmail.com', 4),
                                                                                                   (7, 'billygoat', 'billy2022', 'Billy Scotts', 'bscotts@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
                             `inventory_id` int(11) NOT NULL,
                             `car_id` int(11) NOT NULL,
                             `amount` decimal(3,1) NOT NULL,
                             `pickupDate` date NOT NULL,
                             `returnDate` date NOT NULL,
                             `pickupLocation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `car_id`, `amount`, `pickupDate`, `returnDate`, `pickupLocation`) VALUES
                                                                                                               (1, 5, '15.0', '2022-11-08', '2022-11-17', '7800 Col. H. Weir Cook Memorial Dr, Indianapolis, IN 46241'),
                                                                                                               (2, 6, '15.0', '2022-11-08', '2022-11-17', '7800 Col. H. Weir Cook Memorial Dr, Indianapolis, IN 46241');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `fname` varchar(55) NOT NULL,
                         `lname` varchar(55) NOT NULL,
                         `email` varchar(55) NOT NULL,
                         `password` varchar(55) NOT NULL,
                         `isAdmin` varchar(55) NOT NULL,
                         `cart` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `isAdmin`, `cart`) VALUES
    (1, 'Matt', 'Cool', 'coolm@iu.edu', '111', 'yes', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
    ADD PRIMARY KEY (`car_id`),
  ADD KEY `FK_cars_category_id` (`category_id`);

--
-- Indexes for table `car_categories`
--
ALTER TABLE `car_categories`
    ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
    ADD PRIMARY KEY (`customer_id`),
  ADD KEY `FK_customers_car_id` (`car_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
    ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `FK_inventory_car_id` (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
    MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `car_categories`
--
ALTER TABLE `car_categories`
    MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
    MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
    MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
    ADD CONSTRAINT `FK_cars_category_id` FOREIGN KEY (`category_id`) REFERENCES `car_categories` (`category_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
    ADD CONSTRAINT `FK_customers_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
    ADD CONSTRAINT `FK_inventory_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
