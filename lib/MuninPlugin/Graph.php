<?php

namespace MuninPlugin;

/**
 * Graph
 *
 * @see http://munin-monitoring.org/wiki/protocol-config
 * @author Nicolas Hohm <nickel7152@gmail.com>
 */
class Graph extends Data {

    protected $title;
    protected $createArgs;
    protected $graphArgs;
    protected $category;
    protected $info;
    protected $order;
    protected $vlabel;
    protected $total;
    protected $scale;
    protected $graph;
    protected $host_name;
    protected $update;
    protected $period;
    protected $vtitle;
    protected $service_order;
    protected $width;
    protected $height;
    protected $printf;

    protected $datasourceSet;
    protected $blacklist = array('blacklist', 'datasourceSet');

    public function __construct($title)
    {
        $this->title = $title;
        $this->datasourceSet = new DatasourceSet();
    }

    public function getConfig()
    {
        $output = [$this->getGraphConfig()];

        foreach ($this->datasourceSet as $datasource) {
            $output[] = $datasource->getConfig();
        }

        return implode(PHP_EOL, $output);
    }

    protected function getGraphConfig()
    {
        $output = [];
        $objectVars = $this->getObjectVarsNotNull($this->blacklist);

        foreach ($objectVars as $key => $value) {

            $output[] = 'graph_'.$key.' '.$value;

        }

        return implode(PHP_EOL, $output);
    }

    public function getDatasourceSet()
    {
        return $this->datasourceSet;
    }

    public function setDatasourceSet(DatasourceSet $datasourceSet)
    {
        $this->datasourceSet = $datasourceSet;
        return $this;
    }

}
