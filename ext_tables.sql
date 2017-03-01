#
# Table structure for table 'tx_wfqbe_domain_model_credential'
#
CREATE TABLE tx_wfqbe_domain_model_credential (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	host varchar(255) DEFAULT '' NOT NULL,
	dbms int(11) DEFAULT '0' NOT NULL,
	username varchar(255) DEFAULT '' NOT NULL,
	passw varchar(255) DEFAULT '' NOT NULL,
	conn_type int(11) DEFAULT '0' NOT NULL,
	setdbinit varchar(255) DEFAULT '' NOT NULL,
	dbname varchar(255) DEFAULT '' NOT NULL,
	connection_mode int(11) DEFAULT '0' NOT NULL,
	connection_uri varchar(255) DEFAULT '' NOT NULL,
	connection_localconf varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),

 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_wfqbe_domain_model_query'
#
CREATE TABLE tx_wfqbe_domain_model_query (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	query text NOT NULL,
	dbname varchar(255) DEFAULT '' NOT NULL,
	search text NOT NULL,
	insertq text NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	fe_group int(11) unsigned DEFAULT '0' NOT NULL,
	credentials int(11) unsigned DEFAULT '0',
	searchinquery int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),

 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_wfqbe_domain_model_backend'
#
CREATE TABLE tx_wfqbe_domain_model_backend (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	recordsforpage varchar(255) DEFAULT '' NOT NULL,
	searchq_position int(11) DEFAULT '0' NOT NULL,
	typoscript text NOT NULL,
	export_mode int(11) DEFAULT '0' NOT NULL,
	listq int(11) unsigned DEFAULT '0',
	detailsq int(11) unsigned DEFAULT '0' NOT NULL,
	searchq int(11) unsigned DEFAULT '0',
	insertq int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),

 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_wfqbe_query_frontendusergroup_mm'
#
CREATE TABLE tx_wfqbe_query_frontendusergroup_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_wfqbe_backend_detailsq_query_mm'
#
CREATE TABLE tx_wfqbe_backend_detailsq_query_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
