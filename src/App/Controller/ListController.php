<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Flash;
use Gasparik\App\Schema\DefaultListItemAdapter;
use Gasparik\App\View\Layout;
use Gasparik\Lib\Adapter\ListAdapter;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;
use Gasparik\Lib\Websupport\WebsupportApi;

class ListController implements Controller
{
    private $recordAdapter;
    private $websupportApi;

    public function __construct(WebsupportApi $websupportApi, $domain)
    {
        $this->websupportApi = $websupportApi;
        $this->recordAdapter = new ListAdapter(
            new DefaultListItemAdapter($domain)
        );
    }

    public function execute(Request $request): Response
    {
        
        $response = $this->websupportApi->getDnsList();

        $html = Layout::withBodyFile('list.php')
            ->render([
                'title' => 'DNS | records',
                'dns_records' => $this->recordAdapter->adapt($response['items']),
                'flash' => Flash::getAll()
            ]);
        return Response::html($html);
    }
}