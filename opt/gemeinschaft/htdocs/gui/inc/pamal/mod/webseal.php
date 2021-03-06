<?php
/*******************************************************************\
*            Gemeinschaft - asterisk cluster gemeinschaft
* 
* $Revision$
* 
* Copyright 2007, amooma GmbH, Bachstr. 126, 56566 Neuwied, Germany,
* http://www.amooma.de/
* Stefan Wintermeyer <stefan.wintermeyer@amooma.de>
* Philipp Kempgen <philipp.kempgen@amooma.de>
* Peter Kozak <peter.kozak@amooma.de>
* 
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
* MA 02110-1301, USA.
\*******************************************************************/
defined('PAMAL_DIR') or die('No direct access.');


#####################################################################
#	for WebSeal Tivoli Access Manager,
#	reads user from the non-standard "iv-user" HTTP header
#####################################################################
class PAMAL_auth_webseal extends PAMAL_auth
{
	# constructor:
	function PAMAL_auth_webseal()
	{
		$this->_user = $this->_getUser();
	}
	
	# private, returns the user:
	function _getUser()
	{
		$user = trim( @$_SERVER['HTTP_IV_USER'] );
		//$user = @$_REQUEST['user'];
		if ($user && strToLower($user) != 'unauthenticated')
			return $user;
		else
			return false;
	}
}

?>