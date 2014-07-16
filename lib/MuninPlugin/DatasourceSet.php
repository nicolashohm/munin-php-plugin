<?php

namespace MuninPlugin;

/**
 * @author Nicolas Hohm <nickel7152@gmail.com>
 */
class DatasourceSet extends \ArrayObject {

    public function getValues()
    {
        $output = [];

        foreach ($this as $datasource) {
            $output[] = $datasource->getName().'.value '.$datasource->getValue();
        }

        return implode(PHP_EOL, $output);
    }

    public function append(Datasource $datasource) {
        parent::append($datasource);
    }

}
