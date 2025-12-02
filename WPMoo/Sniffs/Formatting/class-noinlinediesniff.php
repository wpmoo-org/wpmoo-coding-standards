<?php
/**
 * WPMoo_Sniffs_Formatting_NoInlineDieSniff.
 *
 * PHP version 7.4
 *
 * @category  PHP
 * @package   WPMoo
 * @author    Your Name <your.email@example.com>
 * @copyright 2025 WPMoo
 * @license   https://www.gnu.org/licenses/gpl-3.0 GPL v3
 * @link      https://example.com
 */

namespace WPMoo\Sniffs\Formatting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Disallow direct usage of die()/exit() in favour of wp_die().
 */
class NoInlineDieSniff implements Sniff {
	/**
	 * {@inheritdoc}
	 *
	 * @return array<int, int>
	 */
	public function register(): array {
		return array( T_EXIT );
	}

	/**
	 * {@inheritdoc}
	 *
	 * @param File $phpcs_file The file being scanned.
	 * @param int  $stack_ptr  The position of the current token in the token stack.
	 * @return void
	 */
	public function process( File $phpcs_file, $stack_ptr ) {
		$tokens  = $phpcs_file->getTokens();
		$token   = $tokens[ $stack_ptr ];
		$content = strtolower( $token['content'] );

		if ( 'exit' === $content || 'die' === $content ) {
			$phpcs_file->addError(
				'Use wp_die() instead of %s().',
				$stack_ptr,
				'FoundDie',
				array( $content )
			);
		}
	}
}
