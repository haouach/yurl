<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

//the name of the class must be the name of your component + InstallerScript
//for example: com_contentInstallerScript for com_content.
class plgSystemPwframeworkInstallerScript {
    /*
     * $parent is the class calling this method.
     * $type is the type of change (install, update or discover_install, not uninstall).
     * preflight runs before anything else and while the extracted files are in the uploaded temp folder.
     * If preflight returns false, Joomla will abort the update and undo everything already done.
     */

    function preflight($type, $parent) {
        $jversion = new JVersion();

//		// Installing component manifest file version
//		$this->release = $parent->get( "manifest" )->version;
// 
//		// Manifest file minimum Joomla version
//		$this->minimum_joomla_release = $parent->get( "manifest" )->attributes()->version;   
// 
//		// Show the essential information at the install/update back-end
//		echo '<p>Installing component manifest file version = ' . $this->release;
//		echo '<br />Current manifest cache commponent version = ' . $this->getParam('version');
//		echo '<br />Installing component manifest file minimum Joomla version = ' . $this->minimum_joomla_release;
//		echo '<br />Current Joomla version = ' . $jversion->getShortVersion();
// 
//		// abort if the current Joomla release is older
//		if( version_compare( $jversion->getShortVersion(), $this->minimum_joomla_release, 'lt' ) ) {
//			Jerror::raiseWarning(null, 'Cannot install com_democompupdate in a Joomla release prior to '.$this->minimum_joomla_release);
//			return false;
//		}
// 
//		// abort if the component being installed is not newer than the currently installed version
//		if ( $type == 'update' ) {
//			$oldRelease = $this->getParam('version');
//			$rel = $oldRelease . ' to ' . $this->release;
//			if ( version_compare( $this->release, $oldRelease, 'le' ) ) {
//				Jerror::raiseWarning(null, 'Incorrect version sequence. Cannot upgrade ' . $rel);
//				return false;
//			}
//		}
//		else { $rel = $this->release; }
// 
//		echo '<p>' . JText::_('COM_DEMOCOMPUPDATE_PREFLIGHT_' . $type . ' ' . $rel) . '</p>';
    }

    /*
     * $parent is the class calling this method.
     * install runs after the database scripts are executed.
     * If the extension is new, the install method is run.
     * If install returns false, Joomla will abort the install and undo everything already done.
     */

    function install($parent) {
//		echo '<p>' . JText::_('COM_DEMOCOMPUPDATE_INSTALL to ' . $this->release) . '</p>';
        // You can have the backend jump directly to the newly installed component configuration page
        // $parent->getParent()->setRedirectURL('index.php?option=com_democompupdate');
    }

    /*
     * $parent is the class calling this method.
     * update runs after the database scripts are executed.
     * If the extension exists, then the update method is run.
     * If this returns false, Joomla will abort the update and undo everything already done.
     */

    function update($parent) {
//		echo '<p>' . JText::_('COM_DEMOCOMPUPDATE_UPDATE_ to ' . $this->release) . '</p>';
        // You can have the backend jump directly to the newly updated component configuration page
        // $parent->getParent()->setRedirectURL('index.php?option=com_democompupdate');
    }

    /*
     * $parent is the class calling this method.
     * $type is the type of change (install, update or discover_install, not uninstall).
     * postflight is run after the extension is registered in the database.
     */

    function postflight($type, $parent) {
        // We only need to perform this if the extension is being installed, not updated
        if ($type == 'install') {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $fields = array($db->quoteName('enabled') . ' = ' .  1, $db->quoteName('ordering') . ' = ' .  9999);

            $conditions = array(
                $db->quoteName('element') . ' = ' . $db->quote('pwframework'),
                $db->quoteName('type') . ' = ' . $db->quote('plugin')
            );

            $query->update($db->quoteName('#__extensions'))->set($fields)->where($conditions);
            print $query->__toString();
            $db->setQuery($query);
            $db->execute();
        }
    }

    /*
     * $parent is the class calling this method
     * uninstall runs before any other action is taken (file removal or database processing).
     */

    function uninstall($parent) {
//		echo '<p>' . JText::_('COM_DEMOCOMPUPDATE_UNINSTALL ' . $this->release) . '</p>';
    }

    /*
     * get a variable from the manifest file (actually, from the manifest cache).
     */

    function getParam($name) {
//		$db = JFactory::getDbo();
//		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_democompupdate"');
//		$manifest = json_decode( $db->loadResult(), true );
//		return $manifest[ $name ];
    }

    /*
     * sets parameter values in the component's row of the extension table
     */

    function setParams($param_array) {
//		if ( count($param_array) > 0 ) {
//			// read the existing component value(s)
//			$db = JFactory::getDbo();
//			$db->setQuery('SELECT params FROM #__extensions WHERE name = "com_democompupdate"');
//			$params = json_decode( $db->loadResult(), true );
//			// add the new variable(s) to the existing one(s)
//			foreach ( $param_array as $name => $value ) {
//				$params[ (string) $name ] = (string) $value;
//			}
//			// store the combined new and existing values back as a JSON string
//			$paramsString = json_encode( $params );
//			$db->setQuery('UPDATE #__extensions SET params = ' .
//				$db->quote( $paramsString ) .
//				' WHERE name = "com_democompupdate"' );
//				$db->query();
//		}
    }

}
