CREATE TABLE IF NOT EXISTS `outage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `first` time NOT NULL,
  `last` time NOT NULL,
  `duration` float(3,2) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `planned` varchar(25) NOT NULL,
  `times` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `outage` (`id`, `date`, `first`, `last`, `duration`, 'reason', 'planned', 'times') VALUES
(1, '2015-06-10', '10:04', '15:38', 5.5, 'maintanence', 'planned', '2015-06-10 20:31:04''),
(2, '2015-07-04', '8:46', '9:29', 2.5, 'repair', 'unplanned', '2015-07-04 11:31:04');
