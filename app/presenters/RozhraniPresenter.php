<?php

use Nette\Application\UI,
    Nette\Security as NS;
/**
  autor Hynek Dařbujan aka czhyenacz
 */
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\Http\Request;
use Nette\Utils\Strings;


//use Nette\Diagnostics\Debugger;
//Debugger::enable(Debugger::DEVELOPMENT); 

class RozhraniPresenter extends BasePresenter {

      public function aktualizacefeedu() {
    /*    udělat databázi , neb jedno mega ukono na feedy    
     * 
     * procházet databázi a hledat v daném feedu - jestli došlo ke změně
     * 
     * 
     * 
     * 
     */           
    }
    
    private $hodnota='any value';
    
    
     public function handlechangeTest() {
          
         $this->hodnota='hodnota' ;
        if($this->isAjax())
        {
            
            $this->invalidateControl('pokus');
            
   
            
        }
        
    
    }
    
    
      public function renderTest() {
          
          $this->template->hodnota=$this->hodnota ;
         $this->template->count_d='1000';
           
    }
    
     public function renderTesta() {
          
          $this->template->hodnota=$this->hodnota ;
        
        
    }
    
      public function createComponentTestaForm() {
        
             $form = new Form();

        // výpis z adresy - vyhledávané slovo se pak vloží jako základní hodnota 
        $httpRequest = $this->getService('httpRequest');
        $uri = $httpRequest->getUrl();
        $url = $uri->path;
        $nazev_vyhl_slova = substr($url, 25, 12); // !! musí se upravit pro konkretni stranky
          // vyhledávací formulář, tovrba chceckboxů
        $form->addText('hodnota', 'Hledaný výraz', 80, 20)
                ->setDefaultValue($nazev_vyhl_slova);
        
      
$form->addText('cena_od', 'Cena od', 80, 20)
                ->setDefaultValue('0');
        $form->addText('cena_do', 'Cena do', 80, 20)
                ->setDefaultValue('10000');
         $form->addCheckbox('jidlo', 'Jídlo & Vaření')
                
                             ;
         
        $form->addCheckbox('priroda', 'Příroda')
      ;
        $form->addCheckbox('umeni', 'Umění & design')
               
              ;
        $form->addCheckbox('sport', 'Sport')
                
            ;
        $form->addCheckbox('hry', 'Hry & hračky')
          ;
        $form->addCheckbox('gadgets', 'Gadgets')
             
            ;
        $form->addCheckbox('zvirata', 'Zvířata')
            ;
        $form->addCheckbox('film', 'Film')
               
              ;
        $form->addCheckbox('hudba', 'Hudba')
          ;
        $form->addCheckbox('relax', 'Relax');
        
        $form->addCheckbox('technologie', 'Technologie')
            ;
        $form->addCheckbox('nocni_zivot', 'Noční život')
             
        ;
        $form->addCheckbox('moda', 'Móda')
                
              ;
        $form->addCheckbox('dobrodruzstvi', 'Dobrodružství')
                
              ;
         $form->addCheckbox('retro', 'Retro')
                ;
          $form->addCheckbox('historie', 'Historie')
                
              ;
           $form->addCheckbox('hobby', 'Hobby')
                
               ;
            $form->addCheckbox('tabak', 'Tabák')
                
           ;
            $form->addCheckbox('zdravi', 'Zdraví a krása')
                
               ;
             $form->addCheckbox('ezoterika', 'Ezoterika')
                
               ;
              $form->addCheckbox('outdoor', 'Outdoor')
                
               ;
         
        $form->addImage('send', 'images/vypis/dohledejbutton_1.png'); 

  

        $form->onSuccess[] = callback($this, 'TestaFormSubmitted');
        return $form;
    }

    public function TestaFormSubmitted(Form $form) {

        $values = $form->getValues(TRUE); // získávání hodnot ze změny stránek

        $hledany_vyraz_str= $values['hodnota'];
        $cena_od = $values['cena_od'];
        $cena_od = $values['cena_od'];
        $cena_do = $values['cena_do'];

        
        $jidlo = $values['jidlo'];
        $priroda = $values['priroda'];
        $umeni = $values['umeni'];
        $hry = $values['hry'];
        $gadgets = $values['gadgets'];
        $zvirata = $values['zvirata'];
        $film = $values['film'];
        $hudba = $values['hudba'];
        $relax = $values['relax'];
       
        $technologie = $values['technologie'];
        $sport = $values['sport'];
        $nocni_zivot = $values['nocni_zivot'];
        $moda = $values['moda'];
        $dobrodruzstvi = $values['dobrodruzstvi'];
          $retro= $values['retro'];;
        $historie= $values['historie'];;
        $hobby= $values['hobby'];;
       $tabak= $values['tabak'];;
         $zdravi= $values['zdravi'];;
         $ezoterika= $values['ezoterika'];;
         $outdoor= $values['outdoor'];;
        
         
        
        $tag = HledamModel::fetchTag($hledany_vyraz_str);
    $darkys= HledamModel::fetchVysledekztag2($tag, $cena_od, $cena_do, $jidlo,  $priroda, $umeni, $hry, $gadgets, $zvirata, $film, $hudba, $relax, $technologie, $sport, $nocni_zivot, $moda, $dobrodruzstvi,$retro,$historie,$hobby,$tabak,$zdravi,$ezoterika,$outdoor);
       
       $this->template->darkys =$darkys;  
        
  
        if($this->isAjax())
        {
            
            $this->invalidateControl('pokus');
            
   
            
        }
         
         
         
         }
    
    
    
    
    
    
    
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
    
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
    
     protected function createComponentTagovaniGrid() {
        // konecni vypis pro aktualní nabidky dodavatele
  
        return new  TagovaniGrid($this->context->database->table("darky")->select('darky.id, nazev, tag1, tag2, tag3, tag4, tag5, skupina,skupina2,skupina3,adresa'));

    
        }
        
         protected function createComponentKlient_darkyGrid() {
        // konecni vypis pro aktualní nabidky dodavatele
          $section = $this->session->getSection('prihlaseni');
      
        return new  Klient_darkyGrid($this->context->database->table("darky")->select('darky.id, nazev,adresa,clicks,popis_produktu,cena')->where("jmeno_prodejce",$this->context->database->table("users")->select('adresa')->where("kontaktmail",$section->userName) ));

    
        }
        
         protected function createComponentAdminklient_darkyGrid() {
        // konecni vypis pro aktualní nabidky dodavatele
         $section = $this->session->getSection('mailklienta');
    $mail=$section->mail; 
        return new  Klient_darkyGrid($this->context->database->table("darky")->select('darky.id, nazev,adresa,clicks,popis_produktu,cena')->where("jmeno_prodejce",$this->context->database->table("users")->select('adresa')->where("kontaktmail",$mail) ));

    
        }
    
    public function renderKlient_detail() {
        $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
         $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
    }
    
     public function renderKlient_detailproadmina($username, $password) {
       
        $hodnoty = RozhraniModel::fetchLogin($username, $password);
        $this->template->hodnot = $hodnoty;
         $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
    }
    
    public function renderKlient_ucetproadmina($mail) {
       
      
     $this->template->kliky = $this->context->database->table("darky")->where("jmeno_prodejce",$this->context->database->table("users")->select('adresa')->where("kontaktmail",$mail))->sum('clicks'); 
          $section = $this->session->getSection('mailklienta');
     $section->mail=$mail;    
        
    }
      
    
      public function renderMaster_spravauctu() {
          
          $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
        $ucty = RozhraniModel::fetchuziv();
        $this->template->ucty = $ucty;
        
    }
    
       public function renderMaster_aktualizacefeedu() {
          
          $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
        
        
    }
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    public function renderSpravauctu($id,$cinnost) {
      
        if($cinnost=="stop"){
        RozhraniModel::stop_user($id);
        RozhraniModel::stop_usera($id);
        }
         if($cinnost=="start"){
        RozhraniModel::start_user($id);
        RozhraniModel::start_usera($id);
        }
         if($cinnost=="delete"){
        RozhraniModel::delete_user($id);
        }
        
         if($cinnost=="format"){
             RozhraniModel::delete_user($id);
        RozhraniModel::format_user($id);
       
        }
        $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
        $ucty = RozhraniModel::fetchuziv();
        $this->template->ucty = $ucty;
    }
    
    public function renderMenu() {
      
       
        $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
         $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
      
    }
    
    
      public function renderPodminky() {
      
       
        
    
         $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
      
    }
    
    
    
    
    
    
    
    public function createComponentKlient_update_form() {

        $form = new Form();
        $form->addTextArea('novahodnota', 'Nová hodnota')
                ->addRule(Form::MAX_LENGTH, 'Text je příliš dlouhý', 10000)
                ->setRequired('Prosím napište novou hodnotu');

        $hodnoty_zmena = array(
            'kontakttel' => 'Telefonní kontakt',
            'info' => 'Informace o zaměření stránek, poznámky...',
            'odkaz_xml' => 'Okaz na xml feed',
            'password' => 'Heslo',
            
        ); 
        $form->addSelect('update', 'Chci změnit:', $hodnoty_zmena)
                ->setPrompt('Zvolte položku, co chcete změnit');



        $form->addSubmit('send', 'Odeslat novou hodnotu');

        $form->onSuccess[] = callback($this, 'Klient_updateFormSubmitted');
        return $form;
    }

    public function Klient_updateFormSubmitted(Form $form) {
        $this->setView('klient_update');
        $values = $form->getValues(TRUE); // získávání hodnot ze změny stránek
        $typhodnoty = $values['update'];
        $novahodnota = $values['novahodnota'];
        $section = $this->session->getSection('prihlaseni');
        $username = $section->userName;
        $hodnoty = RozhraniModel::aktualizacehodnot($username, $novahodnota, $typhodnoty);
        $this->template->hodnot = $hodnoty; //pak ud2lat if hodnotz jestli bude fungovat 
    }

    public function renderKlient_ucet() {
        
        
        $section = $this->session->getSection('prihlaseni');
        $this->template->kliky = $this->context->database->table("darky")->where("jmeno_prodejce",$this->context->database->table("users")->select('adresa')->where("kontaktmail",$section->userName))->sum('clicks'); 
             $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;                 
    }

    protected function createComponentRozhraniForm() {
        $form = new Form();
        $form->addText('username', 'Email:')
                ->setRequired('Prosím napište Váš přihlašovací email.');

        $form->addPassword('password', 'Password:')
                ->setRequired('Prosím napište své heslo.');


        $form->addSubmit('send', 'Odeslat');

        $form->onSuccess[] = callback($this, 'rozhraniFormSubmitted');
        return $form;
    }

    public function rozhraniFormSubmitted(Form $form) {
        $this->setView('menu');

        $values = $form->getValues(TRUE);
        $username = $values['username'];
        $password = $values['password'];
        $section = $this->session->getSection('prihlaseni');
        $section->setExpiration('+ 172 minutes');
        $section->userName = $username;
        $section->passWord = $password;
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
    }

    public function createComponentRegistraceForm() {
        $form = new Form();
        $form->addPassword("password", "Heslo: *")
                ->addRule(Form::FILLED, "Heslo musí být vyplněné !");
        $form->addPassword("confirm_password", "Znovu heslo: *")
                ->addRule(Form::FILLED, "Potvrzovací heslo musí být vyplněné !")
                ->addConditionOn($form["password"], Form::FILLED)
                ->addRule(Form::EQUAL, "Hesla se musí shodovat !", $form["password"]);
        $form->addText('odkaz_xml', 'Adresa odkazu na Váš xml-feed soubor', 80, 75)
                ->addRule(Form::FILLED, 'Napište Adresu odkazu na Váš xml-feed soubor');
        $form->addText('kontakttel', 'Kontakt na vás - telefon,', 50, 40)
                ->addRule(Form::FILLED, 'Napište Kontakt na Vás');
        $form->addText('kontaktmail', 'Kontakt na vás -  emailová odresa ', 50, 40)
                ->addRule(Form::FILLED, 'Napište Kontakt na Vás');
        $form->addText('adresa', 'Adresa vašich int. stránek', 60, 50)
                ->addRule(Form::FILLED, 'Napište adresu Vašich int. stránek');
        $form->addText('IC', 'IČO', 15, 12)
                ->addRule(Form::FILLED, 'Napište vaše IČO');
        $form->addTextArea('info', 'Ostatní informace/vzkaz adminům (nepovinné)');
              
        $form->addText('6', 'Napiště kolik je "3+3"/ ochrana proti spamu')
                ->addRule(Form::FILLED, 'You are a spambot!')
                ->addRule(Form::EQUAL, 'You are a spambot!', '6');



        $form->addSubmit('send', 'Odeslat registrační formulář');

        $form->onSuccess[] = callback($this, 'RegistraceFormSubmitted');
        return $form;
    }

    public function RegistraceFormSubmitted(Form $form) {
        $this->setView('registrace_ok');
        $values = $form->getValues(TRUE); // získávání hodnot ze změny stránek

        $odkaz_xml = $values['odkaz_xml'];
        $password = $values['password'];
        $kontakttel = $values['kontakttel'];
        $kontaktmail = $values['kontaktmail'];
        $adresa = $values['adresa'];
        $ic = $values['IC'];
        $info = $values['info'];
        

        $reg = RozhraniModel::registrace($odkaz_xml, $password, $kontakttel, $kontaktmail, $adresa, $info, $ic);
        $this->template->reg = $reg; //pak ud2lat if hodnotz jestli bude fungovat 
    }
    
    
     public function renderMaster_urlchecker() {
       
         //sql
        $adresy=dibi::fetchAll('SELECT [adresa],[clicks] FROM [darky]');
         //vypis
         foreach ($adresy as $adresa) {
            $file_headers = @get_headers($adresa['adresa']);
            
         //echo $adresa['adresa'];
         // echo  $file_headers[0]; HTTP/1.0 404 Not Found
if($file_headers[0] == ('HTTP/1.1 404 Not Found') or $file_headers[0] == ('HTTP/1.0 404 Not Found')){
          echo $adresa['adresa'];
           echo "<br/>";
           if($adresa['clicks']==0){
               
             dibi::query('DELETE FROM [darky] WHERE [adresa]=%s ',$adresa['adresa']);
               echo "smayano";
           }else{
            dibi::query('UPDATE [darky] SET [status]="stop"  WHERE [adresa]=%s ',$adresa['adresa']);
                echo "stop";
            }
            
            
             }
             }
         //když má 0 kliků, tak smazat
    }

    public function createComponentActualfeedForm() {
        $form = new Form(); // nacteni xml souboru
        
       
        
          $seznam_typu = array(
            'google' => 'google.xml',
            'heureka' => 'heureka.xml',
            'zbozi' => 'zbozi.xml',
          
        ); 
        $form->addSelect('typ', 'DRUH XML FEEDU ', $seznam_typu)
                ->setRequired('Od koho je feed?');
      $form->addTextArea('xmlsoubor', 'Nahraj xml soubor - bez G: PLATÍ PRO GOOGLE !!:')
                ->setRequired('A nahrávat jako nebudeme?');
      
      
      
        $form->addSubmit('send', 'Odeslat xmlsoubor');

        $form->onSuccess[] = callback($this, 'ActualfeedFormSubmitted');
        return $form;
      
    }

    public function ActualfeedFormSubmitted(Form $form) {
         $this->setView('master_aktualizacefeedu_1'); // výpis a zpracování xml souboru
        $values = $form->getValues(TRUE); // získávání hodnot ze změny stránek
       
      $xmlsoubor = $values['xmlsoubor'];
     
        $typ = $values['typ'];
       
           
     //$xml = new SimpleXMLIterator($xmlsoubor, NULL, TRUE);
$xml = new SimpleXMLIterator($xmlsoubor);
         
       $this->template->load = $xml;


 if($typ=="google"){

            foreach ($xml->entry as $zam) {
            echo htmlspecialchars($zam->title);
            $nazev = htmlspecialchars($zam->title);
            echo "<br/>";
            echo htmlspecialchars($zam->price); //cena
            $cena = htmlspecialchars($zam->price);
            echo "<br/>";
            echo htmlspecialchars($zam->description);

            $popis_produktu = htmlspecialchars($zam->description); //popis_produktu
            echo "<br/>";
            echo htmlspecialchars($zam->link);
            $adresa = htmlspecialchars($zam->link);
            echo "<br/>";
            echo htmlspecialchars($zam->image_link); // 
            $obrazek_produktu = htmlspecialchars($zam->image_link);
            echo "<br/>";
            echo htmlspecialchars($zam->product_type); // 
            $kategorie = htmlspecialchars($zam->product_type);
            echo "<br/>";
            echo "<hr/>";
     
            // vlozeni dat do databaze
            $arr = array(
               
             
                
                'cena' => $cena,
                'popis_produktu' => $popis_produktu,
                'adresa' => $adresa,
                'obrazek_produktu' => $obrazek_produktu,
              
               
            );
          dibi::query('UPDATE [darky] SET ',$arr,' WHERE [nazev]=%s ',$nazev);
            
            
   }
  
 }
//heureka
 if($typ=="heureka"){
foreach ($xml->SHOPITEM as $zam) {
           echo htmlspecialchars($zam->PRODUCT);
            $nazev = htmlspecialchars($zam->PRODUCT);
         
            echo "<br/>";
            echo htmlspecialchars($zam->PRICE_VAT); //cena
            $cena = htmlspecialchars($zam->PRICE_VAT);
            echo "<br/>";
            echo htmlspecialchars($zam->DESCRIPTION);

            $popis_produktu = htmlspecialchars($zam->DESCRIPTION); //popis_produktu
            echo "<br/>";
            echo htmlspecialchars($zam->URL);
            $adresa = htmlspecialchars($zam->URL);
            echo "<br/>";
            echo htmlspecialchars($zam->IMGURL); // 
            $obrazek_produktu = htmlspecialchars($zam->IMGURL);
            echo "<br/>";
            echo htmlspecialchars($zam->CATEGORYTEXT); // 
            $kategorie = htmlspecialchars($zam->CATEGORYTEXT);
            echo "<br/>";
            echo "<hr/>";
          // $popis_produktu=Strings::replace($popis_produktu,'&lt;', '<');
    // $popis_produktu=Strings::replace($popis_produktu,'&gt;', '>');
            // vlozeni dat do databaze
         
            $arr = array(
               
            
                'cena' => $cena,
                'popis_produktu' => $popis_produktu,
                'adresa' => $adresa,
                'obrazek_produktu' => $obrazek_produktu,
               
              
            );
            dibi::query('UPDATE [darky] SET ',$arr,' WHERE [nazev]=%s ',$nazev);
            
 
}   
 } 


//zbozi
 if($typ=="zbozi"){
foreach ($xml->SHOPITEM as $zam) {
           echo htmlspecialchars($zam->PRODUCT);
            $nazev = htmlspecialchars($zam->PRODUCT);
         
            echo "<br/>";
            echo htmlspecialchars($zam->PRICE_VAT); //cena
            $cena = htmlspecialchars($zam->PRICE_VAT);
            echo "<br/>";
            echo htmlspecialchars($zam->DESCRIPTION);

            $popis_produktu = htmlspecialchars($zam->DESCRIPTION); //popis_produktu
            echo "<br/>";
            
            echo htmlspecialchars($zam->URL);
            $adresa = htmlspecialchars($zam->URL);
            echo "<br/>";
            echo htmlspecialchars($zam->IMGURL); // 
            $obrazek_produktu = htmlspecialchars($zam->IMGURL);
            echo "<br/>";
            echo htmlspecialchars($zam->CATEGORYTEXT); // 
            $kategorie = htmlspecialchars($zam->CATEGORYTEXT);
            echo "<br/>";
            echo "<hr/>";
          
            // vlozeni dat do databaze
            $arr = array(
               
           
                'cena' => $cena,
                'popis_produktu' => $popis_produktu,
                'adresa' => $adresa,
                'obrazek_produktu' => $obrazek_produktu,
                
            );
            dibi::query('UPDATE [darky] SET ',$arr,' WHERE [nazev]=%s ',$nazev);
            
            
            
 
}
  }
 

  $this->flashMessage('Pokud vidíš jen tenhle nápis ak se něco podělalo, jestli i s vypisem, tak je to ok ');
      
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 public function createComponentFeedForm() {
        $form = new Form(); // nacteni xml souboru
        $form->addText('nazev_v', 'Název výrobce - jeho www adresa')
                ->setRequired('Ty výrobky nikdo nevyrobil??');
          $form->addText('aff', 'Afiliate');
        
          $seznam_typu = array(
            'google' => 'google.xml',
            'heureka' => 'heureka.xml',
            'zbozi' => 'zbozi.xml',
          
        ); 
        $form->addSelect('typ', 'DRUH XML FEEDU ', $seznam_typu)
                ->setRequired('Od koho je feed?');
      $form->addTextArea('xmlsoubor', 'Nahraj xml soubor - bez G: PLATÍ PRO GOOGLE !!:')
                ->setRequired('A nahrávat jako nebudeme?');
      
      
      
        $form->addSubmit('send', 'Odeslat xmlsoubor');

        $form->onSuccess[] = callback($this, 'FeedFormSubmitted');
        return $form;
      
    }

    public function FeedFormSubmitted(Form $form) {
        $this->setView('master_0'); // výpis a zpracování xml souboru
        $values = $form->getValues(TRUE); // získávání hodnot ze změny stránek
        $nazev_vyr = $values['nazev_v'];
      $xmlsoubor = $values['xmlsoubor'];
        $aff = $values['aff'];
        $typ = $values['typ'];
       
           
     //$xml = new SimpleXMLIterator($xmlsoubor, NULL, TRUE);
$xml = new SimpleXMLIterator($xmlsoubor);
         
       $this->template->load = $xml;


 if($typ=="google"){

            foreach ($xml->entry as $zam) {
            echo htmlspecialchars($zam->title);
            $nazev = htmlspecialchars($zam->title);
            echo "<br/>";
            echo htmlspecialchars($zam->price); //cena
            $cena = htmlspecialchars($zam->price);
            echo "<br/>";
            echo htmlspecialchars($zam->description);

            $popis_produktu = htmlspecialchars($zam->description); //popis_produktu
            echo "<br/>";
            echo htmlspecialchars($zam->link);
            $adresa = htmlspecialchars($zam->link);
            echo "<br/>";
            echo htmlspecialchars($zam->image_link); // 
            $obrazek_produktu = htmlspecialchars($zam->image_link);
            echo "<br/>";
            echo htmlspecialchars($zam->product_type); // 
            $kategorie = htmlspecialchars($zam->product_type);
            echo "<br/>";
            echo "<hr/>";
        $nazev_pekny=Strings::webalize($nazev);
        $adresa1 = $adresa.$aff;
            // vlozeni dat do databaze
            $arr = array(
                'id' => '',
                'jmeno_prodejce' => $nazev_vyr,
                'nazev' => $nazev,
                'nazev_pekny' => $nazev_pekny,
                'cena' => $cena,
                'popis_produktu' => $popis_produktu,
                'adresa' => $adresa1,
                'obrazek_produktu' => $obrazek_produktu,
                'kategorie' => $kategorie,
                'tag1' => 'nic',
                'tag2' => 'nic',
                'tag3' => 'nic',
                'tag4' => 'nic',
                'tag5' => 'nic',
                'skupina' => 'nic',
                'skupina2' => 'nic',
                'skupina3' => 'nic',
                'status' => 'ok',
            );
            dibi::query('INSERT INTO [darky]', $arr);
            
            
   }
  
 }
//heureka
 if($typ=="heureka"){
foreach ($xml->SHOPITEM as $zam) {
           echo htmlspecialchars($zam->PRODUCT);
            $nazev = htmlspecialchars($zam->PRODUCT);
         
            echo "<br/>";
            echo htmlspecialchars($zam->PRICE_VAT); //cena
            $cena = htmlspecialchars($zam->PRICE_VAT);
            echo "<br/>";
            echo htmlspecialchars($zam->DESCRIPTION);

            $popis_produktu = htmlspecialchars($zam->DESCRIPTION); //popis_produktu
            echo "<br/>";
            echo htmlspecialchars($zam->URL);
            $adresa = htmlspecialchars($zam->URL);
            echo "<br/>";
            echo htmlspecialchars($zam->IMGURL); // 
            $obrazek_produktu = htmlspecialchars($zam->IMGURL);
            echo "<br/>";
            echo htmlspecialchars($zam->CATEGORYTEXT); // 
            $kategorie = htmlspecialchars($zam->CATEGORYTEXT);
            echo "<br/>";
            echo "<hr/>";
             $adresa1 = $adresa.$aff;
            // vlozeni dat do databaze
              $nazev_pekny=Strings::webalize($nazev);
            $arr = array(
                'id' => '',
                'jmeno_prodejce' => $nazev_vyr,
                'nazev' => $nazev,
                 'nazev_pekny' => $nazev_pekny,
                'cena' => $cena,
                'popis_produktu' => $popis_produktu,
                'adresa' => $adresa1,
                'obrazek_produktu' => $obrazek_produktu,
                'kategorie' => $kategorie,
                'tag1' => 'nic',
                'tag2' => 'nic',
                'tag3' => 'nic',
                'tag4' => 'nic',
                'tag5' => 'nic',
                'skupina' => 'nic',
                'skupina2' => 'nic',
                'skupina3' => 'nic',
                'status' => 'ok',
            );
            dibi::query('INSERT INTO [darky]', $arr);
            
 
}   
 } 


//zbozi
 if($typ=="zbozi"){
foreach ($xml->SHOPITEM as $zam) {
           echo htmlspecialchars($zam->PRODUCT);
            $nazev = htmlspecialchars($zam->PRODUCT);
         
            echo "<br/>";
            echo htmlspecialchars($zam->PRICE_VAT); //cena
            $cena = htmlspecialchars($zam->PRICE_VAT);
            echo "<br/>";
            echo htmlspecialchars($zam->DESCRIPTION);

            $popis_produktu = htmlspecialchars($zam->DESCRIPTION); //popis_produktu
            echo "<br/>";
            
            echo htmlspecialchars($zam->URL);
            $adresa = htmlspecialchars($zam->URL);
            echo "<br/>";
            echo htmlspecialchars($zam->IMGURL); // 
            $obrazek_produktu = htmlspecialchars($zam->IMGURL);
            echo "<br/>";
            echo htmlspecialchars($zam->CATEGORYTEXT); // 
            $kategorie = htmlspecialchars($zam->CATEGORYTEXT);
            echo "<br/>";
            echo "<hr/>";
             $adresa1 = $adresa.$aff;
              $nazev_pekny=Strings::webalize($nazev);
            // vlozeni dat do databaze
            $arr = array(
                'id' => '',
                'jmeno_prodejce' => $nazev_vyr,
                'nazev' => $nazev,
                 'nazev_pekny' => $nazev_pekny,
                'cena' => $cena,
                'popis_produktu' => $popis_produktu,
                'adresa' => $adresa1,
                'obrazek_produktu' => $obrazek_produktu,
                'kategorie' => $kategorie,
                'tag1' => 'nic',
                'tag2' => 'nic',
                'tag3' => 'nic',
                'tag4' => 'nic',
                'tag5' => 'nic',
                'skupina' => 'nic',
                'skupina2' => 'nic',
                'skupina3' => 'nic',
                'status' => 'ok',
            );
            dibi::query('INSERT INTO [darky]', $arr);
            
            
            
 
}
  }
 

 
      
    }
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function createComponentFeedloadForm() {

        $form = new Form();


        $tag1 = array(
            'tata' => 'Táta',
            'mama' => 'Máma',
            'deda' => 'Děda',
            'babicka' => 'Babička',
            'muz' => 'Muž',
            'zena' => 'Žena',
            'mladymuz' => 'Mladý Muž',
            'mladazena' => 'Mladá Žena',
            'pritel' => 'Přítel',
            'pritelkyne' => 'Přítelkyně',
            'kluk' => 'Kluk',
            'holka' => 'Holka',
            'vsichni' => 'Všichni',
             'nechci' => 'nechci',
        );
        $form->addSelect('tag1', 'tag1', $tag1);


        $tag2 = array(
            'tata' => 'Táta',
            'mama' => 'Máma',
            'deda' => 'Děda',
            'babicka' => 'Babička',
            'muz' => 'Muž',
            'zena' => 'Žena',
             'mladymuz' => 'Mladý Muž',
            'mladazena' => 'Mladá Žena',
            'pritel' => 'Přítel',
            'pritelkyne' => 'Přítelkyně',
            'kluk' => 'Kluk',
            'holka' => 'Holka',
             'vsichni' => 'Všichni',
            'nechci' => 'nechci',
        );
        $form->addSelect('tag2', 'tag2', $tag2);
        
        $tag3 = array(
            'tata' => 'Táta',
            'mama' => 'Máma',
            'deda' => 'Děda',
            'babicka' => 'Babička',
            'muz' => 'Muž',
            'zena' => 'Žena',
             'mladymuz' => 'Mladý Muž',
            'mladazena' => 'Mladá Žena',
            'pritel' => 'Přítel',
            'pritelkyne' => 'Přítelkyně',
            'kluk' => 'Kluk',
            'holka' => 'Holka',
            'vsichni' => 'Všichni',
             'nechci' => 'nechci',
            
        );
        $form->addSelect('tag3', 'tag3', $tag3);
        
        $tag4 = array(
            'tata' => 'Táta',
            'mama' => 'Máma',
            'deda' => 'Děda',
            'babicka' => 'Babička',
            'muz' => 'Muž',
            'zena' => 'Žena',
             'mladymuz' => 'Mladý Muž',
            'mladazena' => 'Mladá Žena',
            'pritel' => 'Přítel',
            'pritelkyne' => 'Přítelkyně',
            'kluk' => 'Kluk',
            'holka' => 'Holka',
            'vsichni' => 'Všichni',
           'nechci' => 'nechci',
            
        );
        $form->addSelect('tag4', 'tag4', $tag4);
        
        $tag5 = array(
            'tata' => 'Táta',
            'mama' => 'Máma',
            'deda' => 'Děda',
            'babicka' => 'Babička',
            'muz' => 'Muž',
            'zena' => 'Žena',
             'mladymuz' => 'Mladý Muž',
            'mladazena' => 'Mladá Žena',
            'pritel' => 'Přítel',
            'pritelkyne' => 'Přítelkyně',
            'kluk' => 'Kluk',
            'holka' => 'Holka',
            'vsichni' => 'Všichni',
            'nechci' => 'nechci',
            
        );
        $form->addSelect('tag5', 'tag5', $tag5);
        
        
        
        
        
        
        $skupina = array(
            'Jídlo & Vaření' => 'Jídlo & Vaření',
            'Příroda' => 'Příroda',
            'Umění & design' => 'Umění & design',
            'Hry & hračky' => 'Hry & hračky',
            'Gadgets' => 'Gadgets',
            'Zvířata' => 'Zvířata',
            'Film' => 'Film',
            'Hudba' => 'Hudba',
            'Relax' => 'Relax',
            'Sci-fi & fantasy' => 'Sci-fi & fantasy',
            'Technologie' => 'Technologie',
            'Sport' => 'Sport',
            'Zvířata' => 'Zvířata',
            'Noční život' => 'Noční život',
            'Móda' => 'Móda',
             'Dobrodružství' => 'Dobrodružství',
            'Retro' => 'Retro',
            'Historie' => 'Historie',
            'Hobby' => 'Hobby',
            'Tabák' => 'Tabák',
            'Zdraví a krása' => 'Zdraví a krása',
            'Ezoterika' => 'Ezoterika',
            'Outdoor' => 'Outdoor',
            
             'nechci' => 'nechci',
        );
        
        $form->addSelect('skupina', 'skupina', $skupina);
        
         $skupina2 = array(
            'Jídlo & Vaření' => 'Jídlo & Vaření',
            'Příroda' => 'Příroda',
            'Umění & design' => 'Umění & design',
            'Hry & hračky' => 'Hry & hračky',
            'Gadgets' => 'Gadgets',
            'Zvířata' => 'Zvířata',
            'Film' => 'Film',
            'Hudba' => 'Hudba',
            'Relax' => 'Relax',
            'Sci-fi & fantasy' => 'Sci-fi & fantasy',
            'Technologie' => 'Technologie',
            'Sport' => 'Sport',
            'Zvířata' => 'Zvířata',
            'Noční život' => 'Noční život',
            'Móda' => 'Móda',
            'Dobrodružství' => 'Dobrodružství',
            'Retro' => 'Retro',
            'Historie' => 'Historie',
            'Hobby' => 'Hobby',
            'Tabák' => 'Tabák',
            'Zdraví a krása' => 'Zdraví a krása',
            'Ezoterika' => 'Ezoterika',
            'Outdoor' => 'Outdoor',
            'nechci' => 'nechci',
        );
        
        $form->addSelect('skupina2', 'skupina2', $skupina2);
        
         $skupina3 = array(
            'Jídlo & Vaření' => 'Jídlo & Vaření',
            'Příroda' => 'Příroda',
            'Umění & design' => 'Umění & design',
            'Hry & hračky' => 'Hry & hračky',
            'Gadgets' => 'Gadgets',
            'Zvířata' => 'Zvířata',
            'Film' => 'Film',
            'Hudba' => 'Hudba',
            'Relax' => 'Relax',
            'Sci-fi & fantasy' => 'Sci-fi & fantasy',
            'Technologie' => 'Technologie',
            'Sport' => 'Sport',
            'Zvířata' => 'Zvířata',
            'Noční život' => 'Noční život',
            'Móda' => 'Móda',
            'Dobrodružství' => 'Dobrodružství',
            'Retro' => 'Retro',
            'Historie' => 'Historie',
            'Hobby' => 'Hobby',
            'Tabák' => 'Tabák',
            'Zdraví a krása' => 'Zdraví a krása',
            'Ezoterika' => 'Ezoterika',
            'Outdoor' => 'Outdoor',
            'nechci' => 'nechci',
        );
        
        $form->addSelect('skupina3', 'skupina3', $skupina3);


        $form->addSubmit('send', 'Odeslat');

        $form->onSuccess[] = callback($this, 'FeedLoadFormSubmitted');
        return $form;
    }

    public function FeedloadFormSubmitted(Form $form) {
        $this->setView('master_2');
        $values = $form->getValues(TRUE); // získávání hodnot ze změny stránek

        $id_p = RozhraniModel::fetchNovy();

        $id = $id_p['id'];
        $tag1 = $values['tag1'];
        $tag2 = $values['tag2'];
        $tag3 = $values['tag3'];
        $tag4 = $values['tag4'];
        $tag5 = $values['tag5'];
        $skupina = $values['skupina'];
        $skupina2 = $values['skupina2'];
        $skupina3 = $values['skupina3'];

        RozhraniModel::updatenovy($id, $tag1, $tag2, $tag3,$tag4, $tag5, $skupina,$skupina2,$skupina3);
        $this->template->novy = RozhraniModel::fetchNovy();
    }

    public function renderMaster_1() {

        $this->template->novy = RozhraniModel::fetchNovy();
        $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
        
    }
    
     public function renderMaster_0() {

        $this->template->novy = RozhraniModel::fetchNovy();
        $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
 
        
        
    }

    public function renderMaster_2() {
        $this->template->novy = RozhraniModel::fetchNovy();
        
        
        $section = $this->session->getSection('prihlaseni');
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
    }

    public function renderOut() {
        $section = $this->session->getSection('prihlaseni');
        $section->userName = "NULL";
        $section->passWord = "NULL";
        $this->flashMessage('Byl jste právě odhlášen.');
         $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
        
    }
    
    public function renderPrihlaseni() {
        
         $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
        
    }
    
     public function renderRegistrace() {
        
        $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
        
    }
    
    public function renderKontakt() {
        
  $section = $this->session->getSection('count');
             $this->template->count_d=$section->count; 
        
    }

}
