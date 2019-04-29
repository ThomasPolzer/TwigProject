<?php

namespace controller\home;

include '../model/teammembers/DB_teammember.php';
use model\teammembers;
use ORM;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class HomeController
{
    private $app;

    /**
     * @return mixed
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param mixed $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    public function __construct($app)
    {
        $this->app = $app;
    }

// Render Twig template in route
function createHomeView ()
{

    //$teammates = new teammembers\DB_teammember();
    //$members = $teammates->getTeammembers();


    /////////////////////////////7 neu

    //$members = \database\Teammembers::find_many();
    //$projects = \customer\Projects::find_many();
    //$members->changeEmail('annika.menk@gmail.com');

    //$orm = $members->orm;
    //$tset = $orm->find_array();
    //echo $tset[0]['name'];

    $members = ORM::for_table('customer_projects')
        ->table_alias('cp')
        ->select('cp.project_name', 'project_name')
        ->select('dt.vorname', 'vorname')
        ->select('dt.name', 'name')
        ->select('dt.email', 'email')
        ->select('dt.city', 'stadt')
        ->join('database_teammembers', array('cp.project_lead_id', '=', 'dt.id'), 'dt')
        ->find_array();
        //find_array gibt Rückgabewerte als Array (jede Rückgabezeile der Tabelle als eigenes Array, geschachtelt in einem Array) zurück --> hierüber kann iteriert werden

    //echo $members[0]['name'];

/*


    $teammemberarray = [];


    foreach ($members as $member) {
        $arrayentry = ['vorname' => $member->vorname, 'name' => $member->name, 'stadt' => $member->stadt, 'email' => $member->email, 'project_name' => $member->project_name];
        array_push($teammemberarray, $arrayentry);
    }*/


    return $this->getApp()->get('/home', function ($request, $response, $args) use ($members) {
        return $this->view->render($response, 'home.twig', array(
            'websitename' => 'TGT.com',
            'page1' => 'Team',
            'page2' => 'Schwarzwald',
            'page3' => 'DXC',
            'sites' => array(
                'Axel',
                'Annika',
                'Frank',
                'Ralph',
                'Lemmy'
            ),
          'teammembers' => $members

        ));
    });




/*    $app->get('/Schwarzwald', function (Request $request, Response $response, array $args) {
        $response->getBody()->write("Hello Schwarzwald");

        return $response;
    });*/


}

}