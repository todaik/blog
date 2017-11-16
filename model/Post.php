<?php
class Post
{
	//attributs
	protected $erreurs = array(),
			  $id,
			  $title,
			  $content,
			  $abstractPost,
			  $datePost,
			  $updateDatePost,
			  $statePost,

	const TITRE_INVALIDE = 1;
	const RESUME_INVALIDE = 2;
	const CONTENU_INVALIDE = 3;
	const ETAT_INVALIDE = 4;
	
	//constructeur
	public function __construct ( $valeurs = array ())
	{
		if (! empty ( $valeurs )) 
	 	{
	 		$this -> hydrate ( $valeurs );
	 	}
	}

	//hydratation
	public function hydrate($donnees)
	{
		foreach ($donnees as $attribut => $valeur) 
		{
			$methode = 'set'.ucfirst($attribut);

			if(is_callable(array($this, $methode)))
			{
				$this->$methode($valeur);
			}
		}
	}

	public function isNew()
	{
		return empty($this->id);
	}

	public function isValid()
	{
		return !(empty($this->title) || empty($this->abstract) ||empty($this->content));
	}

	//setter
	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setTitle($title)
	{
		if(!is_string($title) || empty($title))
		{
			$this->erreur[] = self::TITRE_INVALIDE;
		}
		else
		{
			$this->title = $title;
		}
	}

	public function setAbstract($abstractPost)
	{
		if(!is_string($abstractPost) || empty($abstractPost)) {
			$this->erreur[] = self::RESUME_INVALIDE;
		}
		else {
			$this->abstractPost = $abstractPost;
		}
	}

	public function setContent($content)
	{
		if(!is_string($content) || empty($content)) {
			$this->erreur[] = self::CONTENU_INVALIDE;
		}
		else {
			$this->content = $content;
		}
	}

	public function setDatePost ($datePost)
 	{
		if (is_string ($datePost) && preg_match ('`le [0-9]{2}/[0-9]{2}/[0-9]{4} à [0-9]{2}h[0-9]{2}`',$datePost)) {
 			$this->datePost = $datePost;
 		}
 	}

 	public function setUpdateDatePost ($updateDatePost)
 	{
		if (is_string ($updateDatePost) && preg_match ('`le [0-9]{2}/[0-9]{2}/[0-9]{4} à [0-9]{2}h[0-9]{2}`',$updateDatePost)) {
 			$this->updateDatePost = $updateDatePost;
 		}
 	}

 	public function setStatePost($statePost)
	{
		if(!is_string($statePost) || empty($statePost))
		{
			$this->erreur[] = self::ETAT_INVALIDE;
		}
		else
		{
			$this->statePost = $statePost;
		}
	}


	//GETTERS

	public function erreurs()
	{
		return $this->erreurs;
	}

	public function id()
	{
		return $this->id;
	}

	public function title()
	{
		return $this->title;
	}

	public function content()
	{
		return $this->content;
	}

	public function abstractPost()
	{
		return $this->abstractPost;
	}

	public function statePost()
	{
		return $this->statePost;
	}



}


