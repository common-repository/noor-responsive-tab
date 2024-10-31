<?php


return array(
	array(
		'type'      => 'group',
		'repeating' => false,
		'sortable'  => true,
		'name'      => 'settings',
		'priority'  => 'high',
		'title'     => __('Tab Style Settings', 'vp_textdomain'),
		
		'fields' => array(				

		
		
				    array(
    'type' => 'notebox',
    'name' => 'nb_1',
    'label' => __('An Announcement', 'vp_textdomain'),
    'description' => __('Thanks for installing my plugin. If you need any customization work within this plugin or any other work, I am available for HIRE at <a href="https://www.odesk.com/users/%7E016f8320a8ec7f966f">Odesk.com</a>', 'vp_textdomain'),
    'status' => 'info',
    ),
	

array(
'type' => 'slider',
'name' => 'width',
'label' => __('Tab Width(30%-100%)', 'vp_textdomain'),
'min' => '30',
'max' => '100',

'default' => '60',
),



	
						array(
							'type' => 'select',
							'name' => 'hor_ver',
							'label' => __('Horizontal or Vertical', 'vp_textdomain'),
							'default' => array(
										'{{first}}',
										),
							'items' => array(
								array(
									'value' => 'hor-tab',
									'label' => 'Horizontal',
								),
								array(
									'value' => 'tabs-left',
									'label' => 'Vertical',
								),	

							),
						),

						array(
							'type' => 'select',
							'name' => 'style',
							'label' => __('Select Tab Style', 'vp_textdomain'),
							'default' => array(
										'{{first}}',
										),
							'items' => array(
								
								array(
									'value' => 'border-style',
									'label' => 'Border Style',
								),
								
	
								
								array(
									'value' => 'line-style',
									'label' => 'Line Style',
								),	

								array(
									'value' => 'boxed-style',
									'label' => 'Boxed Style',
								),	
								
								array(
									'value' => 'border-solid',
									'label' => 'Boxed Solid Style',
								),
						
							),
						),
					
					
						array(
							'type' => 'color',
							'name' => 'color_bg',
							'label' => __('Tab Background Color', 'vp_textdomain'),
							
							'default' => '#FFFFFF',
							),

							array(
							'type' => 'color',
							'name' => 'color_title',
							'label' => __('Tab Title Color', 'vp_textdomain'),
							
							'default' => '#31b6c0',
							),

							array(
							'type' => 'color',
							'name' => 'color_active',
							'label' => __('Tab Active Color', 'vp_textdomain'),
							
							'default' => '#cb0883',
							),


							
							
			/*	array(
					'type' => 'notebox',
					'name' => 'nb_11',
					'label' => __('Info Announcement', 'vp_textdomain'),
					'description' => __('<a href="#">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</a>', 'vp_textdomain'),
					'status' => 'info',
					),
			*/
		),
	),
);
?>