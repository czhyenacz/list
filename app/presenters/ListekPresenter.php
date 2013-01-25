<?php

/**
 * Homepage presenter.
 *
 * @author     Hynek Dařbujan aka czhyenacz
 
 */

use Nette\Utils\Html;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\Http\Request;
use Nette\Http\Url;
use Nette\Utils\Strings;
use Nette\Mail\Message;

//use Nette\Diagnostics\Debugger;
//Debugger::enable(Debugger::DEVELOPMENT); 

// udělat stoly co meni barvu podle jecji stavu - nezaplaceno cervena, cekaji na jidlo zlutá
class ListekPresenter extends BasePresenter {
   // blog
    public function createComponentCommentForm($name)
{
    $form = new Form($this, $name);
    $form->addText('author', 'Jméno')
            ->addRule(Form::FILLED, 'To se neumíš ani podepsat?!');
    $form->addTextArea('body', 'Komentář')
            ->addRule(Form::FILLED, 'Komentář je povinný!');
    $form->addSubmit('send', 'Odeslat');
    $form->onSubmit[] = callback($this, 'commentFormSubmitted');
    return $form;
}

public function commentFormSubmitted(Form $form)
{
    $data = $form->getValues();
    $data['date'] = new DateTime();
    $data['post_id'] = (int) $this->getParam('id');
    $id = CommentsModel::insert($data);
    $this->flashMessage('Komentář uložen!');
    $this->redirect("this#comment-$id");
}



    
    
  public function renderKuchyn_historie()
{
    $this->template->posts = PostsModel::fetchAll();
}
     
  public function renderKuchyn_objednavka()
{
    $this->template->posts = PostsModel::fetchAll();
}
     public function renderCisnik_stoly()
{
    $this->template->posts = PostsModel::fetchAll();
}  


 public function renderCisnik_platba()
{
    $this->template->posts = PostsModel::fetchAll();
}  

 public function renderCisnik_objednavka()
{
    $this->template->posts = PostsModel::fetchAll();
} 

public function renderCisnik_listek()
{
    $this->template->posts = PostsModel::fetchAll();
} 



///// blog end
 
    // úvod - seznam skupin
    public function renderLogin() {
     
        
  
    
        
    }
    
  
       public function handleBaf() {
     
     
        $this->flashMessage('Baf');
        
      
              
         
         
         
    }
    
     public function handleHodnoceniminus($nazev) {
     
     
       
         
             
              dibi::query('
        UPDATE [darky]
        SET [oblibenost]=([oblibenost] - 1 )
        WHERE [nazev]= %s',  $nazev     
                
        );
             
             
              
         
         
         
    }
     public function handleHodnoceniplus($nazev) {
     
     
         
         
             
              dibi::query('
        UPDATE [darky]
        SET [oblibenost]=([oblibenost] + 1) 
        WHERE [nazev]= %s', $nazev     
                
        );
             
             
        
         
    }
    
    
     private $vyraz='';
    public function renderVypis_vyhl($hledany_vyraz) {
         // Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$configurator->setProductionMode($configurator::DEVELOPMENT);
         $section = $this->session->getSection('count');
       $count_d=$section->count;
       $this->template->count_d=$count_d; 
      $this->template->vyraz=$hledany_vyraz; 
    }

    public function renderVypis($hledany_vyraz) {
       $section = $this->session->getSection('count');
       $count_d=$section->count;
       $this->template->count_d=$count_d; 
       
         $this->template->vyraz=$hledany_vyraz; 
        $tag = HledamModel::fetchTag($hledany_vyraz);
        
     
          
        
     
     
     
     
     
     
     
  
        
        
        
        
        
        
        
        
        
        
             $section = $this->session->getSection('vypis');
           $section->hledany_vyraz=$hledany_vyraz;
      }
// přidat odkaz na firefox
      // ale tedka to je hor39 .. kvarteto s 3esti kartama]
      
      
        // tvorba formuláře
    public function createComponentHledamForm() {
        //uvodní vyhledávání  

        $form = new Form();
       
        $form->addText('hledany_vyraz', 'Hledaný výraz', 80, 20)
        ->addRule(Form::FILLED, 'Napište pro koho chcete dárek!')
                     
        ->setEmptyValue('muže, ženu, kamarádku atd.')
        ->getControlPrototype()
         ->onfocus("this.value = ''; this.onfocus = null")
         ;
        $form->addImage('send', 'images/uvod/tlacitko_1.png'); //tlacitko
        $form->onSuccess[] = callback($this,'hledamFormSubmitted'); // po odpálení formuláře
        return $form; // stvoř formulář
    }

    public function hledamFormSubmitted(Form $form) {
        //úvodní vyhledávání
        $this->setView('vypis_vyhl');
        $hledany_vyraz = $form->getValues(TRUE);
        // vložení hodnot z formuláře
        $hledany_vyraz = $hledany_vyraz['hledany_vyraz'];
       
        //tvorba pristupove adresy podle dat
        //
       HledamModel::hledano($hledany_vyraz);
     
        $zacatek = 'originální-dárek-pro-';
        $adresa = $zacatek . $hledany_vyraz;
        $this->redirectUrl($adresa, $code = NULL);
    
    }

      
      
      
      
   public function createComponentDarekForm() {

      
       // $form->getElementPrototype()->class('ajax');
        // výpis z adresy - vyhledávané slovo se pak vloží jako základní hodnota 
        //$httpRequest = $this->getService('httpRequest');
        //$uri = $httpRequest->getUrl();
        //$url = $uri->path;
        //$nazev_vyhl_slova = substr($url, 20, 11); // !! musí se upravit pro konkretni stranky
          // vyhledávací formulář, tovrba chceckboxů
        // $form['hledany_vyraz']->setValue('tátu');
        
         $form = new Form();
        $form->getElementPrototype()->class('ajax');
        // výpis z adresy - vyhledávané slovo se pak vloží jako základní hodnota 
        $httpRequest = $this->getService('httpRequest');
        $uri = $httpRequest->getUrl();
        $url = $uri->path;
        $nazev_vyhl_slova = substr($url, 25, 12); // !! musí se upravit pro konkretni stranky
          // vyhledávací formulář, tovrba chceckboxů
        $form->addText('hledany_vyraz', 'Hledaný výraz', 80, 20)
                ->setDefaultValue($nazev_vyhl_slova);
        $form->addText('cena_od', 'Cena_od', 80, 20)
                ->setDefaultValue('0');
        $form->addText('cena_do', 'Cena_do', 80, 20)
                ->setDefaultValue('10000');
        $form->addCheckbox('jidlo', 'Jídlo & Vaření')
                
              
                ->getControlPrototype()
                 ->onchange('submit()');
         
        $form->addCheckbox('priroda', 'Příroda')
               
        ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('umeni', 'Umění & design')
               
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('sport', 'Sport')
                
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('hry', 'Hry & hračky')
          
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('gadgets', 'Gadgets')
             
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('zvirata', 'Zvířata')
            
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('film', 'Film')
               
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('hudba', 'Hudba')
              
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('relax', 'Relax')
               
                ->getControlPrototype()
                 ->onchange('submit()');
        
        $form->addCheckbox('technologie', 'Technologie')
            
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('nocni_zivot', 'Noční život')
             
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('moda', 'Móda')
                
                ->getControlPrototype()
                 ->onchange('submit()');
        $form->addCheckbox('dobrodruzstvi', 'Dobrodružství')
                
                ->getControlPrototype()
                 ->onchange('submit()');
         $form->addCheckbox('retro', 'Retro')
                
                ->getControlPrototype()
                 ->onchange('submit()');
          $form->addCheckbox('historie', 'Historie')
                
                ->getControlPrototype()
                 ->onchange('submit()');
           $form->addCheckbox('hobby', 'Hobby')
                
                ->getControlPrototype()
                 ->onchange('submit()');
            $form->addCheckbox('tabak', 'Tabák')
                
                ->getControlPrototype()
                 ->onchange('submit()');
            $form->addCheckbox('zdravi', 'Zdraví a krása')
                
                ->getControlPrototype()
                 ->onchange('submit()');
             $form->addCheckbox('ezoterika', 'Ezoterika')
                
                ->getControlPrototype()
                 ->onchange('submit()');
              $form->addCheckbox('outdoor', 'Outdoor')
                
                ->getControlPrototype()
                 ->onchange('submit()');
         
        $form->addImage('send', 'images/vypis/dohledejbutton_1.png'); //tlacitko
        $form->onSuccess[] = callback($this,'hledamFormSubmitted2'); // po odpálení formuláře
        return $form; // stvoř formulář
    }

  
    public function hledamFormSubmitted2(Form $form) {
        
      
      
        $hledany_vyraz = $form->getValues(TRUE);

        // vložení hodnot z formuláře
        $cena_od = $hledany_vyraz['cena_od'];
        $cena_do = $hledany_vyraz['cena_do'];

        
        $jidlo = $hledany_vyraz['jidlo'];
        $priroda = $hledany_vyraz['priroda'];
        $umeni = $hledany_vyraz['umeni'];
        $hry = $hledany_vyraz['hry'];
        $gadgets = $hledany_vyraz['gadgets'];
        $zvirata = $hledany_vyraz['zvirata'];
        $film = $hledany_vyraz['film'];
        $hudba = $hledany_vyraz['hudba'];
        $relax = $hledany_vyraz['relax'];
       
        $technologie = $hledany_vyraz['technologie'];
        $sport = $hledany_vyraz['sport'];
        $nocni_zivot = $hledany_vyraz['nocni_zivot'];
        $moda = $hledany_vyraz['moda'];
        $dobrodruzstvi = $hledany_vyraz['dobrodruzstvi'];
          $retro= $hledany_vyraz['retro'];;
        $historie= $hledany_vyraz['historie'];;
        $hobby= $hledany_vyraz['hobby'];;
       $tabak= $hledany_vyraz['tabak'];;
         $zdravi= $hledany_vyraz['zdravi'];;
         $ezoterika= $hledany_vyraz['ezoterika'];;
         $outdoor= $hledany_vyraz['outdoor'];;
        
        
        
        
        $hledany_vyraz_str = $hledany_vyraz['hledany_vyraz'];
        $tag = HledamModel::fetchTag($hledany_vyraz_str);
         $this->template->cena_od = $cena_od;  $this->template->cena_do = $cena_do;
        if($tag=="0"){$tag="5";}; // pojistka proti failu, když se nic nenajde, aby do tagu nešla prázdná proměnná
         
        $this->template->jidlo = $jidlo; // pro klikacky v panelu na straně aby po přenačtení věděli, jak mají vypadat - jestli off nebo on
        $this->template->priroda = $priroda;
        $this->template->umeni = $umeni;
        $this->template->hry = $hry;
        $this->template->gadgets = $gadgets;
        $this->template->zvirata = $zvirata; // pro klikacky v panelu na straně - aby vědli jak mají vypadat
        $this->template->film = $film;
        $this->template->hudba = $hudba;
        $this->template->relax = $relax;
       
        $this->template->technologie = $technologie; // pro klikacky v panelu na straně 
        $this->template->sport = $sport;
        $this->template->nocni_zivot = $nocni_zivot;
        $this->template->moda = $moda;
        $this->template->dobrodruzstvi = $dobrodruzstvi;
        $this->template->retro = $retro;
        $this->template->historie = $historie;
        $this->template->hobby = $hobby;
        $this->template->tabak = $tabak;
        $this->template->zdravi = $zdravi;
        $this->template->ezoterika = $ezoterika;
        $this->template->outdoor = $outdoor;
         $this->template->tag = $tag;
         
                       
          $darkys= HledamModel::fetchVysledekztag2($tag, $cena_od, $cena_do, $jidlo,  $priroda, $umeni, $hry, $gadgets, $zvirata, $film, $hudba, $relax, $technologie, $sport, $nocni_zivot, $moda, $dobrodruzstvi,$retro,$historie,$hobby,$tabak,$zdravi,$ezoterika,$outdoor);
       $this->template->darkys =$darkys;  
        

       
     
            $this->template->count=count($darkys)+count($darkys1);
        
      
          $this->setView('vypis_vyhl');
  
 
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
        
           $this->template->vyraz=$hledany_vyraz_str ;
        
        $tag = HledamModel::fetchTag($hledany_vyraz_str);
    $darkys= HledamModel::fetchVysledekztag2($tag, $cena_od, $cena_do, $jidlo,  $priroda, $umeni, $hry, $gadgets, $zvirata, $film, $hudba, $relax, $technologie, $sport, $nocni_zivot, $moda, $dobrodruzstvi,$retro,$historie,$hobby,$tabak,$zdravi,$ezoterika,$outdoor);
       
       $this->template->darkys =$darkys;  
        
  
        if($this->isAjax())
        {
            
            $this->invalidateControl('vypis');
            
    $this->invalidateControl('vyraz');
            
        }
         
         
         
         }
    
 
 
// musíme vytvořit obrázek pro když nebude obrázek

    // výpis detailu dárku
    public function renderDetail($nazev_pekny) {
           $section = $this->session->getSection('vypis');
           
        $this->template->hledany_vyraz=$section->hledany_vyraz;
        $darek = HledamModel::fetchDetail($nazev_pekny);
        $this->template->darky = $darek;
        
           
          $skupina = $darek['skupina'];  
               
       dump($skupina);
        
        $this->template->darkys = HledamModel::fetchAllvicevyrobcu($nazev_pekny);
        $this->template->tripodobne = HledamModel::tripodobne($skupina);
          $section = $this->session->getSection('count');
             $this->template->count_d=$section->count;
        
    }

    
  

    public function renderWebalizace() {
   
      $list1=HledamModel::fetchWebalizace();
         $this->template->list=$list1;
     
         
         
     foreach ($list1 as $list) {
         
         
         $novy=Strings::webalize($list['nazev']);
        dibi::query('
        UPDATE [darky]
        SET [nazev_pekny]=%s 
        WHERE [nazev]= %s', $novy, $list['nazev']     
                
        );
        
        
      }  
    }
    
    
    
    
    
    //pocitadlo kliknutí
    public function renderKliknuti($adresa) {
        HledamModel::kliknuti($adresa);
        $this->redirectUrl($adresa, $code = NULL);
    }

    
public function createComponentContactForm()
{
    $form =  new Form();
    $form->addText('email', 'Váš e-mail:')
                        ->setEmptyValue('@')
                        ->addRule(Form::FILLED, 'Vyplňte váš e-mail')
                        ->addRule(Form::EMAIL, 'E-mail má nesprávný tvar');
    // A TextAreu
    $form->addTextArea('content', 'Co máte na srdci?');

    // Tlačítko
    $form->addSubmit('send', 'Odeslat');

    // A Callback na odeslání formuláře
    $form->onSubmit[] = callback($this, 'contactFormSubmitted');

    // Nakonec formulář vrátíme, aby se mohl vykreslit
    return $form;
}
public function contactFormSubmitted( $form)
{
$this->setView('okno_0');    
$hodnoty= $form->getValues(TRUE);
        // vložení hodnot z formuláře
        $email= $hodnoty['email'];
          $content= $hodnoty['content'];
$mail = new Message;
$mail->setFrom($email)
    ->addTo('info@vyhledavac-darku.cz')
    ->setSubject('Zprava z vyhledavac-darku.cz')
    ->setBody($content)
    ->send();
}
    

    
    
}


