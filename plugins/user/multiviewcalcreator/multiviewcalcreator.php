<?php
defined('_JEXEC') or die;

jimport('joomla.plugins.plugin');

class plgUserMultiviewcalCreator extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.5
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	function onUserAfterSave($user, $isnew, $success, $msg)
	{
		if(!$success) {
			return false; // if the user wasn't stored we don't resync
		}

		if(!$isnew) {
			return false; // if the user isn't new we don't sync
		}

		// ensure the user id is really an int
		$user_id = (int)$user['id'];

		if (empty($user_id)) {
			die('invalid userid');
			return false; // if the user id appears invalid then bail out just in case
		}

		$db 	=& JFactory::getDBO();
  
        JTable::addIncludePath(JPATH_ADMINISTRATOR.'/components/com_multicalendar/tables');
		$calendar =& JTable::getInstance('multicalendar', 'Table');
		$calendar->title = $this->params->get('name', 0)." - ".$user["username"];
		$calendar->owner = $user_id;
		
		$calendar->permissions = "groups1=0;users1=".( ( (int)$this->params->get('permissions1')==1 )?$user_id:"0" ).";groups2=0;users2=".( ( (int)$this->params->get('permissions2')==1 )?$user_id:"0" ).";groups3=0;users3=".( ( (int)$this->params->get('permissions3')==1 )?$user_id:"0" ).";";
		$calendar->published = 1;
        if ($calendar->check()) {
			$result = $calendar->store();
		}
		if (!(isset($result)) || !$result) {
			JError::raiseError(42, JText::sprintf('Failed to create calendar', $calendar->getError()));
		}
	}
}
