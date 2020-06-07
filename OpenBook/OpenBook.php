<?php

if ( function_exists( 'wfLoadSkin' ) ) {
	wfLoadSkin( 'OpenBook' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['OpenBook'] = __DIR__ . '/i18n';
	return true;
} else {
	die( 'This version of the OpenBook skin requires MediaWiki 1.25+' );
}
