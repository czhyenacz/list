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
    
     protected function createComponentRozhraniForm() {
        $form = new Form();
        $form->addText('username', 'Uživatelské jméno:')
                ->setRequired('Prosím napište Váše přihlašovací jmeno');
        $form->addPassword('password', 'Password:')
                ->setRequired('Prosím napište své heslo.');


        $form->addSubmit('send', 'Odeslat');

        $form->onSuccess[] = callback($this, 'rozhraniFormSubmitted');
        return $form;
    }

    public function rozhraniFormSubmitted(Form $form) {
       

        $values = $form->getValues(TRUE);
        $username = $values['username'];
        $password = $values['password'];
        $section = $this->session->getSection('prihlaseni');
        $section->setExpiration('+ 172 minutes');
        $section->userName = $username;
        $section->passWord = $password;
        $hodnoty = RozhraniModel::fetchLogin($section->userName, $section->passWord);
        $this->template->hodnot = $hodnoty;
        
        
           if($hodnoty['role']<>'cisnik' or $hodnoty['role']<>'kuchar'){ $this->redirect('Listek:login'); 
        exit;}
        if($hodnoty['role']=='cisnik'){
            
            
             $this->setView('cisnik_stoly');
            
        }
        if($hodnoty['role']=='kuchar'){
            
            
             $this->setView('kuchyn_objednavka');
            
        }
        
    }
         
 
     
      
      

    
    
}


