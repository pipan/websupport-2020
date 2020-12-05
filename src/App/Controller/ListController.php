<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Schema\DefaultListItemAdapter;
use Gasparik\App\View\ListView;
use Gasparik\Lib\Adapter\ListAdapter;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Websupport\WebsupportApi;

class ListController implements Controller
{
    private $config;
    private $recordAdapter;

    public function __construct($config)
    {
        $this->config = $config;    
        $this->recordAdapter = new ListAdapter(
            new DefaultListItemAdapter($this->config['websupport']['domain'])
        );
    }

    public function execute(Request $request)
    {
        $websupportApi = new WebsupportApi($this->config['websupport']);
        $response = $websupportApi->getDnsList($this->config['websupport']['domain']);

        return (new ListView())->render([
            'title' => 'DNS list',
            'dns_records' => $this->recordAdapter->adapt($response['items'])
        ]);
    }
}