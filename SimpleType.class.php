<?php
namespace pl\tomaszrup;

/**
 *
 * @author Tomasz Jakub Rup
 */
interface SimpleType {
    public function println();

    public function get();

    public function set($value);

    public function lt(SimpleType $i);

    public function gt(SimpleType $i);

    public function eq(SimpleType $i);

    public function ne(SimpleType $i);

    public function lte(SimpleType $i);

    public function gte(SimpleType $i);
}
