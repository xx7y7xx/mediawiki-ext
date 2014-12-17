<?php
 
// Take credit for your work.
$wgExtensionCredits['parserhook'][] = array(
 
   // The full path and filename of the file. This allows MediaWiki
   // to display the Subversion revision number on Special:Version.
   'path' => __FILE__,
 
   // The name of the extension, which will appear on Special:Version.
   'name' => 'Example Parser Function',
 
   // A description of the extension, which will appear on Special:Version.
   'description' => 'A simple example parser function extension',
 
   // Alternatively, you can specify a message key for the description.
   'descriptionmsg' => 'exampleextension-desc',
 
   // The version of the extension, which will appear on Special:Version.
   // This can be a number or a string.
   'version' => 1, 
 
   // Your name, which will appear on Special:Version.
   'author' => 'Me',
 
   // The URL to a wiki page/web page with information about the extension,
   // which will appear on Special:Version.
   'url' => 'https://www.mediawiki.org/wiki/Manual:Parser_functions',
 
);
 
// Specify the function that will initialize the parser function.
$wgHooks['ParserFirstCallInit'][] = 'ExampleExtensionSetupParserFunction';
 
// Allow translation of the parser function name
$wgExtensionMessagesFiles['ExampleExtension'] = __DIR__ . '/ExampleExtension.i18n.php';
 
// Tell MediaWiki that the parser function exists.
function ExampleExtensionSetupParserFunction( &$parser ) {
 
   // Create a function hook associating the "example" magic word with the
   // ExampleExtensionRenderParserFunction() function. See: the section 
   // 'setFunctionHook' below for details.
   //$parser->setFunctionHook( 'example', 'ExampleExtensionRenderParserFunction' );
   $parser->setFunctionHook( 'jiandanurl', 'ExampleExtensionRenderParserFunction' );
 
   // Return true so that MediaWiki continues to load extensions.
   return true;
}
 
// Render the output of the parser function.
//function ExampleExtensionRenderParserFunction( $parser, $param1 = '', $param2 = '', $param3 = '' ) {
function ExampleExtensionRenderParserFunction( $parser, $param1 = '') {
 
   // The input parameters are wikitext with templates expanded.
   // The output should be wikitext too.
   //$output = "param1 is $param1 and param2 is $param2 and param3 is $param3";
   $output = "<html><a href=\"file://192.168.2.21/share/jiandan001/prj/rdfz/$param1\">$param1</a></html>";
 
   //return $output;
   return array( $output, 'noparse' => true, 'isHTML' => true );
}
