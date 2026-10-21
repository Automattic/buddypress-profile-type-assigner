<?php
/**
 * Unit tests for email domain matching.
 *
 * @package Automattic\BuddyPressProfileTypeAssigner\Tests\Unit
 */

namespace Automattic\BuddyPressProfileTypeAssigner\Tests\Unit;

use function Automattic\BuddyPressProfileTypeAssigner\get_profile_type_for_email;

/**
 * Tests for get_profile_type_for_email().
 *
 * @covers \Automattic\BuddyPressProfileTypeAssigner\get_profile_type_for_email
 */
class EmailDomainMatchingTest extends TestCase {

	private const MAPPING = array(
		'@trusted.example' => 'staff',
		'partner.example'  => 'partner',
	);

	/**
	 * Load the plugin once Brain Monkey has defined add_action().
	 */
	protected function set_up(): void {
		parent::set_up();

		if ( ! defined( 'ABSPATH' ) ) {
			define( 'ABSPATH', '/' );
		}

		require_once dirname( __DIR__, 2 ) . '/buddypress-profile-type-assigner.php';
	}

	/**
	 * Test that only an exact domain match returns a profile type.
	 *
	 * @dataProvider data_emails
	 *
	 * @param string      $email    Email address.
	 * @param string|null $expected Expected profile type.
	 */
	public function test_matches_exact_domain_only( string $email, ?string $expected ): void {
		$this->assertSame( $expected, get_profile_type_for_email( $email, self::MAPPING ) );
	}

	/**
	 * Data provider.
	 *
	 * @return array<string, array{string, string|null}>
	 */
	public static function data_emails(): array {
		return array(
			'exact domain'                       => array( 'person@trusted.example', 'staff' ),
			'exact domain, mixed case'           => array( 'Person@Trusted.EXAMPLE', 'staff' ),
			'mapping key without @'              => array( 'person@partner.example', 'partner' ),
			'mapped domain as a prefix'          => array( 'person@trusted.example.other.test', null ),
			'mapped domain as a suffix'          => array( 'person@untrusted.example', null ),
			'key without @ as a suffix'          => array( 'person@notpartner.example', null ),
			'subdomain of mapped domain'         => array( 'person@sub.trusted.example', null ),
			'unrelated domain'                   => array( 'person@other.test', null ),
			'no @'                               => array( 'trusted.example', null ),
		);
	}
}
