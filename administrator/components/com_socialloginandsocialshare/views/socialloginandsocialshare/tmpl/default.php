<?php
defined ('_JEXEC') or die ('Direct Access to this location is not allowed.');
JHtml::_('behavior.tooltip');
jimport ('joomla.plugin.helper');
jimport( 'joomla.html.html.tabs');
?>
<script type="text/javascript">
window.onload=function(){
var choosesharepos= <?php echo $this->settings['chooseshare']; ?>;
var choosecounterpos= <?php echo $this->settings['choosecounter']; ?>;
	if(choosesharepos == 0 || choosesharepos == 1 || choosesharepos == 2 || choosesharepos == 3)
	{
		document.getElementById('sharehorizontal').style.display="block";
	  	document.getElementById('sharevertical').style.display="none";
	  	document.getElementById('arrow').style.cssText = "position:absolute; border-bottom:8px solid #ffffff; border-right:8px solid transparent; border-left:8px solid transparent; margin:-18px 0 0 2px;";
	   	document.getElementById('mymodel').style.color = "#ffffff";
	}
	if(choosesharepos == 4 || choosesharepos == 5)
	{
		document.getElementById('sharevertical').style.display="block";
  		document.getElementById('sharehorizontal').style.display="none";
  		document.getElementById('arrow').style.cssText = "position:absolute; border-bottom:8px solid #ffffff; border-right:8px solid transparent; border-left:8px solid transparent; margin:-18px 0 0 70px;";
	}
	if(choosecounterpos == 0 || choosecounterpos == 1)
	{
		document.getElementById('counterhorizontal').style.display="block";
	  	document.getElementById('countervertical').style.display="none";
	  	document.getElementById('carrow').style.cssText = "position:absolute; border-bottom:8px solid #ffffff; border-right:8px solid transparent; border-left:8px solid transparent; margin:-18px 0 0 2px;";
	   	document.getElementById('mymodel').style.color = "#ffffff";
	}
	if(choosecounterpos == 2 || choosecounterpos == 3)
	{
		document.getElementById('countervertical').style.display="block";
  		document.getElementById('counterhorizontal').style.display="none";
  		document.getElementById('carrow').style.cssText = "position:absolute; border-bottom:8px solid #ffffff; border-right:8px solid transparent; border-left:8px solid transparent; margin:-18px 0 0 70px;";
	}
}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_socialloginandsocialshare&view=socialloginandsocialshare&layout=default'); ?>" method="post" name="adminForm" id="adminForm">
<div>
  <div style="float:left; width:70%;">
    <div>
	  <fieldset class="sociallogin_form sociallogin_form_main" style="background:#EAF7FF; border: 1px solid #B3E2FF;">
      <div class="sociallogin_row sociallogin_row_title" style="color: #000000; font-weight:normal;">
        <?php echo JText::_('COM_SOCIALLOGIN_THANK'); ?>
      </div>
      <div class="sociallogin_row" style="width:90%; line-height:160%;">
        <?php echo JText::_('COM_SOCIALLOGIN_THANK_BLOCK'); ?> 
      </div>
      <div class="sociallogin_row" style="width:90%; line-height:160%;">
        <?php echo JText::_('COM_SOCIALLOGIN_THANK_BLOCK_TWO'); ?> 
      </div>
      <div class="sociallogin_row sociallogin_row_button btn btn-small " style="margin-left:10px !important;">
						<div class="button2-left">
							<div class="blank">
		<a class="modal" href="http://www.loginradius.com/" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_THANK_BLOCK_FIVE'); ?></a>
							</div>
						</div>
					</div>
      </fieldset>
    </div>
<?php	$options = array(
    'onActive' => 'function(title, description){
        description.setStyle("display", "block");
		title.addClass("open").removeClass("closed");
	}',
    'onBackground' => 'function(title, description){
        description.setStyle("display", "none");
        title.addClass("closed").removeClass("open");
    }',
    'startOffset' => 0,  // 0 starts on the first tab, 1 starts the second, etc...
    'useCookie' => true, // this must not be a string. Don't use quotes.
);
//$options = array('startOffset'=>2, 'allowAllClose'=>true, 'opacityTransition'=>true, 'duration'=>600); 
        echo JHtml::_('tabs.start', 'pane', $options);

        //echo $pane->startPane( 'pane' );
echo JHtml::_('tabs.panel', JText::_('COM_SOCIALLOGIN_PANEL_LOGIN'), 'panel1');
        //echo $pane->startPanel( JText::_('COM_SOCIALLOGIN_PANEL_LOGIN'), 'panel1' );
?>
	<!-- Form Box -->
  <div>
<table class="form-table sociallogin_table">
  <tr>
    <th class="head" colspan="2"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_API'); ?></small></th>
  </tr>
  <tr >
    <input id="connection_url" type="hidden" value="<?php echo JURI::root();?>" />
    <td colspan="2" ><span class="sociallogin_subhead"> <?php echo JText::_('COM_SOCIALLOGIN_SETTING_API_KEY_DESC'); ?></span>
	  <br/><br />
      <table>
  <tr>
    <td><?php echo JText::_('COM_SOCIALLOGIN_SETTING_API_KEY'); ?>
	</td>
    <td>
	<input size="60" type="text" name="settings[apikey]" id="apikey" value="<?php echo (isset ($this->settings ['apikey']) ? htmlspecialchars ($this->settings ['apikey']) : ''); ?>" />
	</td>
  </tr>
  <tr>
  <td>
	  <?php echo JText::_('COM_SOCIALLOGIN_SETTING_API_SECRET'); ?>
	  </td>
	  <td>
	  <input size="60" type="text" name="settings[apisecret]" id="apisecret" value="<?php echo (isset ($this->settings ['apisecret']) ? htmlspecialchars ($this->settings ['apisecret']) : ''); ?>" />
	  </td>
	  </tr>
	  </table>
	</td>
  </tr>
  <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_USEAPI'); ?></span>
      <br /><br />
      <?php   $useapi_curl = "";
              $useapi_fopen = "";
              $useapi = (isset($this->settings['useapi']) ? $this->settings['useapi'] : "");
              if ($useapi == '1' ) $useapi_curl = "checked='checked'";
              else if ($useapi == '0') $useapi_fopen = "checked='checked'";
              else $useapi_curl = "checked='checked'";?>
     <input name="settings[useapi]" id = "curl" type="radio"  <?php echo $useapi_curl;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_SETTING_USEAPI_CURL'); ?> 
	 <br /><br />
     <input name="settings[useapi]" id = "fsockopen" type="radio" <?php echo $useapi_fopen;?>value="0" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SETTING_USEAPI_FOPEN');     ?> 
    </td>
  </tr>
  <tr class="sociallogin_row_white">
    <td>
	<div class="sociallogin_row sociallogin_row_button btn btn-small" style="margin-left:0px !important;">
        <div class="button2-left">
					<div class="blank">
           <a class="modal" href="javascript:void(0);" onclick="MakeRequest();"><b style="color:#C91F00 !important;"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_VERIFYAPI'); ?></b></a>
		   </div>
			</div>
	</div>
    </td>
    <td><div id="ajaxDiv" style="font-weight:bold;"></div></td>
  </tr>
</table>
<table class="form-table sociallogin_table">
  <tr>
    <th class="head" colspan="2"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_BASIC'); ?></small></th>
  </tr>
  <tr>
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_BASIC_REDIRECT_DESC'); ?></span><br /><br />
      <?php $db = JFactory::getDBO();
      $query = "SELECT m.id, m.title,m.level,mt.menutype FROM #__menu AS m INNER JOIN #__menu_types AS mt ON mt.menutype = m.menutype WHERE mt.menutype = m.menutype AND m.published = '1' ORDER BY mt.menutype,m.level";
      $db->setQuery($query);
      $sociallogin_rows = $db->loadObjectList();?>
      <?php $setredirct = (isset($this->settings['setredirct']) ? $this->settings['setredirct'] : "");?>
      <select id="setredirct" name="settings[setredirct]">
        <option value="" selected="selected">---Default---</option>
        <?php foreach ($sociallogin_rows as $sociallogin_row) {?>
        <option <?php if ($sociallogin_row->id == $setredirct) { echo " selected=\"selected\""; } ?>value="<?php echo $sociallogin_row->id;?>" >
          <?php echo '<b>'.$sociallogin_row->menutype.'</b>';
          if ($sociallogin_row->level == 1) { echo '-';}
          if($sociallogin_row->level == 2) { echo '--';}
          if($sociallogin_row->level == 3) { echo '---';}
          if($sociallogin_row->level == 4) { echo '----';}
          if($sociallogin_row->level == 5) { echo '-----';}
            echo $sociallogin_row->title;?>
        </option>
      <?php }?>
      </select>
    </td>
  </tr>	
  <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_LINK_DESC'); ?></span><br /><br />
        <?php $yeslink = "";
		      $notlink = "";
              $linkaccount = (isset($this->settings['linkaccount'])  ? $this->settings['linkaccount'] : "");
              if ($linkaccount == '1') $yeslink = "checked='checked'";
              else if ($linkaccount == '0') $notlink = "checked='checked'";
              else $yeslink = "checked='checked'";?>
        <input name="settings[linkaccount]" type="radio" <?php echo $yeslink;?> value="1"  style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_LINK_YES'); ?><br /><br />
        <input name="settings[linkaccount]" type="radio" <?php echo $notlink;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_LINK_NO'); ?> 
    </td>
  </tr>
  <?php if (JPluginHelper::isEnabled('system', 'k2')) {?>
  <tr>
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_K2_DESC'); ?> </span><br /><br />
    <?php echo JText::_('COM_SOCIALLOGIN_SETTING_K2'); ?> <input type="text"  name="settings[k2group]" size="2" value="<?php echo (isset ($this->settings ['k2group']) ? htmlspecialchars ($this->settings ['k2group']) : '2'); ?>" />
    </td>
  </tr>
  <?php }?>
  <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_EMAIL_DESC'); ?></span><br /><br />
      <?php $yessendemail = "";
            $notsendemail = "";
            $sendemail = (isset($this->settings['sendemail'])  ? $this->settings['sendemail'] : "");
            if ($sendemail == '1') $yessendemail = "checked='checked'";
            else if ($sendemail == '0') $notsendemail = "checked='checked'";
            else $yessendemail = "checked='checked'";?>
      <input name="settings[sendemail]" type="radio" <?php echo $yessendemail;?> value="1"  style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_YES'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="settings[sendemail]" type="radio" <?php echo $notsendemail;?> value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_NO'); ?> 
    </td>
  </tr>
  <tr>
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_EMAIL_REQUIRED_DESC'); ?></span><br /><br />
    <?php $yesdummyemail = "";
          $notdummyemail = "";
          $dummyemail = (isset($this->settings['dummyemail'])  ? $this->settings['dummyemail'] : "");
          if ($dummyemail == '0') $yesdummyemail = "checked='checked'";
          else if ($dummyemail == '1') $notdummyemail = "checked='checked'";
          else $notdummyemail = "checked='checked'";?>
   <input name="settings[dummyemail]" type="radio"  <?php echo $notdummyemail;?>value="1" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_EMAIL_YES'); ?><br /><br />
   <input name="settings[dummyemail]" type="radio" <?php echo $yesdummyemail;?>value="0" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_EMAIL_NO'); ?>
   </td>
  </tr>
  <tr class="sociallogin_row_white">
    <input id="connection_url" type="hidden" value="<?php echo JURI::root();?>" />
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_EMAIL_TITLE'); ?></span><br /><br />
	<input size="60" type="text" name="settings[Popup_Email_Title]" id="Popup_Email_Title" value="<?php echo (isset ($this->settings ['Popup_Email_Title']) ? htmlspecialchars ($this->settings ['Popup_Email_Title']) : JText::_('COM_SOCIALLOGIN_POPUP_HEAD')); ?>" />
      <br />
	  </td>
  </tr>
  <tr class="sociallogin_subhead">
  <td>
	  <?php echo JText::_('COM_SOCIALLOGIN_SETTING_EMAIL_TITLE_MESSAGE'); ?><br /><br /><input size="60" type="text" name="settings[Popup_Email_Message]" id="Popup_Email_Message" value="<?php echo (isset ($this->settings ['Popup_Email_Message']) ? htmlspecialchars ($this->settings ['Popup_Email_Message']) : JText::_('COM_SOCIALLOGIN_POPUP_MSG')." %s ".JText::_('COM_SOCIALLOGIN_POPUP_MSGONE')." ".JText::_('COM_SOCIALLOGIN_POPUP_MSGTWO')); ?>" />
      <br />
	  </td>
  </tr>
  <tr class="sociallogin_row_white">
  <td>
	  <span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_ERROR_EMAIL_TITLE_MESSAGE'); ?></span><br /><br /><input size="60" type="text" name="settings[Popup_Error_Email_Message]" id="Popup_Error_Email_Message" value="<?php echo (isset ($this->settings ['Popup_Error_Email_Message']) ? htmlspecialchars ($this->settings ['Popup_Error_Email_Message']) : JText::_('COM_SOCIALLOGIN_EMAIL_INVALID')); ?>" />
	</td>
  </tr>
</table>
<table class="form-table sociallogin_table">
  <tr>
    <th class="head" colspan="2"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_FRONT'); ?></small></th>
  </tr>
  <tr>
    <td colspan="2" ><span class="sociallogin_subhead"> <?php echo JText::_('COM_SOCIALLOGIN_SETTING_NAME_DESC'); ?></span>
      <br /><br />
      <?php  $showonlyname = "";
           $showusername = "";
           $showname = (isset($this->settings['showname'])  ? $this->settings['showname'] : "");
           if ($showname == '0') $showonlyname = "checked='checked'";
           else if ($showname == '1') $showusername = "checked='checked'";
           else $showonlyname = "checked='checked'";?>
    <input name="settings[showname]" type="radio" <?php echo $showonlyname;?>value="0" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_NAME'); ?>&nbsp;&nbsp;&nbsp;
    <input name="settings[showname]" type="radio"  <?php echo $showusername;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_USERNAME'); ?>
    </td>
  </tr>
  <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_FORM_DESC'); ?></span>
      <br /><br />
      <?php $yesshowwithicons = "";
            $notshowwithicons = "";
            $showwithicons = (isset($this->settings['showwithicons'])  ? $this->settings['showwithicons'] : "");
            if ($showwithicons == '1') $yesshowwithicons = "checked='checked'";
            else if ($showwithicons == '0') $notshowwithicons = "checked='checked'";
            else $yesshowwithicons = "checked='checked'";?>
      <input name="settings[showwithicons]" type="radio"  <?php echo $yesshowwithicons;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_YES'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="settings[showwithicons]" type="radio" <?php echo $notshowwithicons;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_NO'); ?> 
    </td>
  </tr>
  <tr>
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_ICONS_DESC'); ?></span>
      <br /><br />
      <?php $topshowicons = "";
          $botshowicons = "";
          $showicons = (isset($this->settings['showicons']) ? $this->settings['showicons'] : "");
          if ($showicons == '0') $topshowicons = "checked='checked'";
          else if ($showicons == '1') $botshowicons = "checked='checked'";
          else $topshowicons = "checked='checked'";?>
      <input name="settings[showicons]" type="radio" <?php echo $topshowicons;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_SETTING_ICONS_TOP'); ?>&nbsp;&nbsp;&nbsp;
      <input name="settings[showicons]" type="radio"  <?php echo $botshowicons;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_SETTING_ICONS_BOT'); ?>
    </td>
  </tr>	
  <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SETTING_GREETING_DESC'); ?></span>
      <br /><br />
      <?php   $yesshowlogout = "";
              $notshowlogout = "";
              $showlogout = (isset($this->settings['showlogout'])  ? $this->settings['showlogout'] : "");
              if ($showlogout == '1') $yesshowlogout = "checked='checked'";
              else if ($showlogout == '0') $notshowlogout = "checked='checked'";
              else $yesshowlogout = "checked='checked'";?>
	  <input name="settings[showlogout]" type="radio" <?php echo $yesshowlogout;?> value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_YES'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="settings[showlogout]" type="radio" <?php echo $notshowlogout;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_NO'); ?> 
    </td>
  </tr>
</table>
</div>
<?php //echo $pane->endPanel();?>
<!-- social share -->
<?php 
echo JHtml::_('tabs.panel', JText::_('COM_SOCIALLOGIN_PANEL_SHARE'), 'panel2');
//echo $pane->startPanel( JText::_('COM_SOCIALLOGIN_PANEL_SHARE'), 'panel2' );?>
<div>
  <table class="form-table sociallogin_table">
    <tr>
      <th class="head" colspan="2"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE'); ?></small></th>
    </tr>
    <tr >
      <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_ENABLE'); ?></span><br /><br />
        <?php 	
		  $yesenableshare = "";
          $noenableshare = "";
          $enableshare = (isset($this->settings['enableshare']) ? $this->settings['enableshare'] : "");
          if ($enableshare == '0') $noenableshare = "checked='checked'";
          else if ($enableshare == '1') $yesenableshare = "checked='checked'";
          else $noenableshare = "checked='checked'";?>
      <input name="settings[enableshare]" type="radio" <?php echo $yesenableshare;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_YES'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="settings[enableshare]" type="radio"  <?php echo $noenableshare;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_NO'); ?>
	  </td>
    </tr>
	<tr class="sociallogin_row_white">
    <input id="connection_url" type="hidden" value="<?php echo JURI::root();?>" />
    <td colspan="2" ><span class="sociallogin_subhead"> <?php echo JText::_('COM_SOCIALSHARE_TITLE'); ?></span>
	  <br/><input size="60" type="text" name="settings[socialsharetitle]" id="socialsharetitle" value="<?php echo (isset ($this->settings ['socialsharetitle']) ? htmlspecialchars ($this->settings ['socialsharetitle']) : ''); ?>" />
      </td>
  </tr>
    <tr>
       <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_THEME'); ?></span><br /><br />
	    <?php $hori32 = "";
	        $hori16 = "";
			$horithemelarge = "";
			$horithemesmall = "";
			$vertibox32 = "";
			$vertibox16 = "";
            $chooseshare = (isset($this->settings['chooseshare']) ? $this->settings['chooseshare'] : "");
            if ($chooseshare == '0' ) $hori32 = "checked='checked'";
            else if ($chooseshare == '1' ) $hori16 = "checked='checked'";
			else if ($chooseshare == '2' ) $horithemelarge = "checked='checked'";
			else if ($chooseshare == '3' ) $horithemesmall = "checked='checked'";
			else if ($chooseshare == '4' ) $vertibox32 = "checked='checked'";
			else if ($chooseshare == '5' ) $vertibox16 = "checked='checked'";
            else $hori32 = "checked='checked'";?>
	     <a id="mymodal" href="javascript:void(0);" onclick="Makehorivisible();"><b><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_HORI'); ?></b></a> &nbsp;|&nbsp; 
	     <a class="mymodal" href="javascript:void(0);" onclick="Makevertivisible();"><b><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_VERTICAL'); ?></b></a>
	     <div style="border:#dddddd 1px solid; padding:10px; background:#FFFFFF; margin:10px 0 0 0;">
	     <span id = "arrow" style="position:absolute; border-bottom:8px solid #ffffff; border-right:8px solid transparent; border-left:8px solid transparent; margin:-18px 0 0 2px;"></span>
	     <div id="sharehorizontal">
	     <input name="settings[chooseshare]" id = "hori32" type="radio"  <?php echo $hori32;?>value="0" style="margin: 4px 10px 0 0; display: block; float: left !important;" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/horizonSharing32.png"?>' /><br /><br />
         <input name="settings[chooseshare]" id = "hori16" type="radio" <?php echo $hori16;?>value="1" style="margin: 2px 10px 0 0; display: block; float: left !important;" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/horizonSharing16.png"?>' /><br /><br />
         <input name="settings[chooseshare]" id = "horithemelarge" type="radio" <?php echo $horithemelarge;?>value="2" style="margin: 4px 10px 0 0; display: block; float: left !important;" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/single-image-theme-large.png"?>' /><br /><br />
         <input name="settings[chooseshare]" id = "horithemesmall" type="radio" <?php echo $horithemesmall;?>value="3" style="margin: 2px 10px 0 0; display: block; float: left !important;" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/single-image-theme-small.png"?>' />
         </div>
         <div id="sharevertical" style="display:none;">
         <input name="settings[chooseshare]" id = "vertibox32" type="radio"  <?php echo $vertibox32;?>value="4" style="vertical-align:top" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/32VerticlewithBox.png"?>' />
         <input name="settings[chooseshare]" id = "vertibox16" type="radio" <?php echo $vertibox16;?>value="5" style="vertical-align:top" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/16VerticlewithBox.png"?>' style="vertical-align:top" /><br /><br />
         <div style="overflow:auto; background:#EBEBEB; padding:10px;">
         <p style="margin:0 0 6px 0; padding:0px;"><strong><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_THEME_POSITION'); ?></strong></p>
         <?php $topshareleft = "";
	        $topshareright = "";
			$bottomshareleft = "";
			$bottomshareright = "";
			$choosesharepos = (isset($this->settings['choosesharepos']) ? $this->settings['choosesharepos'] : "");
            if ($choosesharepos == '0' ) $topshareleft = "checked='checked'";
            else if ($choosesharepos == '1' ) $topshareright = "checked='checked'";
			else if ($choosesharepos == '2' ) $bottomshareleft = "checked='checked'";
			else if ($choosesharepos == '3' ) $bottomshareright = "checked='checked'";
			else $topshareleft = "checked='checked'";?>
        <input name="settings[choosesharepos]" id = "topshareleft" type="radio"  <?php echo $topshareleft;?>value="0" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_THEME_POSITION_TOPL'); ?><br /> 
        <input name="settings[choosesharepos]" id = "topshareright" type="radio" <?php echo $topshareright;?>value="1" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_THEME_POSITION_TOPR'); ?> <br />
        <input name="settings[choosesharepos]" id = "bottomshareleft" type="radio" <?php echo $bottomshareleft;?>value="2" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_THEME_POSITION_BOTTOML'); ?><br /> 
        <input name="settings[choosesharepos]" id = "bottomshareright" type="radio" <?php echo $bottomshareright;?>value="3" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_THEME_POSITION_BOTTOMR'); ?> <br /><br>
		<p style="margin:0 0 6px 0; padding:0px;"><strong><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_TOP_OFFSET');?><a title="<?php echo JText::_('COM_TOP_OFFSET_HELP');?>" href="javascript:void(0)" style="text-decoration:none"> (?)</a></strong></p>
	  <input size="30" type="text" name="settings[verticalsharetopoffset]" id="verticalsharetopoffset" value="<?php echo (isset ($this->settings ['verticalsharetopoffset']) ? htmlspecialchars ($this->settings ['verticalsharetopoffset']) : ''); ?>" />
         </div></div></div>
       </td>
     </tr>
	 <tr class="sociallogin_row_white">

     <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_POSITION'); ?></span><br />

       <?php $sharetop = "";

             $sharebottom = "";

             $sharepos = (isset($this->settings['sharepos'])  ? $this->settings['sharepos'] : "");

             if ($sharepos == '1') $sharebottom = "checked='checked'";

             else if ($sharepos == '0') $sharetop = "checked='checked'";

             else $sharetop = "checked='checked'";?>

       <input name="settings[sharepos]" type="radio"  <?php echo $sharetop;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_POSITION_TOP'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	   <input name="settings[sharepos]" type="radio" <?php echo $sharebottom;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_POSITION_BOTTOM'); ?> 

     </td>

   </tr>
	 <tr>

        <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_NETWORKS'); ?><br /><div id="loginRadiusSharingLimit" style="color: red; display: none; margin-bottom: 5px;"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_PROVIDER_LIMITE'); ?></div>
		</td>
		</tr>
		<tr>
		<td>
<?php   $enablefb = "";
        $enabletwitter = "";
		$enableprint = "";
		$enableemail = "";
		$enablegoogle = "";
		$enabledigg = "";
		$enablereddit = "";
		$enablevk = "";
		$enablegplus = "";
		$enabletumbler = "";
		$enablelinkedin = "";
		$enablemyspace = "";
		$enabledeli = "";
		$enableyahoo = "";
		$enablelive = "";
		$enablehyves = "";
		$enablednnkicks = "";
		$enablepin = "";
        $enablefb = (isset($this->settings['enablefb']) == 'facebook'  ? 'facebook' : 'off');
        if ($enablefb == 'facebook') $enablefb = "checked='checked'";
		$enabletwitter = (isset($this->settings['enabletwitter']) == 'twitter'  ? 'twitter' : 'off');
        if ($enabletwitter == 'twitter') $enabletwitter = "checked='checked'";
		$enableprint = (isset($this->settings['enableprint']) == 'print'  ? 'print' : 'off');
        if ($enableprint == 'print') $enableprint = "checked='checked'";
		$enableemail = (isset($this->settings['enableemail']) == 'email'  ? 'email' : 'off');
        if ($enableemail == 'email') $enableemail = "checked='checked'";
		$enablegoogle = (isset($this->settings['enablegoogle']) == 'google'  ? 'google' : 'off');
        if ($enablegoogle == 'google') $enablegoogle = "checked='checked'";

		$enabledigg = (isset($this->settings['enabledigg']) == 'digg'  ? 'digg' : 'off');
        if ($enabledigg == 'digg') $enabledigg = "checked='checked'";
		$enablereddit = (isset($this->settings['enablereddit']) == 'reddit'  ? 'reddit' : 'off');
        if ($enablereddit == 'reddit') $enablereddit = "checked='checked'";
		$enablevk = (isset($this->settings['enablevk']) == 'vkontakte'  ? 'vkontakte' : 'off');
        if ($enablevk == 'vkontakte') $enablevk = "checked='checked'";
		$enablegplus = (isset($this->settings['enablegplus']) == 'googleplus'  ? 'googleplus' : 'off');
        if ($enablegplus == 'googleplus') $enablegplus = "checked='checked'";
		$enabletumbler = (isset($this->settings['enabletumbler']) == 'tumblr'  ? 'tumblr' : 'off');
        if ($enabletumbler == 'tumblr') $enabletumbler = "checked='checked'";
		$enablelinkedin = (isset($this->settings['enablelinkedin']) == 'linkedin'  ? 'linkedin' : 'off');
        if ($enablelinkedin == 'linkedin') $enablelinkedin = "checked='checked'";
		$enablemyspace = (isset($this->settings['enablemyspace']) == 'myspace'  ? 'myspace' : 'off');
        if ($enablemyspace == 'myspace') $enablemyspace = "checked='checked'";
		$enabledeli = (isset($this->settings['enabledeli']) == 'delicious'  ? 'delicious' : 'off');
        if ($enabledeli == 'delicious') $enabledeli = "checked='checked'";
		$enableyahoo = (isset($this->settings['enableyahoo']) == 'yahoo'  ? 'yahoo' : 'off');
        if ($enableyahoo == 'yahoo') $enableyahoo = "checked='checked'";
		$enablelive = (isset($this->settings['enablelive']) == 'live'  ? 'live' : 'off');
        if ($enablelive == 'live') $enablelive = "checked='checked'";
		$enablehyves = (isset($this->settings['enablehyves']) == 'hyves'  ? 'hyves' : 'off');
        if ($enablehyves == 'hyves') $enablehyves = "checked='checked'";
		$enablednnkicks = (isset($this->settings['enablednnkicks']) == 'dotnetkicks'  ? 'dotnetkicks' : 'off');
        if ($enablednnkicks == 'dotnetkicks') $enablednnkicks = "checked='checked'";
		$enablepin = (isset($this->settings['enablepin']) == 'pinterest'  ? 'pinterest' : 'off');
        if ($enablepin == 'pinterest') $enablepin = "checked='checked'";
		else {
		  $enablefb = "checked='checked'";
		  $enabletwitter = "checked='checked'";
		  $enablelinkedin = "checked='checked'";
		  $enablegplus = "checked='checked'";
		  $enablepin = "checked='checked'";
		}
		?>	
       <table class="form-table sociallogin_table" id="shareprovider">
		<tr class="sociallogin_row_white">
		<td style="width:33%;">
		<input name="settings[enablefb]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this);" type="checkbox"  <?php echo $enablefb;?> value="facebook"  /> <?php echo JText::_('Facebook'); ?><br />
		<input name="settings[enabletwitter]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enabletwitter;?> value="twitter"  /> <?php echo JText::_('Twitter'); ?><br />
		<input name="settings[enableprint]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enableprint;?> value="print"  /> <?php echo JText::_('Print'); ?><br />
		<input name="settings[enableemail]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enableemail;?> value="email"  /> <?php echo JText::_('Email'); ?><br />
		<input name="settings[enablegoogle]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablegoogle;?> value="google"  /> <?php echo JText::_('Google'); ?><br />
		<input name="settings[enablepin]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablepin;?> value="pinterest"  /> <?php echo JText::_('Pinterest'); ?>
	</td>
   	<td style="width:33%;">
		
		<input name="settings[enabledigg]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enabledigg;?> value="digg"  /> <?php echo JText::_('Digg'); ?><br />
		<input name="settings[enablereddit]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablereddit;?> value="reddit"  /> <?php echo JText::_('Reddit'); ?><br />
		<input name="settings[enablevk]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablevk;?> value="vkontakte"  /> <?php echo JText::_('Vkontakte'); ?><br />
		<input name="settings[enablegplus]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablegplus;?> value="googleplus"  /> <?php echo JText::_('GooglePlus'); ?><br />
		<input name="settings[enabletumbler]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enabletumbler;?> value="tumblr"  /> <?php echo JText::_('Tumblr'); ?><br />
		<input name="settings[enablelinkedin]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablelinkedin;?> value="linkedin"  /> <?php echo JText::_('LinkedIn'); ?>
	</td>
   
	<td style="width:33%;">
		
		<input name="settings[enablemyspace]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablemyspace;?> value="myspace"  /> <?php echo JText::_('MySpace'); ?><br />
		<input name="settings[enabledeli]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enabledeli;?> value="delicious"  /> <?php echo JText::_('Delicious'); ?><br />
		<input name="settings[enableyahoo]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enableyahoo;?> value="yahoo"  /> <?php echo JText::_('Yahoo'); ?><br />
		<input name="settings[enablelive]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablelive;?> value="live"  /> <?php echo JText::_('Live'); ?><br />
		<input name="settings[enablehyves]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablehyves;?> value="hyves"  /> <?php echo JText::_('Hyves'); ?><br />
		<input name="settings[enablednnkicks]" onchange="loginRadiusSharingLimit(this);loginRadiusRearrangeProviderList(this)" type="checkbox"  <?php echo $enablednnkicks;?> value="dotnetkicks"  /> <?php echo JText::_('DotNetKicks'); ?>
		
     </td>
	 </tr>
	 </table>
	 </td>
	 </tr>
	 <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_REARRANGE'); ?></span><br />
     <ul id="sortable" class="ui-sortable" style="float:left; margin-left:0px;">
						<?php 
						$providers = '';
						$rearrange = (isset($this->settings['rearrange_settings']) ? $this->settings['rearrange_settings'] : "");
						$rearrange = unserialize($rearrange);
						if (empty($rearrange)) {
						  $rearrange[] = 'facebook';
						  $rearrange[] = 'googleplus';
						  $rearrange[] = 'twitter';
						  $rearrange[] = 'linkedin';
						  $rearrange[] = 'pinterest';
						}
							foreach($rearrange  as $provider){
								?>
								<li title="<?php echo $provider ?>" id="loginRadiusLI<?php echo $provider ?>" class="lrshare_iconsprite32 lrshare_<?php echo $provider ?>">
								<input type="hidden" name="rearrange_settings[]" value="<?php echo $provider ?>" />
								</li>
								<?php
							}
						
						?>
					</ul>

    </td>

  </tr>

   

  <?php /* <tr class="sociallogin_row_white">

     <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_ALIGN'); ?></span><br /><br />

     <?php  $shareleft = "";

            $sharecenter = "";

            $shareright = "";

            $sharealign = (isset($this->settings['sharealign'])  ? $this->settings['sharealign'] : "");

            if ($sharealign == "center") $sharecenter = "checked='checked'";

            else if ($sharealign == "left") $shareleft = "checked='checked'";

            else if ($sharealign == "right") $shareright = "checked='checked'";

            else $sharecenter = "checked='checked'";?>

        <input name="settings[sharealign]" type="radio"  <?php echo $shareleft;?>value="left"  /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_POSITION_LEFT'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <input name="settings[sharealign]" type="radio" <?php echo $sharecenter;?>value="center"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_POSITION_CENTER'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <input name="settings[sharealign]" type="radio" <?php echo $shareright;?>value="right"  /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_POSITION_RIGHT'); ?> 

	 </td>

   </tr>
*/ ?>
   <tr>

     <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_ARTICLES'); ?></span><br /><br />

     <?php $db = JFactory::getDBO();

           $query = "SELECT id, title FROM #__content WHERE state = '1' ORDER BY ordering";

           $db->setQuery($query);

           $sociallogin_rows = $db->loadObjectList();

     ?>

     <?php $share_articles = (isset($this->settings['s_articles']) ? $this->settings['s_articles'] : "");

           $share_articles = unserialize($share_articles);?>

      <select id="s_articles[]" name="s_articles[]" multiple="multiple" style="width:400px;">

      <?php foreach ($sociallogin_rows as $sociallogin_row) {?>

        <option <?php if (!empty($share_articles)) {

              foreach ($share_articles as $key=>$value) {

                if ($sociallogin_row->id == $value) { 

                  echo " selected=\"selected\""; 

                } 

              }

            }?>value="<?php echo $sociallogin_row->id;?>" >

            <?php echo $sociallogin_row->title;?>

        </option>

<?php }?>

     </select>	

    </td>

  </tr>

</table>

</div>

<?php //echo $pane->endPanel();?>

<!-- End social share -->



<!-- social counter -->

<?php 
echo JHtml::_('tabs.panel', JText::_('COM_SOCIALLOGIN_PANEL_COUNTER'), 'panel3');
//echo $pane->startPanel( JText::_('COM_SOCIALLOGIN_PANEL_COUNTER'), 'panel3' );?>

<div>

  <table class="form-table sociallogin_table">

    <tr>

      <th class="head" colspan="2"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER');?></small></th>

    </tr>

    <tr  class="sociallogin_subhead">

      <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_ENABLE'); ?></span><br /><br />
	  <?php 
		  $yesenablecounter = "";
          $noenablecounter = "";
          $enablecounter = (isset($this->settings['enablecounter']) ? $this->settings['enablecounter'] : "");
          if ($enablecounter == '0') $noenablecounter = "checked='checked'";
          else if ($enablecounter == '1') $yesenablecounter = "checked='checked'";
          else $noenablecounter = "checked='checked'";?>
      <input name="settings[enablecounter]" type="radio" <?php echo $yesenablecounter;?>value="1" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_YES'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="settings[enablecounter]" type="radio"  <?php echo $noenablecounter;?>value="0" style="margin:0;" /> <?php echo JText::_('COM_SOCIALLOGIN_NO'); ?>
     </td>
   </tr>
   <tr class="sociallogin_row_white">
    <td colspan="2" ><span class="sociallogin_subhead"> <?php echo JText::_('COM_SOCIALCOUNTER_TITLE'); ?></span>
	  <br/><input size="60" type="text" name="settings[socialcountertitle]" id="socialcountertitle" value="<?php echo (isset ($this->settings ['socialcountertitle']) ? htmlspecialchars ($this->settings ['socialcountertitle']) : ''); ?>" />
      </td>
  </tr>
   <tr>
     <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_THEME'); ?></span><br /><br />
	  <?php $chori32 = "";
	        $chori16 = "";
			$cvertibox32 = "";
			$cvertibox16 = "";
            $choosecounter = (isset($this->settings['choosecounter']) ? $this->settings['choosecounter'] : "");
            if ($choosecounter == '0' ) $chori16 = "checked='checked'";
            else if ($choosecounter == '1' ) $chori32 = "checked='checked'";
			else if ($choosecounter == '2' ) $cvertibox32 = "checked='checked'";
			else if ($choosecounter == '3' ) $cvertibox16 = "checked='checked'";
			else $chori16 = "checked='checked'";?>
	  <a class="mymodal" href="javascript:void(0);" onclick="Makechorivisible();" id = "Makechorivisible"><b><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_HORI'); ?></b></a> &nbsp;|&nbsp; 
	  <a class="mymodal" href="javascript:void(0);" onclick="Makecvertivisible();"><b><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_SHARE_VERTICAL'); ?></b></a>
	  <div style="border:#dddddd 1px solid; padding:10px; background:#FFFFFF; margin:10px 0 0 0;">
      <span id = "carrow"style="position:absolute; border-bottom:8px solid #ffffff; border-right:8px solid transparent; border-left:8px solid transparent; margin:-18px 0 0 2px;"></span>
	  <div id="counterhorizontal">
	  <input name="settings[choosecounter]" id = "chori16" type="radio"  <?php echo $chori16;?>value="0" style="margin: 2px 10px 0 0; display: block; float: left !important;" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/horizontal.png"?>' /><br /><br />
      <input name="settings[choosecounter]" id = "chori32" type="radio" <?php echo $chori32;?>value="1" style="margin: 2px 10px 0 0; display: block; float: left !important;" /> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/lrshare_iconsprite32.png"?>' />
      </div>
      <div id="countervertical" style="display:none;">
      <input name="settings[choosecounter]" id = "cvertibox32" type="radio"  <?php echo $cvertibox32;?>value="2" style="vertical-align:top"/> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/verticalhorizontal.png"?>' style="vertical-align:top" />

      <input name="settings[choosecounter]" id = "cvertibox16" type="radio" <?php echo $cvertibox16;?>value="3" style="vertical-align:top"/> <img src = '<?php echo JURI::root()."/administrator/components/com_socialloginandsocialshare/assets/img/verticalvertical.png"?>' />
	  <div style="overflow:auto; background:#EBEBEB; padding:10px;">
         <p style="margin:0 0 6px 0; padding:0px;"><strong><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_THEME_POSITION'); ?></strong></p>
         <?php $topcounterleft = "";
	        $topcounterright = "";
			$bottomcounterleft = "";
			$bottomcounterright = "";
			$choosecounterpos = (isset($this->settings['choosecounterpos']) ? $this->settings['choosecounterpos'] : "");
            if ($choosecounterpos == '0' ) $topcounterleft = "checked='checked'";
            else if ($choosecounterpos == '1' ) $topcounterright = "checked='checked'";
			else if ($choosecounterpos == '2' ) $bottomcounterleft = "checked='checked'";
			else if ($choosecounterpos == '3' ) $bottomcounterright = "checked='checked'";
			else $topcounterleft = "checked='checked'";?>
        <input name="settings[choosecounterpos]" id = "topcounterleft" type="radio"  <?php echo $topcounterleft;?>value="0" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_THEME_POSITION_TOPL'); ?><br /> 
        <input name="settings[choosecounterpos]" id = "topcounterright" type="radio" <?php echo $topcounterright;?>value="1" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_THEME_POSITION_TOPR'); ?> <br />
        <input name="settings[choosecounterpos]" id = "bottomcounterleft" type="radio" <?php echo $bottomcounterleft;?>value="2" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_THEME_POSITION_BOTTOML'); ?><br /> 
        <input name="settings[choosecounterpos]" id = "bottomcounterright" type="radio" <?php echo $bottomcounterright;?>value="3" style="margin:0;"/> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_THEME_POSITION_BOTTOMR'); ?> <br /><br />
		<p style="margin:0 0 6px 0; padding:0px;"><strong><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_TOP_OFFSET'); ?><a title="<?php echo JText::_('COM_TOP_OFFSET_HELP');?>" href="javascript:void(0)" style="text-decoration:none"> (?)</a></strong></p>
	 <input size="30" type="text" name="settings[verticalcountertopoffset]" id="verticalcountertopoffset" value="<?php echo (isset ($this->settings ['verticalcountertopoffset']) ? htmlspecialchars ($this->settings ['verticalcountertopoffset']) : ''); ?>" />
  </div></div></div>
    </td>
  </tr>
<tr class="sociallogin_row_white">
   <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_POSITION'); ?></span><br /><br />
   <?php 
   $countertop = "";
   $counterbottom = "";
   $counterpos = (isset($this->settings['counterpos'])  ? $this->settings['counterpos'] : "");
   if ($counterpos == '1') $counterbottom = "checked='checked'";
   else if ($counterpos == '0') $countertop = "checked='checked'";else $countertop = "checked='checked'";?>
   <input name="settings[counterpos]" type="radio"  <?php echo $countertop;?>value="0" style="margin:0;" />
    <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_POSITION_TOP');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="settings[counterpos]" type="radio" <?php echo $counterbottom;?>value="1" style="margin:0;" /> 
	<?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_POSITION_BOTTOM');?> 
	</td>
	</tr>
  <tr>

    <td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_SELECT'); ?></span><br /><br />
	</td>
	</tr>	
<tr >
<td>
     <?php   $enablefblike = "";
        $enablefbrecommend = "";
		$enablefbsend = "";
		$enablegplusone = "";
		$enablegshare = "";
		$enablelinkedinshare = "";
		$enabletweet = "";
		$enablestbadge = "";
		$enableredditshare = "";
        $enablefblike = (isset($this->settings['enablefblike']) == 'on'  ? 'on' : 'off');
        if ($enablefblike == 'on') $enablefblike = "checked='checked'";
		$enablefbrecommend = (isset($this->settings['enablefbrecommend']) == 'on'  ? 'on' : 'off');
        if ($enablefbrecommend == 'on') $enablefbrecommend = "checked='checked'";
		$enablefbsend = (isset($this->settings['enablefbsend']) == 'on'  ? 'on' : 'off');
        if ($enablefbsend == 'on') $enablefbsend = "checked='checked'";
		$enablegplusone = (isset($this->settings['enablegplusone']) == 'on'  ? 'on' : 'off');
        if ($enablegplusone == 'on') $enablegplusone = "checked='checked'";
		$enablegshare = (isset($this->settings['enablegshare']) == 'on'  ? 'on' : 'off');
        if ($enablegshare == 'on') $enablegshare = "checked='checked'";
		$enablelinkedinshare = (isset($this->settings['enablelinkedinshare']) == 'on'  ? 'on' : 'off');
        if ($enablelinkedinshare == 'on') $enablelinkedinshare = "checked='checked'";
		$enabletweet = (isset($this->settings['enabletweet']) == 'on'  ? 'on' : 'off');
        if ($enabletweet == 'on') $enabletweet = "checked='checked'";
		$enablestbadge = (isset($this->settings['enablestbadge']) == 'on'  ? 'on' : 'off');
        if ($enablestbadge == 'on') $enablestbadge = "checked='checked'";
		$enableredditshare = (isset($this->settings['enableredditshare']) == 'on'  ? 'on' : 'off');
        if ($enableredditshare == 'on') $enableredditshare = "checked='checked'";
		?>	
		<table width="116" class="form-table sociallogin_table" id="shareprovider">
		<tr class="sociallogin_row_white">
		<td width="74%" style="width:33%;">
       <input name="settings[enablefblike]" type="checkbox"  <?php echo $enablefblike;?>value="on"  /> <?php echo JText::_('Facebook Like'); ?><br />
       <input name="settings[enablefbrecommend]" type="checkbox"  <?php echo $enablefbrecommend;?>value="on"  /> <?php echo JText::_('Facebook Recommend'); ?><br />
       <input name="settings[enablefbsend]" type="checkbox"  <?php echo $enablefbsend;?>value="on"  /> <?php echo JText::_('Facebook Send'); ?><br />
       <input name="settings[enablegplusone]" type="checkbox"  <?php echo $enablegplusone;?>value="on"  /> <?php echo JText::_('Google+ +1'); ?><br />
       <input name="settings[enablegshare]" type="checkbox"  <?php echo $enablegshare;?>value="on"  /> <?php echo JText::_('Google+ Share'); ?><br />
	   </td>
	   <td width="26%">
       <input name="settings[enablelinkedinshare]" type="checkbox"  <?php echo $enablelinkedinshare;?>value="on"  /> <?php echo JText::_('LinkedIn Share'); ?><br />
	   <input name="settings[enabletweet]" type="checkbox"  <?php echo $enabletweet;?>value="on"  /> <?php echo JText::_('Twitter Tweet'); ?><br />
       <input name="settings[enablestbadge]" type="checkbox"  <?php echo $enablestbadge;?>value="on"  /> <?php echo JText::_('StumbleUpon Badge'); ?><br />
	   <input name="settings[enableredditshare]" type="checkbox"  <?php echo $enableredditshare;?>value="on"  /> <?php echo JText::_('Reddit'); ?>
	   </td>
	 </tr>
</table>
     </td>
   </tr>
	<?php /*   <tr class="sociallogin_row_white"><td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_ALIGN'); ?></span><br /><br /><?php $counterleft = "";$countercenter = "";$counterright = "";$counteralign = (isset($this->settings['counteralign'])  ? $this->settings['counteralign'] : "");if ($counteralign == "center") $countercenter = "checked='checked'";else if ($counteralign == "left") $counterleft = "checked='checked'";else if ($counteralign == "right") $counterright = "checked='checked'";else $countercenter = "checked='checked'";?><input name="settings[counteralign]" type="radio"  <?php echo $counterleft;?>value="left"  /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_POSITION_LEFT');?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="settings[counteralign]" type="radio" <?php echo $countercenter;?>value="center"  /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_POSITION_CENTER');?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="settings[counteralign]" type="radio" <?php echo $counterright;?>value="right"  /> <?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_POSITION_RIGHT');?> </td></tr>*/?>
	<tr class="sociallogin_row_white">
	<td colspan="2" ><span class="sociallogin_subhead"><?php echo JText::_('COM_SOCIALLOGIN_SOCIAL_COUNTER_ARTICLES'); ?></span><br /><br />
	<?php $db = JFactory::getDBO();
	$query = "SELECT id, title FROM #__content WHERE state = '1' ORDER BY ordering";
	$db->setQuery($query);
	$sociallogin_rows = $db->loadObjectList();
	?>
	<?php $counter_articles = (isset($this->settings['c_articles']) ? $this->settings['c_articles'] : "");
	$counter_articles = unserialize($counter_articles);?>
	<select id="c_articles[]" name="c_articles[]" multiple="multiple" style="width:400px;">
	<?php foreach ($sociallogin_rows as $sociallogin_row) {
	?>
	<option <?php if (!empty($counter_articles)) {
	 foreach ($counter_articles as $key=>$value) {
	 if ($sociallogin_row->id == $value) { 
	 echo " selected=\"selected\""; 
	 }
	}
	}
	?>
	value="<?php echo $sociallogin_row->id;?>" ><?php echo $sociallogin_row->title;?></option><?php }?></select>	
	</td>
	</tr>
	</table>
	</div>
	<?php echo JHtml::_('tabs.end');//echo $pane->endPanel();?>
	<!-- End social counter -->
</div>
<div style="float:right; width:29%;">
<!-- Help Box --> 
<div style="background:#EAF7FF; border: 1px solid #B3E2FF; overflow:auto; margin:0 0 10px 0;">
	<h3 style="border-bottom:#000000 1px solid; margin:0px; padding:0 0 6px 0; border-bottom: 1px solid #B3E2FF; color: #000000; margin:10px;"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP'); ?></h3>
	<ul class="help_ul">
  <li><a href="http://support.loginradius.com/customer/portal/articles/1018228-joomla-installation-configuration-and-troubleshooting" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_ONE'); ?></a></li>
  <li><a href="http://support.loginradius.com/customer/portal/articles/677100-how-to-get-loginradius-api-key-and-secret" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_TWO'); ?></a></li>
	<li><a href="http://support.loginradius.com/customer/portal/topics/272883-joomla-extension/articles" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_THREE'); ?></a></li>
	<li><a href="http://community.loginradius.com/" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_FOUR'); ?></a></li>
	<li><a href="https://www.loginradius.com/Loginradius/About" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_FIVE'); ?></a></li>
		<li><a href="https://www.loginradius.com/product/sociallogin" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_SIX'); ?></a></li>
	<li><a href="https://www.loginradius.com/addons" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_SEVEN'); ?></a></li>
		<li><a href="https://www.loginradius.com/addons" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_EIGHT'); ?></a></li>
	<li><a href="https://www.loginradius.com/sdks/loginradiussdk" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_NINE'); ?></a></li>
	<li><a href="https://www.loginradius.com/loginradius/Testimonials" target="_blank"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_HELP_LINK_TEN'); ?></a></li>
</ul>
</div>
<div style="clear:both;"></div>
<div style="background:#EAF7FF; border: 1px solid #B3E2FF;  margin:0 0 10px 0; overflow:auto;">
	<h3 style="border-bottom:#000000 1px solid; margin:0px; padding:0 0 6px 0; border-bottom: 1px solid #B3E2FF; color: #000000; margin:10px;">Stay Update!</h3>
	<p align="justify" style="line-height: 19px;font-size:12px !important; margin:10px !important;">
<?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_TECH_SUPPORT_TEXT_ONE'); ?> </p>
	<ul class="stay_ul">
  <li class="first">
    <iframe rel="tooltip" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 46px; height: 64px;" src="//www.facebook.com/plugins/like.php?app_id=194112853990900&amp;href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FLoginRadius%2F119745918110130&amp;send=false&amp;layout=box_count&amp;width=64&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=64" data-original-title="Like us on Facebook"></iframe>
  </li>
</ul>
	<div class="twitter_box"><span id="followers"></span></div>
<a href="https://twitter.com/LoginRadius" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<div style="clear:both;"></div>
<!-- Upgrade Box -->
<div style="background:#EAF7FF; border: 1px solid #B3E2FF; overflow:auto; margin:0 0 10px 0;">
<h3 style="border-bottom:#000000 1px solid; margin:0px; padding:0 0 6px 0; border-bottom: 1px solid #B3E2FF; color: #000000; margin:10px;"><?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_SUPPORT'); ?></h3>
<p align="justify" style="line-height: 19px; font-size:12px !important;margin:10px !important;">
<?php echo JText::_('COM_SOCIALLOGIN_EXTENSION_SUPPORT_TEXT'); ?> </p>
</div>
 </div>
	</div>
	<input type="hidden" name="task" value="" />
</form>
<script type="text/javascript">
	jQuery(function(){
		function m(n, d){
			P = Math.pow;
			R = Math.round
			d = P(10, d);
			i = 7;
			while(i) {
				(s = P(10, i-- * 3)) <= n && (n = R(n * d / s) / d + "KMGTPE"[i])
			}
			return n;
			}
		jQuery.ajax({
			url: 'http://api.twitter.com/1/users/show.json',
			data: {
			screen_name: 'LoginRadius'
			},
			dataType: 'jsonp',
			success: function(data) {
			count = data.followers_count;
			jQuery('#followers').html(m(count, 1));
			}
		});
	});
</script>
