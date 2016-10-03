<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Owncloud\Updater\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DbUpgradeCommand
 *
 * @package Owncloud\Updater\Command
 */
class DbUpgradeCommand extends Command {

	protected function configure(){
		$this
				->setName('upgrade:dbUpgrade')
				->setDescription('db schema upgrade')
				->addArgument(
						'simulation', InputArgument::OPTIONAL, ''
				)
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function execute(InputInterface $input, OutputInterface $output){
		$simulation = strtolower($input->getArgument('simulation'));
		$message = $simulation === 'true' ? ' simulated (optionally, can be done online in advance)' : 'real [danger, might take long]';
		$output->writeln($message);
	}

}
