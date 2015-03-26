<?php

namespace YoVendo\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('YoVendoMainBundle:Default:index.html.twig', array('name' => $name));
    }

    public function viewDashBoardAction($startDate = null,$endDate = null){
    	

    	if($startDate==null){
    		$startDate=new \DateTime('2014-01-01 00:00:00');
    	}
    	if($endDate==null){
    		$endDate=new \DateTime('now');
    	}

    	$startMonths=(int)date_format($startDate,'m') +(int)date_format($startDate ,'Y')*12;
    	$endMonths=(int)date_format($endDate,'m') +(int)date_format($endDate ,'Y')*12;    	
    	$totalMonths=$endMonths-$startMonths+1;


    	$salesForMonth=array();
    	$clients=$this->getAllClients();
    	
    	foreach ($clients as $client) {
    		$sales=$this->getSalesByClient($client,$startDate,$endDate);
    		$salesForMonth[$client->getName()]['nameClient']=$client->getName();
    		$salesForMonth[$client->getName()]['total']	=0;
    		foreach ($sales as $sale){
    			$salesForMonth[$client->getName()]
    				[(int)date_format($sale->getSaleat(),'m') +(int)date_format($sale->getSaleat() ,'Y')*12]=$sale->getQuantity();
    			$salesForMonth[$client->getName()]['total']	+= $sale->getQuantity();
    		}

    	}
    	//$sales=$this->getAllSalesByClients(null,null);

        foreach ($salesForMonth as $key => $value) {
            $total[$key] = $value['total'];
            # code...
        }

        array_multisort($total,SORT_DESC,$salesForMonth);

    	return $this->render('YoVendoMainBundle:Default:viewDashBoard.html.twig',array('name' => 'desdele56jos','clients'=> $clients,'salesForMonth'=>$salesForMonth,'startMonths' => $startMonths, 'endMonths'=>$endMonths));
    }

    public function getAllSalesByClients($startDate,$endDate){
    	if($startDate==null){
    		$startDate=new \DateTime('2011-01-01 00:00:00');
    	}
    	if($endDate==null){
    		$endDate=new \DateTime('now');
    	}
    	$em=$this->getDoctrine()->getManager();
    	//$sales=$em->getRepository('YoVendoMainBundle:Sale')->findAll();

    	$dql=  'SELECT sale
    				FROM YoVendoMainBundle:Sale sale
    			WHERE sale.saleat >= :startDate
    				AND sale.saleat <= :endDate
    			';

    	$query= $em->createQuery($dql);

    	$query->setParameter('startDate',$startDate);
    	$query->setParameter('endDate',$endDate);

    	return $query->getResult();
    }
    public function getSalesByClient($client,$startDate,$endDate){
    	if(is_null($startDate)){
    		$startDate=new \DateTime('2011-01-01 00:00:00');
    	}
    	if(is_null($endDate)){
    		$endDate=new \DateTime('now');
    	}

    	$em=$this->getDoctrine()->getManager();

    	$dql= 	'SELECT sale
    				FROM YoVendoMainBundle:Sale sale
    			WHERE sale.idclient = :idClient
                    AND sale.saleat >= :startDate
                    AND sale.saleat <= :endDate
    			';

    	$query= $em->createQuery($dql);        

    	$query->setParameter('idClient',$client->getIdclient());
        $query->setParameter('startDate',$startDate);
        $query->setParameter('endDate',$endDate);

    	return $query->getResult();
    }
    public function getAllClients(){
   		$em=$this->getDoctrine()->getManager();
    	
    	$clients=$em->getRepository('YoVendoMainBundle:Client')->findAll();

    	return $clients;

    }
}
