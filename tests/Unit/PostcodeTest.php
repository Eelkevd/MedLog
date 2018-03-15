<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Postcode
{
	public static function format($postcode)
	{
		return strtoupper(str_replace(" ", "", $postcode));
	}

	public static function is_valid($postcode)
	{
		$number_matches = 0;
		$postcode = strtoupper(str_replace(" ", "", $postcode));
		preg_match('/[0-9]{4}[a-zA-Z]{2}/', $postcode, $number_matches);
 var_dump($number_matches);

		if (count($number_matches) > 0)
			{
				return true;
			}
		else {return false;}
	}
}

class PostcodeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_format_all_postcodes_in_a_uniform_way()
    {
        $this->assertEquals('8897BA', Postcode::format('8897 BA'));

        $this->assertEquals('8897BA', Postcode::format('8897 ba'));

        $this->assertEquals('8897BA', Postcode::format('   8897    BA   '));
    }

    public function test_if_postcode_is_a_valid_dutch_postcode()
    {
    	$this->assertTrue(Postcode::is_valid('8897 BA'));

    	$this->assertFalse(Postcode::is_valid('BA 8897'));

    	$this->assertFalse(Postcode::is_valid('38897 BxA'));

    	$this->assertFalse(Postcode::is_valid('8897 BSA'));

    	$this->assertFalse(Postcode::is_valid(' 8897 BA '));
    }
}
