<?php 
	
	include_once 'config/init.php';

	$template = new Template("template/frontPage.php");

	$job = new Job;

	$template->cats = $job->getCategories();

	if ( !isset($_GET['cat_ID']) OR $_GET['cat_ID'] == "all" ) {

		$template->title = "Latest Jobs";
		$template->jobs  = $job->getJobs();

	}else{

		$cat_ID = $_GET['cat_ID'];
		$template->title = "Jobs for " . ucfirst($job->getCatName($cat_ID)) . " sector";
		$template->jobs = $job->getJobsByCat($cat_ID);

	}


	// Display The Template
	echo $template;