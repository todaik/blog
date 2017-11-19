<?php
class PostManager 
{
	public function doAddPost($title,$abstract,$content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO post(title,content,abstract,datepost) VALUES (?,?,?,now())');
		$req->execute(array($title,$abstract,$content));
		
	}

	public function doUpdatePost($id,$newtitle,$newabstract,$newcontent,$newstatepost)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = :newtitle, content = :newcontent, abstract = :newabstract, dateupdatepost = NOW(),statepost = :newstatepost WHERE id =:id');
		$req->execute(array(
			'newtitle'=>$newtitle,
			'newcontent'=>$newcontent,
			'newabstract'=>$newabstract,
			'newstatepost'=>$newstatepost,
			'id'=>$id));
	}

	public function doDeletePost($id)
	{
		$db = $this->dbConnect();
		$message=$db->prepare('DELETE FROM post WHERE id=?');
	    $message->execute(array($id));
	}

	public function getPostsVisible($offset, $limit)
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

		public function getPosts($offset, $limit)
	{
		$db = $this->dbConnect();
		$offset = (int) $offset;
	    $limit = (int) $limit; 
		$req = $db->prepare('SELECT id, title, content, abstract,statepost,DATE_FORMAT(dateupdatepost, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatepost FROM post ORDER BY dateupdatepost DESC LIMIT :offset, :limit');
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



	public function countPosts()
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT COUNT(id) AS total FROM post');
		$posts->execute(array());
		$total = $posts->fetchColumn();
		return $total;
	}

	public function countPostsVisible()
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT COUNT(id) AS total FROM post WHERE statepost = \'visible\'');
		$posts->execute(array());
		$total = $posts->fetchColumn();
		return $total;
	}

	public function countPostsNotVisible()
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT COUNT(id) AS total FROM post WHERE statepost != \'visible\'');
		$posts->execute(array());
		$total = $posts->fetchColumn();
		return $total;
	}

	public function countPage()
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT COUNT(id) AS total FROM post WHERE statepost = \'visible\'');
		$posts->execute(array());
		$total = $posts->fetchColumn();
		$pagesTotal = ceil($total / 5);
		return $pagesTotal;
		
	}


	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION));
	    return $db;
	}
}