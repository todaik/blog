<?php
abstract class PostManager
{
	abstract protected function add(post $post)
	{

	}

	abstract public function count()
	{

	}

	abstract public function delete($id)
	{

	}

	abstract public function getList($start = -1, $limit = -1)
	{

	}

	abstract public function getUnique($id)
	{

	}

	public function save(post $post)
	{
		if ($post->isValid())
		{
			$post->isNew() , $this->add($post) : $this->update($post);
		}
		else
		{
			throw new Exception("L\'article doit être valide pour être enregistrée");
			
		}
	}
}