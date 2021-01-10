<?php


namespace Modules\Leave\View\Components;

use Illuminate\View\Component;

class InfoCard extends Component
{
    public $header;
    public $data;
    public $iconType;
    public $iconSize;

    /**
     * InfoCard constructor.
     * @param $header
     * @param $data
     * @param $iconType
     * @param $iconSize
     */
    public function __construct($header, $data, $iconType, $iconSize)
    {
        $this->header = $header;
        $this->data = $data;
        $this->iconType = $iconType;
        $this->iconSize = $iconSize;
    }

    public function render()
    {
        // TODO: Implement render() method.
    }
}
