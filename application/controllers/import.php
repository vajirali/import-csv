<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

    class Import extends CI_Controller {

        public function __construct() {
            parent::__construct();
			$this->load->model('site');
			$this->load->library('Csvreader');
        }
		
        public function index(){
            $data['title'] = 'Import CSV Demo';
            $data['result'] = $this->site->getProduct();
			$this->load->view('index', $data);
        }
		
		public function importcsvFile(){	
			$file_data = $this->csvreader->parse_file($_FILES["csvfile"]["tmp_name"]);
			foreach($file_data as $row){
			   $data[] = array(
							  'name' => $row["name"],
							  'price'  => $row["price"],
							  'description'   => $row["description"]
					   );
			}
			$this->site->insert($data);
			redirect('import/');
        }
		
		function samplecsvFile(){
			$filename = time().'.csv';
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");

			// disposition / encoding on response body
			header("Content-Disposition: attachment;filename={$filename}");
			header("Content-Transfer-Encoding: binary");
			ob_start();
		   $df = fopen("php://output", 'w');
		   
		   fputcsv($df,['id','name','price','description']);
		   fputcsv($df,[1,'aaaa',170,'description1']);
		   fputcsv($df,[2,'bbbb',180,'description2']);
		   fputcsv($df,[3,'cccc',188,'description3']);
		   fputcsv($df,[4,'dddd',190,'description4']);
		   fputcsv($df,[5,'eeee',195,'description5']);
		   
		   fclose($df);
		   echo ob_get_clean();
		}

        
    }
?>