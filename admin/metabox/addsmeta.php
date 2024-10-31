<?php

return array(
	array(
		'type'      => 'group',
		'repeating' => true,
		'sortable'  => true,
		'name'      => 'tab_info',
		'priority'  => 'high',
		'title'     => __('Tab', 'vp_textdomain'),
		'fields'    => array(
				
				    array(
    'type' => 'notebox',
    'name' => 'nb_1',
    'label' => __('An Announcement', 'vp_textdomain'),
    'description' => __('Thanks for installing my plugin. If you need any customization work within this plugin or any other work, I am available for HIRE at <a href="https://www.odesk.com/users/%7E016f8320a8ec7f966f">Odesk.com</a>', 'vp_textdomain'),
    'status' => 'info',
    ),
			array(
				'type'  => 'textbox',
				'name'  => 'id',
				'label' => __('Tab ID', 'vp_textdomain'),
				'description' => __('use unique id for each tab', 'vp_textdomain'),
				'validation' => 'required',
			),	

			array(
				'type'  => 'textbox',
				'name'  => 'title',
				'label' => __('Tab Title', 'vp_textdomain'),
				'default' => 'Tab Title Here',
				
			),			
			
			
			array(
				'type'  => 'wpeditor',
				'name'  => 'content',
				'label' => __('Tab Content', 'vp_textdomain'),
				'default' => 'Tab content here',
			),
			
			 array(
				'type' => 'fontawesome',
				'name' => 'fonta',
				'label' => __('Tab Title Icon', 'vp_textdomain'),
				//'description' => __('Fontawesome icon chooser with small preview.', 'vp_textdomain'),
				'default' => array(
				'{{first}}',
				),
			),
			
/*			
			array(
				'type' => 'checkbox',
				'name' => 'tab_active',
				'label' => __('Make This Tab Default', 'vp_textdomain'),
				'items' => array(
					array(
						'value' => 'active',
						'label' => __('', 'vp_textdomain'),
					),

				),
				

		),
*/

						array(
					'type' => 'radiobutton',
					'name' => 'tab_active',
					'label' => __('Make This Tab Default', 'vp_textdomain'),
					'items' => array(
						array(
							'value' => 'active',
							'label' => __('Yes', 'vp_textdomain'),
						),
						array(
								'value' => '',
								'label' => __('No', 'vp_textdomain'),
				),
					),
				),

		),
	),
);
?>