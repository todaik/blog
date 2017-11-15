<?php
class PostManager extends Manager
{
	protected function add(post $post)
	{
		$req = $this->db->prepare('INSERT INTO post SET title = :title, content = :content, abstract = :abstractPost, datepost = NOW(),statepost = :statePost');

		$req->bindValue(':title,' $post->title());
		$req->bindValue(':content,' $post->content());
		$req->bindValue(':abstractPost,' $post->abstractPost());
		$req->bindValue(':statePost,' $post->statePost());

		$req->execute();

	}

	protected function update()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = :title, content = :content, abstract = :abstractPost, datepost = NOW(),statepost = :statePost WHERE id =:id');
		$req->bindValue(':title,' $post->title());
		$req->bindValue(':content,' $post->content());
		$req->bindValue(':abstractPost,' $post->abstractPost());
		$req->bindValue(':statePost,' $post->statePost());
		$req->bindValue(':id,' $post->id(), PDO::PARAM_INT);

		$req->execute();

	}

	public function delete($id)
	{
		$this->db->exec(('DELETE FROM post WHERE id = '.(int) $id);
	}

	public function getPosts($offset, $limit)
	{
		$db = $this->dbConnect();
		$offset = (int) $offset;
	    $limit = (int) $limit; 
		$req = $db->prepare('SELECT id, title, content, abstract,DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatepost FROM post WHERE statepost=\'visible\' ORDER BY datepost DESC LIMIT :offset, :limit');
		$req->bindParam(':offset', $offset, PDO::PARAM_INT);
	    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
		$req->execute();
		return $req;
	}

	public function getPost($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, abstract, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatepost, statepost FROM post WHERE id = ?');
	    $req->execute(array($id));
	    $post = $req->fetch();

	    return $post;
	}

	public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM post')->fetchColumn();
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