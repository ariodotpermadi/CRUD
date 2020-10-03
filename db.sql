CREATE DATABASE `mock`;

CREATE TABLE `mock_table`(
`id` int(20) NOT NULL,
`participant_name` varchar(50) NOT NULL, 
`side_id` varchar(50) NOT NULL,
`study_id` varchar(15) NOT NULL,
`country_id` int(15) NOT NULL, 
`country` varchar(11) NOT NULL,
`document` varchar(15)NOT NULL,
`quiz_completion` varchar(11) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=latin1;


ALTER TABLE `mock_table`
ADD PRIMARY KEY (`id`);

ALTER TABLE `mock_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
commit ; 