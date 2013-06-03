<?php

	Class extension_cors extends Extension {

		public function about() {
			return array(
				'name'			=> 'CORS',
				'version'		=> '0.0.1',
				'release-date'	=> '2013-06-03',
				'author' => array('name' => 'Ross Cairns',
					'website' => 'http://www.theworkers.net',
					'email' => 'r@theworkers.net'),
				'description'	=> 'Add CORS server headers.'
			);
		}

		public function getSubscribedDelegates(){
			return array(
				array(
                    'page' => '/frontend/',
                    'delegate' => 'FrontendOutputPreGenerate',
                    'callback' => 'addCORSHeader'
                ),
			);
		}

		public function addCORSHeader($context) {

			if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
				header('Access-Control-Allow-Origin: *');
				header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
				header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
				exit;
			}
			else {
				// Leaving this out for now.
				//Frontend::Page()->addHeaderToPage('Access-Control-Allow-Headers:', 'X-Requested-With');
				Frontend::Page()->addHeaderToPage("Access-Control-Allow-Origin", '*');
			}
		}

	}

?>
