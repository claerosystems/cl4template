<?php defined('SYSPATH') or die ('No direct script access.');

/**
 * This model was created using Claero_ORM and should provide 
 * standard Kohana ORM features in additon to cl4 specific features.
 */

class Model_AuthLog extends Claero_ORM {

	protected $_db = 'default'; // or any group in database configuration
	protected $_table_names_plural = false;
	protected $_table_name = 'auth_log';
	protected $_table_name_display = 'Auth Log';
	protected $_primary_key = 'id'; // default: id
	protected $_primary_val = 'name'; // default: name (column used as primary value)
	// see http://v3.kohanaphp.com/guide/api/Database_MySQL#list_columns for all possible column attributes

	// column definitions
	protected $_table_columns = array(
		'id' => array(
			'type' => 'int',
			'min' => '-2147483648',
			'max' => '2147483647',
			'column_name' => 'id',
			'column_default' => null,
			'data_type' => 'int',
			'is_nullable' => false,
			'ordinal_position' => 1,
			'display' => '11',
			'comment' => '',
			'extra' => 'auto_increment',
			'key' => 'PRI',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'hidden',
			'display_order' => 1,
			'display_flag' => 0,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'user_id' => array(
			'type' => 'int',
			'min' => '-2147483648',
			'max' => '2147483647',
			'column_name' => 'user_id',
			'column_default' => null,
			'data_type' => 'int',
			'is_nullable' => false,
			'ordinal_position' => 2,
			'display' => '11',
			'comment' => '',
			'extra' => '',
			'key' => 'MUL',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'select',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'username' => array(
			'type' => 'string',
			'column_name' => 'username',
			'column_default' => null,
			'data_type' => 'varchar',
			'is_nullable' => false,
			'ordinal_position' => 3,
			'character_maximum_length' => '30',
			'collation_name' => 'utf8_general_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'text',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'access_time' => array(
			'type' => 'string',
			'column_name' => 'access_time',
			'column_default' => null,
			'data_type' => 'datetime',
			'is_nullable' => false,
			'ordinal_position' => 4,
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'text',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'auth_type_id' => array(
			'type' => 'int',
			'min' => '-2147483648',
			'max' => '2147483647',
			'column_name' => 'auth_type_id',
			'column_default' => null,
			'data_type' => 'int',
			'is_nullable' => false,
			'ordinal_position' => 5,
			'display' => '11',
			'comment' => '',
			'extra' => '',
			'key' => 'MUL',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'select',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => array('1' => 'source data in model test1', '2' => 'source data in model test2'),
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'browser' => array(
			'type' => 'string',
			'column_name' => 'browser',
			'column_default' => null,
			'data_type' => 'varchar',
			'is_nullable' => false,
			'ordinal_position' => 6,
			'character_maximum_length' => '255',
			'collation_name' => 'utf8_general_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'text',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'ip_address' => array(
			'type' => 'string',
			'column_name' => 'ip_address',
			'column_default' => null,
			'data_type' => 'varchar',
			'is_nullable' => false,
			'ordinal_position' => 7,
			'character_maximum_length' => '15',
			'collation_name' => 'utf8_general_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			'field_type' => 'text',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
	);

	// column labels
	protected $_labels = array(
		'id' => 'Id',
		'user_id' => 'User Id',
		'username' => 'Username',
		'access_time' => 'Access Time',
		'auth_type_id' => 'Auth Type Id',
		'browser' => 'Browser',
		'ip_address' => 'Ip Address',
	);

	// relationships
	protected $_has_one = array(
		'authtype' => array('foreign_key' => 'auth_type_id'),
		'user' => array('foreign_key' => 'user_id', 'name_sql' => 'username')
	);
	protected $_has_many = array();
	protected $_belongs_to = array();

	// validation rules
	protected $_rules = array(
	);
} // class
