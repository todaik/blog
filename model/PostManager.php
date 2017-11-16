<?php
class PostManager 
{
	public function add(post $post)
	{


	}

	public function update()
	{
		


	}

	public function delete($id)
	{

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

	}

	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION));
	    return $db;
	}
}