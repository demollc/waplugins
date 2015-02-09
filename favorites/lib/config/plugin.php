<?php
return array (
  'name' => _wp('Favorites'),
  'icon' => 'img/favorites.png',
  'description' => _wp('Add requests to Favorites'),
  'version' => '1.0.2',
  'vendor' => '991739',
  'handlers' => 
  array (
    'requests_collection_filter' => 'requests_collection',
    'requests_delete' => 'requests_delete',
    'sidebar' => 'sidebar',
    'view_action' => 'view_action',
    'backend_layout' => 'backend_layout',
  ),
);
