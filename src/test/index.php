<?php
class crawler
{
        public function show_form()
        {
                echo "<form action='index.php' method='get'>\n
                      <input type='text' name='input' />\n
                      <input type='submit' value='Crawl URL' />\n
                      </form>\n";
        }
        
        public function crawl($url)
        {
                
                if(empty($url))
                        die("No URL to crawl!");
                else
                {
                        $_CRAWL_DATA = array();
                        $info = parse_url($url);
                        
                        if(empty($info['scheme']))
                               $_url = "http://${url}"; 
                        else
                                $_url = $url;
                                
                        $info = parse_url($_url);
                        $meta = get_meta_tags($_url);
                        
                        $_CRAWL_DATA['url'] = $_url;
                        $_CRAWL_DATA['scheme'] = $info['scheme'];
                        $_CRAWL_DATA['host'] = $info['host'];
                        $_CRAWL_DATA['user'] = $info['user'];
                        $_CRAWL_DATA['pass'] = $info['pass'];
                        $_CRAWL_DATA['path'] = $info['path'];
                        $_CRAWL_DATA['query'] = $info['query'];
                        $_CRAWL_DATA['fragment'] = $info['fragment'];
                        
                        echo"<table border='1' cellpadding='2px'><th colspan=2>URL Info</th>";
                        foreach($_CRAWL_DATA as $key => $val)
                        {
                                if($val == '')
                                        $val = "NULL";       
                                
                                echo "<tr><td>${key}</td><td>${val}</td></tr>";
                        }
                        
                        echo"<th colspan=2>HTML Meta Info</th>";
                        foreach($meta as $meta_key => $meta_val)
                        {
                                if($meta_val == '')
                                        $meta_val = "NULL";
                                
                                echo "<tr><td>${meta_key}</td><td>${meta_val}</td></tr>";
                        }
                        
                        $this->get_linked_pages($_url);
                        $this->get_images($_url);
                        
                        echo"</table>";
                }
        }
		
        
        private function get_linked_pages($url)
        {
			
                $input = @file_get_contents($url) or die("Could not access file: $url");
                $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
                if(preg_match_all("/${regexp}/siU", $input, $matches))
                {
                        //$matches[2] = array of link addresses
                        // $matches[3] = array of link text - including HTML code
                        echo "<th colspan=2>Linked Pages</th>";
                        foreach($matches[3] as $link_text)
                        {
                                if(!is_string($link_text))
                                        $link_text = "NULL";
                                
                                foreach($matches[2] as $link_url)
                                {
                                if($link_url == '')
                                        $link_url = "NULL";
                                
                                echo "<tr><td>".htmlentities($link_text)."</td><td>${link_url}</td></tr>";
                               }
                        }
                }
        }
        
        private function get_images($url)
        {
                $input = @file_get_contents($url) or die("Could not access file: ${ur}l");
                $regexp = "<img\s[^>]*src=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
                if(preg_match_all("/${regexp}/siU", $input, $matches))
                {
                        //$matches[2] = array of link addresses
                        // $matches[3] = array of link text - including HTML code
                        echo "<th colspan=2>Images</th>";
                        foreach($matches[3] as $link_text)
                        {
                                if(!is_string($link_text))
                                        $link_text = "NULL";
                                
                                foreach($matches[2] as $link_url)
                                {
                                if($link_url == '')
                                        $link_url = "NULL";
                                
                                $info = parse_url($link_url);
                                $info2 = parse_url($url);
                                if($info['host'] == '')
                                        $_link_url = $info2['host']."/".$link_url;
                                else
                                        $_link_url = $link_url;
                                        
                                $newinfo = parse_url($_link_url);
                                if($newinfo['scheme'] == '')
                                        $_link_url_ = "http://${_link_url}";
                                
                                echo "<tr><td><img width=50% height=50% src='${_link_url_}' /></td><td>${link_url}</td></tr>";
                               }
                        }
                }
        }
        
        private function getdomain($url)
        {
			$explode = explode(".", $url);
			$tld = $explode[2];
			$tld = explode("/", $tld);
			$name = $explode[1];
			return("$name.$tld[0]");
        }
}
$object = new crawler();
$object->show_form ();
if( isset( $_GET['input'] ) ) {
	$object->crawl($_GET['input']);
}

?>
