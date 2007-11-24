<?php
/*

 Copyright (c) 2001 - 2007 Ampache.org
 All Rights Reserved.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License v2
 as published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/

/*
 Show us the stats for the server and this user
*/
require_once 'lib/init.php';

show_header(); 

/* Switch on the action to be performed */
switch ($_REQUEST['action']) { 
	// Show a Users "Profile" page
	case 'show_user': 
		$client = new User($_REQUEST['user_id']); 
		require_once Config::get('prefix') . '/templates/show_user.inc.php'; 
	break;
	case 'user_stats':
		/* Get em! */
		$working_user = new User($_REQUEST['user_id']); 

                /* Pull favs */
                $favorite_artists       = $working_user->get_favorites('artist');
                $favorite_albums        = $working_user->get_favorites('album');
                $favorite_songs         = $working_user->get_favorites('song');

                require_once Config::get('prefix') . '/templates/show_user_stats.inc.php';
	
	break;
	// Show stats
	default: 
		// Global stuff first
		$stats = Catalog::get_stats(); 
		require_once Config::get('prefix') . '/templates/show_local_catalog_info.inc.php';

		$objects = Stats::get_top('album'); 
		$headers = array('f_link'=>_('Most Popular Albums')); 
		show_box_top('','info-box box_popular_albums'); 
		require Config::get('prefix') . '/templates/show_objects.inc.php'; 
		show_box_bottom(); 

		$objects = Stats::get_top('artist'); 
		$headers = array('f_name_link'=>_('Most Popular Artists')); 
		show_box_top('','info-box box_popular_artists'); 
		require Config::get('prefix') . '/templates/show_objects.inc.php'; 
		show_box_bottom(); 

		$objects = Stats::get_top('genre'); 
		$headers = array('f_link'=>_('Most Popular Genres')); 
		show_box_top('','info-box box_popular_genres'); 
		require Config::get('prefix') . '/templates/show_objects.inc.php'; 
		show_box_bottom(); 


	break;
} // end switch on action

show_footer(); 

?>
