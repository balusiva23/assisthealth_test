<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Frontend/index');
	}
	public function About()
	{
		$this->load->view('Frontend/about');
	}
	public function Cart()
	{
		$this->load->view('Frontend/cart');
	}
	public function Services()
	{
		$this->load->view('Frontend/services');
	}
	public function Ecommerce()
	{
		$this->load->view('Frontend/e-commerce');
	}
     public function ContactUs()
	{
		$this->load->view('Frontend/contact');
	}
	//services
	public function Doctor_appointment()
	{
		$this->load->view('Frontend/doctor-appointments');
	}
	public function Post_Hospital_Care()
	{
		$this->load->view('Frontend/post-hospital-care');
	}
	public function Organizing_heath_record()
	{
		$this->load->view('Frontend/organizing-health-records');
	}
	public function Healthcare_navigation()
	{
		$this->load->view('Frontend/healthcare-navigation');
	}
     public function Health_education_support()
	{
		$this->load->view('Frontend/health-education-and-support');
	} public function helpline()
	{
		$this->load->view('Frontend/24-care-helpline');
	}

	 
}
