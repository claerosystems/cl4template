<?php defined('SYSPATH') or die ('No direct script access.');

/**
 * This model was created using Claero_ORM and should provide
 * standard Kohana ORM features in additon to cl4 specific features.
 */

class Model_Cl4BlogPost extends Claero_ORM {

	protected $_db = 'default'; // or any group in database configuration
	protected $_table_names_plural = FALSE;
	protected $_table_name = 'cl4_blog_post';
	protected $_primary_key = 'id'; // default: id
	protected $_primary_val = 'name'; // default: name (column used as primary value)

	// column labels
	protected $_labels = array(
		'id' => 'Id',
		'cl4_blog_person_id' => 'Blog Author',
		'title' => 'Title',
		'post' => 'Post',
		'publish_flag' => 'Publish Flag',
		'publish_start_time' => 'Publish Start',
		'publish_end_time' => 'Publish End',
		'filename' => 'File',
		'filename_original' => 'Original Filename',
	);

	public $_table_name_display = 'Blog Post';

	// column definitions
	protected $_table_columns = array(
		'id' => array(
			'type' => 'int',
			'min' => '-2147483648',
			'max' => '2147483647',
			'column_name' => 'id',
			'column_default' => null,
			'data_type' => 'int',
			'is_nullable' => FALSE,
			'ordinal_position' => 1,
			'display' => '11',
			'comment' => '',
			'extra' => 'auto_increment',
			'key' => 'PRI',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'hidden',
			'display_order' => 1,
			'display_flag' => 0,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'cl4_blog_person_id' => array(
			'type' => 'int',
			'min' => '-2147483648',
			'max' => '2147483647',
			'column_name' => 'cl4_blog_person_id',
			'column_default' => null,
			'data_type' => 'int',
			'is_nullable' => FALSE,
			'ordinal_position' => 2,
			'display' => '11',
			'comment' => '',
			'extra' => '',
			'key' => 'MUL',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'select',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'email_address',
			'source_value' => 'id',
		),
		'title' => array(
			'type' => 'string',
			'column_name' => 'title',
			'column_default' => null,
			'data_type' => 'varchar',
			'is_nullable' => FALSE,
			'ordinal_position' => 3,
			'character_maximum_length' => '255',
			'collation_name' => 'utf8_unicode_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'text',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'post' => array(
			'type' => 'string',
			'character_maximum_length' => '65535',
			'column_name' => 'post',
			'column_default' => null,
			'data_type' => 'text',
			'is_nullable' => FALSE,
			'ordinal_position' => 4,
			'collation_name' => 'utf8_unicode_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'textarea',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'publish_flag' => array(
			'type' => 'int',
			'min' => '-128',
			'max' => '127',
			'column_name' => 'publish_flag',
			'column_default' => null,
			'data_type' => 'tinyint',
			'is_nullable' => FALSE,
			'ordinal_position' => 5,
			'display' => '1',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'checkbox',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'publish_start_time' => array(
			'type' => 'string',
			'column_name' => 'publish_start_time',
			'column_default' => null,
			'data_type' => 'datetime',
			'is_nullable' => FALSE,
			'ordinal_position' => 6,
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'datetime',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'publish_end_time' => array(
			'type' => 'string',
			'column_name' => 'publish_end_time',
			'column_default' => null,
			'data_type' => 'datetime',
			'is_nullable' => FALSE,
			'ordinal_position' => 7,
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'datetime',
			'display_order' => 1,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => 'name',
			'source_value' => 'id',
		),
		'filename' => array(
			'type' => 'string',
			'column_name' => 'filename',
			'column_default' => null,
			'data_type' => 'varchar',
			'is_nullable' => FALSE,
			'ordinal_position' => 3,
			'character_maximum_length' => '255',
			'collation_name' => 'utf8_unicode_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'file',
			'display_order' => 100,
			'display_flag' => 1,
			'edit_flag' => 1,
			'search_flag' => 1,
			'view_flag' => 1,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => '',
			'source_value' => '',
			'file_options' => array(
                'destination_file_path' => UPLOAD_ROOT, // the absolute file path where these files should be uploaded
                'name_change_method' => 'timestamp', // 'keep', 'timestamp', 'random', 'prepend', 'append', 'overwrite', 'overwrite_all'
                //'name_change_text' => '', // used in prepend, apend, overrite, and overwrite_all cases
                'original_filename_column' => 'filename_original',
                'file_download_url' => PRIVATE_DOWNLOAD_FILE,
                'lowercase_filename' => TRUE,
                'clean_filename' => FALSE,
                'ext_check_only' => FALSE,
                'overwrite' => FALSE,
                'allow_any_file_type' => FALSE,
			),


		),
		'filename_original' => array(
			'type' => 'string',
			'column_name' => 'filename_original',
			'column_default' => null,
			'data_type' => 'varchar',
			'is_nullable' => FALSE,
			'ordinal_position' => 3,
			'character_maximum_length' => '255',
			'collation_name' => 'utf8_unicode_ci',
			'comment' => '',
			'extra' => '',
			'key' => '',
			'privileges' => 'select,insert,update,references',
			// cl4-specific properties
			'field_type' => 'text',
			'display_order' => 1,
			'display_flag' => 0,
			'edit_flag' => 0,
			'search_flag' => 0,
			'view_flag' => 0,
			'field_size' => 30,
			'max_length' => 255,
			'min_width' => 0,
			'source_data' => '',
			'source_label' => '',
			'source_value' => '',
		),
	);

	// relationships
	protected $_has_one = array();
	protected $_has_many = array(
		'cl4blogtag' => array(
			'model' => 'cl4blogtag',
			'through' => 'cl4_blog_post_tag',
			'foreign_key' => 'cl4_blog_post_id',
			'far_key' => 'cl4_blog_tag_id',
			'field_type' => 'checkboxes', // cl4-specific, which field type to use for this relationship in forms'display_flag' => 1,
			'field_label' => 'Tags',
			'source_model' => 'cl4blogtag',
			'source_data' => 'cl4_blog_tag',
			'source_label' => 'name',
			'source_value' => 'id',
			'edit_flag' => 1, // cl4-specific
			'search_flag' => 1, // cl4-specific
			'view_flag' => 1, // cl4-specific
		),
	);
	protected $_belongs_to = array(
		'cl4blogperson' => array('foreign_key' => 'cl4_blog_person_id'), // or should this be has one?
	);

	// validation rules
	protected $_rules = array(
		'cl4_blog_person_id' => array('not_empty'  => array()),
		'title' => array('not_empty'  => array()),
		'post' => array('not_empty'  => array()),
	);
} // class
