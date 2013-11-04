<?php
namespace ResponseManager;

class CSVControllerResponse extends ControllerResponse
{
    protected $data = array();
    protected $field_names = array();

    public function __construct(Array $field_names, Array $data)
    {
        $this->data = $data;
        $this->options['headers'] = array('Content-Type' => 'application/vnd-excel');
    }

    public function createResponse()
    {
        $output = join(',', array_map(function($val) { return sprintf("\"%s\"", str_replace('"', '\"', $val)); }, $this->field_names))."\n";

        foreach($this->data as $row)
        {
            $output .= join(',', array_map(function($val) { $val = $val instanceof \DateTime ? $val->format('d-m-Y H:i:s') : $val; return sprintf("\"%s\"", str_replace('"', '\"', $val)); }, array_values($row)))."\n";
        }

        return $output;
    }
}
