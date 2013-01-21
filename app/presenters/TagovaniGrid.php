<?php
use \NiftyGrid\Grid;

class TagovaniGrid extends Grid
{
	protected $tagovani;

	public function __construct($tagovani)
	{
		parent::__construct();
		$this->tagovani = $tagovani;
	}

	protected function configure($presenter)
	{
		$source = new \NiftyGrid\DataSource\NDataSource($this->tagovani);

		$this->setDataSource($source);

		$this->setWidth("1200px");
		$this->setDefaultOrder("id DESC");
		$this->setPerPageValues(array(20, 50, 100));
       
		$this->addColumn('nazev', 'Nazev', '210px', 30)
		
			->setTextFilter()
                      	->setRenderer(function($values) use ($presenter){echo \Nette\Utils\Html::el('a')->href($values['adresa'])->target('_blank')->setText($values['nazev']);})
                           
                     ;
               
		$this->addColumn('tag1', 'Tag1', '210px', 60)
			
                        
                                 ->setSelectFilter(array(
                                     'nic' => 'Nic',
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
             'nechci' => 'nechci',))
                        
			->setSelectEditable(array('nic' => 'Nic',
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
             'nechci' => 'nechci'));
                
                $this->addColumn('tag2', 'Tag2', '210px', 60)
			      ->setSelectFilter(array('nic' => 'Nic',
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
             'nechci' => 'nechci',))
                        
			->setSelectEditable(array('nic' => 'Nic',
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
             'nechci' => 'nechci'));
                $this->addColumn('tag3', 'Tag3', '210px', 60)
			      ->setSelectFilter(array('tata' => 'Táta',
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
             'nechci' => 'nechci',))
                        
			->setSelectEditable(array('nic' => 'Nic',
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
             'nechci' => 'nechci'));
                $this->addColumn('tag4', 'Tag4', '210px', 60)
			      ->setSelectFilter(array('nic' => 'Nic',
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
             'nechci' => 'nechci',))
                        
			->setSelectEditable(array(
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
             'nechci' => 'nechci'));
                $this->addColumn('tag5', 'Tag5', '210px', 60)
			      ->setSelectFilter(array('nic' => 'Nic','tata' => 'Táta',
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
             'nechci' => 'nechci',))
                        
			->setSelectEditable(array('tata' => 'Táta',
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
             'nechci' => 'nechci'));
                $this->addColumn('skupina', 'Skupina', '210px', 60)
			      ->setSelectFilter(array('nic' => 'Nic','Jídlo & Vaření' => 'Jídlo & Vaření',
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
            
             'nechci' => 'nechci'))
                        
			->setSelectEditable(array('Jídlo & Vaření' => 'Jídlo & Vaření',
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
            
             'nechci' => 'nechci'));
                $this->addColumn('skupina2', 'Skupina2', '210px', 60)
			 ->setSelectFilter(array('nic' => 'Nic','Jídlo & Vaření' => 'Jídlo & Vaření',
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
            
             'nechci' => 'nechci'))
                        
			->setSelectEditable(array('Jídlo & Vaření' => 'Jídlo & Vaření',
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
            
             'nechci' => 'nechci'));
                
                $this->addColumn('skupina3', 'Skupina3', '210px', 60)
			 ->setSelectFilter(array('nic' => 'Nic','Jídlo & Vaření' => 'Jídlo & Vaření',
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
            
             'nechci' => 'nechci'))
                        
			->setSelectEditable(array('Jídlo & Vaření' => 'Jídlo & Vaření',
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
            
             'nechci' => 'nechci'));

		
               
		$self = $this;

		$this->setRowFormCallback(function($values) use ($self, $presenter){
				$vals = array(
					"id" => $values["id"],
                                    
					"tag1" => $values["tag1"],
				   "tag2" => $values["tag2"],
                                    "tag3" => $values["tag3"],
                                    "tag4" => $values["tag4"],
                                    "tag5" => $values["tag5"],
                                     "skupina" => $values["skupina"],
                                     "skupina2" => $values["skupina2"],
					"skupina3" => $values["skupina3"]
				);
				$presenter->context->database->table('darky')->where("id", $vals["id"])->update($vals);
				$self->flashMessage("Záznam byl úspěšně uložen.","grid-successful");
			}
		);

		$this->addButton(Grid::ROW_FORM, "Rychlá editace")
			->setClass("fast-edit");
		
		
		
		$this->addButton("delete", "Smazat")
			->setClass("delete")
                        ->setConfirmationDialog("Určitě chcete smazat všechny vybrané účty?")
			->setLink(function($row) use ($self){return $self->link("delete!", $row['id']);})
				;

		
			
	} 

	
		
        public function handleDelete($id)
    {
        $this->presenter->context->database->table('darky')->find($id)->delete();
        if(count($id) > 1){
            $this->flashMessage("Položky byly úspěšně smazáni.","grid-successful");
        }else{
            $this->flashMessage("Položka byl úspěšně smazána.","grid-successful");
        }
        $this->redirect("this");
    }
}
