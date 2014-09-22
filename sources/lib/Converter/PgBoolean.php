<?php
/*
 * This file is part of Pomm's Foundation package.
 *
 * (c) 2014 Grégoire HUBERT <hubert.greg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PommProject\Foundation\Converter;

use PommProject\Foundation\Exception\ConverterException;
use PommProject\Foundation\Converter\ConverterInterface;

/**
 * PgBoolean
 *
 * Converter for boolean type.
 *
 * @package Foundation
 * @copyright 2014 Grégoire HUBERT
 * @author Grégoire HUBERT <hubert.greg@gmail.com>
 * @license X11 {@link http://opensource.org/licenses/mit-license.php}
 * @see ConverterInterface
 */
class PgBoolean implements ConverterInterface
{
    /**
     * @see ConverterInterface
     */
    public function fromPg($data, $type = null)
    {
        if (!preg_match('/(t|f)/', $data)) {
            if ($data === null || $data === '') {
                return null;
            }

            throw new ConverterException(sprintf("Unknown boolean data '%s'.", $data));
        }

        return (bool) ($data === 't');
    }

    /**
     * @see ConverterInterface
     */
    public function toPg($data, $type = null)
    {
        return $data ? "true" : "false";
    }
}