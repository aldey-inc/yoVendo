<?php

namespace YoVendo\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('YoVendoMainBundle:Default:index.html.twig', array('name' => $name));
    }

    public function viewDashBoardAction(){

    
    	$salesForMonth=array();
    	$clients=$this->getAllSalesByClient(null,null);
    	return $this->render('YoVendoMainBundle:Default:viewDashBoard.html.twig',array('name' => 'desdele56jos','clients'=> $clients));
    }

    public function getAllSalesByClient($startDate,$endDate){
    	if($startDate==null){
    		$startDate=new \DateTime('2015-01-01 00:00:00');
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

    public function getAllClients(){
   		$em=$this->getDoctrine()->getManager();
    	
    	$clients=$em->getRepository('YoVendoMainBundle:Client')->findAll();

    	return $clients;

    }
}
