#
# Table structure for table 'tx_wfqbe_credentials'
#
CREATE TABLE tx_wfqbe_credentials (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	host tinytext NOT NULL,
	dbms varchar(8) DEFAULT '' NOT NULL,
	username tinytext NOT NULL,
	passw tinytext NOT NULL,
	conn_type varchar(8) DEFAULT '' NOT NULL,
	setdbinit text NOT NULL,
	dbname tinytext NOT NULL,
	type varchar(20) DEFAULT '0' NOT NULL,
	connection_uri varchar(80) DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_wfqbe_query'
#
CREATE TABLE tx_wfqbe_query (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	fe_group int(11) DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	description text NOT NULL,
	query text NOT NULL,
	credentials int(11) DEFAULT '0' NOT NULL,
	dbname tinytext NOT NULL,
	search text NOT NULL,
	insertq text NOT NULL,
	type varchar(20) DEFAULT '0' NOT NULL,
	searchinquery int(11) DEFAULT '0' NOT NULL,
		
	PRIMARY KEY (uid),
	KEY parent (pid)
);