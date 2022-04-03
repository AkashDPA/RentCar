
--
-- Database: `car_rental_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vehicle_id`, `start_date`, `no_of_days`) VALUES
(1, 2, 2, '2022-04-19', 2),
(2, 2, 3, '2022-04-13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role_id` tinyint(4) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role_id`) VALUES
(1, 'Shree Car Agency', 'agency@gmail.com', '$2y$10$IxYzD.Z69h3Qb6ZgY27JUOEOnfoFxBlNkWU.EVvP3WyFOQmFgL29e', 1),
(2, 'Akash Pathade', 'user@gmail.com', '$2y$10$cJzN6JdLu5hM8IEDuNj3iefrowryXNJ7/6cps6xF5y9XatPypFY6G', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `seating_capacity` tinyint(4) NOT NULL,
  `rent_per_day` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `agency_id` int(11) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `model`, `number`, `seating_capacity`, `rent_per_day`, `photo`, `agency_id`) VALUES
(1, 'Range Rover', 'MH 02 AK 1212', 4, 2500, '32a45309b8575f47fec628d48a7c8ef9.jpg', 1),
(2, 'Mercedes Grand Sedan', 'GJ 01 MG 1234', 2, 2999, 'b26dccfe1f2bf606e0c8898441120eb7.jpg', 1),
(3, 'Mercedes Benz', 'KA 12 MM 3322', 4, 1999, '4d5a9bc975d7d721149c882d1cb2efb3.jpg', 1),
(4, 'Audi Q3', 'TN 02 AR 1112', 4, 1700, 'ce55d40a15d8ef6bec3363c290f3b37b.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
