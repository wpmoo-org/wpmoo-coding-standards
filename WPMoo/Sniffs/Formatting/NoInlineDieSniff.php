<?php

namespace WPMoo\Sniffs\Formatting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Disallow direct usage of die()/exit() in favour of wp_die().
 */
class NoInlineDieSniff implements Sniff
{
    /**
     * {@inheritdoc}
     */
    public function register(): array
    {
        return [T_EXIT];
    }

    /**
     * {@inheritdoc}
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $token = $tokens[$stackPtr];
        $content = strtolower($token['content']);

        if ($content === 'exit' || $content === 'die') {
            $phpcsFile->addError(
                'Use wp_die() instead of %s().',
                $stackPtr,
                'FoundDie',
                [$content]
            );
        }
    }
}
