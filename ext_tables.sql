CREATE TABLE tx_ma_phpinclude_content_model (
   uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
   name varchar(255) DEFAULT '' NOT NULL,
   description text NOT NULL,
   source_path text NOT NULL DEFAULT '/uploads/tx_ma_phpinclude/'
   scriptContent text NOT NULL
);