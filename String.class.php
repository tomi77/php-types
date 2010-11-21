<?php
namespace pl\tomaszrup;

require_once 'StringType.class.php';

/**
 * Description of String
 *
 * @author Tomasz Jakub Rup
 */
class String implements StringType {

    /**
     * @var string
     */
    private $str;

    public function __construct($string='') {
        $this->str = $string;
        $this->position = 0;
    }

    public function __toString() {
        return (string)$this->str;
    }

    public function concat($string) {
        return new String($this->str.$string);
    }

    public function substr($start, $length='') {
        return new String($length == '' ? substr($this->str, $start) : substr($this->str, $start, $length));
    }

    public function trim($charlist = null) {
        return new String(trim($this->str));
    }

    public function ltrim($charlist = null) {
        return new String(ltrim($this->str));
    }

    public function rtrim($charlist = null) {
        return new String(rtrim($this->str));
    }

    public function lower() {
        return new String(strtolower($this->str));
    }

    public function upper() {
        return new String(strtoupper($this->str));
    }

    public function replace($search, $replace, $case=false) {
        return new String(str_replace($search, $replace, $this->str));
    }

    public function length() {
        return strlen($this->str);
    }

    public function crc32() {
        return crc32($this->str);
    }

    public function crypt() {
        return new String(crypt($this->str));
    }

    public function md5($raw_output = false) {
        return new String(md5($this->str, $raw_output));
    }

    public function rot13() {
        return new String(str_rot13($this->str));
    }

    public function sha1($raw_output = false) {
        return new String(sha1($this->str, $raw_output));
    }

    public function offsetExists($offset) {
        return $offset <= $this->length();
    }
    public function offsetGet($offset) {
        return $this->str[intval($offset)];
    }
    public function offsetSet($offset, $value) {
        $this->str[$offset] = $value;
    }
    public function offsetUnset($offset) {
        $this->str = $this->substr(0, $offset).$this->substr($offset+1);
    }
    
    private $position;
    public function current() {
        return new String($this[$this->position]);
    }
    public function key() {
        return $this->position;
    }
    public function next() {
        $this->position++;
    }
    public function rewind() {
        $this->position = 0;
    }
    public function valid() {
		return $this->position < $this->length();
    }

    /*
     * SimpleType
     */

    public function println() {
        echo $this->str.PHP_EOL;
    }

    public function get() {
        return $this->str;
    }

    public function set($value) {
        $this->str = (string)$value;
    }

    public function lt(SimpleType $i) {
		return $this->str < $i->get();
	}

    public function gt(SimpleType $i) {
		return $this->str > $i->get();
	}

    public function eq(SimpleType $i) {
		return $this->str == $i->get();
	}

    public function ne(SimpleType $i) {
		return $this->str <> $i->get();
	}

    public function lte(SimpleType $i) {
		return $this->str <= $i->get();
	}

    public function gte(SimpleType $i) {
		return $this->str >= $i->get();
	}
}
