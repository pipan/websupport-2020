<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Flash;
use Gasparik\App\Schema\DefaultListItemAdapter;
use Gasparik\App\View\ListView;
use Gasparik\Lib\Adapter\ListAdapter;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;
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

    public function execute(Request $request): Response
    {
        $websupportApi = new WebsupportApi($this->config['websupport']);
        $response = $websupportApi->getDnsList($this->config['websupport']['domain']);

        $html = (new ListView())->render([
            'title' => 'DNS | records',
            'dns_records' => $this->recordAdapter->adapt($response['items']),
            'flash' => Flash::getAll()
        ]);
        return Response::html($html);
    }
}