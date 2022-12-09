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
                                                                                                           (7, 9, 'https://di-uploads-pod12.dealerinspire.com/landerschryslerdodgejeepramofnorman/uploads/2021/05/2020-Jeep-Compass-MLP-Hero.png', 'Larger than the Jeep Renegade but smaller than the Cherokee, the Compass is sized to fit between the subcompact and compact SUV segments. The current second-generation Compass was introduced for the 2017 model year and wears styling inspired by classic Jeep models. Like other Jeeps the Compass is impressively capable off-road but sacrifices everyday drivability in pursuit of trail performance.', '69.99', 'Jeep', 'Compass', 2021),
                                                                                                           (8, 9, 'https://mysterio.yahoo.com/mysterio/api/E4C727DAB03011E6F0E98CDBF7B7232923C186F2DFBB4F4C28CD492B20184F73/autoblog/resizefill_w660_h372;quality_80;format_webp;cc_31536000;/https://s.aolcdn.com/commerce/autodata/images/USD20ACS112B021001.jpg', 'The redesigned 2022 MDX houses a 290-HP81 V-6 engine paired to a double-wishbone front suspension for precision cornering. For even more exhilaration, the MDX Type S features an available 355-hp Turbo V6 engine and available air suspension that thrills with every drive. Handling is further enhanced by the Integrated Dynamics System, including a new Lift mode for Type S, while available wider 21-in alloy wheels ensure adrenaline-inducing performance.', '69.99', 'Acura', 'MDX', 2022),
                                                                                                           (9, 14, 'https://mysterio.yahoo.com/mysterio/api/7B4193431C7AEFD877786537FE08B4EE3CBEFFD63F1BDDD7DD9D31B09684DFDF/autoblog/resizefill_w660_h372;quality_80;format_webp;cc_31536000;/https://s.aolcdn.com/commerce/autodata/images/CAD00TOC361A021001.jpg', 'Shift it up a notch with the 2023 Toyota GR Supra. This sleek, powerful sports car comes in a variety of eye-catching colors and is built for performance.', '69.99', 'Toyota', 'Supra', 2020),
                                                                                                           (10, 3, 'https://s7d1.scene7.com/is/image/scom/PAG_K1X_360e_030-1?$750p$', 'With eye-catching new exterior styling, Symmetrical All-Wheel Drive, and a spacious, comfortable interior, the 2023 Legacy is the world''s leading midsize sedan.', '84.99', 'Subaru', 'Legacy', 2023),
                                                                                                           (11, 11, 'https://www.cars.com/i/large/in/v2/stock_photos/b11d8da4-bb90-4b76-ab5c-43b9d70de449/01d3af82-f6de-4f67-a7e2-db1669994a4a.png', 'The 2021 Jeep Gladiator is a mid-size crew-cab pickup truck with room for up to five people. Its standard engine is a 285-horsepower, 3.6-liter V-6 that works with a six-speed manual or eight-speed automatic transmission. The newly available turbo-diesel V-6, meanwhile, teams with an eight-speed automatic.', '69.99', 'Jeep', 'Gladiator', 2021),
                                                                                                           (12, 12, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT2fDjmkSxdCkXFnjRqWaDaBm6yKjapHMLCXM9YMtPUB-06__E1', 'The 2022 Ford Mustang features next-level performance with 5 impressive engines to choose from including the first EcoBoost® engine powered by Ford Performance.', '109.99', 'Ford', 'Mustang', 2022),
                                                                                                           (13, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToL_YURiU0fXutJxH8lAGiWX6OM31gZ_57AWNXqrr5UctBaRz4', 'The Mazda3 2.5 Turbo Sedan with Premium Plus Package enables you to enjoy a new form of indulgence. Its leather-trimmed interior and aluminum speaker grilles have been crafted to visually represent the crisp sounds and brilliant clarity of our bespoke Bose® 12-speaker audio system.', '64.99', 'Mazda', '3', 2021),
                                                                                                           (14, 9, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTs3uuvpX5RItowTORpFSiHibJYOtQomdwhmOwAXY9YiVQSC3ir', 'Big, comfy, classy — and impressively loaded with technology and luxury touches for less money than you’d expect — the new 2020 Kia Telluride is a triumph.', '59.99', 'Kia', 'Telluride', 2020),
                                                                                                           (15, 13, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRSuc8NzvgGVd74BBlcCO1lLzsj1ANhCJHI0QbUQ8O_1OdmPwgt', 'Skip the gas station and enjoy the convenience of charging at home and on the go. The Dual Level Charge Cord allows you to charge from the comfort of your own home. Conveniently charge on your time from the grocery store, work, the gym and more. Plus, the myChevrolet Mobile App with Energy Assist*, makes charging your electric car quick and easy.', '94.99', 'Chevy', 'Bolt EUV', 2022),
                                                                                                           (16, 10, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSf21OYwpqpIuY4jborAF_TMx2sanquplJ2pkjj0YMpx9uMRsQr', 'The 2020 Nissan NV200 is a basic compact van with a small footprint and an affordable price. Best for companies on tight budgets, the NV200 may not be as large or as sophisticated as the Ford Transit Connect, Mercedes-Benz Metris or Ram ProMaster City, but it can still haul 122.7 cubic feet of cargo and up to 1,480 pounds of payload for less than $24,000.', '69.99', 'Nissan', 'NV200', 2020),
                                                                                                           (17, 7, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQk4aYVjK3JhPYrmDnhW2HINS6xSz9SzyLm7pmXRdOZdNQwvK2U', 'The S-Class has long been the best-seller among large luxury sedans, and Mercedes-Benz is introducing a fully redesigned seventh-generation model for 2021. to the 2021 S-Class will compete against segment contenders including the BMW 7 Series, Audi A8, Lexus LS, Genesis G90, and Tesla Model S.', '99.99', 'Mercedes-Benz', 'S-Class', 2021),
                                                                                                           (18, 16, 'https://www.model-space.com/blog/wp-content/uploads/2019/11/vw-samba-history-1.jpg', 'Known officially as the Volkswagen Type 2 (the Beetle was the Type 1) or the Transporter, the bus was a favorite mode of transportation for hippies in the U.S. during the 1960s and became an icon of the American counterculture movement.', '79.99', 'Volkswagen', 'Transporter', 1967);


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
