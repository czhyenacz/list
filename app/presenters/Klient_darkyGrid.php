<?php
use \NiftyGrid\Grid;

class Klient_darkyGrid extends Grid
{
	protected $darky;

	public function __construct($darky)
	{
		parent::__construct();
		$this->darky = $darky;
	}

	protected function configure($presenter)
	{
		$source = new \NiftyGrid\DataSource\NDataSource($this->darky);

		$this->setDataSource($source);

		$this->setWidth("1200px");
		$this->setDefaultOrder("id DESC");
		$this->setPerPageValues(array(20, 50, 100));
       
		$this->addColumn('nazev', 'Nazev', '210px', 60)
			
                         ->setTextFilter()
                        ->setAutocomplete('3');
                $this->addColumn('popis_produktu', 'Popis_produktu', '210px', 80)
			->setTextEditable()
			->setTextFilter()
                         
                        ->setAutocomplete('3');
                $this->addColumn('cena', 'Cena', '210px', 30)
			->setTextEditable()
			->setTextFilter()
                         
                        ->setAutocomplete('3');
               
		$this->addColumn('adresa', 'Adresa', '210px', 200)
			->setTextEditable()
			->setTextFilter()
                         
                        ->setAutocomplete('3');
                $this->addColumn('clicks', 'Počet kliků', '210px', 30)
		->setTextFilter()
                        ->setAutocomplete('3');

		
               
		$self = $this;

		$this->setRowFormCallback(function($values) use ($self, $presenter){
				$vals = array(
					"id" => $values["id"],
                                    "cena" => $values["cena"],
                                    "popis_produktu" => $values["popis_produktu"],
                                    "adresa" => $values["adresa"],
					
				);
				$presenter->context->database->table('darky')->where("id", $vals["id"])->update($vals);
				$self->flashMessage("Záznam byl úspěšně uložen.","grid-successful");
			}
		);

		$this->addButton(Grid::ROW_FORM, "Rychlá editace")
			->setClass("fast-edit");
		
	
		
		
		
			
	}

	
	
       
}
