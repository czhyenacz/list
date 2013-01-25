<?php


   




class HledamModel {
   
     // výpis dárků podle tagu 
           

    
    
    
    
    
    
             
    public static function fetchVysledekztag($tag,$poradi_od,$poradi_do) {
      

        
       return dibi::fetchAll('
            SELECT *
            FROM [darky]  WHERE  (%or) AND (%and)'
       
               ,  array(
     array('tag1 = %s', $tag),
     array('tag2 = %s', $tag),
     array('tag3 = %s', $tag),
     array('tag4 = %s', $tag),
     array('tag5 = %s', $tag),
     array('tag1 = "vsichni"'),
     array('tag2 = "vsichni"'),
     array('tag3 = "vsichni"'),
     array('tag4 = "vsichni"'),  
     array('tag5 = "vsichni"'),
    )
               ,  array(
     array('[status]<>"stop"'),
    array('[skupina]<>"nic"'),
     array('[skupina]<>"nechci"'),
     array('[cena] > %s', $poradi_od),
     array('[cena] < %s', $poradi_do),              
                   
    )
               
                                            
               );
             }  
             
             
           public static function fetchVysledekztagdb($tag,$poradi_od,$poradi_do) {
      

        
       return dibi::fetchAll('
            SELECT *
            FROM [darky]  WHERE  (%or) AND (%and)'
       
               ,  array(
     array('tag1 = %s', $tag),
     array('tag2 = %s', $tag),
     array('tag3 = %s', $tag),
     array('tag4 = %s', $tag),
     array('tag5 = %s', $tag),
     array('tag1 = "vsichni"'),
     array('tag2 = "vsichni"'),
     array('tag3 = "vsichni"'),
     array('tag4 = "vsichni"'),  
     array('tag5 = "vsichni"'),
    )
               ,  array(
     array('[status]<>"stop"'),
    array('[skupina]<>"nic"'),
     array('[skupina]<>"nechci"'),
     array('[cena] > %s', $poradi_od),
     array('[cena] < %s', $poradi_do),              
                   
    )
               
               
               
             
                                             
               );
             }     
             
             
             
             
             
             
             
             
             
             
             
             
             
             
        public static function fetchWebalizace() {
      

        
       return dibi::fetchAll('
            SELECT *
            FROM [darky]'
           
             
                                             
               );
             }      
             
             
             
             public static function fetchVysledekztagvic($tag,$poradi_od) {
      

        
       return dibi::fetchAll('
            SELECT *
            FROM [darky]  WHERE  (%or) AND (%and)'
       
               ,  array(
     array('tag1 = %s', $tag),
     array('tag2 = %s', $tag),
     array('tag3 = %s', $tag),
     array('tag4 = %s', $tag),
     array('tag5 = %s', $tag),
     array('tag1 = "vsichni"'),
     array('tag2 = "vsichni"'),
     array('tag3 = "vsichni"'),
     array('tag4 = "vsichni"'),  
     array('tag5 = "vsichni"'),
    )
               ,  array(
     array('[status]<>"stop"'),
    array('[skupina]<>"nic"'),
     array('[skupina]<>"nechci"'),
     array('[cena] > %s', $poradi_od),
                   
                   
    )
               
               
               
             
                                             
               );
             }  
             
             
             
             
             
             public static function count() {
       return dibi::fetchValue('
            SELECT COUNT(*) FROM [darky]');
                 
            
              
             }  
             
             
               
             /*
             
           // pojď , Ty zběsilá ovce ) - verca
               , 3, $poradi  
                                       // dibi::dataSource(           
            
             */
             
                            public static function fetchVysledekztag2($tag, $cena_od, $cena_do, $jidlo, $priroda, $umeni, $hry, $gadgets, $zvirata, $film, $hudba, $relax, $technologie, $sport, $nocni_zivot, $moda, $dobrodruzstvi,$retro,$historie,$hobby,$tabak,$zdravi,$ezoterika,$outdoor)
{  return dibi::dataSource('
                SELECT *
                FROM [darky]
                WHERE               
                (%or) and (%and) and (
                        %if skupina = "jidlo2" %end
                        %if OR (skupina = "Jídlo & Vaření" or skupina2 = "Jídlo & Vaření" or skupina3 = "Jídlo & Vaření"  ) %end
                        %if OR skupina = "Příroda" or skupina2 = "Příroda" or skupina3 = "Příroda" %end
                        %if OR skupina = "Umění & design" or skupina2 = "Umění & design" or skupina3 = "Umění & design" %end
                        %if OR skupina = "Hry & hračky" or skupina2 = "Hry & hračky" or skupina3 = "Hry & hračky"%end
                        %if OR skupina = "Gadgets" or skupina2 = "Gadgets" or skupina3 = "Gadgets" %end
                        %if OR skupina = "Zvířata" or skupina2 = "Zvířata" or skupina3 = "Zvířata" %end
                        %if OR skupina = "Film" or skupina2 = "Film" or skupina3 = "Film" %end
                        %if OR skupina = "Hudba" or skupina2 = "Hudba"  or skupina3 = "Hudba" %end
                        %if OR skupina = "Relax" or skupina2 = "Relax" or skupina3 = "Relax"%end
                        %if OR skupina = "Technologie" or skupina2 = "Technologie" or skupina3 = "Technologie" %end
                        %if OR skupina = "Sport" or skupina2 = "Sport" or skupina3 = "Sport"%end
                        %if OR skupina = "Noční život" or skupina2 = "Noční život" or skupina3 = "Noční život"%end
                        %if OR skupina = "Móda" or skupina2 = "Móda" or skupina3 = "Móda"%end
                        %if OR skupina = "Dobrodružství" or skupina2 = "Dobrodružství" or skupina3 = "Dobrodružství"%end
                         %if OR skupina = "Retro" or skupina2 = "Retro" or skupina3 = "Retro" %end
                          %if OR skupina = "Historie" or skupina2 = "Historie" or skupina3 = "Historie"%end
                           %if OR skupina = "Hobby" or skupina2 = "Hobby" or skupina3 = "Hobby"%end
                            %if OR skupina = "Tabák" or skupina2 = "Tabák" or skupina3 = "Tabák"%end
                             %if OR skupina = "Zdraví a krása" or skupina2 = "Zdraví a krása" or skupina3 = "Zdraví a krása"%end
                              %if OR skupina = "Ezoterika" or skupina2 = "Ezoterika" or skupina3 = "Ezoterika"%end
                               %if OR skupina = "Outdoor" or skupina2 = "Outdoor" or skupina3 = "Outdoor"%end
                           )  ORDER BY RAND()'
                         
        
                ,array(
     array('tag1 = "vsichni"'),
     array('tag2 = "vsichni"'),
     array('tag3 = "vsichni"'),
     array('tag4 = "vsichni"'),  
     array('tag5 = "vsichni"'),
     array('tag1 = %s', $tag),
     array('tag2 = %s', $tag),
     array('tag3 = %s', $tag),
     array('tag4 = %s', $tag),
     array('tag5 = %s', $tag),
     
                        
                )
                 ,array(
    array('cena > %i', $cena_od),
    array('cena < %i', $cena_do),
    array('[status]<>"stop"'),
    array('[skupina]<>"nic"'),
     array('[skupina]<>"nechci"'), 
    
       ), 
                "TRUE" == "TRUE",
        $jidlo == "1",
        $priroda == "1",
        $umeni == "1",
        $hry == "1",
         $gadgets == "1",
        $zvirata == "1",
        $film == "1",
        $hudba == "1",
        $relax == "1",
          $technologie == "1",
        $sport == "1",
        $nocni_zivot == "1",
        $moda == "1",
        $dobrodruzstvi == "1",
        $retro == "1",
        $historie == "1",
         $hobby == "1",
         $tabak == "1",
        $zdravi == "1",
         $ezoterika == "1",
         $outdoor == "1"             
             
                       );
}






    

    // zjištění jaký tag platí
    public static function fetchTag($hledany_vyraz) {
        return dibi::fetch('
           SELECT [tag] FROM [tagy] 
        WHERE [tagy.heslo]=%s', $hledany_vyraz
        );
    }
    
    
    // seznam vyrobcu a odkazů u dárku
    public static function fetchAllvicevyrobcu($nazev_pekny) {
        return dibi::fetchAll('
            SELECT *
        FROM [darky]
        WHERE [nazev_pekny] = %s AND [skupina]<>"nic"', $nazev_pekny
        );
    }
         // konečné vypsání dárku
    public static function fetchDetail($nazev_pekny) {
        return dibi::fetch('
        SELECT *
        FROM [darky]
        WHERE [nazev_pekny] = %s AND [skupina]<>"nic"', $nazev_pekny
        ); }
        
       // pocitadlo kliku 
        public static function kliknuti($adresa) {
        return dibi::query('
        UPDATE [darky]
        SET [clicks]=([clicks]+1) 
        WHERE [adresa]= %s', $adresa       
                
        );
 }
 
 
 
 public static function tripodobne($skupina) {
        return dibi::fetchAll('
            SELECT *
        FROM [darky]
        WHERE (%and) ORDER BY RAND() LIMIT 4 '
      
               ,  array(
     array('[status]<>"stop"'),
    array('[skupina]<>"nic"'),
     array('[skupina]<>"nechci"'),
   array('[tag1]<>"nechci"'),
     array('[skupina2]<>"nechci"'),
   
   
      array('[skupina]= %s', $skupina),              
            
    ) );
    }

 
public static function hledano($hledany_vyraz) {
       
                 
                 
                 return dibi::query('
        INSERT INTO [hledano] (hledany_vyraz) VALUES (%s)
        ',$hledany_vyraz 
        );
     
        
        
    }
}

