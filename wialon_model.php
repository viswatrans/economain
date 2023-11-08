<?php  

	

	set_time_limit(0);

	

	ini_set('max_execution_time', 0);

	

	//max_execution_time(0);

	

	

	

	

	

	class wialon_model   {

		

		

		

		public $url = 'https://hst-api.wialon.com/wialon/ajax.html?svc=';

		

		public $lgn = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/login&params=';

		

		public $lgt = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/logout&params=';

		

		public $srh = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params=';

		

		public $exr = 'https://hst-api.wialon.com/wialon/ajax.html?svc=report/exec_report&params=';

		

		public $ltl = 'https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_interval&params=';

		

		public $lta = 'https://hst-api.wialon.com/wialon/ajax.html?svc=report/get_result_rows&params=';

		

		public $searchitem = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params=';

		

		

		

		//svc=core/search_item&params={"id":<long>,

		

		//		     "flags":<long>}

		

		public $uid;

		

		public $psw;

		

		public $session;

		

		public $resource;

		

		public $template;

		

		public $unit;

		

		public $flags;

		

		public $from;

		

		public $to;

		

		

		

		public $token_id;

		

		public $model_id;

		

		

		

		public function login($params){

			

			

			

			$this->uid = $params["uid"];

			

			$this->psw = $params["psw"];

			

			

			

			$this->uid = $params["uid"];

			

			$this->psw = $params["psw"];

			

			

			

			

			

			$loginurl='https://hst-api.wialon.com/wialon/ajax.html?svc=token/login&params={"token":"';

			

			

			

			$tokenid='';

			

			

			

			

			

			

			

			

			

			$tokenid=$this->token_id;

			

			

			

			

			

			$url=$loginurl.$tokenid.'","operateAs":""}';

			

			// echo $url;

			

			

			

			$return = array();

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			

			

			

			

			// print_r($array);

			

			// exit;

			

			///$this->model_id=$array['user']["id"];

			

			

			

			// echo $array["eid"];

			

			// exit;

			

			if(empty($array["eid"])):

			

			$return["valid"] = false;

			

			return $return;

			

			else:

			

			$this->session = $array["eid"];

			

			

			

			//$this->resource = explode('_',$array['user']['prp']['mu_fast_report_tmpl'])[0];

			

			if(isset($array['reportressult']["items"][0]["id"]))

			

			$this->resource = $array['reportressult']["items"][0]["id"];

			

			else

			

			$this->resource = $array["items"][0]["id"];

			

				 $this->resource = $array['user']['bact']; //12341946



			

if($this->resource=='')

			 $this->resource = explode('_',$array['user']['prp']['mu_fast_report_tmpl'])[0];



			//---------------Update timezone_abbreviations_list

			

			

			

			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=render/set_locale&params={"tzOffset":134237528,"language":"en","flags":256,"formatDate":"'.urlencode('%Y-%m-%E %H:%M:%S').'"}&sid='.$this->session;

			

			

			

			

			

			$ch = curl_init();

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			

			

			

			

			

			

			

			

			/*

				

				

				

				//load geofences lsit

				

				$ch = curl_init();

				

				$url = $this->srh.'{"spec":{"itemsType":"avl_resource","propName":"*","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;

				

				//echo $url;

				

				//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params={"spec":{"itemsType":"avl_resource","propName":"*","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;

				

				$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

				

				curl_setopt_array( $ch, $options );

				

				curl_setopt($ch, CURLOPT_URL, $url);

				

				curl_setopt($ch, CURLOPT_HEADER, 0);

				

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

				

				$page = curl_exec($ch);

				

				//  print_r($page);

				

				//   exit;

				

				$array = json_decode($page, true);

				

				

				

				// print_r($array);

				

				if(isset($array['reportressult']["items"][0]["id"]))

				

				$this->resource = $array['reportressult']["items"][0]["id"];

				

				else

				

				$this->resource = $array["items"][0]["id"];

				

				

				

			*/

			

			

			

			

			

			

			

			

			

			// echo $this->resource ;

			

			// exit;

			

			$return["valid"] = true;

			

			$return["session"] = $this->session;

			

			$return["resource"] = $this->resource;

			

			

			

			

			

			return $return;

			

			endif;

			

		}

		

		public function getTemplateId($templatename)

		

		{

			

			$url =  'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params={"spec":{"itemsType":"avl_resource","propName":"reporttemplates","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":"0x00002000","from":0,"to":0}&sid='.$this->session;

			

			

			

			//	echo $url.'<br/><br/>';

			

			

			

			$template_properties=$this->excuteurl($url); 

			

			

			if(isset($template_properties['items']))

			

			{

				

				foreach($template_properties['items']['0']['rep'] as $row)

				

				{

					

					if(strtolower($row['n'])==strtolower($templatename))

					

					{

						

						return $row['id'];

						

					}

					

					

					

					

					

				}

				

			}

			

			

			

			

			

			

			

			return 0;

			

		}

		

		public function loginonly($params)

		

		{

			

			

			

			

			

			

			

			/*

				

				$this->uid = $params["uid"];

				

				$this->psw = $params["psw"];

				

				

				

				

				

				$this->uid = $params["uid"];

				

				$this->psw = $params["psw"];

				

			*/

			

			

			

			

			

			

			

			$this->uid='apcivil';

			

			$loginurl='https://hst-api.wialon.com/wialon/ajax.html?svc=token/login&params={"token":"';

			

			

			

			$tokenid='';

			

			

			

			if($params!='')

			

			{

				

				$tokenid=$params; //---------------------------- APCIVIL 

				

				

				

			}

			

			else

			

			

			

			$tokenid='';

			

			

			

			

			

			$tokenid=$this->token_id;

			

			

			

			

			

			

			

			

			

			$url=$loginurl.$tokenid.'","operateAs":""}';

			

			

			

			$return = array();

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			

			

			

			

			// print_r($array);

			

			

			

			

			

			// echo $array["eid"];

			

			// exit;

			

			if(empty($array["eid"])):

			

			$return["valid"] = false;

			

			return $return;

			

			else:

			

			$this->session = $array["eid"];

			

			$this->resource = $array['user']['bact']; //12341946

			

			

			if($this->resource=='')

			$this->resource = explode('_',$array['user']['prp']['mu_fast_report_tmpl'])[0];

			

			endif;

			

			

			

			

			

			

			

			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=render/set_locale&params={"tzOffset":134237528,"language":"en","flags":256,"formatDate":"'.urlencode('%Y-%m-%E %H:%M:%S').'"}&sid='.$this->session;

			

			

			

			

			

			$ch = curl_init();

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			

			

			

			

			

			

			//if(isset($array['reportressult']["items"][0]["id"]))

			

			//$this->resource = $array['reportressult']["items"][0]["id"];

			

			//else

			

			//$this->resource = $array["items"][0]["id"];

			

			//-----------------------------

			

			$return["valid"] = true;

			

			$return["session"] = $this->session;

			

			$return["resource"] = $this->resource;

			

			

			

			

			

			return $return;

			

			//exit;

			

			//--------------------------------------------------

			

			

			

		}

		

		public function logout(){

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $this->lgt.'{}&sid='.$this->session);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

		}

		

		

		

		public function units(){

			

			

			

			

			

			

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			$url = $this->srh.'{"spec":{"itemsType":"avl_unit_group","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097",from":0,"to":0}&sid='.$this->session;

			

			//echo $url;

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			

			

			//print_r($array);

			

			

			

			$items = $array["items"];

			

			$unit_groups = array();

			

			$all_units = array();

			

			foreach($items as $item):

			

			$unit_groups[$item["id"]]["name"] = $item["nm"];

			

			$unit_groups[$item["id"]]["units"] = $item["u"];

			

			$all_units = array_merge($all_units,$item["u"]);

			

			endforeach;

			

			

			

			

			

			

			

			return $unit_groups;

			

		}

		

		function loadmessages($params)
		{
			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_interval&params={"itemId":"'.$params.'","timeFrom":"'.$this->from.'","timeTo":"'.$this->to.'","flags":"0x0000","flagsMask":"0x0000","loadCount":"10"}&sid='.$this->session;

			

			//echo $url;

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			//exit;

			

			return $array;

			

			

			

			

			

			

			

			

			

		}


		function loadmessages1($params)
		{

			//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_last&params={"itemId":"'.$params.'","lastTime":"'.$this->from.'","lastCount":"10","flags":"0x0000","flagsMask":"0xFF00","loadCount":"10"}&sid='.$this->session;
			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=unit/calc_last_message&params={"unitId":"'.$params.'","sensors":"[2]","flags":1}&sid='.$this->session;
			//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=unit/calc_sensors&params={"source":"0","indexFrom":"1","indexTo":"5","unitId":"'.$params.'","sensorId":"2",width:"left"}';
			//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params={"spec":{"itemsType":"avl_hw","propName":"rel_adminfield_name","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":"0x00002000","from":0,"to":0}&sid='.$this->session;
			//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params={"spec":{"itemsType":"avl_unit","propName":"sys_name","propValueMask":"AP07TJ2619","sortType":"sys_name"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;
			//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=events/get&params={"selector":{"type":"battery status","expr" :"10","timeFrom":"'.$this->from.'","timeTo" :"'.$this->to.'","detalization" :"0x8"} }';
			$ch = curl_init();
			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks
			curl_setopt_array( $ch, $options );
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$page = curl_exec($ch);
			$array = json_decode($page, true);
			if(isset($array[2]))
			return $array[2];
			else
			return 0;

		}
		

		function loadmessageswithcount($params)

		

		{

			

			

			

			/*	https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_interval&

				

				params={

				

				"itemId":34868,

				

				"timeFrom":1364760000,

				

				"timeTo":1366487999,

				

				"flags":0x0001,

				

				"flagsMask":0xFF01,

				

				"loadCount":3

				

			}&sid=<your_sid>*/

			

			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_interval&params={"itemId":"'.$params.'","timeFrom":"'.$params['from'].'","timeTo":"'.$params['to'].'","flags":"0x0001","flagsMask":"0xFF01","loadCount":"2"}&sid='.$this->session;

			

			//echo $url;

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			// print_r($array);

			

			// exit;

			

			return $array;

			

			

			

			

			

			

			

			

			

		}

		

		function loadmessagesload_last($params)

		

		{

			

			

			

			/*	https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_interval&

				

				params={

				

				"itemId":34868,

				

				"timeFrom":1364760000,

				

				"timeTo":1366487999,

				

				"flags":0x0001,

				

				"flagsMask":0xFF01,

				

				"loadCount":3

				

			}&sid=<your_sid>*/

			

			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_last&params={"itemId":'.$params.',"lastTime":'.strtotime(date("Y-m-d H:i:s")).',"lastCount":2,"flags":1,"flagsMask":"0xFF01","loadCount":2}&sid='.$this->session;

			//echo $url;  

			//echo $url;

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			
			

			

			return $array;

			

			

			

			

			

			//svc=messages/load_last&params={"itemId":<long>,

			

			//	       "lastTime":<uint>,

			

			//	       "lastCount":<uint>,

			

			//	       "flags":<uint>,

			

			//	       "flagsMask":<uint>,

			

			//	       "loadCount":<uint>}

			

			

			

			

			

			

			

		}


		function lastmessage($params)

		{

			

			

			

			/*	https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_interval&

				

				params={

				

				"itemId":34868,

				

				"timeFrom":1364760000,

				

				"timeTo":1366487999,

				

				"flags":0x0001,

				

				"flagsMask":0xFF01,

				

				"loadCount":3

				

			}&sid=<your_sid>*/

			

			//$url='https://hst-api.wialon.com/wialon/ajax.html?svc=messages/load_last&params={"itemId":'.$params.',"lastTime":'.strtotime(date("Y-m-d H:i:s")).',"lastCount":2,"flags":1,"flagsMask":"0xFF01","loadCount":2}&sid='.$this->session;
			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":'.$params.',"flags":1024}&sid='.$this->session;
			//echo $url;  

			//echo $url;

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			
						

			

			return $array;

			

			

			

			

			

			//svc=messages/load_last&params={"itemId":<long>,

			

			//	       "lastTime":<uint>,

			

			//	       "lastCount":<uint>,

			

			//	       "flags":<uint>,

			

			//	       "flagsMask":<uint>,

			

			//	       "loadCount":<uint>}

			

			

			

			

			

			

			

		}

		

		public function unitsonly(){
			$ch = curl_init();
			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks
			curl_setopt_array( $ch, $options );
			//$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4611686018427387903,"from":0,"to":0}&sid='.$this->session;
			$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$page = curl_exec($ch);
			$array = json_decode($page, true);
			
			
			$items = $array["items"];
			$unit_groups = array();
			$all_units = array();
			foreach($items as $item):
			$unit_groups[$item["id"]]["name"] = $item["nm"];
			$unit_groups[$item["id"]]["units"] = $item["id"];
			$all_units = array_merge($all_units,$item);
			endforeach;
			return $unit_groups;
		}

		public function unitsparams($unitid){
			$ch = curl_init();
			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks
			curl_setopt_array( $ch, $options );
			//$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4611686018427387903,"from":0,"to":0}&sid='.$this->session;
			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":"'.$unitid.'","flags":"0x00800000"}&sid='.$this->session;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$page = curl_exec($ch);
			$array = json_decode($page, true);
			
			$items = $array["item"];
		
			
			return $items;
		}
		public function currentlocation($unitid){
			$ch = curl_init();
			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks
			curl_setopt_array( $ch, $options );
			//$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4611686018427387903,"from":0,"to":0}&sid='.$this->session;
			$url='https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":"'.$unitid.'","flags":"0x00800000"}&sid='.$this->session;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$page = curl_exec($ch);
			$array = json_decode($page, true);
			
			$items = $array["item"];
		
			
			return $items;
		}

		public function unitsonly1($vehicleid){
			$ch = curl_init();
			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks
			curl_setopt_array( $ch, $options );
			//$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4611686018427387903,"from":0,"to":0}&sid='.$this->session;
			$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$page = curl_exec($ch);
			$array = json_decode($page, true);
			$items = $array["items"];
			foreach($items as $item):
			if($vehicleid == $item["id"]){
				$batter_status=$item["sens"][2]["d"];
			}
			endforeach;

			return $batter_status;
		}


		

		public function unitsidonly()

		

		{

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			//echo $url;

			

			// print_r($array);

			

			//exit;

			

			$items = $array["items"];

			

			

			

			

			

			$unit_groups = array();

			

			$unit_groups['id']= array();

			

			$unit_groups['names']= array();

			

			$all_units = array();

			

			foreach($items as $item):

			

			

			

			$unit_groups['id'][] = $item["id"];

			

			$unit_groups['names'][$item["id"]] = $item["nm"];

			

			

			

			endforeach;

			

			

			

			

			

			

			

			return $unit_groups;

			

		}

		

		public function unitsidonly_lastmessage()		

		{

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			$url = $this->srh.'{"spec":{"itemsType":"avl_unit","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4611686018427387903,"from":0,"to":0}&sid='.$this->session;

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			//echo $url;

			

			// print_r($array);

			

			// exit;

			

			$items = $array["items"];

			

			

			

			

			

			$unit_groups = array();

			

			$unit_groups['id']= array();

			

			$unit_groups['names']= array();

			

			$all_units = array();

			

			foreach($items as $item):

			

			

			

			$unit_groups['id'][] = $item["id"];

			

			$unit_groups['names'][$item["id"]] = $item["nm"];

			

			//$unit_groups['pos'][$item["id"]] = $item['pos'];

			

			$unit_groups['lastmessage'][$item["id"]] = $item;

			

			endforeach;

			

			

			

			

			

			

			

			return $unit_groups;

			

		}

		

		public function units_voilation(){

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			$url = $this->srh.'{"spec":{"itemsType":"avl_unit_group","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;

			

			//echo $url;

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			//  print_r($array);

			

			// exit;

			

			$items = $array["items"];

			

			$unit_groups = array();

			

			$all_units = array();

			

			foreach($items as $item):

			

			$unit_groups[$item["id"]]["name"] = $item["nm"];

			

			$unit_groups[$item["id"]]["units"] = $item["u"];

			

			$all_units = array_merge($all_units,$item["u"]);

			

			endforeach;

			

			

			

			

			

			

			

			return $unit_groups;

			

		}

		

		public function units_groups(){

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			$url = $this->srh.'{"spec":{"itemsType":"avl_unit_group","propName":"property","propValueMask":"*","sortType":"property","propType":"property"},"force":1,"flags":4097,"from":0,"to":0}&sid='.$this->session;

			

			//echo $url;

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			

			

			$items = $array["items"];

			

			

			

			$unit_groups = array();

			

			$all_units = array();

			

			foreach($items as $item):

			

			$unit_groups[$item["id"]]["name"] = $item["nm"];

			

			$unit_groups[$item["id"]]["units"] = $item["u"];

			

			$all_units = array_merge($all_units,$item["u"]);

			

			endforeach;

			

			

			

			

			

			

			

			return $unit_groups;

			

			

			

		}

		

		

		

		public function execute_report($id,$params){

			

			if(isset($this->template ))

			

			{

				

				

				

				

				

			}

			

			

			

			else 

			

			$this->template = "1";

			

			$url = $this->exr.'{"reportResourceId":'.$this->resource.',"reportTemplateId":'.$this->template.',"reportObjectId":'.$id.',"reportObjectSecId":0,"interval":{"from":'.$this->from.',"to":'.$this->to.',"flags":0}}&sid='.$this->session;

		//	echo $url;

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			


			return $array;

			

		}

		

		public function execute_report2($id){

			

			$url = $this->exr.'{"reportResourceId":'.$this->resource.',"reportTemplateId":2,"reportObjectId":12616063,"reportObjectSecId":0,"interval":{"from":'.$this->from.',"to":'.$this->to.',"flags":'.$this->flags.'}}&sid='.$this->session;

			

			//echo$url;

			

			

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			return $array;

			

		}

		

		public function execute_report3(){

			

			$url = $this->exr.'{"reportResourceId":'.$this->resource.',"reportTemplateId":2,"reportObjectId":12616063,"reportObjectSecId":0,"interval":{"from":'.$this->from.',"to":'.$this->to.',"flags":'.$this->flags.'}}&sid='.$this->session;

			

			//echo$url;

			

			

			

			$ch = curl_init();

			

			$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

			

			curl_setopt_array( $ch, $options );

			

			curl_setopt($ch, CURLOPT_URL, $url);

			

			curl_setopt($ch, CURLOPT_HEADER, 0);

			

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			

			$page = curl_exec($ch);

			

			$array = json_decode($page, true);

			

			return $array;

			

		}

		

		public function search_item($id){

		

		//$url = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params={"spec":{"itemsType":"avl_resource","propName":"zones_library","propValueMask":"*bing*","sortType":"zones_library","propType":"propitemname"},"force":1,"flags":4097,"from":0,"to":1}&sid='.$this->session;

		

		$url = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":11631130,"flags":0}&sid='.$this->session;

		

		$url = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":'.$id.',"flags":0X00000001}&sid='.$this->session;

		

		//$url = 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":11627965,"flags":0x00000100}&sid='.$this->session;

		

		

		

		

		

		// 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params=';

		

		

		

		//svc=core/search_item&params={"id":<long>,

		

		//		     "flags":<long>}

		

		

		

		$ch = curl_init();

		

		$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

		

		curl_setopt_array( $ch, $options );

		

		curl_setopt($ch, CURLOPT_URL, $url);

		

		curl_setopt($ch, CURLOPT_HEADER, 0);

		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		

		$page = curl_exec($ch);

		

		$array = json_decode($page, true);

		

		

		

		//print_r($array );

		

		

		

		return $array;

		

		}

		

		

		

		public function load_intervals($id){

		

		$url = $this->ltl.'{"itemId":'.$id.',"timeFrom":'.$this->from.',"timeTo":'.$this->to.',"flags":0x0001,"flagsMask":0xFF01,"loadCount":0xffffffff}&sid='.$this->session;

		

		$ch = curl_init();

		

		$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

		

		curl_setopt_array( $ch, $options );

		

		curl_setopt($ch, CURLOPT_URL, $url);

		

		curl_setopt($ch, CURLOPT_HEADER, 0);

		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		

		$page = curl_exec($ch);

		

		$array = json_decode($page, true);

		

		return $array;

		

		}

		

		

		

		public function load_table($index, $limit){

		

		$url = $this->lta.'{"tableIndex":'.$index.',"indexFrom":0,"indexTo":'.$limit.'}&sid='.$this->session;

		

		

		

		$ch = curl_init();

		

		$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

		

		curl_setopt_array( $ch, $options );

		

		curl_setopt($ch, CURLOPT_URL, $url);

		

		curl_setopt($ch, CURLOPT_HEADER, 0);

		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		

		$page = curl_exec($ch);

		

		$array = json_decode($page, true);

		

		

		

		return $array;

		

		}

		

		public function setISTtimezone($inputTime)

		

		{

		

		//echo $inputTime;

		

		//	echo "</br>";

		

		//$outputtime= date("Y-m-d H:i:s", strtotime('+330 minutes', strtotime($inputTime)));

		

		

		

		//echo $outputtime;

		

		//exit;

		

		return $inputTime;

		

		}

		

		

		

		public function excuteurl($url)

		

		{

		

		$ch = curl_init();

		

		$options = array( CURLOPT_SSL_VERIFYPEER => false      ); // Disabled SSL Cert checks

		

		curl_setopt_array( $ch, $options );

		

		curl_setopt($ch, CURLOPT_URL, $url);

		

		curl_setopt($ch, CURLOPT_HEADER, 0);

		

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		

		$page = curl_exec($ch);

		

		$array = json_decode($page, true);

		

		

		

		return $array;

		

		

		

		}

		

		

		

		

		

		

		

		

		

		}

		

		/* End of file Wialon.php */

		

		/* Location: ./system/libraries/Wialon.php */																						