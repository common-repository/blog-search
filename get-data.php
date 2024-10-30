<?php
         $term=$_GET['term'];
    
         $results = array();
         
         $url="http://ajax.googleapis.com/ajax/services/search/blogs?v=1.0&rsz=large";
         
         $url = $url.'&start=8&q='.$term;
         $result=file_get_contents($url);
      
         $data=processSearchResults(json_decode($result));
         $str="<table>";
         if(!empty($data))
         {
                  foreach($data as $list)
                  {
                     $str.="<tr >";
                         $str.="<td style='border-bottom:1px dotted #000'>";
                         $str.='<a href="'.$list['post_url'].'" target="_blank">'.$list['title'].'</a>';
                         $str.="</td>";
                     $str.="</tr>";
                  }
         }
         else
         {
               $str.="<tr >";
               $str.="<td style='color:#FF0000'>";
               $str.="No Record Found!";
               $str.="</td>";
               $str.="</tr>";
         }
         $str.="</table>";
         echo $str;
    
         function processSearchResults($results) {
          $sample_results = array();
          //print_r($results->responseData->results);exit;
         
             // error handling needed
             //echo "<pre>";print_r($result->{'responseData'}->{'results'});echo "</pre>";
             foreach($results->{'responseData'}->{'results'} as $item) {
                $title = (string)$item->{'titleNoFormatting'};
                $text = (string)$item->{'content'};           
                $author = (string)$item->{'author'};
                $profile_url = (string)$item->{'blogUrl'};
                $post_url = (string)$item->{'postUrl'};
                $image = '/img/16x16_transparent.png';
                $date = (string)$item->{'publishedDate'};
                $title = (string)$item->{'title'};
                $sample_results[] = array(
                        'type' => 'BLOGS',
                        'text' => $text,
                        'author' => $author,
                        'image' => $image,
                        'isblog' => true,
                        'profile_url' => $profile_url,
                        'post_url' => $post_url,
                        'date' => $date,
                        'title' => $title
                );
             }
          return $sample_results;
    
       } // End function processSampleReslts()
       

?>