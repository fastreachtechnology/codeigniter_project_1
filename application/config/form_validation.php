<?php

$config = [
              'add_article_rules' => [  

                                           [
			                                   'field' =>'title',
			                                   'lebel' =>'Article Title',
			                                   'rules' =>'required'
				
			                               ],
			                               [
			                                      'field' =>'body',
												  'lebel' =>'Article Body',
												  'rules' =>'required'
			                               ]

                                      ],
				'admin_login'      => [
				
				                                [ 
												  'field' =>'username',
												  'lebel' =>'User Name',
												  'rules' =>'required|alpha|trim'
												  
												]
				
				
				                      ]

           ];
?>