<?php
require_once('model/Manager.php');

class CommentManager extends Manager
{
	
	public function doDeleteComments($postId)
	{
		$db = $this->dbConnect();
		$message = $db->prepare('DELETE FROM comments WHERE post_id=?');
	    $message->execute(array($postId));

	}

	public function doDeleteComment($id)
	{
		$db = $this->dbConnect();
		$message = $db->prepare('DELETE FROM comments WHERE id=?');
	    $message->execute(array($id));

	}

	public function doApproveComment($id)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('UPDATE comments SET signaled = 0 WHERE id=:id');
	    $comment->execute(array('id'=>$id));

	}

	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, post_id,author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatecomment FROM comments  WHERE post_id = ? ORDER BY id DESC');
	    $comments->execute(array($postId));
	   
	    return $comments;
	}

		public function getSignaledComments()
		{
			$db = $this->dbConnect();
			$comments = $db->prepare('SELECT id, post_id,author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatecomment, signaled FROM comments WHERE signaled >=1 ORDER BY signaled DESC');
		    $comments->execute();
		   
		    return $comments;
		}

		public function countSignaledComments()
		{
			$db = $this->dbConnect();
			$comments = $db->query('SELECT COUNT(id) AS total FROM comments WHERE signaled >=1');
			$comments->execute(array());
			$total = $comments->fetchColumn();
			return $total;
		}

		public function countComments()
		{
			$db = $this->dbConnect();
			$comments = $db->query('SELECT COUNT(id) AS total FROM comments');
			$comments->execute(array());
			$total = $comments->fetchColumn();
			return $total;
		}


	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment,comment_date) VALUES (?,?,?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));
	    return $affectedLines;
	}

	public function incrementSignaledComment($idComment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET signaled = signaled +1 WHERE id = :id');
		$req->execute(array('id'=>$idComment));
	}


}