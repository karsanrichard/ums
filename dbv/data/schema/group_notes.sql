CREATE TABLE `group_notes` (
  `group_notes_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`group_notes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1