<?php
class project_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	//Les gets
	public function get_nutrition(){
		$query=$this->db->get('info_nutri');
		return $query->result_array();
	}
	public function get_composition(){
		$query=$this->db->get('composition');
		return $query->result_array();
	}
	public function get_caracteristique(){
		$query=$this->db->get('caracteristique');
		return $query->result_array();
	}
	public function get_all(){
		$query=$this->db->get('all_produit');
		return $query->result_array();
	}
	/*
	
	*/
	public function un_produit($id){
		$sql="select * from openfoodfacts.caracteristique where id_produit=?";
		return $this->db->query($sql, array($id))->result_array();
	}
	public function un_produit_nutri($id){
		$sql="select * from openfoodfacts.info_nutri where id_produit=?";
		return $this->db->query($sql, array($id))->result_array();
	}
	public function un_produit_compo($id){
		$sql="select * from openfoodfacts.composition where id_produit=?";
		return $this->db->query($sql, array($id))->result_array();
	}
	/*
		Fonction pour le téléchargement
	*/
	
	public function recherche_mdl($tag, $caract,$caract_val, $compo,$compo_val, $nutri,$nutri_val,$offset,&$nb){
		//$sql="select id_produit from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
		//$all=$this->get_all();
		/*
		foreach(array_keys(current($all)) as $attr){
			if(){
				
			}
		} 
		*/
		
		if(strlen($tag)!==0 and strlen($caract)!==0 and strlen($compo)!==0 and strlen($nutri)!==0){
			//toutes les valeurs sont insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$caract_val.'%','%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$caract_val.'%','%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
			
		}
		if(strlen($tag)!==0 and strlen($caract)!==0 and strlen($compo)!==0 and strlen($nutri)===0){
			//toutes sont insérées sauf nutri
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$caract_val.'%','%'.$compo_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$caract_val.'%','%'.$compo_val.'%'))->result_array()->result_array();
		}
		if(strlen($tag)!==0 and strlen($caract)!==0 and strlen($compo)===0 and strlen($nutri)!==0){
			//compo n'est pas insérée
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$caract_val.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$caract_val.'%','%'.$nutri_val.'%'))->result_array()->result_array();
		}
		if(strlen($tag)!==0 and strlen($caract)!==0 and strlen($compo)===0 and strlen($nutri)===0){
			//compo et nutri ne sont pas insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$caract_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($caract AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$caract_val.'%'))->result_array()->result_array();
		}
		if(strlen($tag)!==0 and strlen($caract)===0 and strlen($compo)!==0 and strlen($nutri)!==0){
			//toutes sauf caract
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
		}
		if(strlen($tag)!==0 and strlen($caract)===0 and strlen($compo)!==0 and strlen($nutri)===0){
			//caract et nutri non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($compo AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$compo_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($compo AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$compo_val.'%'))->result_array();
		}
		if(strlen($tag)!==0 and strlen($caract)===0 and strlen($compo)===0 and strlen($nutri)!==0){
			//compo et caract non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%','%'.$nutri_val.'%'))->result_array();
		}
		if(strlen($tag)!==0 and strlen($caract)===0 and strlen($compo)===0 and strlen($nutri)===0){
			//caract, compo, nutri non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where product_name ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$tag.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where product_name ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$tag.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)!==0 and strlen($compo)!==0 and strlen($nutri)!==0){
			//toutes les valeurs sont insérées, sauf tag
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$caract_val.'%','%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$caract_val.'%','%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)!==0 and strlen($compo)!==0 and strlen($nutri)===0){
			//toutes sauf tag et nutri
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$caract_val.'%','%'.$compo_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? and CAST($compo AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$caract_val.'%','%'.$compo_val.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)!==0 and strlen($compo)===0 and strlen($nutri)!==0){
			//tag, compo non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$caract_val.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$caract_val.'%','%'.$nutri_val.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)!==0 and strlen($compo)===0 and strlen($nutri)===0){
			//tag, compo et nutri non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$caract_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($caract AS TEXT) ILIKE ?";
			$nb=$this->db->query($sql2, array('%'.$caract_val.'%'))->result_array();
		}
					
		if(strlen($tag)===0 and strlen($caract)===0 and strlen($compo)!==0 and strlen($nutri)!==0){
			//tag, caract non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($compo AS TEXT) ILIKE ? and CAST($nutri AS TEXT) ILIKE ?";
			$nb=$this->db->query($sql2, array('%'.$compo_val.'%','%'.$nutri_val.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)===0 and strlen($compo)!==0 and strlen($nutri)===0){
			//tag, caract et nutri non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($compo AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$compo_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($compo AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$compo_val.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)===0 and strlen($compo)===0 and strlen($nutri)!==0){
			//tag,caract et compo non insérées
			$sql="select id_produit, product_name from openfoodfacts.all_produit where CAST($nutri AS TEXT) ILIKE ? ORDER BY product_name LIMIT 25 OFFSET $offset";
			$answer=$this->db->query($sql, array('%'.$nutri_val.'%'))->result_array();
			$sql2="select count(*) as nb from openfoodfacts.all_produit where CAST($nutri AS TEXT) ILIKE ? ";
			$nb=$this->db->query($sql2, array('%'.$nutri_val.'%'))->result_array();
		}
		if(strlen($tag)===0 and strlen($caract)===0 and strlen($compo)===0 and strlen($nutri)===0){
			//RIEN N'EST INSERE, donc retourne un tableau vide
			$answer=array();
		}
	
		
		return $answer;
	}
	
	public function get_states(){
		return $this->db->query("select * from openfoodfacts._states")->result_array();;
	}
	/*
	Ajout d'un produit
	*/
	public function adding_product($code, $url, $creator, $name, $brand=NULL, $serving_size=NULL, $state, $grade, $energy=NULL, $fat=NULL, $sat=NULL, $trans=NULL, $cho=NULL, $car=NULL, $sug=NULL, $fi=NULL, $prot=NULL, $salt=NULL, $sod=NULL, $vitA=NULL, $vitC=NULL, $calc=NULL, $iron=NULL, $core=NULL, $ing_txt=NULL, $ing_palm=NULL, $addi_n=NULL, $addi_txt=NULL){
		$date=date("Y/m/d");
		$this->db->query("insert into openfoodfacts._produit(code,url,creator,last_modified_datetime,product_name,brands,serving_size,states_fr,nutrition_grade_fr,energy_100g,fat_100g,saturated_fat_100g,trans_fat_100g,cholesterol_100g,carbohydrates_100g,sugars_100g ,fiber_100g ,proteins_100g ,salt_100g ,sodium_100g ,vitamin_a_100g ,vitamin_c_100g ,calcium_100g ,iron_100g ,nutritions_core_fr_100g) values($code, '$url', '$creator','$date'::date, '$name', '$brand', '$serving_size', '$state', '$grade', $energy, $fat, $sat, $trans, $cho, $car, $sug, $fi, $prot, $salt, $sod, $vitA, $vitC, $calc, $iron, $core)");
		
		$sql="select id_produit from openfoodfacts._produit where code=?";
		$id=($this->db->query($sql, array($code))->result_array())[0]['id_produit'];
		
		$this->db->query("insert into openfoodfacts._ingredient(id_produit,ingredients_text,ingredients_that_may_be_from_palm_oil_n) values($id,'$ing_txt', $ing_palm)");
		$this->db->query("insert into openfoodfacts._additif(id_produit,additives_n, additives) values($id,$addi_n, '$addi_txt')");
		return "Ajouter !";
	}
	/*
	Modifiation d'un produit
	*/
	public function editing_product($name, $brand=NULL, $serving_size=NULL, $state, $grade, $energy=NULL, $fat=NULL, $sat=NULL,$sug=NULL, $fi=NULL, $prot=NULL, $salt=NULL, $vitA=NULL, $vitC=NULL, $ing_txt=NULL, $addi_txt=NULL){
		$date=date("Y/m/d");
		$id=$_SESSION['id_produit'];
		$this->db->query("update openfoodfacts._produit set last_modified_datetime='$date'::date,product_name='$name',brands='$brand',serving_size='$serving_size',states_fr='$state',nutrition_grade_fr='$grade',	energy_100g=$energy,fat_100g=$fat,saturated_fat_100g=$sat,sugars_100g=$sug ,fiber_100g=$fi ,proteins_100g =$prot,salt_100g=$salt ,vitamin_a_100g =$vitA ,vitamin_c_100g =$vitC where id_produit=$id ");
		$this->db->query("update openfoodfacts._ingredient set ingredients_text='$ing_txt' where id_produit=$id");
		$this->db->query("update openfoodfacts._additif set additives='$addi_txt' where id_produit=$id");
		
		return "Modification faite !";
	}
	
	public function tst(){
		$sql="select id_produit from openfoodfacts._produit where code=?";
		$id=$this->db->query($sql, array('12456556'))->result_array();
		print_r($id[0]['id_produit']);
	}
	
}
?>