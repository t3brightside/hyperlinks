CREATE TABLE tt_content (
	tx_hyperlinks int(11) DEFAULT '0' NOT NULL,
);

CREATE TABLE tx_hyperlinks_domain_model_hyperlink (
	text tinytext,
	link text,
	selected_categories int(11) DEFAULT '0' NOT NULL,
	tt_content int(11) DEFAULT '0' NOT NULL,
	KEY parent (pid,sorting),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (sys_language_uid)
);

CREATE TABLE tx_hyperlinks_mm (
    uid_local int(11) DEFAULT '0' NOT NULL,
    uid_foreign int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    sorting_foreign int(11) DEFAULT '0' NOT NULL,
	tablenames varchar(255) DEFAULT '' NOT NULL,
	fieldname varchar(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (uid_local, uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
