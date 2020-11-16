<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Article;
use App\Counties;
use App\Ministries;
use App\Big4agenda;
use App\Notices;
use App\Jobs;
use App\Psckjobs;
use App\Tenders;

class scrapController extends Controller
{

    public function scrapCounties(){

      $counties_title_results = array();
      $counties_excerpt_results = array();
      $counties_img_results = array();
      $counties_link_results = array();
      $counties_content_results = array();
      $counties_url = 'http://www.mygov.go.ke/index.php?act=counties';
      $counties_title_css_selector = '.gs-c-promo-heading';
      $counties_excerpt_css_selector = '.gs-c-promo-summary';
      $counties_img_css_selector = '.qa-srcset-image';
      $counties_link_css_selector = 'div.gs-c-promo-body>div>a';
      $client = new Client();
      $crawler = $client -> request('GET',$counties_url);

      // fetch article titles
      $counties_title_results = $crawler->filter($counties_title_css_selector)->each(function ($node) use ($counties_title_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch article excerpts
      $counties_excerpt_results = $crawler->filter($counties_excerpt_css_selector)->each(function ($node) use ($counties_excerpt_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch link of full content
      $counties_link_results = $crawler->filter($counties_link_css_selector)->each(function ($node) use ($counties_link_results) {
          // print $node->text();
           return $node->attr('href');
      });

      //fetch image1
      $counties_img_results = $crawler->filter($counties_img_css_selector)->each(function ($node) use ($counties_img_results) {
          // print $node->text();
           return $node->attr('src');
      });



      array_push($counties_img_results,'http://www.mygov.go.ke/default.jpg');

      $full_content_url = array();
      $full_image_url = array();
      $i=0;
      foreach ($counties_link_results as $key => $value) {
        $full_content_url[$i] = 'http://www.mygov.go.ke/'.$value;
        $i++;
      }

      $i=0;
      foreach ($counties_img_results as $key => $value) {
        $full_image_url[$i] = 'http://www.mygov.go.ke/'.$value;
        $i++;
      }

      ini_set('max_execution_time', '300');
       //fetch full file_get_contents
        $output = array();

        foreach($full_content_url as $key => $value) {
            $client = new Client();
            $crawler = $client->request('GET', $value);
            $output[$key]['title'] = $crawler->filter('.story-body__h1')->each(function ($node) use ($output) {
                // print $node->text();
                 return $node->text();
            });
            $output[$key]['excerpt'] = $crawler->filter('.story-body__introduction')->each(function ($node) use ($output) {
                // print $node->text();
                 return $node->text();
            });
//            $output[$key]['img_link'] = $crawler->filter('.qa-srcset-image')->each(function ($node) use ($output) {
//                // print $node->text();
//                 return $node->attr('src');
//            });
            $output[$key]['body'] = $crawler->filter('.story-body__inner')->each(function ($node) use ($output) {
                // print $node->text();
                 return $node->text();
            });
            $client = new Client();
        }

      $counties_full_article = array();
      $i = 0;

//      foreach ($counties_title_results as $title)
//      {
//          $counties_full_article[$i]["title"]= $counties_title_results[$i];
//          $counties_full_article[$i]["excerpt"] = $counties_excerpt_results[$i];
//          $counties_full_article[$i]["article_link"] = $counties_link_results[$i];
//          $counties_full_article[$i]["image_link"] = $full_image_url[$i];
//          $i++;
//      }

      for ($i=0; $i < count($output); $i++) {
        $counties = new Counties();
        $counties -> title = $output[$i]['title'][0];
        $counties -> excerpt = $output[$i]['excerpt'][0];
        $counties -> content = $output[$i]['body'][0];
        $counties->save();
      }

      echo 'saved successfully';
    }

    public function scrapMinistries(){

      $counties_title_results = array();
      $counties_excerpt_results = array();
      $counties_img_results = array();
      $counties_link_results = array();
      $counties_content_results = array();
      $counties_url = 'http://www.mygov.go.ke/index.php?act=ministries';
      $counties_title_css_selector = '.gs-c-promo-heading';
      $counties_excerpt_css_selector = '.gs-c-promo-summary';
      $counties_img_css_selector = '.qa-srcset-image';
      $counties_link_css_selector = 'div.gs-c-promo-body>div>a';
      $client = new Client();
      $crawler = $client -> request('GET',$counties_url);

      // fetch article titles
      $counties_title_results = $crawler->filter($counties_title_css_selector)->each(function ($node) use ($counties_title_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch article excerpts
      $counties_excerpt_results = $crawler->filter($counties_excerpt_css_selector)->each(function ($node) use ($counties_excerpt_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch link of full content
      $counties_link_results = $crawler->filter($counties_link_css_selector)->each(function ($node) use ($counties_link_results) {
          // print $node->text();
           return $node->attr('href');
      });

      //fetch image1
      $counties_img_results = $crawler->filter($counties_img_css_selector)->each(function ($node) use ($counties_img_results) {
          // print $node->text();
           return $node->attr('src');
      });

      array_push($counties_img_results,'http://www.mygov.go.ke/default.jpg');

      $full_content_url = array();
      $full_image_url = array();
      $i=0;
      foreach ($counties_link_results as $key => $value) {
        $full_content_url[$i] = 'http://www.mygov.go.ke/'.$value;
        $i++;
      }

//      foreach ($counties_img_results as $key => $value) {
//        $full_image_url[$i] = 'http://www.mygov.go.ke/'.$value;
//        $i++;
//      }
//
      $counties_full_article = array();
      $i = 0;

        ini_set('max_execution_time', '300');
        //fetch full file_get_contents
        $output = array();

        foreach($full_content_url as $key => $value) {
            $client = new Client();
            $crawler = $client->request('GET', $value);
            $output[$key]['title'] = $crawler->filter('.story-body__h1')->each(function ($node) use ($output) {
                // print $node->text();
                return $node->text();
            });
            $output[$key]['excerpt'] = $crawler->filter('.story-body__introduction')->each(function ($node) use ($output) {
                // print $node->text();
                return $node->text();
            });
//            $output[$key]['img_link'] = $crawler->filter('.qa-srcset-image')->each(function ($node) use ($output) {
//                // print $node->text();
//                 return $node->attr('src');
//            });
            $output[$key]['body'] = $crawler->filter('.story-body__inner')->each(function ($node) use ($output) {
                // print $node->text();
                return $node->text();
            });
            $client = new Client();
        }

//      dd($output);
      for ($i=0; $i < count($counties_full_article); $i++) {
        $counties = new Ministries();
        $counties -> title = $counties_full_article[$i]['title'];
        $counties -> excerpt = $counties_full_article[$i]['excerpt'];
        $counties -> article_link = $counties_full_article[$i]['article_link'];
        $counties -> image_link = $counties_full_article[$i]['image_link'];
        $counties -> content = " ";
        $counties->save();
      }

    }


    public function scrapBig4agenda(){
      $counties_title_results = array();
      $counties_excerpt_results = array();
      $counties_img_results = array();
      $counties_link_results = array();
      $counties_content_results = array();
      $counties_url = 'http://www.mygov.go.ke/index.php?act=big-four-agenda';
      $counties_title_css_selector = '.gs-c-promo-heading';
      $counties_excerpt_css_selector = '.gs-c-promo-summary';
      $counties_img_css_selector = '.qa-srcset-image';
      $counties_link_css_selector = 'div.gs-c-promo-body>div>a';
      $client = new Client();
      $crawler = $client -> request('GET',$counties_url);

      // fetch article titles
      $counties_title_results = $crawler->filter($counties_title_css_selector)->each(function ($node) use ($counties_title_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch article excerpts
      $counties_excerpt_results = $crawler->filter($counties_excerpt_css_selector)->each(function ($node) use ($counties_excerpt_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch link of full content
      $counties_link_results = $crawler->filter($counties_link_css_selector)->each(function ($node) use ($counties_link_results) {
          // print $node->text();
           return $node->attr('href');
      });

      //fetch image1
      $counties_img_results = $crawler->filter($counties_img_css_selector)->each(function ($node) use ($counties_img_results) {
          // print $node->text();
           return $node->attr('src');
      });

      array_push($counties_img_results,'http://www.mygov.go.ke/default.jpg');

      $full_content_url = array();
      $full_image_url = array();
      $i=0;
      foreach ($counties_link_results as $key => $value) {
        $full_content_url[$i] = $counties_url.'/'.$value;
        $i++;
      }
      $i=0;
      foreach ($counties_img_results as $key => $value) {
        $full_image_url[$i] = 'http://www.mygov.go.ke/'.$value;
        $i++;
      }

      //fetch full file_get_contents
       // foreach ($counties_link_results as $key => $value) {
       //   $client = new Client();
       //   $full_content_url = $counties_url.'/'.$value;
       //   $content_crawler = $client -> request('GET',$full_content_url);
       //   $counties_content_results[$key] = $content_crawler->filter('.story-body')->eq(1)->extract(['_text']);
       // }

      $counties_full_article = array();
      $i = 0;

      foreach ($counties_title_results as $title)
      {
          $counties_full_article[$i]["title"]= $counties_title_results[$i];
          $counties_full_article[$i]["excerpt"] = $counties_excerpt_results[$i];
          $counties_full_article[$i]["article_link"] = $counties_link_results[$i];
          $counties_full_article[$i]["image_link"] = $full_image_url[$i];
          $i++;
      }


      for ($i=0; $i < count($counties_full_article); $i++) {
        $counties = new Big4agenda();
        $counties -> title = $counties_full_article[$i]['title'];
        $counties -> excerpt = $counties_full_article[$i]['excerpt'];
        $counties -> article_link = $counties_full_article[$i]['article_link'];
        $counties -> image_link = $counties_full_article[$i]['image_link'];
        $counties -> content = " ";
        $counties->save();
      }
    }

    public function scrapTenders(){

      //not working because the site loads data using js

        
      $api_url ='https://www.tenders.go.ke/website/tenders/advancedSearch?state=Close&draw=1&columns%5B0%5D%5Bdata%5D=type&columns%5B0%5D%5Bname%5D=organizations.type&columns%5B0%5D%5Bsearchable%5D=true&columns%5B0%5D%5Borderable%5D=true&columns%5B0%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B0%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B1%5D%5Bdata%5D=org_name&columns%5B1%5D%5Bname%5D=organizations.name&columns%5B1%5D%5Bsearchable%5D=true&columns%5B1%5D%5Borderable%5D=true&columns%5B1%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B1%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B2%5D%5Bdata%5D=tender_ref_no&columns%5B2%5D%5Bname%5D=tender_notices.tender_ref_no&columns%5B2%5D%5Bsearchable%5D=true&columns%5B2%5D%5Borderable%5D=true&columns%5B2%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B2%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B3%5D%5Bdata%5D=tender_title&columns%5B3%5D%5Bname%5D=tender_notices.tender_title&columns%5B3%5D%5Bsearchable%5D=true&columns%5B3%5D%5Borderable%5D=true&columns%5B3%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B3%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B4%5D%5Bdata%5D=tender_category&columns%5B4%5D%5Bname%5D=tender_notices.tender_category&columns%5B4%5D%5Bsearchable%5D=true&columns%5B4%5D%5Borderable%5D=true&columns%5B4%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B4%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B5%5D%5Bdata%5D=tender_type&columns%5B5%5D%5Bname%5D=tender_notices.tender_type&columns%5B5%5D%5Bsearchable%5D=true&columns%5B5%5D%5Borderable%5D=true&columns%5B5%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B5%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B6%5D%5Bdata%5D=tender_status&columns%5B6%5D%5Bname%5D=tender_notices.tender_status&columns%5B6%5D%5Bsearchable%5D=true&columns%5B6%5D%5Borderable%5D=true&columns%5B6%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B6%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B7%5D%5Bdata%5D=closing_date&columns%5B7%5D%5Bname%5D=tender_notices.closing_date&columns%5B7%5D%5Bsearchable%5D=true&columns%5B7%5D%5Borderable%5D=true&columns%5B7%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B7%5D%5Bsearch%5D%5Bregex%5D=false&order%5B0%5D%5Bcolumn%5D=0&order%5B0%5D%5Bdir%5D=asc&start=0&length=50&search%5Bvalue%5D=&search%5Bregex%5D=false&_=1602656059243';
      $tenders = array();
      $json = json_decode(file_get_contents($api_url), true);
      $tenders = $json['data'];
      // dd($tenders);
      for ($i=0; $i < 50; $i++) {
          $tenders_db = new Tenders();
          $tenders_db -> org_name =  $tenders[$i]['org_name'];
          $tenders_db -> type =  $tenders[$i]['type'];
          $tenders_db -> telephone =  $tenders[$i]['telephone'];
          $tenders_db -> email =  $tenders[$i]['email'];
          $tenders_db -> physical_address =  $tenders[$i]['physical_address'];
          $tenders_db -> posted_at =  $tenders[$i]['created_at'];
          $tenders_db -> tender_id =   $tenders[$i]['id'];
          $tenders_db -> tender_type = $tenders[$i]['tender_type'];
          $tenders_db -> tender_title = $tenders[$i]['tender_title'];
          $tenders_db -> tender_category = $tenders[$i]['tender_category'];
          $tenders_db -> tender_ref_no = $tenders[$i]['tender_ref_no'];
          $tenders_db -> publication_date = $tenders[$i]['publication_date'];
          $tenders_db -> tender_status = $tenders[$i]['tender_status'];
          $tenders_db -> org_id = $tenders[$i]['org_id'];
          $tenders_db -> year  = $tenders[$i]['year'];
          $tenders_db -> month =  $tenders[$i]['month'];
          $tenders_db -> tender_code = $tenders[$i]['tender_code'];
          $tenders_db -> closing_date = $tenders[$i]['closing_date'];
          $tenders_db->save();
      }

    }

    public function scrapJobs(){

      $jobs_results = array();
      $jobs_url = 'http://www.psckjobs.go.ke/Jobs.aspx';

      $client = new Client();
      $crawler = $client -> request('GET',$jobs_url);

      // fetch article titles
      // $jobs_title_results = $crawler->filter('tr')->each(function ($node) use ($jobs_title_results) {
      //     // print $node->text();
      //      return $node->text();
      // });

      $jobs_results = $crawler->filterXPath('//table')->filter('tr')->each(function ($tr, $i) {
        return $tr->filter('td')->each(function ($td, $i) {
           return trim($td->text());
         });
       });

       // dd($jobs_results);
       for ($i=25; $i < count($jobs_results); $i++) {
           $jobs = new psckjobs();
           $jobs -> ministry = $jobs_results[$i][0];
           $jobs -> advert_no = $jobs_results[$i][0];
           $jobs -> department = $jobs_results[$i][1];
           $jobs -> post = $jobs_results[$i][2];
           $jobs -> job_group = $jobs_results[$i][3];
           $jobs -> vacancies = $jobs_results[$i][4];
           $jobs -> closing_date = $jobs_results[$i][5];
           $jobs->save();

       }
    }

    public function scrapNotices(){

      $counties_title_results = array();
      $counties_excerpt_results = array();
      $counties_img_results = array();
      $counties_link_results = array();
      $counties_content_results = array();
      $counties_url = 'http://www.mygov.go.ke/index.php?act=notices';
      $counties_title_css_selector = '.gs-c-promo-heading';
      $counties_excerpt_css_selector = '.gs-c-promo-summary';
      $counties_img_css_selector = '.qa-srcset-image';
      $counties_link_css_selector = 'div.gs-c-promo-body>div>a';
      $client = new Client();
      $crawler = $client -> request('GET',$counties_url);

      // fetch article titles
      $counties_title_results = $crawler->filter($counties_title_css_selector)->each(function ($node) use ($counties_title_results) {
          // print $node->text();
           return $node->text();
      });



      //fetch article excerpts
      $counties_excerpt_results = $crawler->filter($counties_excerpt_css_selector)->each(function ($node) use ($counties_excerpt_results) {
          // print $node->text();
           return $node->text();
      });

      //fetch link of full content
      $counties_link_results = $crawler->filter($counties_link_css_selector)->each(function ($node) use ($counties_link_results) {
          // print $node->text();
           return $node->attr('href');
      });

      //fetch image1
      $counties_img_results = $crawler->filter($counties_img_css_selector)->each(function ($node) use ($counties_img_results) {
          // print $node->text();
           return $node->attr('src');
      });

      $full_content_url = array();
      $full_image_url = array();
      $i=0;
      foreach ($counties_link_results as $key => $value) {
        $full_content_url[$i] = $counties_url.'/'.$value;
        $i++;
      }
      $i=0;
      foreach ($counties_img_results as $key => $value) {
        $full_image_url[$i] = 'http://www.mygov.go.ke/'.$value;
        $i++;
      }
      //fetch full file_get_contents
       // foreach ($counties_link_results as $key => $value) {
       //   $client = new Client();
       //   $full_content_url = $counties_url.'/'.$value;
       //   $content_crawler = $client -> request('GET',$full_content_url);
       //   $counties_content_results[$key] = $content_crawler->filter('.story-body')->eq(1)->extract(['_text']);
       // }

      $counties_full_article = array();
      $i = 0;

      foreach ($counties_title_results as $title)
      {
          $counties_full_article[$i]["title"]= $counties_title_results[$i];
          $counties_full_article[$i]["pdf_link"] = $full_content_url[$i];
          $counties_full_article[$i]["image_link"] = $full_image_url[$i];
          $i++;
      }


      for ($i=0; $i < count($counties_full_article); $i++) {
        $counties = new Notices();
        $counties -> title = $counties_full_article[$i]['title'];
        $counties -> image_link = $counties_full_article[$i]['image_link'];
        $counties -> pdf_link = $counties_full_article[$i]['pdf_link'];
        $counties->save();
      }
    }

    public function scrap(){
      print "****Scraping counties*****\n";
      $this->scrapCounties();
      print "****Scraping Ministries*****\n";
      $this->scrapMinistries();
      print "****Scraping Big4agenda*****\n";
      $this->scrapBig4agenda();
      print "****Scraping Notices*****\n";
      $this->scrapNotices();
      print "****Scraping Jobs*****\n";
      $this->scrapJobs();
      print "****Scraping Tenders*****\n";
      $this->scrapTenders();
    }
}
