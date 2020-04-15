<?php
	
	class loginmodel extends CI_Model {

		public function isvalidate($uname, $pass) {

			$this->db->where(['username'=>$uname, 'password'=>$pass]);
			$res = $this->db->get('users');

			if($res->num_rows()) {
				return $res->row()->id;
			}
			else {
				return false;
			}
		}

		public function articleList($limit, $offset) {

			$id = $this->session->userdata('id');
			$res = $this->db->select()
							->from('articles')
							->where(['user_id'=>$id])
							->limit($limit, $offset)
							->order_by('id', 'desc')
							->get();
							
			return $res->result();
		}

		public function num_rows() {

			$id = $this->session->userdata('id');
			$query = $this->db->get_where('articles', ['user_id' => $id]);
			return (count($query->result()));
		}

		public function signIn($data) {

			$val = $this->db->insert('users', $data);
			return $val;
		}

		public function addarticle($data) {
// echo "<pre>"; print_r($data); exit;
			$art = [
				'user_id'=>$data['id'],
				'article_title'=>$data['title'],
				'article_body'=>$data['body'],
				'article_image'=>$data['image_path'],
				'created_at'=>$data['created_at']
			];
			// print_r($art); exit;

			$res = $this->db->insert('articles', $art);
			return $res;
		}

		public function del($id) {

			$res = $this->db->delete('articles', ['id'=>$id]);
			return $res;
		}

		public function find_article($articleid) {
			$que = $this->db->select(['article_title', 'article_body', 'id'])
					->where('id', $articleid)
					->get('articles');
			return $que->row();
		}

		public function update_articles($articleid, $article) {

			return $this->db->where('id', $articleid)
					->update('articles', $article);

		}

	}