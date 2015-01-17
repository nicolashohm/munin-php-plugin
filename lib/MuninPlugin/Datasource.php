<?php

namespace MuninPlugin;

/**
 * Datasource
 *
 * @see http://munin-monitoring.org/wiki/protocol-config
 * @author Nicolas Hohm <nickel7152@gmail.com>
 */
class Datasource extends Data {

    protected $label;
    protected $cdef;
    protected $draw;
    protected $graph;
    protected $info;
    protected $extinfo;
    protected $max;
    protected $min;
    protected $negative;
    protected $type;
    protected $warning;
    protected $critical;
    protected $colour;
    protected $sum;
    protected $stack;
    protected $line;
    protected $oldname;
    protected $value;

    protected $name;
    protected $blacklist = array('blacklist', 'name', 'value');

    public function __construct($name) {
        $this->name = $name;
    }

    public function getConfig()
    {
        $output = [];
        $objectVars = $this->getObjectVarsNotNull($this->blacklist);

        foreach ($objectVars as $key => $value) {
            $output[] = $this->name.'.'.$key.' '.$value;
        }

        return implode(PHP_EOL, $output);
    }

}
