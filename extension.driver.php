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
			Frontend::Page()->addHeaderToPage("Access-Control-Allow-Origin:", "*");
		}

	}

?>
