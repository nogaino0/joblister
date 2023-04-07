<?php 

class Job
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	// Get All Jobs
	public function getJobs() 
	{
		$this->db->query("SELECT * FROM job");
		$jobs = $this->db->getAll();

		foreach ($jobs as $job) {
			$job->description = substr($job->description, 0, strpos($job->description, " ", MAX_STRING)) . " ...";

		}
		return $jobs;
	}

	// Get One identified Job
	public function getJob($id = 0)
	{
		$this->db->query("SELECT * FROM job WHERE `id`=" . $id);
		$job = $this->db->getSingle();
		return $job;
	}

	// Get Jobs By Category
	public function getJobsByCat(int $cat_ID)
	{

		$this->db->query("SELECT * FROM job WHERE `cat_id` = $cat_ID");
		$jobs = $this->db->getAll();

		foreach ($jobs as $job) {
			$job->description = substr($job->description, 0, strpos($job->description, " ", MAX_STRING)) . " ...";
		}

		return $jobs;
	}

	// Get Jobs By Category ID
	public function getCatName(int $cat_ID)
	{

		$this->db->query("SELECT `name` FROM categories WHERE `id` = $cat_ID");
		$cat = $this->db->getsingle();

		if (!empty($cat)) {
			return $cat->name;
		}else{
			return "'Unkown'";
		}

	}

	// Get Categories function
	public function getCategories()
	{
		$this->db->query("SELECT * FROM categories");
		$categories = $this->db->getAll();

		foreach ($categories as $cat) {
			$cat->name = ucfirst($cat->name);
		}

		return $categories;
	}

}