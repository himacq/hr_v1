<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Calendar Class
 *
 * This class enables the creation of calendars
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/calendar.html
 */
class Converttopdf {
	
	public $pdf_page_orientation='p';
	public $pdf_unit='mm';
	public $pdf_page_format='a4';
	public $unicode=true; 
	public $encoding='utf-8'; 
	public $diskcache=false; 
	public $pdfa=false;
	public $creator='creator';
	public $author='author';
	public $title='title';
	public $subject='subject';
	public $keywords='keywords';
	public $header_logo = 'tcpdf_logo.jpg';
	public $header_logo_width = '30';
	public $header_title = 'header_title';
	public $header_string = 'header_string';
	public $header_text_color_r = '0';
	public $header_text_color_g = '0';
	public $header_text_color_b = '0';
	public $header_line_color_r = '0';
	public $header_line_color_g = '0';
	public $header_line_color_b = '0';
	public $pdf_font_name_main='helvetica';
	public $pdf_font_size_main=14;
	public $pdf_font_name_data='helvetica';
	public $pdf_font_size_data=10;
	public $pdf_font_monospaced='courier';
	public $pdf_margin_left=15;
	public $pdf_margin_top=10;
	public $pdf_margin_right=15;
	public $pdf_margin_bottom=25;
	public $pdf_margin_header=5;
	public $pdf_margin_footer=10;
	public $pdf_image_scale_ratio=1.25;
	public $content='';
	public $tbl='';
	public $filename='';
	
	public function SetText($txt){
		$this->content=$txt;
	}
	public function SetHeader($txt){
		$this->tbl=$txt;
	}
	public function PrintPDF()
	{
		$this->filename=date('Ymdhis').".pdf";
		include(getcwd().'\tcpdf\examples\tcpdf_include.php');
		
		if(strlen($this->content)==0){
		}
		else
		{
			$pdf = new TCPDF($this->pdf_page_orientation, $this->pdf_unit, $this->pdf_page_format, $this->unicode, $this->encoding, $this->diskcache, $this->pdfa);
			$lg = Array();
			$lg['a_meta_charset'] = 'UTF-8';
			$lg['a_meta_dir'] = 'rtl';
			$lg['a_meta_language'] = 'ar';
			$lg['w_page'] = 'page';
			$pdf->setLanguageArray($lg);
			

			$pdf->setHeaderData('',0,'','',array(0,0,0), array(255,255,255) ); 		//$pdf->SetCreator($this->creator);
			$pdf->setFooterData(array(0,0,0), array(255,255,255));
			$pdf->SetMargins($this->pdf_margin_left, $this->pdf_margin_top, $this->pdf_margin_right);
			$pdf->SetHeaderMargin($this->pdf_margin_header);
			$pdf->SetFooterMargin($this->pdf_margin_footer);
			$pdf->SetAutoPageBreak(TRUE, $this->pdf_margin_bottom);
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}
			$pdf->setFontSubsetting(true);
			$pdf->SetFont('dejavusans', '', 12, '', true);
			$pdf->AddPage();
			$html =$this->content;
			$tbl =$this->tbl;

$pdf->writeHTML($tbl, true, false, false, false, '');
			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
			$pdf->Output($this->filename, 'D');
		}

	}

	
	}

// END CI_Calendar class

/* End of file Calendar.php */
/* Location: ./system/libraries/Calendar.php */