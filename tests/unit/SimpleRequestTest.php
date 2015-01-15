<?php

namespace Mediawiki\Api\Test;

use Mediawiki\Api\SimpleRequest;

/**
 * @covers Mediawiki\Api\SimpleRequest
 */
class SimpleRequestTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $action, $params, $expected, $headers = array() ) {
		$request = new SimpleRequest( $action, $params, $headers );
		$this->assertEquals( $expected, $request->getParams() );
		$this->assertEquals( $headers, $request->getHeaders() );
	}

	public function provideValidConstruction() {
		return array(
			array( 'action', array(), array( 'action' => 'action' ) ),
			array( '1123', array(), array( 'action' => '1123' ) ),
			array( 'a', array( 'b' => 'c' ), array( 'action' => 'a', 'b' => 'c' ) ),
			array( 'a', array( 'b' => 'c', 'd' => 'e' ), array( 'action' => 'a', 'b' => 'c', 'd' => 'e' ) ),
			array( 'a', array( 'b' => 'c|d|e|f' ), array( 'action' => 'a', 'b' => 'c|d|e|f' ) ),
			array( 'foo', array(), array( 'foo' => 'bar' ) ),
		);
	}

} 