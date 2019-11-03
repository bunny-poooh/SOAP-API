<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends AbstractController
{
    public function home()
    {
    	$options['soapApiUrl'] = $this->getParameter('soapApiUrl');
    	$options['clientUsername'] = $this->getParameter('clientUsername');
    	$options['clientPassword'] = $this->getParameter('clientPassword');

        return $this->render('core/home.html.twig', [
        	'options' => $options
        ]);
    }

    public function api(Request $request)
    {
    	$params = $request->request->all();
    	$soapClient = new \SoapClient($this->getParameter('soapApiUrl'));

		$result = $soapClient->call($params['action'], $params);
    	dump($result );
    	exit;
    }
}
