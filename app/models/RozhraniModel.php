<?php

use Nette\Security as NS;


/**
 * Users authenticator.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class RozhraniModel 
{
	
     public static function fetchLogin($username,$password) {
       return dibi::fetchAll('
            SELECT *
            FROM [users] WHERE  (%and)  '
                       
        ,  array(
    array(' kontaktmail= %s', $username),
    array('password = %s', $password),
   
    )
                                                   
               );
             }  
      
             
             //vypis nových neotagovaných
          public static function fetchNovy() {
       return dibi::fetch('
            SELECT *
            FROM [darky] WHERE  [skupina]="nic" '
                                                  
               );
             }    
             
             
               //vypis nových neotagovaných
          public static function fetchuziv() {
       return dibi::fetchAll('
            SELECT *
            FROM [users] WHERE  [role]="klient" '
                                                   
               );
             }   
             //vypis nových neotagovaných
          public static function fetchuzivvypl() {
       return dibi::fetchAll('
            SELECT *
            FROM [users] WHERE  [role]="klient"'
                                                   
               );
             } 
             
             
             // update hodnot
       
             public static function stop_user($id)
             { 
       
                    $arr = array(
              'status'=> 'stop'               
                        );
                 
                 return dibi::query('
        UPDATE [darky]
        SET ',$arr,' 
        WHERE [jmeno_prodejce]=(SELECT [adresa] FROM [users] WHERE [id]=%i)',$id
        );}
                 
                 public static function stop_usera($id)
             { 
       
                    $arr = array(
              'status'=> 'stop'               
                        );
                 
                 return dibi::query('
        UPDATE [users]
        SET ',$arr,' 
        WHERE  [id]=%i',$id
        );
           
                 
                 
        
    }
    
    
    
    // pro výrobky
    public static function start_user($id)
             {
       
                    $arr = array(
              'status'=> 'start'               
                        );
                 
                 return dibi::query('
        UPDATE [darky]
        SET ',$arr,' 
        WHERE [jmeno_prodejce]=(SELECT [adresa] FROM [users] WHERE [id]=%i)',$id
        );
        
    }
    // pro uživatele
       public static function start_usera($id)
             { 
       
                    $arr = array(
              'status'=> 'start'               
                        );
                 
                 return dibi::query('
        UPDATE [users]
        SET ',$arr,' 
        WHERE  [id]=%i',$id
        );
           
                 
                 
        
    }
    
    
    
    
    
     public static function delete_user($id)
             {
       
                 return dibi::query('
        DELETE FROM [darky]
            WHERE [jmeno_prodejce]=(SELECT [adresa] FROM [users] WHERE [id]=%i)',$id
        );
        
    }
    
    
    
    public static function format_user($id)
             {
       
                    return dibi::query('
        DELETE FROM [users] WHERE [id]=%i',$id
        );
                 
    }
    
             
    
    
    
    
    
             
             public static function updatenovy($id,$tag1,$tag2,$tag3,$tag4,$tag5,$skupina,$skupina2,$skupina3) {
       
                    $arr = array(
    'tag1'=> $tag1, 
       'tag2'=> $tag2,                 
        'tag3'=> $tag3,
          'tag4'=> $tag4,                 
        'tag5'=> $tag5, 
         'skupina'=> $skupina,              
            'skupina2'=> $skupina2,            
             'skupina3'=> $skupina3           
                        );
                 
                 return dibi::query('
        UPDATE [darky]
        SET ',$arr,' 
        WHERE [id]=%i',$id
        );
           
        
    }
             
    
    
    
    
    
    
    
    
             
   
             

             
             public static function aktualizacehodnot($username,$novahodnota,$typhodnoty) {
       
                    $arr = array(
    $typhodnoty => $novahodnota);
                 
                 return dibi::query('
        UPDATE [users]
        SET ',$arr,' 
        WHERE [kontaktmail]=%s',$username
        );
           
        
    }
    
    //je to k něčemu?
   
 
    public static function registrace($odkaz_xml, $password, $kontakttel, $kontaktmail, $adresa, $info, $ic) {
       
                    $reg = array(
    
    'role' => 'klient',             
    'password' => $password,
    'kontakttel' => $kontakttel,
   'kontaktmail' => $kontaktmail,
     'odkaz_xml' => $odkaz_xml,
    'adresa' => $adresa,
    'info' => $info,
    'ic' => $ic,
     'status' => 'ok',
                        );
                 
                 return dibi::query('
        INSERT INTO [users]
        ',$reg
        );
     
        
        
    }
    
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
             
             
             
    
}
