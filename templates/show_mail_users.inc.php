<?php
/*

 Copyright (c) 2001 - 2006 Ampache.org
 All rights reserved.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/
?>
<form name="mail" method="post" action="<?php echo conf('web_path'); ?>/admin/mail.php" enctype="multipart/form-data">
<span class="header1"><?php echo _('Send E-mail to Users'); ?></span>
<table class="text-box">
  <tr>
    <td><?php echo _('Mail to'); ?>:</td>
    <td>
        <select name="to">
                <option value="all" <?php if ($to == 'all') { echo "selected=\"selected\""; } ?>>All</option>
                <option value="users" <?php if ($to == 'user') { echo "selected=\"selected\""; } ?>>Users</option>
                <option value="admins" <?php if ($to == 'admin') { echo "selected=\"selected\""; } ?>>Admins</option>
        </select>
    </td>
  </tr>

  <tr>
    <td><?php echo _('Subject'); ?>:</td>
    <td>
        <input name="subject" value="<?php echo scrub_out($_POST['subject']); ?>" size="50"></input>
    </td>
  </tr>

  <tr>
    <td valign="top"><?php echo _('Message'); ?>:</td>
    <td>
        <textarea class="input" name="message" rows="20" cols="70"><?php echo scrub_out($message); ?></textarea>
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>
        <input type="hidden" name="action" value="send_mail" />
        <input class="button" type="submit" value="<?php echo _('Send Mail'); ?>" />
    </td>
  </tr>
</table>
</form>
