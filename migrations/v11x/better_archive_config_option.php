<?php

/**
*
* @package NV Newspage Extension
* @copyright (c) 2014 nickvergessen
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace nickvergessen\newspage\migrations\v11x;

class better_archive_config_option extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return !isset($this->config['news_archive_per_year']) && isset($this->config['news_archive_show']);
	}

	static public function depends_on()
	{
		return array('\nickvergessen\newspage\migrations\v11x\release_1_1_0');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('news_archive_show', $this->config['news_archive_per_year'])),
			array('config.remove', array('news_archive_per_year', 1)),
		);
	}
}
