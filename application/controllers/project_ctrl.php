<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class project_ctrl extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('project_model');
	}
	public function index(){
		$this->load->view('project_view');
	}
	public function accueil_ctrl(){
		if(isset($_GET['search'])){
			$_SESSION['caracteristique']=$this->project_model->get_caracteristique();
			$_SESSION['composition']=$this->project_model->get_composition();
			$_SESSION['nutritionnel']=$this->project_model->get_nutrition();
			$this->load->view('recherche_view');
		}
		if(isset($_GET['see'])){
			//$this->project_model->tst();
			
			$_SESSION['un_produit']=$this->project_model->un_produit(1);
			$_SESSION['nutri']=$this->project_model->un_produit_nutri(1);
			$_SESSION['compo']=$this->project_model->un_produit_compo(1);
		//print_r($_SESSION['caract']);
			$this->load->view('consultation_view');
			
		}
		if(isset($_GET['details'])){
			$_SESSION['id_produit']=$_GET['val'];
			$_SESSION['un_produit']=$this->project_model->un_produit($_GET['val']);
			$_SESSION['nutri']=$this->project_model->un_produit_nutri($_GET['val']);
			$_SESSION['compo']=$this->project_model->un_produit_compo($_GET['val']);
		//print_r($_SESSION['un_produit']);
			$this->load->view('consultation_view');
		}
		if(isset($_GET['add'])){
			$_SESSION['states']=$this->project_model->get_states();
			$this->load->view('ajout_view');
		}
		if(isset($_GET['accueil'])){
			$this->load->view('project_view');
		}
		if(isset($_GET['edit'])){
			
			$_SESSION['un_produit']=$this->project_model->un_produit($_SESSION['id_produit']);
			$_SESSION['nutri']=$this->project_model->un_produit_nutri($_SESSION['id_produit']);
			$_SESSION['compo']=$this->project_model->un_produit_compo($_SESSION['id_produit']);
		
			$this->load->view('modification_view');
			
		}
	}
	public function consultation_ctrl(){
		if(isset($_GET['affiche_info'])){
			$_SESSION['nutri']=$this->project_model->un_produit_nutri(1);
		}
		if(isset($_GET['affiche_compo'])){
			$_SESSION['compo']=$this->project_model->un_produit_compo(1);
		}
	}
	public function search_ctrl(){
		$_SESSION['tag']=$_GET['tag'];
		$_SESSION['caracteristique']=$_GET['caracteristique'];
		$_SESSION['crit_caract']=$_GET['crit_caract'];
		$_SESSION['composition']=$_GET['composition'];
		$_SESSION['crit_compo']=$_GET['crit_compo'];
		$_SESSION['nutritionnel']=$_GET['nutritionnel'];
		$_SESSION['crit_nutri']=$_GET['crit_nutri'];
		$_SESSION['offset']=$offset=0;
		$_SESSION['nb_ligne'][0]['nb']=0;
		$val=0;
		
		if(isset($_GET['lancer'])){
			$_SESSION['resultat']=$this->project_model->recherche_mdl($_GET['tag'],$_GET['caracteristique'],$_GET['crit_caract'],$_GET['composition'],$_GET['crit_compo'],$_GET['nutritionnel'],$_GET['crit_nutri'],$offset,$_SESSION['nb_ligne']);
			//$_SESSION['nb_ligne']=$val[0]['nb'];
			//print_r($_SESSION['nb_ligne']);
			
			if($_SESSION['nb_ligne']==NULL || $_SESSION['nb_ligne'][0]['nb']==0){
				//$_SESSION['nb_ligne'][0]['nb']==0;
				$this->load->view('resultat_zero_view');
			}
			else{
				if($_SESSION['nb_ligne'][0]['nb']>0 and $_SESSION['nb_ligne'][0]['nb']!=NULL){
					$this->load->view('resultat_view');
				}
			}
			
		}
	}
	public function page_search_ctrl(){
		if($_SESSION['nb_ligne'][0]['nb']>25){
			if(isset($_GET['next'])){
				$_SESSION['offset']=$_SESSION['offset']+25;
				$_SESSION['resultat']=$this->project_model->recherche_mdl($_SESSION['tag'],$_SESSION['caracteristique'],$_SESSION['crit_caract'],$_SESSION['composition'],$_SESSION['crit_compo'],$_SESSION['nutritionnel'],$_SESSION['crit_nutri'],$_SESSION['offset'],$_SESSION['nb_ligne']);
			
				$this->load->view('resultat_view');
			}
			if(isset($_GET['preview'])){
				if($_SESSION['offset'][0]['nb']==0){
					$_SESSION['resultat']=$this->project_model->recherche_mdl($_SESSION['tag'],$_SESSION['caracteristique'],$_SESSION['crit_caract'],$_SESSION['composition'],$_SESSION['crit_compo'],$_SESSION['nutritionnel'],$_SESSION['crit_nutri'],$_SESSION['offset'],$_SESSION['nb_ligne']);
					//print_r($resultat);
					$_SESSION['offset']=0;
					$this->load->view('resultat_view');
				}
				else{
				$_SESSION['offset']=$_SESSION['offset']-25;
				$_SESSION['resultat']=$this->project_model->recherche_mdl($_SESSION['tag'],$_SESSION['caracteristique'],$_SESSION['crit_caract'],$_SESSION['composition'],$_SESSION['crit_compo'],$_SESSION['nutritionnel'],$_SESSION['crit_nutri'],$_SESSION['offset'],$_SESSION['nb_ligne']);
				$this->load->view('resultat_view');
				}
			}
		}else{
			$_SESSION['offset']=0;
			$_SESSION['resultat']=$this->project_model->recherche_mdl($_SESSION['tag'],$_SESSION['caracteristique'],$_SESSION['crit_caract'],$_SESSION['composition'],$_SESSION['crit_compo'],$_SESSION['nutritionnel'],$_SESSION['crit_nutri'],$_SESSION['offset'],$_SESSION['nb_ligne']);
			$this->load->view('resultat_view');
		}
	}
	/*
	Controlleur de la page d'ajout
	*/
	public function adding_ctrl(){
		if(isset($_GET['add'])){
			if(isset($_GET['state'])){
				print_r($this->project_model->adding_product($_GET['code'],$_GET['url'],$_GET['creator'],$_GET['product_name'],$_GET['brand'],$_GET['serving_size'],$_GET['state'],$_GET['nutrition_grade_fr'],$_GET['energy_100g'],$_GET['fat_100g'],$_GET['saturated_fat_100g'],$_GET['trans_fat_100g'],$_GET['cholesterol_100g'],$_GET['carbohydrates_100g'],$_GET['sugars_100g'],$_GET['fiber_100g'],$_GET['proteins_100g'],$_GET['salt_100g'],$_GET['sodium_100g'],$_GET['vitamin_a_100g'],$_GET['vitamin_c_100g'],$_GET['calcium_100g'],$_GET['iron_100g'],$_GET['nutritions_core_fr_100g'],$_GET['ingredient'],$_GET['may_palm'],$_GET['addi_n'],$_GET['additifs']));
			}
			else if(isset($_GET['s_state'])){
				print_r($this->project_model->adding_product($_GET['code'],$_GET['url'],$_GET['creator'],$_GET['product_name'],$_GET['brand'],$_GET['serving_size'],$_GET['s_state'],$_GET['nutrition_grade_fr'],$_GET['energy_100g'],$_GET['fat_100g'],$_GET['saturated_fat_100g'],$_GET['trans_fat_100g'],$_GET['cholesterol_100g'],$_GET['carbohydrates_100g'],$_GET['sugars_100g'],$_GET['fiber_100g'],$_GET['proteins_100g'],$_GET['salt_100g'],$_GET['sodium_100g'],$_GET['vitamin_a_100g'],$_GET['vitamin_c_100g'],$_GET['calcium_100g'],$_GET['iron_100g'],$_GET['nutritions_core_fr_100g'],$_GET['ingredient'],$_GET['may_palm'],$_GET['addi_n'],$_GET['additifs']));
			}
			else{
				//concatener s_state et state à faire
				$pays=$_GET['state']+$_GET['s_state'];
				print_r($this->project_model->adding_product($_GET['code'],$_GET['url'],$_GET['creator'],$_GET['product_name'],$_GET['brand'],$_GET['serving_size'],$pays,$_GET['nutrition_grade_fr'],$_GET['energy_100g'],$_GET['fat_100g'],$_GET['saturated_fat_100g'],$_GET['trans_fat_100g'],$_GET['cholesterol_100g'],$_GET['carbohydrates_100g'],$_GET['sugars_100g'],$_GET['fiber_100g'],$_GET['proteins_100g'],$_GET['salt_100g'],$_GET['sodium_100g'],$_GET['vitamin_a_100g'],$_GET['vitamin_c_100g'],$_GET['calcium_100g'],$_GET['iron_100g'],$_GET['nutritions_core_fr_100g'],$_GET['ingredient'],$_GET['may_palm'],$_GET['addi_n'],$_GET['additifs']));
			}
		}
		$this->load->view('project_view');
	}
	/*
	Controlleur de la page modification
	*/
	public function edition_ctrl(){
		//Enregistrer la modification
		if(isset($_GET['save'])){
			print_r($this->project_model->editing_product($_GET['product_name'],$_GET['brands'],$_GET['serving_size'],$_GET['states_fr'],$_GET['nutrition_grade_fr'],$_GET['energy_100g'],$_GET['fat_100g'],$_GET['saturated_fat_100g'],$_GET['sugars_100g'],$_GET['fiber_100g'],$_GET['proteins_100g'],$_GET['salt_100g'],$_GET['vitamin_a_100g'],$_GET['vitamin_c_100g'],$_GET['ingredients_text'],$_GET['additives']));
			$_SESSION['un_produit']=$this->project_model->un_produit($_SESSION['id_produit']);
			$_SESSION['nutri']=$this->project_model->un_produit_nutri($_SESSION['id_produit']);
			$_SESSION['compo']=$this->project_model->un_produit_compo($_SESSION['id_produit']);
			$this->load->view('consultation_view');
		}
		//Annuler la modification
		if(isset($_GET['cancel'])){
			print_r("Modification annulée !");
			$this->load->view('consultation_view');
		}
	}
}
?>