<?php

namespace MuninPlugin;

/**
 * @author Nicolas Hohm <nickel7152@gmail.com>
 */
abstract class Data {

    public function __call($name, $arguments)
    {
        $var_name = strtolower(substr($name, 3));

        if (strpos($name, 'get') === 0) {
            return $this->$var_name;
        } elseif (strpos($name, 'set') === 0) {
            $this->$var_name = $arguments[0];
            return $this;
        } else {
            throw new \Exception('Unkown method '.$name, 1);
        }
    }

    protected function getObjectVars(array $blacklist)
    {
        $objectVars = get_object_vars($this);

        foreach (array_keys($objectVars) as $key) {

            if (in_array($key, $blacklist)) {
                unset($objectVars[$key]);
            }

        }

        return $objectVars;
    }

    protected function getObjectVarsNotNull(array $blacklist) {
        return array_filter($this->getObjectVars($blacklist));
    }

}
