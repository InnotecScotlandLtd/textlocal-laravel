<?php
/**
 * This file is part of the Textlocal package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace TextLocal;

class TextLocal implements TextLocalInterface
{
    public static function isMutable()
    {
        return true;
    }
}