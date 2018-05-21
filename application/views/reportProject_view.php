<?php

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('/tcpdf/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Administracion de proyectos');
$pdf->SetTitle('Reportes del proyecto');
$pdf->SetSubject('Reporte');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/tcpdf/lang/eng.php')) {
	require_once(dirname(__FILE__).'/tcpdf/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set color for background
$pdf->SetFillColor(215, 235, 255);


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// AUTO-FITTING

// set color for background
$pdf->SetFillColor(255, 235, 235);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// CUSTOM PADDING

// set color for background
$pdf->SetFillColor(255, 255, 215);


$title = <<<EDD
<h3>Datos del Proyecto</h3>
EDD;

$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);

$table = '<table style="border:1px solid #000; padding:15px;">';

$table .= '<tr>
				<th style="border:1px solid #000;">Id del proyecto : </th>
				<th style="border:1px solid #000;">' . $dataProy['id_proyecto'] . '</th>
			</tr>';
$table .= '<tr>
			<td style="border:1px solid #000;">Nombre de proyecto : </td>
			<td style="border:1px solid #000;">' . $dataProy['nombre'] . '</td>
		</tr>';
$table .= '<tr>
			<td style="border:1px solid #000;">Tipo de proyecto : </td>
			<td style="border:1px solid #000;">' . $dataProy['tipo'] . '</td>
		</tr>';
		$table .= '<tr>
			<td style="border:1px solid #000;">Encargado de proyecto : </td>
			<td style="border:1px solid #000;">' . $dataProy['nombresEncargado'] . '</td>
		</tr>';
		$table .= '<tr>
			<td style="border:1px solid #000;">Descripcion de proyecto : </td>
			<td style="border:1px solid #000;">' . $dataProy['descripcion'] . '</td>
		</tr>';
		$table .= '<tr>
			<td style="border:1px solid #000;">Departamento : </td>
			<td style="border:1px solid #000;">' . $dataProy['departamento'] . '</td>
        </tr>';
        if ($dataProy['presupuesto_inicial'] != NULL) {
            $table .= '<tr>
                <td style="border:1px solid #000;">Presupuesto : </td>
                <td style="border:1px solid #000;">' . '$' . $dataProy['presupuesto_inicial'] . '</td>
            </tr>';
        } else {
            $table .= '<tr>
                <td style="border:1px solid #000;">Presupuesto : </td>
                <td style="border:1px solid #000;">No asignado</td>
            </tr>';
        }
		$table .= '<tr>
			<td style="border:1px solid #000;">Estado de proyecto : </td>
			<td style="border:1px solid #000;">' . $dataProy['estado'] . '</td>
		</tr>';
		$table .= '<tr>
			<td style="border:1px solid #000;">Fecha de inicio : </td>
			<td style="border:1px solid #000;">' . $dataProy['fecha_inicio_1'] . '</td>
		</tr>';
		$table .= '<tr>
			<td style="border:1px solid #000;">Fecha de finalización : </td>
			<td style="border:1px solid #000;">' . $dataProy['fecha_final_1'] . '</td>
        </tr>';
        
        if ($dataProy['extension_de'] != NULL) {
            foreach ($proyectos as $proy) {
                if ($proy['id_proyecto'] == $dataProy['extension_de']) {
                    $table .= '<tr>
                        <td style="border:1px solid #000;">Extensión de : </td>
                        <td style="border:1px solid #000;">' . $proy['nombre'] . '</td>
                    </tr>';
                }
            }
        }

$table .= '</table>';
$pdf->WriteHTMLCell(0, 0, '', '',$table,0,1,0,true,'C',true);

// set font
$pdf->SetFont('helvetica', '', 8);

// set cell padding
$pdf->setCellPaddings(2, 4, 6, 8);

if (isset($equipoAsignado)) {

    // add a page
    $pdf->AddPage();

$title = <<<EDD
<h3>Equipo del proyecto</h3>
EDD;
$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);

foreach ($equipoAsignado as $equipo) {

    $table = '<table style="border:1px solid #000; padding:15px;">';

    $table .= '<tr>
				<th style="border:1px solid #000;">Id del usuario : </th>
				<th style="border:1px solid #000;">' . $equipo['id_user'] . '</th>
			</tr>';
    $table .= '<tr>
			<td style="border:1px solid #000;">Nombre de usuario : </td>
			<td style="border:1px solid #000;">' . $equipo['username'] . '</td>
        </tr>';
    $table .= '<tr>
            <td style="border:1px solid #000;">Nombre : </td>
            <td style="border:1px solid #000;">' . $equipo['nombres'] . ' ' . $equipo['apellidos'] . '</td>
        </tr>';
    $table .= '<tr>
			<td style="border:1px solid #000;">Email : </td>
			<td style="border:1px solid #000;">' . $equipo['mail'] . '</td>
		</tr>';
    $table .= '<tr>
        <td style="border:1px solid #000;">Fecha asignacion : </td>
        <td style="border:1px solid #000;">' . $equipo['fecha_asignacion'] . '</td>
    </tr>';
    $table .= '</table>';
    
    $pdf->WriteHTMLCell(0, 0, '', '',$table,0,1,0,true,'C',true);
    
    // set font
    $pdf->SetFont('helvetica', '', 8);
    
    // set cell padding
    $pdf->setCellPaddings(2, 4, 6, 8);   
}
} else {
    $table = '<table style="border:1px solid #000; padding:15px;">';
    $table .= '<tr>
        <td style="border:1px solid #000;">Sin equipo asignado </td>
    </tr>';
    $table .= '</table>';
    
    $pdf->WriteHTMLCell(0, 0, '', '',$table,0,1,0,true,'C',true);
    
    // set font
    $pdf->SetFont('helvetica', '', 8);
    
    // set cell padding
    $pdf->setCellPaddings(2, 4, 6, 8); 
}

if (isset($actsProyecto)) {

    // add a page
    $pdf->AddPage();

$title = <<<EDD
<h3>Actividades del proyecto</h3>
EDD;
$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);

foreach ($actsProyecto as $act) {

    $table = '<table style="border:1px solid #000; padding:15px;">';

    $table .= '<tr>
				<th style="border:1px solid #000;">Id de la actividad : </th>
				<th style="border:1px solid #000;">' . $act['id_act'] . '</th>
			</tr>';
    $table .= '<tr>
			<td style="border:1px solid #000;">Nombre de la actividad : </td>
			<td style="border:1px solid #000;">' . $act['nombre'] . '</td>
        </tr>';
    $table .= '<tr>
            <td style="border:1px solid #000;">Autor : </td>
            <td style="border:1px solid #000;">' . $act['nombresAutor'] . ' ' . $act['apeAutor'] . '</td>
        </tr>';
    $table .= '<tr>
			<td style="border:1px solid #000;">Costo : </td>
			<td style="border:1px solid #000;">' . '$' . $act['costo'] . '</td>
		</tr>';
    $table .= '<tr>
        <td style="border:1px solid #000;">Fecha inicio : </td>
        <td style="border:1px solid #000;">' . $act['fecha_ejecucion'] . '</td>
    </tr>';
    $table .= '<tr>
        <td style="border:1px solid #000;">Fecha finalizacion : </td>
        <td style="border:1px solid #000;">' . $act['fecha_finalizacion'] . '</td>
    </tr>';
    $table .= '</table>';
    
    $pdf->WriteHTMLCell(0, 0, '', '',$table,0,1,0,true,'C',true);
    
    // set font
    $pdf->SetFont('helvetica', '', 8);
    
    // set cell padding
    $pdf->setCellPaddings(2, 4, 6, 8);   
}
} else {
    $table = '<table style="border:1px solid #000; padding:15px;">';
    $table .= '<tr>
        <td style="border:1px solid #000;">Sin actividades </td>
    </tr>';
    $table .= '</table>';
    
    $pdf->WriteHTMLCell(0, 0, '', '',$table,0,1,0,true,'C',true);
    
    // set font
    $pdf->SetFont('helvetica', '', 8);
    
    // set cell padding
    $pdf->setCellPaddings(2, 4, 6, 8); 
}

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_clean();
//Close and output PDF document
$pdf->Output('reporte.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
