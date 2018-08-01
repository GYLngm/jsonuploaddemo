<?php
namespace App\Controller;

//use Symfony\Component\HttpFoundation\Response;
use App\Entity\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Query\ResultSetMapping;

class MainController extends AbstractController
{

    /**
    * @Route("/")
    */
    public function homepage() {
        return $this->render('base.html.twig',[
            'title' => ucwords('JsonUploadKick')
        ]);
    }
    /**
     * @Route("/parseJson")
     */
    public function parseJson(){
        $request = Request::createFromGlobals();
        $data = [];
        $response = new JsonResponse();

        if($request->files->get('inputJsonFile01')){
            $file = $request->files->get('inputJsonFile01');
            $fh = fopen($file, "rb");
            $rowData = fread($fh, filesize($file));
            $res = (array) json_decode($rowData);
            fclose($fh);

            foreach($res as $value){
                $this->passToDatabase($value);
            }

            foreach($this->retriveData() as $value){
                $sub = [];
                array_push($sub,$value->getDate());
                array_push($sub,$value->getTime());
                array_push($sub,$value->getLongitude());
                array_push($sub,$value->getLatitude());
                array_push($sub,$value->getIMEI());
                array_push($sub,$value->getVersion());
                array_push($sub,$value->getTemperature());
                array_push($sub,$value->getNumBus());
                array_push($data,$sub);
            }

            $response->setStatusCode(Response::HTTP_OK);
            $response->setData($data);
        }else {
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            $response->setData('Bad request');
        }
        return $response;
    }


    public function passToDatabase($res = array()){
        $em = $this->getDoctrine()->getManager();
        $json = new Json();
        if($this->checkExist($res->IMEI)){
            return false;
        }else{
            $json->setDate($res->date);
            $json->setTime($res->time);
            $json->setLongitude($res->longitude);
            $json->setLatitude($res->latitude);
            $json->setIMEI($res->IMEI);
            $json->setVersion($res->version);
            $json->setTemperature($res->temperature);
            $json->setNumBus($res->num_bus);
            $em->persist($json);
            $em->flush();
        }
        return true;
    }

    public function checkExist($imei = 0){
        return $this->getDoctrine()->getManager()->getRepository(Json::class)->findOneBy(['IMEI'=>$imei]);
    }
    public function retriveData(){
        $em = $this->getDoctrine()->getManager();

        $json = $em->getRepository(Json::class)->findAll();

        return $json;
    }

}