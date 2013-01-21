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


class BlogPresenter extends BasePresenter {
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

 public function createComponentAdminCommentForm($name)
{
    $form = new Form($this, $name);
    $form->addText('title', 'Nadpis');
    $form->addTextArea('body', 'Text?');
    /* $form->addText('heslo', 'heslo pro vkládání?')
            ->addRule(Form::FILLED, 'heslo!'); */
    $form->addSubmit('send', 'Odeslat');
    $form->onSubmit[] = callback($this, 'adminCommentFormSubmitted');
    return $form;
}

public function adminCommentFormSubmitted(Form $form)
{
    $data = $form->getValues(TRUE);
     
       // $hledany_vyraz = $hledany_vyraz['hledany_vyraz'];
    $ata['date'] = new DateTime();
   $ata['title'] =$data['title'];
    $ata['body'] =$data['body'];
    $id = CommentsModel::insertadmin($ata);
    $this->flashMessage('Komentář uložen!');
    $this->redirect("this");
}
    
    
  public function renderBlog()
{
    $this->template->posts = PostsModel::fetchAll();
}
     
  public function renderSingle($id)
{
    if (!($post = PostsModel::fetchSingle($id))) {
        $this->redirect('default'); //pokud clanek neexistuje, presemerujeme uzivatele
    }
    $this->template->post = $post;
    $this->template->comments = CommentsModel::fetchAll($id);
}




///// blog end
 
    // úvod - seznam skupin
    public function renderDefault() {
     
        
  
        
   $count_d=dibi::query("SELECT COUNT(*) FROM darky")->fetchSingle();
        $this->template->count_d=$count_d;
         $section = $this->session->getSection('count');
        $section->count=$count_d;
    
        
    }
    
   }